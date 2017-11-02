<?php

/**
 * Widget
 *
 * Sulla base del Multisite Language Switcher ho creato il mio plugin con
 * l'interfaccia che piace a me.
 * 
 */

class MyProfileDescWidget extends WP_Widget {
    
    var $image_field = 'image';
    
    public function __construct() {
        parent::__construct(
            false,
            $name = __( 'My Profile Description' )
        );
    }

    //Output of the widget in the frontend
    public function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;
        
        $image_id   = $instance[$this->image_field];
        $image      = new WidgetImageField( $this, $image_id );
        
        echo '<div>'.
            '<div class="thumbnail">'.
                '<img src="'.$image->get_image_src('large').'" class="gc-avatar hidden-xs" alt="giuseppe-celani">'.
                '<div class="caption">'.
                    '<h3 class="hidden-xs">'.$instance['name'].'</h3>'.
                    '<strong>'.$instance['desc'].'</strong><hr>'.
                    '<address>'.
                        '<span>'.str_replace("\n", "<br>", $instance['addr']).'</span><br>'.
                        '<a href="mailto:'.$instance['email'].'">'.$instance['email'].'</a>'.
                    '</address>'.
                    '<p><a href="'._m('/prenota-il-tuo-servizio/').'" class="btn btn-primary" role="button">'.$instance['btntxt'].'</a></p>'.
                '</div>'.
            '</div>'.
        '</div>'.
        '<hr class="visible-xs">';
        
        echo $after_widget;
    }

    //Update widget in the backend
    public function update( $new_instance, $old_instance ) {
        $instance           = $old_instance;
        $instance['name']   = strip_tags( $new_instance['name'] );
        $instance['desc']   = strip_tags( $new_instance['desc'] );
        $instance['addr']   = strip_tags( $new_instance['addr'] );
        $instance['email']  = strip_tags( $new_instance['email'] );
        $instance['btntxt']  = strip_tags( $new_instance['btntxt'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
        return $instance;
    }

    //Display an input-form in the backend
    public function form( $instance ) {
        
        $image_id   = esc_attr(isset( $instance[$this->image_field]) ? $instance[$this->image_field] : 0 );
        $image      = new WidgetImageField( $this, $image_id );
        
        echo '<p><label>Immagine</label>';
        echo $image->get_widget_field();
        echo '</p>';
        
        printf(
            '<p><label for="%1$s">%2$s:</label> <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
            $this->get_field_id( 'name' ),
            __( 'Nome' ),
            $this->get_field_name( 'name' ),
            ( isset( $instance['name'] ) ? esc_attr( $instance['name'] ) : '' )
        );
        printf(
            '<p><label for="%1$s">%2$s:</label> <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
            $this->get_field_id( 'desc' ),
            __( 'Descrizione' ),
            $this->get_field_name( 'desc' ),
            ( isset( $instance['desc'] ) ? esc_attr( $instance['desc'] ) : '' )
        );
        printf(
            '<p><label for="%1$s">%2$s:</label> <textarea class="widefat" id="%1$s" name="%3$s">%4$s</textarea></p>',
            $this->get_field_id( 'addr' ),
            __( 'Indirizzo' ),
            $this->get_field_name( 'addr' ),
            ( isset( $instance['addr'] ) ? esc_attr( $instance['addr'] ) : '' )
        );
        printf(
            '<p><label for="%1$s">%2$s:</label> <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
            $this->get_field_id( 'email' ),
            __( 'Email' ),
            $this->get_field_name( 'email' ),
            ( isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '' )
        );
        printf(
            '<p><label for="%1$s">%2$s:</label> <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
            $this->get_field_id( 'btntxt' ),
            __( 'Button Text' ),
            $this->get_field_name( 'btntxt' ),
            ( isset( $instance['btntxt'] ) ? esc_attr( $instance['btntxt'] ) : '' )
        ); 
    }
}