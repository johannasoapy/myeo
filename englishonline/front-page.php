<?php get_header(); ?>

        <div id="content">
             <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                <div class="hero">
                    <div class="wrap cf">
                        <div class="cta">
                            <div class="m-all t-1of3 d-1of3 last-col cf">

                              <img src="<?php echo get_template_directory_uri(); ?>/library/images/hero-portrait.jpg" alt="An middle-aged woman smiling while typing on her laptop.">

                            </div>
                            <div class="m-all t-2of3 d-2of3 cf">
                                <?php
                                    // the Home page fields
                                    $heroheader = get_field('hero_heading');
                                        if( !empty($heroheader) ): ?>
                                            <h1><?php echo esc_attr($heroheader); ?></h1>
                                        <?php endif; ?>
                                <?php
                                    $herotext = get_field('hero_text');
                                        if( !empty($herotext) ): ?>
                                            <p><?php echo $herotext; ?></p>
                                        <?php endif; ?>
                               <?php
                                    $herobuttonlink = get_field('hero_button_link');
                                        if( !empty($herobuttonlink) ): ?>
                                            <a href="<?php echo esc_url($herobuttonlink); ?>" class="blue-btn">
                                                <?php
                                                 $herobutton = get_field('hero_button');
                                                    if( !empty($herobutton) ): ?>
                                                        <?php echo esc_attr($herobutton); ?>
                                                    <?php endif; ?>

                                            </a>
                                        <?php endif; ?>

                            </div>
                            
                        </div>
                        
                         
                    </div><!-- end .wrap -->
            </div> <!-- end .hero -->
				

                    <main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
                       
                           <div id="inner-content" class="wrap cf">
                               
                               <section class="stats cf">
                                   <div class="m-all t-all d-1of5 cf">
                                        <h2>Our Impact</h2>
                                    </div>
                                    <div class="m-all t-all d-4of5 last-col cf">
                                        <div class="m-all t-1of3 d-1of3 cf">
                                        <?php
                                            $stat1 = get_field('stat_1_number');
                                                if( !empty($stat1) ): ?>
                                                    <p><a href="http://myenglishonline.ca/our-impact-in-numbers"><span class="screen-reader-text skip-link"><?php _e( 'Our Impact in Numbers', 'bonestheme' ); ?></span><span class="stat-number"><?php echo esc_attr($stat1); ?></span><br>
                                                        <?php
                                                            $stat1text = get_field('stat_1_text');
                                                                if( !empty($stat1text) ): ?>
                                                                    <span class="stat-text"><?php echo esc_attr($stat1text); ?></span>
                                                                <?php endif; ?>
                                                    </a></p>
                                                <?php endif; ?>
                                        </div>
                                        <div class="m-all t-1of3 d-1of3 cf">
                                        <?php
                                            $stat2 = get_field('stat_2_number');
                                                if( !empty($stat2) ): ?>
                                                    <p><a href="http://myenglishonline.ca/our-impact-in-numbers"><span class="screen-reader-text skip-link"><?php _e( 'Our Impact in Numbers', 'bonestheme' ); ?></span><span class="stat-number"><?php echo esc_attr($stat2); ?></span><br>
                                                        <?php
                                                            $stat2text = get_field('stat_2_text');
                                                                if( !empty($stat2text) ): ?>
                                                                    <span class="stat-text"><?php echo esc_attr($stat2text); ?></span>
                                                                <?php endif; ?>
                                                    </a></p>
                                                <?php endif; ?>
                                        </div>
                                        <div class="m-all t-1of3 d-1of3 last-col cf">
                                        <?php
                                            $stat3 = get_field('stat_3_number');
                                                if( !empty($stat3) ): ?>
                                                    <p><a href="http://myenglishonline.ca/our-impact-in-numbers"><span class="screen-reader-text skip-link"><?php _e( 'Our Impact in Numbers', 'bonestheme' ); ?></span><span class="stat-number"><?php echo esc_attr($stat3); ?></span><br>
                                                        <?php
                                                            $stat3text = get_field('stat_3_text');
                                                                if( !empty($stat3text) ): ?>
                                                                    <span class="stat-text"><?php echo esc_attr($stat3text); ?></span>
                                                                <?php endif; ?>
                                                    </a></p>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                               </section>
                               
                            </div><!-- end #inner-content .wrap -->
                        <div class="lightgray">
                            <section class="wrap cf">
                                <div class="mission">
                                    <div class="m-all t-1of5 d-1of5 cf">
                                        <h2>What We Strive For</h2>
                                    </div>
                                    <div class="m-all t-4of5 d-4of5 last-col cf">
                                    <?php
                                        $mission = get_field('mission_statement');
                                            if( !empty($mission) ): ?>
                                                <blockquote>
                                                    <?php echo esc_attr($mission); ?>
                                                </blockquote>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </section><!-- end .wrap -->
                        </div><!-- end .lightgray -->
                            <section class="wrap cf">
                                <div class="support-programs">
                                    <h2>Our Programs</h2>
                                    <section class="m-all t-1of3 d-1of3 cf">
                                        
                                        <?php
                                            $programheading3 = get_field('program_heading_3');
                                                if( !empty($programheading3) ): ?>
                                                    <h3>
                                                        <?php echo esc_attr($programheading3); ?>
                                                    </h3>
                                                <?php endif; ?>
                                        <?php
                                            $programpage3 = get_field('program_page_3');

                                            if( $programpage3 ): 
                                                // override $post
                                                $post = $programpage3;
                                                setup_postdata( $post ); 
                                            ?>
                                                <div class="program-content">
                                                    <div class="m-all cf">
                                                        <?php if (has_post_thumbnail()): ?>
												            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'bones-thumb-600' ); ?></a>
                                                        <?php else: ?>
                                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/volunteer.jpg" alt="An icon showing 2 figures connected by arrows."></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="m-all cf">
                                                            <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                            <?php endif; ?>
                                    </section>
                                    <section class="m-all t-1of3 d-1of3 cf">
                                        
                                        <?php
                                            $programheading1 = get_field('program_heading_1');
                                                if( !empty($programheading1) ): ?>
                                                    <h3>
                                                        <?php echo esc_attr($programheading1); ?>
                                                    </h3>
                                                <?php endif; ?>
                                        <?php
                                            $programpage1 = get_field('program_page_1');

                                            if( $programpage1 ): 
                                                // override $post
                                                $post = $programpage1;
                                                setup_postdata( $post ); 
                                            ?>
                                                <div class="program-content">
                                                    <div class="m-all cf">
                                                        <?php if (has_post_thumbnail()): ?>
												            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'bones-thumb-600' ); ?></a>
                                                        <?php else: ?>
                                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/volunteer.jpg" alt="An icon showing 2 figures connected by arrows."></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="m-all cf">
                                                            <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                            <?php endif; ?>
                                    </section>
                                    <section class="m-all t-1of3 d-1of3 last-col cf">
                                        <?php
                                            $programheading2 = get_field('program_heading_2');
                                                if( !empty($programheading2) ): ?>
                                                    <h3>
                                                        <?php echo esc_attr($programheading2); ?>
                                                    </h3>
                                                <?php endif; ?>
                                        <?php
                                            $programpage2 = get_field('program_page_2');

                                            if( $programpage2 ): 
                                                // override $post
                                                $post = $programpage2;
                                                setup_postdata( $post ); 
                                            ?>
                                                <div class="program-content">
                                                    <div class="m-all cf">
                                                        <?php if (has_post_thumbnail()): ?>
												            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'bones-thumb-600' ); ?></a>
                                                        <?php else: ?>
                                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/realize.jpg" alt="A map of Canada with arrows spreading out from Winnipeg, MB."></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="m-all cf">
                                                            <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                            <?php endif; ?>
                                    </section>


                                </div>

                                
                           </section><!-- end .wrap -->
                    </main>

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

			</div><!-- end #content -->

<?php get_footer(); ?>
