<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							
                            <header class="article-header">

                               <h1 class="archive-title"><?php single_cat_title(); ?></h1>
                            </header> <?php // end article header ?>
                            <section class="archive-content">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline entry-meta vcard">
										<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
                  							     /* the time the post was published */
                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">'.__('by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>

								</header>

								<section class="entry-content">
									<?php the_content(); ?>

								</section>

								<footer class="article-footer">
                                    <?php printf( __( 'filed under', 'bonestheme' ).': %1$s', get_the_category_list(', ') ); ?>

                                    <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
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
												<p><?php _e( 'This is the error message in the taxonomy-custom_cat.php template.', 'bonestheme' ); ?></p>
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
                            
						</aside>

				</div>

			</div>

<?php get_footer(); ?>
