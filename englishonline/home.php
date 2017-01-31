<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
                            
                            <header class="article-header">

                                <?php
                                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                                ?>

                            </header> <?php // end article header ?>
                            <section class="archive-content">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

								</header>

								<section class="entry-content cf">
									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Sorry, we couldn&#154;t find what you&#154;re looking for!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'There are currently no posts.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the home.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

                            </section>
						</main>

					<aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
                        <?php if ( is_active_sidebar( 'sidebar5' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar5' ); ?>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'sidebar6' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar6' ); ?>
						<?php endif; ?>
                        <div class="widget">
                            <h4 class="widgettitle">English Online Inc.</h4>

                            <p>Email: <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#105;&#110;&#102;&#111;&#64;&#109;&#121;&#101;&#110;&#103;&#108;&#105;&#115;&#104;&#111;&#110;&#108;&#105;&#110;&#101;&#46;&#99;&#97;'>&#105;&#110;&#102;&#111;&#64;&#109;&#121;&#101;&#110;&#103;&#108;&#105;&#115;&#104;&#111;&#110;&#108;&#105;&#110;&#101;&#46;&#99;&#97;</a><br>
                            Phone: 204-946-5140<br>
                            Toll Free in Manitoba: 1-877-335-7489<br><br>
                            Suite 610-294 Portage Avenue<br>
                            Winnipeg, MB<br>
                            R3C 0B9 | Canada</p>
                        </div>
					</aside>

				</div>

			</div>


<?php get_footer(); ?>
