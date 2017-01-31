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
							<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				
							<!-- Event content -->
							<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
							<div class="tribe-events-single-event-description tribe-events-content entry-content description">
								<?php the_content(); ?>
                                
                                <!-- EO Custom fields - 'Event Links' -->
                                <?php 
                                // EO link to workshop/session learning materials
                                $posts = get_field('activity_link');

                                    if( $posts ): ?>
									<h3>Related Learning Materials</h3>
									<ul>
                                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                                                <li><a class="" href="<?php echo get_permalink( $p->ID ); ?>" target="_blank"><?php echo get_the_title( $p->ID ); ?></a></li>
                                        <?php endforeach; ?>
									</ul>
                                    <?php endif; ?>
                                <?php
								
								// RSVP form
function register_eo_event() {
	$regevent = get_the_ID();
	$user_id = get_current_user_id(); ?>
	<form action="" method="post" class="">
		<input type="hidden" id="regEvent" value="'. $regevent .'" name="regEvent">
		<input type="hidden" id="regUser" value="'. $user_id .'" name="regUser">
		<p><input type="submit" class="blue-btn rsvp" value="I will attend"</p>
	</form>
	<?php
		$regEventy = $_POST['regEvent'];
		$regUser = $_POST['regUser'];
		update_post_meta( $regEventy, '_registered_events', $regUser);
	$meta_values = get_post_meta( $regEventy, '_registered_events' );
	echo '<p>registered users:' . $meta_values . '</p>'; ?>
	<?php
}

                                // EO 'Join Workshop' and RSVP links
								$livesession = get_field('synchronous_link');
                                    if( $livesession ): ?>
                                    <section class="article-section cf" itemprop="workshopSynchronous">
                                        <?php 
                                            $eventDate = tribe_get_start_date( null, false, 'F j' );
                                            $todayDate = date('F j'); 
                                            if( $todayDate == $eventDate ): //only shows 'Join' on day of event
                                                //only for logged in users
                                                if ( is_user_logged_in() ): ?>
													<p>Click on Join Event to open the virtual classroom in a separate page. Please have a headset with a microphone ready if you want to speak during the workshop.</p>
													<p><a class="blue-btn join-synchronous" href="<?php esc_url(the_field('synchronous_link')); ?>" target="_blank">Join Event</a></p>
												<?php else: ?>
													<p>Please login to join live sessions. If you are not yet registered with us, <a href="<?php echo home_url(); ?>/register" title="Register">find out how to register</a></p>
												<?php endif;
											else:
											// if it is not the day of the event, show "Register" instead of "Join" ?>
											<?php
											echo '<h2>RSVP</h2>';
														if ( is_user_logged_in() ): ?>
															<?php
															echo 'hello'; ?>
																
															<p>Please help us prepare by indicating whether you plan to join us.</p>
															<?php register_eo_event(); ?>
															
														<?php else: ?>
															<p>Please login to RSVP for live sessions. If you are not yet registered with us, <a href="<?php echo home_url(); ?>/register" title="Register">find out how to register</a>.</p>
														<?php 
														endif; ?>
                                            <?php endif; ?>	
                                    </section>
                                <?php endif; ?>
								<?php $skypesession = get_field('skype_session');
								if(in_array('yes', $skypesession)): ?>
										<?php 
													$eventDate = tribe_get_start_date( null, false, 'F j' );
													$todayDate = date('F j');
													if( $todayDate != $eventDate ):
													//shows 'RSVP' up til day of event
														//only for logged in users
														echo '<h2>RSVP</h2>';
														if ( is_user_logged_in() ): ?>
															<?php $regevent = get_the_ID();
	$user_id = get_current_user_id(); ?>
	<form action="" method="post" class="">
		<input type="hidden" id="regEvent" value="'. $regevent .'" name="regEvent">
		<input type="hidden" id="regUser" value="'. $user_id .'" name="regUser">
		<p><input type="submit" class="blue-btn rsvp" value="I plan to attend"</p>
	</form>
	<?php
		$regEvent = $_POST['regEvent'];
		$regUser = $_POST['regUser'];
		update_post_meta( $regEvent, '_registered_events', $regUser);
		
		
		
		if(isset($_POST['attendeeId']) && is_numeric($_POST['attendeeId']) && ($_POST['attendeeId'] > 0)) {
				$wpdb->update(ATTENDEES_TABLE, 
											array("firstName" => trim($_POST['firstName']), 
											      "lastName" => trim($_POST['lastName']), 
                            "email" => trim($_POST['email']), 
											      "personalGreeting" => trim($_POST['personalGreeting']), 
														"rsvpStatus" => trim($_POST['rsvpStatus'])), 
											array("id" => $_POST['attendeeId']), 
											array("%s", "%s", "%s", "%s", "%s"), 
											array("%d"));
				rsvp_printQueryDebugInfo();
				$attendeeId = $_POST['attendeeId'];
				
				
		$attendeeId = $attendee->id;
					$firstName = stripslashes($attendee->firstName);
					$lastName = stripslashes($attendee->lastName);
          $email = stripslashes($attendee->email);
		  
		  
	$registrees = get_post_meta( $regEvent, '_registered_events' );
	echo '<p>registered users:' . $registrees . '</p>'; ?>
	<?php ?>
														<?php else: ?>
															<p>Please login to RSVP for live sessions. If you are not yet registered with us, <a href="<?php echo home_url(); ?>/register" title="Register">find out how to register</a>.</p>
														<?php 
														endif;
													endif; ?>
										<h3>How to join the Skype sessions</h3>
										<ul>
											<li>Scroll down and add the eFacilitator to your contacts on Skype</li>
											<li>Send a message to the eFacilitator to say you will attend a virtual coffee chat. Send a message each week to declare your availability.</li>
											<li>Test your computer well BEFORE the live meeting on Skype</li>
											<li>The eFacilitator will start a group Skype call</li>
										</ul>
									<?php endif; ?>
								<?php
										$facilitator = get_field('efacilitator');
										if( $facilitator ): ?>
										<section class="article-section e-facilitator cf" itemprop="workshopContact">
											
											<?php echo '<h2>e-Facilitator</h2>'; ?>
											<?php if ( is_user_logged_in() ):
											foreach($facilitator as $facilitate) { ?>
												
												<div class="m-all t-all d-1of2">
													
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
											
										</section><!-- end article-section .e-facilitator -->
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
