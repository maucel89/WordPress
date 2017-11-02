<?php
function init_post_type() {
    register_post_type('slideshow', array(
        'labels' => array(
            'name' => __('Slideshow'),
            'singular_name'      => 'Slide',
            'add_new' => __('Aggiungi slide'),
            'add_new_item' => __('Aggiungi nuova slide'),
            'view_item' => __('Vedi slide'),
            'edit_item' => __('Modifica slide')
        ),
        'public' => true,
        'menu_position' => 17,
        'supports' => array(
            'title',
            'thumbnail'
        ),
        'rewrite' => array('slug' => 'slide')
    ));
    register_taxonomy( 'categoria', 'slideshow', array(
        'label' => __('Categoria')
    ) );
}
add_action('init', 'init_post_type');

function my_custom_columns_content( $column ) {
   global $post;

   if ( $column == 'categoria' ) {
           the_terms(get_the_ID(), 'categoria');
   }
}
add_action( 'manage_slideshow_posts_custom_column', 'my_custom_columns_content' );

function my_custom_columns( $columns ) {
  $columns = array(
    'cb' => '<input type="checkbox" />',
    'title' => 'Titolo',       
    'categoria' => 'Categoria',
    'date'      => 'Data'
  );
  return $columns;
}
add_filter( 'manage_edit-slideshow_columns', 'my_custom_columns' );

?>