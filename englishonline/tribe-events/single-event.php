<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();

?>
<div id="content">

	<div id="inner-content" class="wrap cf">
		<!--<div class="breadcrumbs">
				<?php //if (function_exists('ft_custom_breadcrumbs')) {
					//ft_custom_breadcrumbs();
				//} ?>
		</div>-->

		<main id="main" class="m-all t-2of3 d-3of4 last-col cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							
			<article class="hentry tribe-article">				
				<div id="tribe-events-content" class="tribe-events-single vevent hentry">
				
					<p class="tribe-events-back">
						<a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a>
					</p>
				
					<!-- Notices -->
					<?php tribe_events_the_notices() ?>
				
					<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
				
					<div class="tribe-events-schedule updated published tribe-clearfix">
						<?php echo tribe_events_event_schedule_details( $event_id, '<h3>', '</h3>' ); ?>
						<?php if ( tribe_get_cost() ) : ?>
							<span class="tribe-events-divider">|</span>
							<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
						<?php endif; ?>
					</div>
				
					<!-- Event header -->
					<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
						<!-- Navigation -->
						<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
						<ul class="tribe-events-sub-nav">
							<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
							<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
						</ul>
						<!-- .tribe-events-sub-nav -->
					</div>
					<!-- #tribe-events-header -->
				
					<?php while ( have_posts() ) :  the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<!-- Event featured image, but exclude link -->
							<?php if (has_post_thumbnail()): ?>
							<div class="wp-caption">
								
								<?php echo tribe_event_featured_image( $event_id, 'bones-thumb-900', false ); ?>
								<p class="wp-caption-text">
									
									<?php $postthumb = get_post_thumbnail_id(); ?>
									<?php if( get_field('cc_title', $postthumb ) ): ?>
										<span>
											<?php if( get_field('cc_title_link', $postthumb) ): ?>
										<a href="<?php echo the_field('cc_title_link', $postthumb); ?>" target="_blank"><?php echo the_field('cc_title', $postthumb); ?></a>
											<?php else: ?>
												<?php echo the_field('cc_title', $postthumb); ?>
											<?php endif; ?>
										</span>
									<?php endif; ?>

									<?php if( get_field('cc_author', $postthumb ) ): ?>
										<span>
											<?php if( get_field('cc_author_link', $postthumb) ): ?>
										&nbsp;by <a href="<?php echo the_field('cc_author_link', $postthumb); ?>" target="_blank"><?php echo the_field('cc_author', $postthumb); ?></a>.
											<?php else: ?>
												&nbsp;by <?php echo the_field('cc_author', $postthumb); ?>.
											<?php endif; ?>
										</span>
									<?php endif; ?>

									<?php if( get_field('cc_license', $postthumb) ): ?>
										<?php if( null !== get_field('cc_license', $postthumb)): ?>
											<?php $cclicense = get_field_object('field_5583260d7493e',$postthumb); ?>
											<?php $ccvalue = get_field('cc_license',$postthumb); ?>
											<?php $cclabel = $cclicense['choices'][ $ccvalue ]; ?>
											<?php if ( $ccvalue == 'copyright'): ?>
												<span>&nbsp;<?php echo $cclabel; ?></span>
											<?php else: ?>
												<span>&nbsp;<a href="<?php echo $ccvalue; ?>" target="_blank"><?php echo $cclabel; ?></a></span>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									</p>
								</div>
							<?php endif; ?>
							<!-- Event content -->
							<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
							<div class="tribe-events-single-event-description tribe-events-content entry-content description">
								<?php the_content(); ?>
                                
                                <!-- EO Custom fields - 'Event Links' -->
                                <?php 
                                // EO link to workshop/session learning materials
                                $posts = get_field('activity_link');
								if( $posts ): ?>
										<div class="cf">
											<h3>Related Learning Materials</h3>
											<ul>
												<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
														<li><a class="" href="<?php echo get_permalink( $p ); ?>" target="_blank"><?php echo get_the_title( $p ); ?></a></li>
												<?php endforeach; ?>
											</ul>
										</div>
                                    <?php endif; ?>
                                <?php 
                                // EO 'Join Workshop' and RSVP links
								$livesession = get_field('synchronous_link');
                                    if( $livesession ): ?>
                                    <div class="cf" itemprop="workshopSynchronous">
                                        <?php 
                                            $eventDate = tribe_get_start_date( null, false, 'F j' );
                                            $todayDate = date('F j'); 
                                            if( $todayDate == $eventDate ): //only shows 'Join' on day of event
                                                //only for logged in users ?>
												<h3>Want to Join?</h3>
                                                <?php if ( is_user_logged_in() ): ?>
													<p>Click on Join Event to open the virtual classroom in a separate page. Please have a headset with a microphone ready if you want to speak during the workshop.</p>
													<p>To test your device ahead of time, <a href="https://www.wiziq.com/info/technical-requirement.aspx" target="_blank">click here</a>.</p>
													<div class="handouts">
														<p><a class="blue-btn join-synchronous" href="<?php esc_url(the_field('synchronous_link')); ?>" target="_blank">Join Event</a></p>
													</div>
												<?php else: ?>
													<p>Please login to join live sessions. If you are not yet registered with us, <a href="<?php echo home_url(); ?>/register" title="Register">find out how to register</a></p>
												<?php endif; ?>
											<?php else: ?>
											<h3>How to Join the Session</h3>
												<p>On the date of the event, a "Join" button will appear here. You will have to <strong>login</strong> to make it visible.</p>
												<p>To test your device ahead of time, <a href="https://www.wiziq.com/info/technical-requirement.aspx" target="_blank">click here</a>.</p>
                                            <?php endif; ?>
                                    </div>
                                <?php endif; ?>
								<?php $skypesession = get_field('skype_session');
								if ( is_array($skypesession) && in_array('yes', $skypesession)): ?>

										<h3>How to join the Skype sessions</h3>
										<ul>
											<li>Log in</li>
											<li>Scroll down and add the eFacilitator to your contacts on Skype</li>
											<li>Send a message to the eFacilitator to say you will attend a virtual coffee chat. Send a message each week to declare your availability.</li>
											<li>Test your computer well BEFORE the live meeting on Skype</li>
											<li>The eFacilitator will start a group Skype call</li>
										</ul>
									<?php endif; ?>
								<?php
										$facilitator = get_field('efacilitator');
										if( $facilitator ): ?>
										<div class="cf" itemprop="workshopContact">
											
											<?php echo '<h2>e-Facilitator</h2>'; ?>
											<?php if ( is_user_logged_in() ):
											foreach($facilitator as $facilitate) { ?>
												
												<div class="m-all t-all d-all">
													
													<div class="profile-avatar">
														<?php echo $facilitate['user_avatar']; ?>
													</div>
													
													<div class="profile-details">
														<?php echo '<strong>Name: </strong>' . esc_html($facilitate['user_firstname']) . ' ' . esc_html($facilitate['user_lastname']) . '<br><strong>Email:</strong> <a href="mailto:' . antispambot($facilitate['user_email']) . '">' . antispambot($facilitate['user_email']) . '</a>'; ?>
														<?php echo '<p>' . esc_html($facilitate['user_description']) . '</p>' ;?>
													</div>
													
												</div>
												
												
											<?php }
											endif; // end if is_user_logged_in
											
											if ( ! is_user_logged_in() ): ?>
												<p>Please <a href="<?php echo wp_login_url( get_permalink() ); ?>">login</a> to view e-facilitator contact information.</p>
											<?php endif; ?>
											
										</div><!-- end article-section .e-facilitator -->
										<?php endif; ?><!--  end if $facilitator  -->

                                <!-- end EO custom fields 'Event Links' -->

							</div>
                            
							<!-- .tribe-events-single-event-description -->
							<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
				
							<!-- Event meta -->
							<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
							<?php
							/**
							 * The tribe_events_single_event_meta() function has been deprecated and has been
							 * left in place only to help customers with existing meta factory customizations
							 * to transition: if you are one of those users, please review the new meta templates
							 * and make the switch!
							 */
							if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
								tribe_get_template_part( 'modules/meta' );
							} else {
								echo tribe_events_single_event_meta();
							}
							?>
							<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
						</div> <!-- #post-x -->
						<?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
					<?php endwhile; ?>
				
					<!-- Event footer -->
					<div id="tribe-events-footer">
						<!-- Navigation -->
						<!-- Navigation -->
						<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
						<ul class="tribe-events-sub-nav">
							<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
							<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
						</ul>
						<!-- .tribe-events-sub-nav -->
					</div>
					<!-- #tribe-events-footer -->
				
				</div><!-- #tribe-events-content -->
			</article><!-- end .hentry -->
		</main>
		<aside class="m-all t-1of3 d-1of4">
			<?php get_sidebar( 'events' ); ?>
		</aside>
	</div><!-- end #inner-content-->
</div><!-- end #content-->
