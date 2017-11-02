<?php get_header(); ?>
            
                    <div class="row">
                        <article>
                            <?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
                            
                                <div class="col-lg-12">
                                    <h2>►<?php the_title(); ?></h2>
                                    <p><?php the_post_thumbnail(); ?></p>
                                    <p><?php the_content(); ?></p>
                                    
                                </div><!--/span-->
                                            
                            <?php endwhile; else : ?>
                            
                                <p>Mi dispiace, nessun post da mostrare!</p>
                            
                            <?php endif; ?>
                        </article>
                    
                        
                        
                    </div><!--/row-->
                </div><!--/span-->
            </div>
<?php get_footer() ?>