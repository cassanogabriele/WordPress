<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-artists.php
 * =========================================================================================================================================
 *
 * The template part that displays the "Artists" part of the page.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Replaced wp_trim_words() with the_excerpt().
 *  - Added conditional checks for headings and taglines.
 *
 */
 
global $smof_data;
$roadrunners_artists_heading_before = empty( $smof_data['roadrunners_artists_heading_before'] ) ? '' : $smof_data['roadrunners_artists_heading_before'];
$roadrunners_artists_heading        = empty( $smof_data['roadrunners_artists_heading'] ) 		? '' : $smof_data['roadrunners_artists_heading'];
$roadrunners_artists_heading_after  = empty( $smof_data['roadrunners_artists_heading_after'] ) 	? '' : $smof_data['roadrunners_artists_heading_after'];
$roadrunners_artists_tagline        = empty( $smof_data['roadrunners_artists_tagline'] ) 		? '' : $smof_data['roadrunners_artists_tagline'];
$roadrunners_artists_posts          = empty( $smof_data['roadrunners_artists_posts'] ) 			? '' : $smof_data['roadrunners_artists_posts'];
$roadrunners_artists_url            = empty( $smof_data['roadrunners_artists_url'] ) 			? '' : $smof_data['roadrunners_artists_url'];
$roadrunners_label_formed_in        = empty( $smof_data['roadrunners_label_formed_in'] )		? '' : $smof_data['roadrunners_label_formed_in'];
$roadrunners_label_albums           = empty( $smof_data['roadrunners_label_albums'] )			? '' : $smof_data['roadrunners_label_albums'];
$roadrunners_label_view_artist      = empty( $smof_data['roadrunners_label_view_artist'] )      ? '' : $smof_data['roadrunners_label_view_artist'];
$roadrunners_label_view_all_artists = empty( $smof_data['roadrunners_label_view_all_artists'] )	? '' : $smof_data['roadrunners_label_view_all_artists'];
$roadrunners_artists_links          = isset( $smof_data['roadrunners_artists_links'] )          ? $smof_data['roadrunners_artists_links'] : 0;

?>
<!-- START Artists Section -->
<section id="artists">

	<?php if( $roadrunners_artists_heading_before || $roadrunners_artists_heading || $roadrunners_artists_heading_after || $roadrunners_artists_tagline ) : ?>
	
		<div class="grid-container">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_artists_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_artists_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_artists_heading_after ); ?></span>
					</h1>
				</div>
				<?php if( $roadrunners_artists_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_artists_tagline ); ?></h2>
					</div>
				
				<?php endif; // End check for tagline. ?>
			</div>
		</div>
	
	<?php endif; ?>
	
	<?php
	$artists = new WP_Query( 'post_type=rr_artists&posts_per_page=' . esc_attr( intval( $roadrunners_artists_posts ) ) );
	$odd     = 0;
	
	if( $artists->have_posts() ) : ?>
	
		<?php while( $artists->have_posts() ) : $artists->the_post(); ?>
		
		<?php
		
			// Odd class for styling.
			if( $odd == 1 || $odd == 3 || $odd == 5 ) {
			
				$odd_class = ' artist-odd';	
				$data_attr = 'data-scroll-reveal="enter left move 200px over 1s"';
				
			} else {
			
				$odd_class = '';
				$data_attr = 'data-scroll-reveal="enter right move 200px over 1s"';
				
			}
			$odd ++; 
			
			$rr_artist_formed = get_post_meta( $post->ID, '_rr_artist_formed', true );
			$rr_artist_albums = get_post_meta( $post->ID, '_rr_artist_albums', true );
	
		?>
		
		<!-- START Artist Info -->
		<div class="artist-section-wrap<?php echo esc_attr( $odd_class ); ?>">
			<div <?php echo wp_kses_data( $data_attr ); ?> class="grid-container">
		
				<?php if( has_post_thumbnail() ) : ?>
				
					<!-- START Featured Image -->
					<div class="grid-40 suffix-5 tablet-grid-40 mobile-grid-100">
						<div class="featured-image">
							<?php if( $roadrunners_artists_links ) : ?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail-container">
							<?php else : ?>
								<div class="post-thumbnail-container">
							<?php endif; ?>
								<?php the_post_thumbnail(); ?>
								<?php if( $roadrunners_artists_links ) : ?>
									<i class="fa fa-link"></i>
								<?php endif; ?>
							<?php if( $roadrunners_artists_links ) : ?>
								</a>
							<?php else : ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<!-- END Featured Image -->
				
					<div class="grid-55 tablet-grid-60 mobile-grid-100">
					
				<?php else : ?>
				
					<div class="grid-100 tablet-grid-100 mobile-grid-100">
				
				<?php endif; ?>
				
					<header class="artist-home-meta">
						
						<div class="grid-60 tablet-grid-60 mobile-grid-100 first-on-desktop first-on-tablet first-on-mobile last-on-mobile">
							<h3><?php the_title(); ?></h3>
							<?php if( $roadrunners_label_formed_in ) : ?>
								<h4><?php echo esc_html( $roadrunners_label_formed_in ) . ' ' . esc_html( $rr_artist_formed ); ?></h4>
							<?php endif; ?>
						</div>				
						
						<br class="clear" />
					</header>
					
					<div class="artist-excerpt">
						<h5><span>Biographie</span></h5>

						Gabriele Cassano est à la base guitariste Metal, chanteur-guitariste du groupe Katassamalass, au départ nommé « Undertakers », avec un premier groupe qui précède Katassamalass, Lilith. 
						Gabriele quitte le groupe en 2000 et prend une période de repos. Ensuite, en 2012, il reprend les activités musicales en décidant de créer un projet solo qui devait s’appeler à la base « La face secrète de l’humanité ». 
						Ayant bien réfléchit, il se dit qu’il est préférable que ce projet puisse atteindre toutes les nationalités et rebaptise le projet « Secret Faces », il enregistre alors son premier album « The end of violence », il manque juste le chant. 
						Il rencontre alors Pat Lennon qui commence à structurer ses textes et les enregistre, ensuite ils décident, sous l’idée de Pat, de former le groupe. Malheureusement la chanteuse convient pour l’album mais pas pour jouer en groupe. En parallèle, 
						Gabriele continue en solo le projet Katassamalass et il intègre le groupe ToXScik Fire en tant que bassiste et choriste. Il monte également le projet black metal Invoking Demons. En début 2017, ToXScick Fire splitte, engendrant aussi la fin du groupe Secret Faces, 
						Gabriele reprend alors le projet en tant que projet solo, uniquement studio. iL rejoint le groupe de trash/death old school Devonian en tant que bassiste. Il monte un groupe de black metal, Naked Evil, aux influences heavy metal et trash metal, avec le batteur de Devonian 
						et des amis à lui, il est guitariste-chanteur. En 2020, Gabriele intègre le groupe Spectral Damnation en tant que bassiste, il s'occupera ensuite, après la sortie de l'album en 2022, du "backing-vocals". En 2021, Gabriele quitte le groupe Devonian et en 2023, le projet 
						du groupe Naked Evil, avec la collaboration de nouveau musiciens, après le départ des autres musiciens, prend fin. Gabriele enregistre ses compos concernant ce projet sur un troisième album pour le projet solo, Invoking Demons. Il compose et enregistre en même temps, 
						un quatrième album pour le projet solo, Katassamalass. Il rejoint une formation en construction, avec Théo et Laurent Boeckmans, et ils forment le groupe Pray For Death, avec pour objectif la sortie d'une démo en début 2024.
					</div>
					
					<div class="artist-excerpt">
						<h5><span>Discographie</span></h5>
						
						<ul>
							<li>Katassamalass
								<ul>
									<li>Extreme Brutality - band demo (1999)</li>
									<li>Split with Svartkrist : Mutilated Penis (2000)</li>
									<li>Extreme Brutality (2018)</li> 
									<li>Bloodbath Revenge (2019)</li>
									<li>Torture And Dissection Of A Pedophile (2022)</li>
									<li>Violently Boneless (2023)</li> 
									<li>Compulsive Carnage (2024)</li> 
								</ul>
							<li>Invoking Demons
								<ul>
									<li>Hurlements Of Diabolical Chaos (2017)</li>
									<li>Perverse Manipulative Possessions (2022)</li>
									<li>Darkness Carnage Deliverance (2023)</li> 
									<li>Diabolical falsity (2024)</li> 
								</ul>
							</li>							
							<li>Secret Faces
								<ul>
									<li>The End Of Violence (2019)</li>
									<li>Human Conditions (2020)</li>
									<li>Prisonner in hell (2023)</li>
								</ul>
							</li>
							<li>Toxsick Fire : FlameThrower (EP)</li>		
							<li>Spectral Damnation : Extra Æcclesiam (2023)</li>								
						</ul>
					</div>
					
					<?php if( $roadrunners_artists_links ) : ?>
					
						<footer>
							<a href="<?php the_permalink(); ?>" class="button-large"><?php echo esc_html( $roadrunners_label_view_artist ); ?><i class="fa fa-angle-double-right"></i></a>
						</footer>
						
					<?php endif; ?>
				
				</div>
		
			</div>
		</div>
		<!-- END Artist Info -->
			
		<?php endwhile; ?>
	<?php else : ?>
	
		<?php
		
			if( is_user_logged_in() && current_user_can( 'edit_pages' ) ) {
			
				wp_kses_data( _e( 'There are no artists added yet. Make sure you have the RoadRunners Events &amp; Artists plugin activated and that there are artists added to the database.' , 'roadrunners' ) );
				
			}
		
		?>
	
	<?php endif; // End if have_posts() ?>
	<?php wp_reset_postdata(); ?>
	
	<?php if( $roadrunners_artists_url && $roadrunners_artists_links ) : ?>
	
		<div class="grid-container">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
			
				<a data-scroll-reveal="enter bottom move 40px over 1s" href="<?php echo esc_url( $roadrunners_artists_url ); ?>" class="button-large"><?php echo esc_html( $roadrunners_label_view_all_artists ); ?><i class="fa fa-angle-double-right"></i></a>
			
			</div>
		</div>
	
	<?php endif; ?>
	
</section>
<!-- END Artists Section -->