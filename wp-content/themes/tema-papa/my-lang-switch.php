<?php

/**
 * Widget
 *
 * Sulla base del Multisite Language Switcher ho creato il mio plugin con
 * l'interfaccia che piace a me.
 * 
 */

class MyLangSwitchWidget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            false,
            $name = __( 'My Language Switcher' )
        );
    }

    /**
     * Output of the widget in the frontend
     * 
     * @param array $args
     * @param array instance
     * @uses MslsOutput
     */
    public function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;
        $title = apply_filters( 'widget_title', $instance['title'] );
        if ( $title )
            echo $before_title . $title . $after_title;
        
        //PRELEVIAMO IL LINK DELLA LINGUA OPPOSTA
        preg_match("~<a href=\"(.*?)\" title~i", get_the_msls(), $matches);
        $other_link = $matches[1];
        
        echo'<div class="list-group">
            <a '.((get_bloginfo('language')=='de-DE')?'href='.$other_link:'').' class="list-group-item'.
            ((get_bloginfo('language')=='it-IT')?' active':' bg-table').'"><img class="flag" src="http://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/300px-Flag_of_Italy.svg.png" alt="IT">Versione Italiana</a>'.
            
            '<a '.((get_bloginfo('language')=='it-IT')?'href='.$other_link:'').' class="list-group-item'.
            ((get_bloginfo('language')=='de-DE')?' active':' bg-table').'"><img class="flag" src="http://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/300px-Flag_of_Germany.svg.png" alt="DE">Deutsche Version</a>
            
        </div>';
        
        echo $after_widget;
    }

    /**
     * Update widget in the backend
     * 
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance          = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }

    /**
     * Display an input-form in the backend
     * 
     * @param array $instance
     */
    public function form( $instance ) {
        printf(
            '<p><label for="%1$s">%2$s:</label> <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
            $this->get_field_id( 'title' ),
            __( 'Title' ),
            $this->get_field_name( 'title' ),
            ( isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '' )
        );
    }

}