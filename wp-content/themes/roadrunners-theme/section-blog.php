<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-blog.php
 * =========================================================================================================================================
 *
 * The template part that displays the "Blog Listings" part of the page.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Replaced wp_trim_words() with the_excerpt().
 *  - Markup and CSS tweaks.
 *  - Added conditional checks for headings and taglines.
 *
 */
 
global $smof_data;

$roadrunners_blog_heading_before 	= empty( $smof_data['roadrunners_blog_heading_before'] ) 	? '' : $smof_data['roadrunners_blog_heading_before'];
$roadrunners_blog_heading 			= empty( $smof_data['roadrunners_blog_heading'] ) 			? '' : $smof_data['roadrunners_blog_heading'];
$roadrunners_blog_heading_after 	= empty( $smof_data['roadrunners_blog_heading_after'] ) 	? '' : $smof_data['roadrunners_blog_heading_after'];
$roadrunners_blog_tagline 			= empty( $smof_data['roadrunners_blog_tagline'] ) 			? '' : $smof_data['roadrunners_blog_tagline'];
$roadrunners_blog_posts 			= empty( $smof_data['roadrunners_blog_posts'] ) 			? '' : $smof_data['roadrunners_blog_posts'];
$roadrunners_blog_url		 		= empty( $smof_data['roadrunners_blog_url'] ) 				? '' : $smof_data['roadrunners_blog_url'];

?>
<!-- START Blog Section -->
<section id="blog" class="parallax" style="background-image: url('http://www.secretfaces.be/wp-content/uploads/2023/03/angels.jpg') !important;">
	<div class="grid-container">
	
		<?php if( $roadrunners_blog_heading_before || $roadrunners_blog_heading || $roadrunners_blog_heading_after || $roadrunners_blog_tagline ) : ?>
			
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_blog_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_blog_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_blog_heading_after ); ?></span>
					</h1>
				</div>
				<?php if( $roadrunners_blog_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_blog_tagline ); ?></h2>
					</div>
					
				<?php endif; // End check for tagline. ?>
			</div>
			
		<?php endif; ?>
			
		<?php $rr_posts = new WP_Query( 'post_type=post&posts_per_page=' . esc_attr( intval( $roadrunners_blog_posts ) ) ); ?>
		
		<?php if( $rr_posts->have_posts() ) : ?>
		
			<?php while( $rr_posts->have_posts() ) : $rr_posts->the_post(); ?>
			
				<!-- START Blog Post -->
				<?php $ran_num = mt_rand( 1, 9 ); ?>
				<div data-scroll-reveal="wait 0.<?php echo esc_attr( intval( $ran_num ) ); ?>s enter bottom move 0px over 1s" class="grid-33 tablet-grid-50 mobile-grid-100">
					<a href="<?php the_permalink(); ?>" class="home-blog">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<header>
								<h2><?php the_title(); ?></h2>
							</header>
							<div class="home-blog-meta">
								<h6 class="home-blog-author"><i class="fa fa-user"></i><?php the_author(); ?></h6>
								<h6 class="home-blog-date"><i class="fa fa-clock-o"></i><time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php esc_html( the_time( get_option( 'date_format' ) ) ); ?></time></h6>
								<br class="clear" />
							</div>
							<footer>
								<?php the_excerpt(); ?>
								<h6 class="home-blog-view-post"><i class="fa fa-angle-double-right"></i><?php esc_html_e( "Cliquer pour l'article", 'roadrunners' ); ?><i class="fa fa-angle-double-left"></i></h6>
								<?php 
								
									if( has_post_thumbnail() ) :
									
										the_post_thumbnail( 'post-home' );
										
									endif;
									
								?>
							</footer>
						
						</article>
					</a>
				</div>
				<!-- END Blog Post -->
		
			<?php endwhile; ?>
			
		<?php else : ?>
		
			<?php if( is_user_logged_in() && current_user_can( 'edit_pages' ) ) : ?>
			
				<div class="grid-45 suffix-10 tablet-grid-100 mobile-grid-100">
					<p><?php esc_html_e( 'There were no posts found.', 'roadrunners' ); ?></p>
				</div>
				
			<?php endif; ?>
			
		<?php endif; ?>	
	</div>
</section>
<!-- END Blog Section -->