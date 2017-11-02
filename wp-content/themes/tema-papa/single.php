<?php get_header(); ?>
            
                    <div class="row">
                        <article>
                            <?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
                            
                                <div class="col-lg-12">
                                    
                                    <?php get_template_part('loop', get_post_format())  ?>
                                    
                                </div><!--/span-->
                                            
                            <?php endwhile; else : ?>
                            
                                <p>Mi dispiace, nessun post da mostrare!</p>
                            
                            <?php endif; ?>
                        </article>
                    
                        
                        
                    </div><!--/row-->
                </div><!--/span-->
            </div>
<?php get_footer() ?>