<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-events.php
 * =========================================================================================================================================
 *
 * The template part that displays the "Events" part of the page.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Added option to enable/disable links to singular pages.
 *  - Added conditional checks for headings and taglines.
 *
 */
 
global $smof_data;
$roadrunners_events_heading_before = empty( $smof_data['roadrunners_events_heading_before'] ) ? '' : $smof_data['roadrunners_events_heading_before'];
$roadrunners_events_heading        = empty( $smof_data['roadrunners_events_heading'] )        ? '' : $smof_data['roadrunners_events_heading'];
$roadrunners_events_heading_after  = empty( $smof_data['roadrunners_events_heading_after'] )  ? '' : $smof_data['roadrunners_events_heading_after'];
$roadrunners_events_tagline        = empty( $smof_data['roadrunners_events_tagline'] )        ? '' : $smof_data['roadrunners_events_tagline'];
$roadrunners_events_url            = empty( $smof_data['roadrunners_events_url'] )            ? '' : $smof_data['roadrunners_events_url'];
$roadrunners_label_view_all_events = empty( $smof_data['roadrunners_label_view_all_events'] ) ? '' : $smof_data['roadrunners_label_view_all_events'];
$roadrunners_events_links          = isset( $smof_data['roadrunners_events_links'] )          ? $smof_data['roadrunners_events_links'] : 0;

?>
<!-- START Events Section -->
<section id="events" class="parallax">
	<div class="grid-container">
	
		<?php if( $roadrunners_events_heading_before || $roadrunners_events_heading || $roadrunners_events_heading_after || $roadrunners_events_tagline ) : ?>
	
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_events_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_events_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_events_heading_after ); ?></span>
					</h1>
				</div>
				<?php if( $roadrunners_events_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_events_tagline ); ?></h2>
					</div>
				
				<?php endif; // End check for tagline. ?>
			</div>
			
		<?php endif; ?>
			
		<?php
		
			$query_args = array(
			
				'post_type'			=> 'rr_events',
				'posts_per_page'	=> 6,
				'meta_query'		=> array(
				
					array( 'key' 		=> '_rr_event_date' )
				
				),
				'orderby'			=> 'meta_value_num',
				'meta_key'			=> '_rr_event_date',
				'order'				=> 'ASC',
			
			);
			
			$events     = new WP_Query( $query_args );
			$count      = 0;
			$last_class = '';
			$num_posts  = wp_count_posts( 'rr_events' );
		
		?>
		
		<?php if( $events->have_posts() ) : ?>
			
			<?php while( $events->have_posts() ) : $events->the_post(); $count ++; ?>
			
				<?php

					if( $count == $num_posts->publish ) {
					
						$last_class = ' last-event';
					
					}

				?>
				
				<?php if( $num_posts->publish > 4 ) :  ?>
					<?php if( $count == 1 ) : ?>
						<div data-scroll-reveal="enter left move 80px over 1s" class="grid-45 suffix-10 tablet-grid-100 mobile-grid-100">
					<?php endif; ?>
					<?php if( $count == 5 ) : ?>
						<div data-scroll-reveal="enter right move 80px over 1s" class="grid-45 tablet-grid-100 mobile-grid-100">
					<?php endif; ?>
				<?php else : ?>
					<div data-scroll-reveal="enter bottom move 80px over 1s" class="prefix-20 grid-60 suffix-20 tablet-grid-100 mobile-grid-100">
				<?php endif; ?>
		
				<?php
				
					if ( get_post_meta ( $post->ID, '_rr_event_date', true ) ) {
					
						$unix_date     = get_post_meta ( $post->ID, '_rr_event_date', true );
						$rr_event_date = date( get_option( 'date_format' ), get_post_meta( $post->ID, '_rr_event_date', true ) );
						
					}
					
					$rr_event_venue = get_post_meta( $post->ID, '_rr_event_venue', true );
				
				?>
		
				<!-- START Event Block -->
				<?php if( $roadrunners_events_links ) : ?>
					<a href="<?php the_permalink(); ?>" class="home-event<?php echo esc_attr( $last_class ); ?>">
				<?php else : ?>
					<div class="home-event<?php echo esc_attr( $last_class ); ?>">
				<?php endif; ?>
					<div class="home-event-date">
						<time datetime="<?php echo date_i18n( 'c', $unix_date ); ?>"><?php echo esc_html( $rr_event_date ); ?></time>
					</div>
					<?php if( has_post_thumbnail() ) : ?>
					
						<div class="home-event-thumbnail">
							<?php the_post_thumbnail( 'events-thumbnail' ); ?>
						</div>
					
					<?php endif; ?>
					<div class="home-event-details">
						<h3><?php the_title(); ?></h3>
						<p><?php echo esc_html( $rr_event_venue ); ?></p>
					</div>
					<br class="clear" />
				<?php if( $roadrunners_events_links ) : ?>
					</a>
				<?php else : ?>
					</div>
				<?php endif; ?>
				<!-- END Event Block -->
		
				<?php
				
					if( $num_posts->publish > 4 ) :
						if( $count == 4 ) :
					
							?></div><?php
						
						endif;
					else :
				
						?></div><?php
					
					endif;
		
			endwhile; // have_posts() ?>
			
			<?php if( $num_posts->publish < 5 ) :  ?>
			
				<div data-scroll-reveal="enter bottom move 80px over 1s" class="prefix-20 grid-60 suffix-20 tablet-grid-100 mobile-grid-100">
				
			<?php endif; ?>
			<?php if( $roadrunners_events_url && $roadrunners_events_links ) : ?>
			
				<a href="<?php echo esc_url( $roadrunners_events_url ); ?>" class="button-large"><?php echo esc_html( $roadrunners_label_view_all_events ); ?><i class="fa fa-angle-double-right"></i></a>
				
			<?php endif; ?>
		</div>
			
		<?php else : ?>
			
			<?php if( is_user_logged_in() && current_user_can( 'edit_pages' ) ) : ?>
			
				<div class="grid-45 suffix-10 tablet-grid-100 mobile-grid-100">
					<p><?php /*esc_html_e( 'There were no posts found in "Events".', 'roadrunners' );*/ ?></p>
				</div>
				
			<?php endif; ?>
		
		<?php endif; ?>
	</div>
</section>
<!-- END Events Section -->