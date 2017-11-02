<?php get_header(); ?>
            
                    <div class="row">
                        <article>
                            <div class="col-lg-12">
                                <?php
                                /**
                                 * E' il template principale per un tema di wordpress.
                                 * 
                                 * Questo file è l'ultimo template che wordpress carica durante il caricamento 
                                 * di una pagina, nel caso in cui nessun altro template pi˘ specifico Ë trovato
                                 * 
                                 * Uso get_search_query() per recuperare la parola chiave usata per la ricerca.  
                                 */
                                 
                                ?>
                                
                                <h1><?php _e('Risultati di ricerca per'); ?>: "<?php echo get_search_query(); ?>"</h1>
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                
                                    <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
                                        <?php the_title('<h2><a href="'.get_permalink().'">', '</a></h2>'); ?>
                                        <?php the_excerpt() ?>
                                        <hr>
                                    </div>
                                
                                <?php endwhile; else : ?>
                                
                                    <div class="alert alert-warning"><?php _e('La ricerca non ha prodotto risultati...') ?></div>
                                
                                <?php endif; ?>
                            </div>
                        </article>
                    
                        
                        
                    </div><!--/row-->
                </div><!--/span-->
            </div>
<?php get_footer() ?>