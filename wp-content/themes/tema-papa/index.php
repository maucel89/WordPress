<?php get_header(); ?>
            
                    <div class="row">
                        <article><?php
                            if(have_posts())
                                while(have_posts()){
                                    the_post();
                                    get_template_part('loop', get_post_format());
                                }
                            else echo '<p>Mi dispiace, nessun post da mostrare!</p>';?>
                        </article>
                    
                        <?php wp_list_comments(); ?>
                        
                    </div><!--/row-->
                </div><!--/span-->
            </div>
<?php get_footer() ?>