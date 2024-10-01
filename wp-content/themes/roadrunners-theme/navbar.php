<?php

/**

 * Theme Name: 		Roadrunners - A One-Page Music Theme

 * Theme Author: 	Dan Richardson - Subatomic Themes

 * Theme URI: 		http://themeforest.net

 * Author URI: 		http://themeforest.net/user/SubatomicThemes

 * File:			navbar-home.php

 * =========================================================================================================================================

 *

 * Navigation Bar for use on the home page templates. This one will have social icons and 

 * the main site navigation on the right.

 *

 * @package roadrunners

 *

 * V1.2.0

 *

 *  - Changed the way menu items are outputted. Now takes values from the new

 *    Homepage layout sorter.

 *

 * V1.1.0

 *

 *  - Improved sanitization output.

 *

 */

 

?>

<!-- START Top Area -->


<div id="header-top" class="header-home" style="height:100px;">

	<div class="grid-container">

		<?php

		

			global $smof_data;

			

			$icons_target = empty( $smof_data['roadrunners_icons_target'] ) ? ''  : $smof_data['roadrunners_icons_target'];

			$icon_01_icon = empty( $smof_data['roadrunners_icon_01_icon'] ) ? ''  : $smof_data['roadrunners_icon_01_icon'];

			$icon_01_url  = empty( $smof_data['roadrunners_icon_01_url']  ) ? '#' : $smof_data['roadrunners_icon_01_url'];

			$icon_02_icon = empty( $smof_data['roadrunners_icon_02_icon'] ) ? ''  : $smof_data['roadrunners_icon_02_icon'];

			$icon_02_url  = empty( $smof_data['roadrunners_icon_02_url']  ) ? '#' : $smof_data['roadrunners_icon_02_url'];

			$icon_03_icon = empty( $smof_data['roadrunners_icon_03_icon'] ) ? ''  : $smof_data['roadrunners_icon_03_icon'];

			$icon_03_url  = empty( $smof_data['roadrunners_icon_03_url']  ) ? '#' : $smof_data['roadrunners_icon_03_url'];

			$icon_04_icon = empty( $smof_data['roadrunners_icon_04_icon'] ) ? ''  : $smof_data['roadrunners_icon_04_icon'];

			$icon_04_url  = empty( $smof_data['roadrunners_icon_04_url']  ) ? '#' : $smof_data['roadrunners_icon_04_url'];

			$icon_05_icon = empty( $smof_data['roadrunners_icon_05_icon'] ) ? ''  : $smof_data['roadrunners_icon_05_icon'];

			$icon_05_url  = empty( $smof_data['roadrunners_icon_05_url']  ) ? '#' : $smof_data['roadrunners_icon_05_url'];

			$icon_06_icon = empty( $smof_data['roadrunners_icon_06_icon'] ) ? ''  : $smof_data['roadrunners_icon_06_icon'];

			$icon_06_url  = empty( $smof_data['roadrunners_icon_06_url']  ) ? '#' : $smof_data['roadrunners_icon_06_url'];

			$icon_07_icon = empty( $smof_data['roadrunners_icon_07_icon'] ) ? ''  : $smof_data['roadrunners_icon_07_icon'];

			$icon_07_url  = empty( $smof_data['roadrunners_icon_07_url']  ) ? '#' : $smof_data['roadrunners_icon_07_url'];

			$icon_08_icon = empty( $smof_data['roadrunners_icon_08_icon'] ) ? ''  : $smof_data['roadrunners_icon_08_icon'];

			$icon_08_url  = empty( $smof_data['roadrunners_icon_08_url']  ) ? '#' : $smof_data['roadrunners_icon_08_url'];

			

			$target = '_self';

			if( $icons_target ) {

			

				$target = '_blank';

			

			}

			

		?>

	

		<!-- START Social Icons -->

		
		<div class="grid-30 tablet-grid-100 mobile-grid-100">

			<ul id="social-icons">

			

				<?php if( ! empty( $icon_01_icon ) ) : ?>

					<li><a href="<?php echo esc_url( $icon_01_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_01_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_02_icon ) ) : ?>

					<li><a href="<?php echo esc_url( $icon_02_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_02_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_03_icon ) ) : ?>

					<li><a href="<?php echo esc_url( $icon_03_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_03_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_04_icon ) ) : ?>

					<li class="hide-on-mobile"><a href="<?php echo esc_url( $icon_04_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_04_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_05_icon ) ) : ?>

					<li class="hide-on-mobile"><a href="<?php echo esc_url( $icon_05_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_05_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_06_icon ) ) : ?>

					<li class="hide-on-mobile"><a href="<?php echo esc_url( $icon_06_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_06_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_07_icon ) ) : ?>

					<li class="hide-on-mobile"><a href="<?php echo esc_url( $icon_07_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_07_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

				<?php if( ! empty( $icon_08_icon ) ) : ?>

					<li class="hide-on-mobile"><a href="<?php echo esc_url( $icon_08_url ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="fa fa-<?php echo strtolower( esc_attr( $icon_08_icon ) ); ?>"></i></a></li>

				<?php endif; ?>

					
			</ul>

			<a id="mobile-menu" href="#"><i class="fa fa-bars"></i></a>

		</div>

		<!-- END Social Icons -->

	

		<!-- START Main Navigation -->

		<div class="grid-70 tablet-grid-100 mobile-grid-100" style="margin-left:-250px;width:1070px;">

			<nav id="main-navigation" role="navigation" style="margin-top:30px;float:right;font-size:19px;color:white;">

				<a style="color:white;" href="http://www.secretfaces.be/">Accueil</a>
				

		

			</nav>
			
		</div>

		<!-- END Main Navigation -->



	</div>


</div>




<!-- END Top Area -->