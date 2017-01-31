<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
								/*
								 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
								 *
								 * So this function will bring in the needed template file depending on what the post
								 * format is. The different post formats are located in the post-formats folder.
								 *
								 *
								 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
								 * A SPECIFIC POST FORMAT.
								 *
								 * If you want to remove post formats, just delete the post-formats folder and
								 * replace the function below with the contents of the "format.php" file.
								*/
								get_template_part( 'post-formats/format', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>

					<aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
                        <?php 
                            if ( in_category( 'newcomer-stories' )) { ?>
                                <?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

                                    <?php dynamic_sidebar( 'sidebar3' ); ?>


                                    <?php else : ?>
                                        <?php
                                            /*
                                             * This content shows up if there are no widgets defined in the backend.
                                            */
                                        ?>

                                        <div class="no-widgets">
                                            <p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
                                        </div>

                                <?php endif; ?>
                                <div class="widget">
                                    <h4 class="widgettitle">Newcomers' Stories</h4>
                                    <?php
                                        // The Query
                                        query_posts('cat=143'); ?>
                                        <ul>
                                        <?php // The Loop
                                        while ( have_posts() ) : the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?></a></li>
                                        <?php endwhile;

                                        // Reset Query
                                        wp_reset_query();
                                        ?>
                                            </ul>
                                </div>
                            <?php } else { ?>
                                <?php if ( is_active_sidebar( 'sidebar5' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar5' ); ?>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'sidebar6' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar6' ); ?>
                                <?php endif; ?>
                            <?php } ?>
						
					</aside>

				</div>

			</div>

<?php get_footer(); ?>
