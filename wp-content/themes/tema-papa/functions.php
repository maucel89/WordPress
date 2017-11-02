<?php

//TRANSLATION
include 'lang.php';

//SHORTCODES
include 'shortcodes.php';
include 'boot-shortcodes.php';

//WIDGETS
include 'my-lang-switch.php';
include 'my-profile-desc.php';

function my_register_Widgets(){
    register_widget('MyLangSwitchWidget');
    if( class_exists( 'WidgetImageField' ) )
        register_widget('MyProfileDescWidget');
}
add_action('widgets_init', 'my_register_Widgets');

//MENUS
register_nav_menus( array(
        'sidebar-menu'  => 'Sidebar Menu',
        'content-menu'  => 'Content Menu',
        'nav-menu'      => 'Nav Menu'
    )
);

add_theme_support('post-thumbnails');


//POST TYPE
include 'slideshow-post-type.php';

//SIDEBARS
register_sidebar(array(
    'name'          => 'my-sidebar',
    'id'            => 'my-sidebar',
    'class'         => '',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title>"',
    'after_title'   => '</h2>'
));


//COMMENT STYLE
function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="media thumbnail comment-body">
		<?php endif; ?>
		<div class="comment-author pull-left vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 75 ); ?>
		</div>
        
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
<?php endif; ?>

		<div class="comment-meta media-body commentmetadata"><?php
            
            //DATA
            echo'<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">';
            /* translators: 1: date, 2: time */
            printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
            echo '</a>';
            edit_comment_link(__('(Edit)'),'  ','');
            
            //TITOLO
            echo '<h5 class="media-heading">';
            printf(
                __('<cite class="fn">%s</cite> <span class="says">says:</span>'), 
                get_comment_author_link()
            );
            echo '</h5>';
            
            //COMMENTO
            comment_text();
			?>
		</div>

		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth']
            ))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
}


?>