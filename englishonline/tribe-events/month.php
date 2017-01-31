<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>
<div id="content">

	<div id="inner-content" class="wrap cf">
		<main id="main" class="m-all t-2of3 d-3of4 last-col cf tribe-month-js" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <article class="hentry">
                <section class="entry-content">
            
                <?php do_action( 'tribe_events_before_template' ) ?>

                <!-- Tribe Bar -->
                <?php tribe_get_template_part( 'modules/bar' ); ?>
                <section class="upcoming">
                <!-- Main Events Content -->
                <?php tribe_get_template_part( 'month/content' ); ?>

                <?php do_action( 'tribe_events_after_template' ) ?>
                </section>
                </section>
            </article>
		</main>
		<aside id="sidebar6" class="sidebar m-all t-1of3 d-1of4 cf" role="complementary">
            <?php if ( is_active_sidebar( 'sidebar6' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar6' ); ?>
            <?php endif; ?>
        </aside>
	</div>
</div>
