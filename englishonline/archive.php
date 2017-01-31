<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of4 d-3of4 last-col cf archive-js" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

                        <header class="article-header">

                            <?php
							the_archive_title( '<h1 class="archive-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>

                        </header> <?php // end article header ?>
                        <section class="archive-content">
							
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline entry-meta vcard">
										<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
                  							     /* the time the post was published */
                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">'.__('by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>

								</header>

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php the_excerpt(); ?>

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
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
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
