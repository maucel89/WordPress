<?php
/*header('Location: http://www.guidasiracusa.info');*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php wp_title('|', true, 'right') . bloginfo() ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            wp_enqueue_style('reset', get_template_directory_uri().'/css/reset.css', false, '1.0.0');
            wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false, '1.0.0');
            wp_enqueue_style('style', get_template_directory_uri().'/style.css', false, '1.0.0');
            wp_enqueue_style('justified-nav', get_template_directory_uri().'/css/justified-nav.css', false, '1.0.0');
            
            global $wp_scripts;
            wp_register_script( 
                'html5shiv', 
                'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', 
                array(), 
                '1.0.0',
                true
            );
            $wp_scripts->add_data( 'html5shiv', 'conditional', 'lt IE 9' );
            wp_register_script( 
                'respond', 
                'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', 
                array(), 
                '1.0.0',
                true
            );
            $wp_scripts->add_data( 'respond', 'conditional', 'lt IE 9' );
            
            wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
            wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-code.js', array('jquery'), '1.0.0', true);
            
            wp_head();
        ?>
    
    </head>
    
    <body <?php body_class(); ?>>
        <?php //opcache_reset(); ?>
        <div class="container clearfix">
            
            <header>
                <div class="jumbotron back-grad">
                    <h1 class="text-center"><?php bloginfo(); ?><br>
                    <small><?php bloginfo('description') ?></small></h1>
                    
                </div>
                
                <?php
                    wp_nav_menu(
                        $menu_prop = array(
                            'theme_location'  => 'nav-menu',
                            'menu'            => 'nav-menu',
                            'menu_class'      => 'nav nav-justified',
                            'menu_id'         => 'nav-menu',
                            'fallback_cb'     => '',
                            'container'       => 'div',
                            'container_class' => 'masthead',
                            'depth'           => '1'
                            
                        )
                    );
                ?>
                
            </header>
            
            <div class="row row-offcanvas row-offcanvas-right">

                <?php get_sidebar(); ?>
                <div class="col-xs-12 col-sm-9">
                    <nav class="navbar" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h3 class="visible-xs">MENU</h3>
                        </div>
                        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="my-navbar-collapse">
                            
                        <?php
                            wp_nav_menu(
                                $menu_prop = array(
                                    'theme_location'  => 'content-menu',
                                    'menu'            => 'content-menu',
                                    'menu_class'      => 'nav navbar-nav',
                                    //'menu_class'      => 'nav nav-tabs',
                                    'menu_id'         => 'content-menu',
                                    'fallback_cb'     => ''
                                    
                                )
                            );
                        ?>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                
    
    
