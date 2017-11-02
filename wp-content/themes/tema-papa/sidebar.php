            <aside>
                <nav class="col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <ul>
                    <?php dynamic_sidebar('my-sidebar'); ?>
                    
                    <?php
                        wp_nav_menu(
                            $menu_prop = array(
                                'theme_location'  => 'sidebar-menu',
                                'menu'            => 'sidebar-menu',
                                'menu_class'      => 'nav list-group',
                                'menu_id'         => 'sidebar-menu',
                                'fallback_cb'     => '',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '►',
                                'link_after'      => '',
                                'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>'
                            )
                        );
                    ?>
                    </ul>
                </nav>
            </aside>