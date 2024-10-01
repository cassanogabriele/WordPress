<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			footer.php
 * =========================================================================================================================================
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
global $smof_data;
$footer_text = empty( $smof_data['roadrunners_bottom_text'] ) ? '' : $smof_data['roadrunners_bottom_text'];

?>

<!-- START Page Footer -->
<footer id="page-footer">
	<div class="image-overlay">
		<div class="noise-overlay">
			<div class="grid-container">
			
				<?php
				
					get_sidebar( 'footer-first' );
					get_sidebar( 'footer-second' );
					get_sidebar( 'footer-third' );
				
				?>
			
			</div>
		</div>
	</div>
</footer>
<!-- END Page Footer -->

<!-- START Bottom Footer -->
<section id="bottom-footer">
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		
			<p>
			Tous droits réservés <a href='http://gabriel-cassano.be/"'>Gabriele Cassano</a>
			<br/>
			Photos, logo : Jason Sacchettino
			<br/>
			Photos avec effets : Lydia Campisi
			<br/>
			<a href="https://hardrock80fr.wordpress.com/2020/02/05/42124/">Interview</a>
			</p>
		
		</div>
	</div>
</section>
<!-- END Bottom Footer -->

<?php if( $smof_data['roadrunners_btt'] ) : ?>	

	<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
	
	
<?php endif; ?>


<?php wp_footer(); ?>

<p style="float:right !important;">
<?php echo do_shortcode('[gtranslate]'); ?> 
</p>

<audio style="float:left !important;
			  width: 50px;height: 42px;
			  padding-top: 8px;position: fixed;
			  bottom: 0;left: 20px;;margin-bottom:15px;"  controls="controls" >
<source src="05.the-musical-way-of-healing.mp3" type="audio/mp3" />
Votre navigateur n'est pas compatible
</audio>

</body>
</html>