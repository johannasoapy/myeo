<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of4 d-3of4 last-col cf page-js" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

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
								</section> <?php // end article section ?>

                                <?php if ( is_user_logged_in() ) { ?>
                                    <?php comments_template(); ?>
                                <?php } else { ?>
                                    <p>Please <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">login</a> to comment or view discussion.</p>
                                <?php } ?>

								

							</article>

							<?php endwhile; endif; ?>

						</main>

						<aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
							<?php get_sidebar(); ?>
						</aside>

				</div>

			</div>

<?php get_footer(); ?>
