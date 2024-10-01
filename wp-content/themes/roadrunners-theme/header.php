<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			header.php
 * =========================================================================================================================================
 *
 * @package roadrunners
 *
 * V1.2.0
 *
 *  - Moved background styling for #inner-page-header to template-tags.php
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Removed <title>. WordPress will handle this.
 *
 */
?><!DOCTYPE html>
<style>
.grecaptcha-badge {
  opacity:0!important;
}
</style>

<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="XpTO4zQ9A61NoaaWN98QdMPeMBz_czLrltOtbsOREqY" />
	<!-- Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Cassano Gabriele" />
	<meta name="description" content="Secret Faces est un projet en home studio de Rock Fusion. Le projet devra ensuite évoluer vers un groupe de musiciens, grâce à l'arrivée de la chanteuse Pat Lennon, qui se charge de recruter les musiciens qui feront partie du projet. Une partie de ces musiciens participent déjà à la finalisation de l'album. Il reste à terminer la structure et l'enregistrement du chant sur la plupart des chansons, ensuite s'effectuera le remix final du premier album 'The End Of Violence'" />
	<meta name="robots" content="index, follow, all" />
	<meta name="keywords" content="secret faces, rock fusion, rock, hard rock" />
	<!-- Links -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
		<script src="<?php get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
</head>

<body id="top" <?php body_class(); ?>>
<?php

global $smof_data;

$camera_flashes 					= empty( $smof_data['roadrunners_home_flashes'] ) 			? '' : $smof_data['roadrunners_home_flashes'];
$roadrunners_inner_page_background 	= empty( $smof_data['roadrunners_inner_page_background'] ) 	? '' : $smof_data['roadrunners_inner_page_background'];

/**
 * Only show the camera flashes on the home page template.
 */
if( $camera_flashes && is_page_template( 'page-templates/template-home.php' ) ) : ?>

	<div id="camera-flashes">
		<div class="flash flash-01"></div>
		<div class="flash flash-02"></div>
		<div class="flash flash-03"></div>
		<div class="flash flash-04"></div>
		<div class="flash flash-05"></div>
	</div>

<?php endif; ?>

<?php 
/*
 *  Use a different navbar for the homepage.
 */
if( is_page_template( 'page-templates/template-home.php' ) ) : ?>

	<!-- START Home Page Header -->
	<header id="home-page-header">
		<?php 
		
			get_template_part( 'navbar-home' ); 
			
			$roadrunners_home_logo 			= empty( $smof_data['roadrunners_home_logo'] ) 			? '' : $smof_data['roadrunners_home_logo'];
			$roadrunners_home_logo_height 	= empty( $smof_data['roadrunners_home_logo_height'] ) 	? '' : $smof_data['roadrunners_home_logo_height'];
			$roadrunners_home_logo_alt_text	= empty( $smof_data['roadrunners_home_logo_alt_text'] ) ? '' : $smof_data['roadrunners_home_logo_alt_text'];
			$roadrunners_tagline_01			= empty( $smof_data['roadrunners_tagline_01'] ) 		? '' : $smof_data['roadrunners_tagline_01'];
			$roadrunners_tagline_02			= empty( $smof_data['roadrunners_tagline_02'] ) 		? '' : $smof_data['roadrunners_tagline_02'];
			$roadrunners_tagline_03			= empty( $smof_data['roadrunners_tagline_03'] ) 		? '' : $smof_data['roadrunners_tagline_03'];
			$roadrunners_tagline_04			= empty( $smof_data['roadrunners_tagline_04'] ) 		? '' : $smof_data['roadrunners_tagline_04'];
			$roadrunners_tagline_05			= empty( $smof_data['roadrunners_tagline_05'] ) 		? '' : $smof_data['roadrunners_tagline_05'];
			$roadrunners_tagline_06			= empty( $smof_data['roadrunners_tagline_06'] ) 		? '' : $smof_data['roadrunners_tagline_06'];
			
		?>
		
		<!-- START Home Page Logo -->
		<div id="home-logo" style="margin-top:-80px;margin-left:10px;">
			<?php if( $roadrunners_home_logo ) : ?>
				<img src="<?php echo esc_url( $roadrunners_home_logo ); ?>" <?php if( $roadrunners_home_logo_height ) : ?>height="<?php echo $roadrunners_home_logo_height; ?>"<?php endif; ?>alt="<?php echo esc_attr( $roadrunners_home_logo_alt_text ); ?>" />
			<?php else : ?>
				<h1 class="home-site-title"><?php esc_html( bloginfo( 'name' ) ); ?></h1>
			<?php endif; // End check for a logo. ?>
		</div>
		<!-- END Home Page Logo -->
		
		<!-- START Textillate -->
		<div id="textillate">
			<div class="tlt">
				<ul class="texts">
					
					<?php if( $roadrunners_tagline_01 ) : ?><li><?php echo esc_html( $roadrunners_tagline_01 ); ?></li><?php endif; ?>
					<?php if( $roadrunners_tagline_02 ) : ?><li><?php echo esc_html( $roadrunners_tagline_02 ); ?></li><?php endif; ?>
					<?php if( $roadrunners_tagline_03 ) : ?><li><?php echo esc_html( $roadrunners_tagline_03 ); ?></li><?php endif; ?>
					<?php if( $roadrunners_tagline_04 ) : ?><li><?php echo esc_html( $roadrunners_tagline_04 ); ?></li><?php endif; ?>
					<?php if( $roadrunners_tagline_05 ) : ?><li><?php echo esc_html( $roadrunners_tagline_05 ); ?></li><?php endif; ?>
					<?php if( $roadrunners_tagline_06 ) : ?><li><?php echo esc_html( $roadrunners_tagline_06 ); ?></li><?php endif; ?>
					
				</ul>
			</div>
		</div>
		<!-- END Textillate -->
		
		<a href="#" class="main_link go-down scroll"><i class="fa fa-angle-down"></i></a>
	</header>
	<!-- END Home Page Header -->

<?php else : ?>

	<!-- START Inner Page Header -->
	<header id="inner-page-header">
	<?php

		get_template_part( 'navbar' );
		get_template_part( 'subpage-intro' );
			
	?>
	</header>
	<!-- END Inner Page Header -->	
</div>

<?php endif; // End if is_page_template() ?>