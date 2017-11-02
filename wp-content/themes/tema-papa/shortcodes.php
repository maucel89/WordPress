<?php


//[my_mappa1]
add_shortcode('my_mappa1', 'my_mappa1_code');
function my_mappa1_code(){
    return '<iframe src="https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d25467.0152524089!2d15.258383478873977!3d37.07232911290881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!1i0!3e6!4m3!3m2!1d37.071644299999996!2d15.224651999999999!4m5!1s0x0%3A0x335387432d22be04!2sGiuseppe+Celani+-+Guida+turistica+a+Siracusa+-++Fremdenf%C3%BChrer+in+Syrakus!3m2!1d37.075372!2d15.278955999999999!5e0!3m2!1sit!2sit!4v1386384650389" class="tour-map"></iframe>';
}

//[my_mappa2]
add_shortcode('my_mappa2', 'my_mappa2_code');
function my_mappa2_code(){
    return '<iframe src="https://mapsengine.google.com/map/embed?mid=zIOhVLsIUyk8.kxvpdpm7ANCY" class="tour-map"></iframe>';
}

//[my_mappa]
add_shortcode('my_mappa', 'my_mappa_code');
function my_mappa_code($atts){
    $show_id = rand();
    extract(shortcode_atts(array(
        'class'     => '',
        'src'       => ''
    ), $atts));
    return '<iframe class="'.$class.'" src="'.$src.'"></iframe>';
}


//[my_sendmail]
add_shortcode('my_sendmail', 'my_sendmail_code');
function my_sendmail_code(){
    if(isset($_REQUEST['invia'])){
        //MESSAGGIO
        $msg = utf8_decode(
        'Nome: '.$_REQUEST['nome']."\n".
        'Cognome: '.$_REQUEST['cognome']."\n".
        'Città: '.$_REQUEST['citta']."\n".
        'Telefono: '.$_REQUEST['telefono']."\n".
        'Testo: '.$_REQUEST['note']);
        
        $headers = 'From: '.$_REQUEST['email']."\r\n".
            'Reply-To: '.$_REQUEST['email']."\r\n".
            'X-Mailer: PHP/' . phpversion();
        
        //EMAIL
        if(mail('celani.giuseppe@alice.it' , $_REQUEST['tipo_richiesta'] , $msg , $headers))
             return '<div class="alert alert-success">La sua richiesta è stata inviata con successo!</div>';
        else return '<div class="alert alert-danger">C\'è stato un errore durante l\'invio, riprova...</div>';
    }
    return '';
}


//[my_slideshow]
add_shortcode('my_slideshow', 'my_slideshow_code');
function my_slideshow_code($atts){
    $show_id = rand();
    extract(shortcode_atts(array(
        'cat'       => 'Home',
        'width'     => '0',
        't_size'    => '3',
        'link'      => false
    ), $atts));
    $ret = '<div id="myCarousel'.$show_id.'" class="carousel slide" data-ride="carousel"'.
            (($width)?' style="width:'.$width.'px"':'').'>'.
           '<!-- Indicators -->'.
           '<ol class="carousel-indicators">';
    
    $query = new WP_Query('post_type=slideshow&categoria='.$cat.'&posts_per_page=-1');
    
    for($i = 0; $i < ($query->found_posts); $i++)
        $ret .= '<li data-target="#myCarousel'.$show_id.'" data-slide-to="'.($i).'"'.(($i)?'':' class="active"').'></li>';
    $ret .= '</ol>
    <!-- Wrapper for slides -->
  <div class="carousel-inner">';
    
    $i = 0;
    while($query->have_posts()){
        $query->the_post();
        $image = wp_get_attachment_image_src(
            get_post_thumbnail_id(get_the_ID()),
            'large'
        );
        $ret .= '<div class="item'.(($i++)?'':' active').'">'.
                '<img src="'.$image[0].
                '" alt="'.get_the_title().'">'.
                '<div class="carousel-caption">'.
                //(($link)?'<a href="'.$image[0].'">':'').
                (($link)?'<a href="'.get_permalink().'">':'').
                '<h'.$t_size.'>'.get_the_title().'</h'.$t_size.'>'.
                (($link)?'</a>':'').'</div></div>';
    };
    
    wp_reset_postdata();
    
    return $ret.'</div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel'.$show_id.'" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel'.$show_id.'" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>';
}


?>