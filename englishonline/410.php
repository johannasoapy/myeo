<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of4 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1 class="h2"><?php _e( '410 - Article Removed', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'Sorry, the page you requested has been permanently removed.', 'bonestheme' ); ?></p>
                                <h3>Newcomers</h3>
                                <p><?php _e( 'Our Learner area has moved to livelearn.ca. If you are a newcomer looking for English exercises or Settlement information, please check there.', 'bonestheme' ); ?></p>
                                <p><a class="blue-btn" href="https://livelearn.ca">Go to Live &amp; Learn</a></p>
                                <h3>Settlement and ESL Practitioners</h3>
                                <p><?php _e( 'Our Teaching with Technology and Promising Practices Webinars have moved to realizeforum.ca. If you are a Settlement or ESL practitioner looking for a webinar, please check there.', 'bonestheme' ); ?></p>
                                <p><a class="blue-btn" href="http://realizeforum.ca">Go to Realize</a></p>

							</section>

							<footer class="article-footer">

									<p>Otherwise, please try another page with the menu above or the Search form below.</p>

							</footer>

						</article>

					</main>
                    <aside id="sidebar1" class="sidebar m-all t-1of4 d-1of4 cf" role="complementary">
                        <?php get_sidebar(); ?>
                    </aside>

				</div>

			</div>

<?php get_footer(); ?>
