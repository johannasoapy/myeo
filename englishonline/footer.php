			<footer class="footer site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
                <div class="footer-top">
				    <div class="wrap">
					<p class="cic-brand"><a href="http://www.cic.gc.ca/english/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/cic-logo.png" alt="Citizenship and Immigration Canada Logo"></a></p>
				    </div>
				</div>
				<div id="inner-footer" class="wrap cf">
                    <div id="search-container" class="search-box m-all t-all d-1of3 last-col cf">
                        <h4>Did you find what you were looking for?</h4>

						  <?php get_search_form();?>

						
					</div>
                    <div class="m-all t-1of2 d-1of3 cf">
                        <h4>Contact Us</h4>
                        <p>Email: <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#105;&#110;&#102;&#111;&#64;&#109;&#121;&#101;&#110;&#103;&#108;&#105;&#115;&#104;&#111;&#110;&#108;&#105;&#110;&#101;&#46;&#99;&#97;'>&#105;&#110;&#102;&#111;&#64;&#109;&#121;&#101;&#110;&#103;&#108;&#105;&#115;&#104;&#111;&#110;&#108;&#105;&#110;&#101;&#46;&#99;&#97;</a><br>Phone: <a href="tel:204-946-5140">204-946-5140</a><br>Toll Free in Manitoba: <a href="tel:1-877-335-7489">1-877-335-7489</a></p>
						
					</div>
                    <div class="m-all t-1of2 d-1of3 sites cf">
                        <h4>Project Sites</h4>
                        <p>
                            For Newcomers to Manitoba: <a href="https://livelearn.ca">livelearn.ca</a><br>
                            For ESL and Settlement Practitioners: <a href="http://realizeforum.ca">realizeforum.ca</a>
                        </p>
                    </div>
                    
					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright clear">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> &#8226; <a href="<?php echo home_url(); ?>/privacy-policy" title="">Privacy Policy</a> &#8226; <a href="<?php echo home_url(); ?>/terms-of-use" title="">Terms of Use</a></p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
