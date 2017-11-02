<?php

//[boot_riga]ciao[/boot_riga]
add_shortcode('boot_riga', 'boot_riga_code');
function boot_riga_code($atts, $content = null){
	return '<div class="row">'.do_shortcode($content).'</div>';
}

//[boot_alert type='info' class=""]ciao[/boot_alert]
add_shortcode('boot_alert', 'boot_alert_code');
function boot_alert_code($atts, $content = null){
	
    //estraggo i parametri
    extract(shortcode_atts(array(
            'type' => 'info',
            'class'=> ''
        ), $atts
    ));
    
    return '<div class="alert alert-'.$type.(($class)?' '.$class:'').'">'.$content.'</div>';
}

//[boot_panel type='info' title='titolo' class=""]ciao[/boot_panel]
add_shortcode('boot_panel', 'boot_panel_code');
function boot_panel_code($atts, $content = null){
	
    //estraggo i parametri
    extract(shortcode_atts(array(
            'type'  => 'default',
            'title' => '',
            'class' => ''
        ), $atts
    ));
    
    return  ((!empty($class))?'<div class="'.$class.'">':'').
            '<div class="panel panel-'.$type.'">'.
            ((!empty($title))
                ?'<div class="panel-heading">'.
                 '<h3 class="panel-title">'.$title.'</h3></div>'
                :'').'<div class="panel-body">'.
        do_shortcode($content).'</div></div>'.((!empty($class))?'</div>':'');
}

//[boot_thumb title='titolo' class=""]ciao[/boot_thumb]
add_shortcode('boot_thumb', 'boot_thumb_code');
function boot_thumb_code($atts, $content = null){
	
    //estraggo i parametri
    extract(shortcode_atts(array(
            'title' => '',
            'class' => '',
            'thumb' => ''
        ), $atts
    ));
    return '<div class="'.(($thumb)?'thumbnail':'').(($class)?' '.$class:'').'">'
            .do_shortcode($content).'<div class="caption">
            <h4 class="tour-title">'.$title.'</h4></div></div>';
}



?>