<?php
/*
 Template Name: About
 *
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content cf" itemprop="articleBody">
                                    <?php if (has_post_thumbnail()): ?>
											<div class="wp-caption">
												<?php the_post_thumbnail( 'bones-thumb-900' ); ?>
                                            </div>
                                        <?php endif; ?>
									<?php
										// the content (pretty self explanatory huh)
										the_content();

									?>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
							<?php if ( is_active_sidebar( 'sidebar5' ) ) : ?>

                                <?php dynamic_sidebar( 'sidebar5' ); ?>


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
