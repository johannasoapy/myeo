<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						
                        <header class="article-header">

                            <h1 class="archive-title">Appreciation From our Learners</h1>

                        </header> <?php // end article header ?>
                        <section class="archive-content">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">


								<section class="entry-content cf">

									<blockquote class="testimonial"><?php the_content(); ?></blockquote>

								</section>

								<footer class="article-footer">
                                    
                                    <cite><?php the_title(); ?><?php printf( __( '', 'bonestheme' ).' %1$s',
                                        /* the author of the post */
                                        '<span class="by"></span>'
                                        ); ?>
                                    </cite>
								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the quotes post type archive template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
                        </section>
                    </main>

                    <aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
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

                    </aside>

				</div>

			</div>

<?php get_footer(); ?>
