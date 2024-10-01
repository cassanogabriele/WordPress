<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			archive-rr_events.php
 * =========================================================================================================================================
 *
 * Archive page for displaying events.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

get_header(); ?>
<div id="main" class="grid-container" role="main">
	<div class="event-archive">
	
	<?php
	
		$query_args = array(
			
			'post_type'      => 'rr_events',
			'posts_per_page' => -1,
			'meta_query'     => array(
			
				array( 'key' => '_rr_event_date' )
			
			),
			'orderby'        => 'meta_value_num',
			'meta_key'       => '_rr_event_date',
			'order'          => 'ASC',
		
		);
			
		$events = new WP_Query( $query_args );
	
	?>
	
	<?php if ( $events->have_posts() ) : ?>
		<?php while ( $events->have_posts() ) : $events->the_post(); ?>
		
			<div class="grid-33 tablet-grid-100 mobile-grid-100">
			
				<?php
				
					global $post;
					if ( get_post_meta ( $post->ID, '_rr_event_date', true ) ) {
					
						$rr_event_date = date( get_option( 'date_format' ), get_post_meta( $post->ID, '_rr_event_date', true ) );
						
					}
					
					$rr_event_venue	  = get_post_meta( $post->ID, '_rr_event_venue', true );
					$rr_event_tickets = get_post_meta( $post->ID, '_rr_event_tickets', true );
				
				?>
				
				<?php if( has_post_thumbnail() ) : ?>
				<div class="event-featured-image">
					<?php roadrunners_post_thumbnail( 'full' ); ?>
					<h3><?php the_title(); ?></h3>
				</div>
				<?php endif; ?>
				
				<a class="event-meta-wrap" href="<?php the_permalink(); ?>">
					<div class="rr-meta-box rr-event-date">
						<?php if( $rr_event_date ) : ?>
							<h4><?php echo esc_html( $rr_event_date ); ?></h4>
						<?php else : ?>
							<h4><?php esc_html_e( 'To Be Announced', 'roadrunners' ); ?></h4>
						<?php endif; ?>
					</div>
					
					<div class="rr-meta-box rr-event-venue">
						<?php if( $rr_event_venue ) : ?>
							<h4><?php echo esc_html( $rr_event_venue ); ?></h4>
						<?php else : ?>
							<h4><?php esc_html_e( 'To Be Announced', 'roadrunners' ); ?></h4>
						<?php endif; ?>
					</div>

					<div class="rr-meta-box rr-event-tickets">
						<h4><?php echo esc_html( $rr_event_tickets ); ?></h4>
					</div>
				</a>
			
			</div>
			
		<?php endwhile; ?>
		
		<br class="clear" />
		
	<?php else : ?>
	
		<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; ?>
	
	</div>
</div>
<?php get_footer(); ?>