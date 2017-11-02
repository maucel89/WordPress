<?php

wp_enqueue_script( 'comment-reply' );

$fields =  array(

  'author' =>
    '<p class="comment-form-author">'.
    '<input id="author" name="author" type="text" class="form-control" '.
        'placeholder="'._m('Nome').'" '.
        'value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"'.( $req ? ' required' : '' ).'></p>',

  'email' =>
    '<p class="comment-form-email">'.
    '<input id="email" name="email" type="email" class="form-control" '.
        'placeholder="'.'Email'.'" '.
        'value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30"'.( $req ? ' required' : '' ).' /></p>',

  'url' =>
    '<p class="comment-form-url">'.
    '<input id="url" name="url" type="url" class="form-control" '.
        'placeholder="'._m('Sito Web').'" '.
        'value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);

comment_form(array(
    'fields'        => $fields,
    'title_reply'   => _m('Lascia qui la tua valutazione sul servizio guida:'),
    'label_submit'  => _m('Inserisci commento'),
    'comment_notes_before' => _m('L\'indirizzo email non verrà pubblicato.'),
    'comment_notes_after' => '',
    'comment_field' =>  '<p class="comment-form-comment">'.
        '<textarea id="comment" class="form-control" name="comment" aria-required="true" placeholder="'._m('Commento').'" required>' .
        '</textarea></p>',
    'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'Utente <a href="%1$s">%2$s</a> commenta:' ),
            admin_url( 'profile.php' ),
            $user_identity
        ) . '</p>',
));
?>

<h4><?php echo(get_comments_number())?_m('Altri hanno scritto anche:'):_m('Nessuna valutazione è stata ancora inserita...'); ?></h4>
<ol class="commentlist media-list">
    <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ol>
<p class="text-center"><?php paginate_comments_links(); ?></p>