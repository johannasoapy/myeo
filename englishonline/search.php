<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage">
                        <header class="article-header">

                            <h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

                        </header> <?php // end article header ?>
						<section class="archive-content">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="search-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                  						<p class="byline entry-meta vcard">
                    							<?php printf( __( 'Posted %1$s by %2$s', 'bonestheme' ),
                   							    /* the time the post was published */
                   							    '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                      							    /* the author of the post */
                       							    '<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
                  						</p>

								</header>

								<section class="entry-content">
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>

								</section>

								<footer class="article-footer">

									<?php if(get_the_category_list(', ') != ''): ?>
                  					<?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>
                  					<?php endif; ?>

                 					<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <!-- end article footer -->

							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

                                    <article id="post-not-found" class="hentry cf">

                                    <header class="article-header">

                                        <h1 class="h2"><?php _e( 'Sorry, no results.', 'bonestheme' ); ?></h1>

                                    </header>

                                    <section class="entry-content">

                                        <p><?php _e( 'The subject you were looking for was not found. Try again, or try one of our project site below.', 'bonestheme' ); ?></p>
                                        <h3>Newcomers</h3>
                                        <p><?php _e( 'Our Learner area has moved to livelearn.ca. If you are a newcomer looking for English exercises or Settlement information, please check there.', 'bonestheme' ); ?></p>
                                        <p><a class="blue-btn" href="https://livelearn.ca">Go to Live &amp; Learn</a></p>
                                        <h3>Settlement and ESL Practitioners</h3>
                                        <p><?php _e( 'Our Teaching with Technology and Promising Practices Webinars have moved to realizeforum.ca. If you are a Settlement or ESL practitioner looking for a webinar, please check there.', 'bonestheme' ); ?></p>
                                        <p><a class="blue-btn" href="http://realizeforum.ca">Go to Realize</a></p>

                                    </section>

                                    <footer class="article-footer">

                                            <p>Thank you from the English Online Team.</p>

                                    </footer>

                                </article>

							<?php endif; ?>
                        </section>
                    </main>

                    <aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
                        <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

                            <?php dynamic_sidebar( 'sidebar1' ); ?>


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
