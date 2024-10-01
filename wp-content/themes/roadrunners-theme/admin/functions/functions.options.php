<?php
/*
 * V1.2.0
 *
 *  - Added Currency Symbol option.
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - More options added.
 *  - Updated Google Fonts.
 *
 */

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}

		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 

		// Homepage Layout Options
		$roadrunners_layout = array(
		
			'enabled' => array(
			
				'placebo'                    => 'placebo',
				'roadrunners_about_us'       => esc_html__( 'About Us', 'roadrunners' ),
				'roadrunners_events'         => esc_html__( 'Events', 'roadrunners' ),
				'roadrunners_artists'        => esc_html__( 'Artists', 'roadrunners' ),
				'roadrunners_testimonial_01' => esc_html__( 'Testimonial 01', 'roadrunners' ),
				'roadrunners_custom'         => esc_html__( 'Custom', 'roadrunners' ),
				'roadrunners_testimonial_02' => esc_html__( 'Testimonial 02', 'roadrunners' ),
				'roadrunners_gallery'        => esc_html__( 'Gallery', 'roadrunners' ),
				'roadrunners_blog'           => esc_html__( 'Blog', 'roadrunners' ),
				'roadrunners_contact'        => esc_html__( 'Contact', 'roadrunners' )
			
			),
			'disabled' => array(
			
				'placebo' => 'placebo'
			
			)
			
			
		);
		
		/**
		 * Google Fonts List
		 *
		 * @since 1.1.0
		 */
		$google_fonts_list = array(
		
			'none'=> esc_html__( 'Select a Font' , 'roadrunners' ),
			'ABeeZee'=> 'ABeeZee',
			'Abel'=> 'Abel',
			'Abril Fatface'=> 'Abril Fatface',
			'Aclonica'=> 'Aclonica',
			'Acme'=> 'Acme',
			'Actor'=> 'Actor',
			'Adamina'=> 'Adamina',
			'Advent Pro'=> 'Advent Pro',
			'Aguafina Script'=> 'Aguafina Script',
			'Akronim'=> 'Akronim',
			'Aladin'=> 'Aladin',
			'Aldrich'=> 'Aldrich',
			'Alef'=> 'Alef',
			'Alegreya'=> 'Alegreya',
			'Alegreya SC'=> 'Alegreya SC',
			'Alegreya Sans'=> 'Alegreya Sans',
			'Alegreya Sans SC'=> 'Alegreya Sans SC',
			'Alex Brush'=> 'Alex Brush',
			'Alfa Slab One'=> 'Alfa Slab One',
			'Alice'=> 'Alice',
			'Alike'=> 'Alike',
			'Alike Angular'=> 'Alike Angular',
			'Allan'=> 'Allan',
			'Allerta'=> 'Allerta',
			'Allerta Stencil'=> 'Allerta Stencil',
			'Allura'=> 'Allura',
			'Almendra'=> 'Almendra',
			'Almendra Display'=> 'Almendra Display',
			'Almendra SC'=> 'Almendra SC',
			'Amarante'=> 'Amarante',
			'Amaranth'=> 'Amaranth',
			'Amatic SC'=> 'Amatic SC',
			'Amethysta'=> 'Amethysta',
			'Anaheim'=> 'Anaheim',
			'Andada'=> 'Andada',
			'Andika'=> 'Andika',
			'Angkor'=> 'Angkor',
			'Annie Use Your Telescope'=> 'Annie Use Your Telescope',
			'Anonymous Pro'=> 'Anonymous Pro',
			'Antic'=> 'Antic',
			'Antic Didone'=> 'Antic Didone',
			'Antic Slab'=> 'Antic Slab',
			'Anton'=> 'Anton',
			'Arapey'=> 'Arapey',
			'Arbutus'=> 'Arbutus',
			'Arbutus Slab'=> 'Arbutus Slab',
			'Architects Daughter'=> 'Architects Daughter',
			'Archivo Black'=> 'Archivo Black',
			'Archivo Narrow'=> 'Archivo Narrow',
			'Arimo'=> 'Arimo',
			'Arizonia'=> 'Arizonia',
			'Armata'=> 'Armata',
			'Artifika'=> 'Artifika',
			'Arvo'=> 'Arvo',
			'Asap'=> 'Asap',
			'Asset'=> 'Asset',
			'Astloch'=> 'Astloch',
			'Asul'=> 'Asul',
			'Atomic Age'=> 'Atomic Age',
			'Aubrey'=> 'Aubrey',
			'Audiowide'=> 'Audiowide',
			'Autour One'=> 'Autour One',
			'Average'=> 'Average',
			'Average Sans'=> 'Average Sans',
			'Averia Gruesa Libre'=> 'Averia Gruesa Libre',
			'Averia Libre'=> 'Averia Libre',
			'Averia Sans Libre'=> 'Averia Sans Libre',
			'Averia Serif Libre'=> 'Averia Serif Libre',
			'Bad Script'=> 'Bad Script',
			'Balthazar'=> 'Balthazar',
			'Bangers'=> 'Bangers',
			'Basic'=> 'Basic',
			'Battambang'=> 'Battambang',
			'Baumans'=> 'Baumans',
			'Bayon'=> 'Bayon',
			'Belgrano'=> 'Belgrano',
			'Belleza'=> 'Belleza',
			'BenchNine'=> 'BenchNine',
			'Bentham'=> 'Bentham',
			'Berkshire Swash'=> 'Berkshire Swash',
			'Bevan'=> 'Bevan',
			'Bigelow Rules'=> 'Bigelow Rules',
			'Bigshot One'=> 'Bigshot One',
			'Bilbo'=> 'Bilbo',
			'Bilbo Swash Caps'=> 'Bilbo Swash Caps',
			'Bitter'=> 'Bitter',
			'Black Ops One'=> 'Black Ops One',
			'Bokor'=> 'Bokor',
			'Bonbon'=> 'Bonbon',
			'Boogaloo'=> 'Boogaloo',
			'Bowlby One'=> 'Bowlby One',
			'Bowlby One SC'=> 'Bowlby One SC',
			'Brawler'=> 'Brawler',
			'Bree Serif'=> 'Bree Serif',
			'Bubblegum Sans'=> 'Bubblegum Sans',
			'Bubbler One'=> 'Bubbler One',
			'Buda'=> 'Buda',
			'Buenard'=> 'Buenard',
			'Butcherman'=> 'Butcherman',
			'Butterfly Kids'=> 'Butterfly Kids',
			'Cabin'=> 'Cabin',
			'Cabin Condensed'=> 'Cabin Condensed',
			'Cabin Sketch'=> 'Cabin Sketch',
			'Caesar Dressing'=> 'Caesar Dressing',
			'Cagliostro'=> 'Cagliostro',
			'Calligraffitti'=> 'Calligraffitti',
			'Cambay'=> 'Cambay',
			'Cambo'=> 'Cambo',
			'Candal'=> 'Candal',
			'Cantarell'=> 'Cantarell',
			'Cantata One'=> 'Cantata One',
			'Cantora One'=> 'Cantora One',
			'Capriola'=> 'Capriola',
			'Cardo'=> 'Cardo',
			'Carme'=> 'Carme',
			'Carrois Gothic'=> 'Carrois Gothic',
			'Carrois Gothic SC'=> 'Carrois Gothic SC',
			'Carter One'=> 'Carter One',
			'Caudex'=> 'Caudex',
			'Cedarville Cursive'=> 'Cedarville Cursive',
			'Ceviche One'=> 'Ceviche One',
			'Changa One'=> 'Changa One',
			'Chango'=> 'Chango',
			'Chau Philomene One'=> 'Chau Philomene One',
			'Chela One'=> 'Chela One',
			'Chelsea Market'=> 'Chelsea Market',
			'Chenla'=> 'Chenla',
			'Cherry Cream Soda'=> 'Cherry Cream Soda',
			'Cherry Swash'=> 'Cherry Swash',
			'Chewy'=> 'Chewy',
			'Chicle'=> 'Chicle',
			'Chivo'=> 'Chivo',
			'Cinzel'=> 'Cinzel',
			'Cinzel Decorative'=> 'Cinzel Decorative',
			'Clicker Script'=> 'Clicker Script',
			'Coda'=> 'Coda',
			'Coda Caption'=> 'Coda Caption',
			'Codystar'=> 'Codystar',
			'Combo'=> 'Combo',
			'Comfortaa'=> 'Comfortaa',
			'Coming Soon'=> 'Coming Soon',
			'Concert One'=> 'Concert One',
			'Condiment'=> 'Condiment',
			'Content'=> 'Content',
			'Contrail One'=> 'Contrail One',
			'Convergence'=> 'Convergence',
			'Cookie'=> 'Cookie',
			'Copse'=> 'Copse',
			'Corben'=> 'Corben',
			'Courgette'=> 'Courgette',
			'Cousine'=> 'Cousine',
			'Coustard'=> 'Coustard',
			'Covered By Your Grace'=> 'Covered By Your Grace',
			'Crafty Girls'=> 'Crafty Girls',
			'Creepster'=> 'Creepster',
			'Crete Round'=> 'Crete Round',
			'Crimson Text'=> 'Crimson Text',
			'Croissant One'=> 'Croissant One',
			'Crushed'=> 'Crushed',
			'Cuprum'=> 'Cuprum',
			'Cutive'=> 'Cutive',
			'Cutive Mono'=> 'Cutive Mono',
			'Damion'=> 'Damion',
			'Dancing Script'=> 'Dancing Script',
			'Dangrek'=> 'Dangrek',
			'Dawning of a New Day'=> 'Dawning of a New Day',
			'Days One'=> 'Days One',
			'Dekko'=> 'Dekko',
			'Delius'=> 'Delius',
			'Delius Swash Caps'=> 'Delius Swash Caps',
			'Delius Unicase'=> 'Delius Unicase',
			'Della Respira'=> 'Della Respira',
			'Denk One'=> 'Denk One',
			'Devonshire'=> 'Devonshire',
			'Dhurjati'=> 'Dhurjati',
			'Didact Gothic'=> 'Didact Gothic',
			'Diplomata'=> 'Diplomata',
			'Diplomata SC'=> 'Diplomata SC',
			'Domine'=> 'Domine',
			'Donegal One'=> 'Donegal One',
			'Doppio One'=> 'Doppio One',
			'Dorsa'=> 'Dorsa',
			'Dosis'=> 'Dosis',
			'Dr Sugiyama'=> 'Dr Sugiyama',
			'Droid Sans'=> 'Droid Sans',
			'Droid Sans Mono'=> 'Droid Sans Mono',
			'Droid Serif'=> 'Droid Serif',
			'Duru Sans'=> 'Duru Sans',
			'Dynalight'=> 'Dynalight',
			'EB Garamond'=> 'EB Garamond',
			'Eagle Lake'=> 'Eagle Lake',
			'Eater'=> 'Eater',
			'Economica'=> 'Economica',
			'Ek Mukta'=> 'Ek Mukta',
			'Electrolize'=> 'Electrolize',
			'Elsie'=> 'Elsie',
			'Elsie Swash Caps'=> 'Elsie Swash Caps',
			'Emblema One'=> 'Emblema One',
			'Emilys Candy'=> 'Emilys Candy',
			'Engagement'=> 'Engagement',
			'Englebert'=> 'Englebert',
			'Enriqueta'=> 'Enriqueta',
			'Erica One'=> 'Erica One',
			'Esteban'=> 'Esteban',
			'Euphoria Script'=> 'Euphoria Script',
			'Ewert'=> 'Ewert',
			'Exo'=> 'Exo',
			'Exo 2'=> 'Exo 2',
			'Expletus Sans'=> 'Expletus Sans',
			'Fanwood Text'=> 'Fanwood Text',
			'Fascinate'=> 'Fascinate',
			'Fascinate Inline'=> 'Fascinate Inline',
			'Faster One'=> 'Faster One',
			'Fasthand'=> 'Fasthand',
			'Fauna One'=> 'Fauna One',
			'Federant'=> 'Federant',
			'Federo'=> 'Federo',
			'Felipa'=> 'Felipa',
			'Fenix'=> 'Fenix',
			'Finger Paint'=> 'Finger Paint',
			'Fira Mono'=> 'Fira Mono',
			'Fira Sans'=> 'Fira Sans',
			'Fjalla One'=> 'Fjalla One',
			'Fjord One'=> 'Fjord One',
			'Flamenco'=> 'Flamenco',
			'Flavors'=> 'Flavors',
			'Fondamento'=> 'Fondamento',
			'Fontdiner Swanky'=> 'Fontdiner Swanky',
			'Forum'=> 'Forum',
			'Francois One'=> 'Francois One',
			'Freckle Face'=> 'Freckle Face',
			'Fredericka the Great'=> 'Fredericka the Great',
			'Fredoka One'=> 'Fredoka One',
			'Freehand'=> 'Freehand',
			'Fresca'=> 'Fresca',
			'Frijole'=> 'Frijole',
			'Fruktur'=> 'Fruktur',
			'Fugaz One'=> 'Fugaz One',
			'GFS Didot'=> 'GFS Didot',
			'GFS Neohellenic'=> 'GFS Neohellenic',
			'Gabriela'=> 'Gabriela',
			'Gafata'=> 'Gafata',
			'Galdeano'=> 'Galdeano',
			'Galindo'=> 'Galindo',
			'Gentium Basic'=> 'Gentium Basic',
			'Gentium Book Basic'=> 'Gentium Book Basic',
			'Geo'=> 'Geo',
			'Geostar'=> 'Geostar',
			'Geostar Fill'=> 'Geostar Fill',
			'Germania One'=> 'Germania One',
			'Gidugu'=> 'Gidugu',
			'Gilda Display'=> 'Gilda Display',
			'Give You Glory'=> 'Give You Glory',
			'Glass Antiqua'=> 'Glass Antiqua',
			'Glegoo'=> 'Glegoo',
			'Gloria Hallelujah'=> 'Gloria Hallelujah',
			'Goblin One'=> 'Goblin One',
			'Gochi Hand'=> 'Gochi Hand',
			'Gorditas'=> 'Gorditas',
			'Goudy Bookletter 1911'=> 'Goudy Bookletter 1911',
			'Graduate'=> 'Graduate',
			'Grand Hotel'=> 'Grand Hotel',
			'Gravitas One'=> 'Gravitas One',
			'Great Vibes'=> 'Great Vibes',
			'Griffy'=> 'Griffy',
			'Gruppo'=> 'Gruppo',
			'Gudea'=> 'Gudea',
			'Gurajada'=> 'Gurajada',
			'Habibi'=> 'Habibi',
			'Halant'=> 'Halant',
			'Hammersmith One'=> 'Hammersmith One',
			'Hanalei'=> 'Hanalei',
			'Hanalei Fill'=> 'Hanalei Fill',
			'Handlee'=> 'Handlee',
			'Hanuman'=> 'Hanuman',
			'Happy Monkey'=> 'Happy Monkey',
			'Headland One'=> 'Headland One',
			'Henny Penny'=> 'Henny Penny',
			'Herr Von Muellerhoff'=> 'Herr Von Muellerhoff',
			'Hind'=> 'Hind',
			'Holtwood One SC'=> 'Holtwood One SC',
			'Homemade Apple'=> 'Homemade Apple',
			'Homenaje'=> 'Homenaje',
			'IM Fell DW Pica'=> 'IM Fell DW Pica',
			'IM Fell DW Pica SC'=> 'IM Fell DW Pica SC',
			'IM Fell Double Pica'=> 'IM Fell Double Pica',
			'IM Fell Double Pica SC'=> 'IM Fell Double Pica SC',
			'IM Fell English'=> 'IM Fell English',
			'IM Fell English SC'=> 'IM Fell English SC',
			'IM Fell French Canon'=> 'IM Fell French Canon',
			'IM Fell French Canon SC'=> 'IM Fell French Canon SC',
			'IM Fell Great Primer'=> 'IM Fell Great Primer',
			'IM Fell Great Primer SC'=> 'IM Fell Great Primer SC',
			'Iceberg'=> 'Iceberg',
			'Iceland'=> 'Iceland',
			'Imprima'=> 'Imprima',
			'Inconsolata'=> 'Inconsolata',
			'Inder'=> 'Inder',
			'Indie Flower'=> 'Indie Flower',
			'Inika'=> 'Inika',
			'Irish Grover'=> 'Irish Grover',
			'Istok Web'=> 'Istok Web',
			'Italiana'=> 'Italiana',
			'Italianno'=> 'Italianno',
			'Jacques Francois'=> 'Jacques Francois',
			'Jacques Francois Shadow'=> 'Jacques Francois Shadow',
			'Jim Nightshade'=> 'Jim Nightshade',
			'Jockey One'=> 'Jockey One',
			'Jolly Lodger'=> 'Jolly Lodger',
			'Josefin Sans'=> 'Josefin Sans',
			'Josefin Slab'=> 'Josefin Slab',
			'Joti One'=> 'Joti One',
			'Judson'=> 'Judson',
			'Julee'=> 'Julee',
			'Julius Sans One'=> 'Julius Sans One',
			'Junge'=> 'Junge',
			'Jura'=> 'Jura',
			'Just Another Hand'=> 'Just Another Hand',
			'Just Me Again Down Here'=> 'Just Me Again Down Here',
			'Kalam'=> 'Kalam',
			'Kameron'=> 'Kameron',
			'Kantumruy'=> 'Kantumruy',
			'Karla'=> 'Karla',
			'Karma'=> 'Karma',
			'Kaushan Script'=> 'Kaushan Script',
			'Kavoon'=> 'Kavoon',
			'Kdam Thmor'=> 'Kdam Thmor',
			'Keania One'=> 'Keania One',
			'Kelly Slab'=> 'Kelly Slab',
			'Kenia'=> 'Kenia',
			'Khand'=> 'Khand',
			'Khmer'=> 'Khmer',
			'Khula'=> 'Khula',
			'Kite One'=> 'Kite One',
			'Knewave'=> 'Knewave',
			'Kotta One'=> 'Kotta One',
			'Koulen'=> 'Koulen',
			'Kranky'=> 'Kranky',
			'Kreon'=> 'Kreon',
			'Kristi'=> 'Kristi',
			'Krona One'=> 'Krona One',
			'La Belle Aurore'=> 'La Belle Aurore',
			'Laila'=> 'Laila',
			'Lakki Reddy'=> 'Lakki Reddy',
			'Lancelot'=> 'Lancelot',
			'Lato'=> 'Lato',
			'League Script'=> 'League Script',
			'Leckerli One'=> 'Leckerli One',
			'Ledger'=> 'Ledger',
			'Lekton'=> 'Lekton',
			'Lemon'=> 'Lemon',
			'Libre Baskerville'=> 'Libre Baskerville',
			'Life Savers'=> 'Life Savers',
			'Lilita One'=> 'Lilita One',
			'Lily Script One'=> 'Lily Script One',
			'Limelight'=> 'Limelight',
			'Linden Hill'=> 'Linden Hill',
			'Lobster'=> 'Lobster',
			'Lobster Two'=> 'Lobster Two',
			'Londrina Outline'=> 'Londrina Outline',
			'Londrina Shadow'=> 'Londrina Shadow',
			'Londrina Sketch'=> 'Londrina Sketch',
			'Londrina Solid'=> 'Londrina Solid',
			'Lora'=> 'Lora',
			'Love Ya Like A Sister'=> 'Love Ya Like A Sister',
			'Loved by the King'=> 'Loved by the King',
			'Lovers Quarrel'=> 'Lovers Quarrel',
			'Luckiest Guy'=> 'Luckiest Guy',
			'Lusitana'=> 'Lusitana',
			'Lustria'=> 'Lustria',
			'Macondo'=> 'Macondo',
			'Macondo Swash Caps'=> 'Macondo Swash Caps',
			'Magra'=> 'Magra',
			'Maiden Orange'=> 'Maiden Orange',
			'Mako'=> 'Mako',
			'Mallanna'=> 'Mallanna',
			'Mandali'=> 'Mandali',
			'Marcellus'=> 'Marcellus',
			'Marcellus SC'=> 'Marcellus SC',
			'Marck Script'=> 'Marck Script',
			'Margarine'=> 'Margarine',
			'Marko One'=> 'Marko One',
			'Marmelad'=> 'Marmelad',
			'Marvel'=> 'Marvel',
			'Mate'=> 'Mate',
			'Mate SC'=> 'Mate SC',
			'Maven Pro'=> 'Maven Pro',
			'McLaren'=> 'McLaren',
			'Meddon'=> 'Meddon',
			'MedievalSharp'=> 'MedievalSharp',
			'Medula One'=> 'Medula One',
			'Megrim'=> 'Megrim',
			'Meie Script'=> 'Meie Script',
			'Merienda'=> 'Merienda',
			'Merienda One'=> 'Merienda One',
			'Merriweather'=> 'Merriweather',
			'Merriweather Sans'=> 'Merriweather Sans',
			'Metal'=> 'Metal',
			'Metal Mania'=> 'Metal Mania',
			'Metamorphous'=> 'Metamorphous',
			'Metrophobic'=> 'Metrophobic',
			'Michroma'=> 'Michroma',
			'Milonga'=> 'Milonga',
			'Miltonian'=> 'Miltonian',
			'Miltonian Tattoo'=> 'Miltonian Tattoo',
			'Miniver'=> 'Miniver',
			'Miss Fajardose'=> 'Miss Fajardose',
			'Modern Antiqua'=> 'Modern Antiqua',
			'Molengo'=> 'Molengo',
			'Molle'=> 'Molle',
			'Monda'=> 'Monda',
			'Monofett'=> 'Monofett',
			'Monoton'=> 'Monoton',
			'Monsieur La Doulaise'=> 'Monsieur La Doulaise',
			'Montaga'=> 'Montaga',
			'Montez'=> 'Montez',
			'Montserrat'=> 'Montserrat',
			'Montserrat Alternates'=> 'Montserrat Alternates',
			'Montserrat Subrayada'=> 'Montserrat Subrayada',
			'Moul'=> 'Moul',
			'Moulpali'=> 'Moulpali',
			'Mountains of Christmas'=> 'Mountains of Christmas',
			'Mouse Memoirs'=> 'Mouse Memoirs',
			'Mr Bedfort'=> 'Mr Bedfort',
			'Mr Dafoe'=> 'Mr Dafoe',
			'Mr De Haviland'=> 'Mr De Haviland',
			'Mrs Saint Delafield'=> 'Mrs Saint Delafield',
			'Mrs Sheppards'=> 'Mrs Sheppards',
			'Muli'=> 'Muli',
			'Mystery Quest'=> 'Mystery Quest',
			'NTR'=> 'NTR',
			'Neucha'=> 'Neucha',
			'Neuton'=> 'Neuton',
			'New Rocker'=> 'New Rocker',
			'News Cycle'=> 'News Cycle',
			'Niconne'=> 'Niconne',
			'Nixie One'=> 'Nixie One',
			'Nobile'=> 'Nobile',
			'Nokora'=> 'Nokora',
			'Norican'=> 'Norican',
			'Nosifer'=> 'Nosifer',
			'Nothing You Could Do'=> 'Nothing You Could Do',
			'Noticia Text'=> 'Noticia Text',
			'Noto Sans'=> 'Noto Sans',
			'Noto Serif'=> 'Noto Serif',
			'Nova Cut'=> 'Nova Cut',
			'Nova Flat'=> 'Nova Flat',
			'Nova Mono'=> 'Nova Mono',
			'Nova Oval'=> 'Nova Oval',
			'Nova Round'=> 'Nova Round',
			'Nova Script'=> 'Nova Script',
			'Nova Slim'=> 'Nova Slim',
			'Nova Square'=> 'Nova Square',
			'Numans'=> 'Numans',
			'Nunito'=> 'Nunito',
			'Odor Mean Chey'=> 'Odor Mean Chey',
			'Offside'=> 'Offside',
			'Old Standard TT'=> 'Old Standard TT',
			'Oldenburg'=> 'Oldenburg',
			'Oleo Script'=> 'Oleo Script',
			'Oleo Script Swash Caps'=> 'Oleo Script Swash Caps',
			'Open Sans'=> 'Open Sans',
			'Open Sans Condensed'=> 'Open Sans Condensed',
			'Oranienbaum'=> 'Oranienbaum',
			'Orbitron'=> 'Orbitron',
			'Oregano'=> 'Oregano',
			'Orienta'=> 'Orienta',
			'Original Surfer'=> 'Original Surfer',
			'Oswald'=> 'Oswald',
			'Over the Rainbow'=> 'Over the Rainbow',
			'Overlock'=> 'Overlock',
			'Overlock SC'=> 'Overlock SC',
			'Ovo'=> 'Ovo',
			'Oxygen'=> 'Oxygen',
			'Oxygen Mono'=> 'Oxygen Mono',
			'PT Mono'=> 'PT Mono',
			'PT Sans'=> 'PT Sans',
			'PT Sans Caption'=> 'PT Sans Caption',
			'PT Sans Narrow'=> 'PT Sans Narrow',
			'PT Serif'=> 'PT Serif',
			'PT Serif Caption'=> 'PT Serif Caption',
			'Pacifico'=> 'Pacifico',
			'Paprika'=> 'Paprika',
			'Parisienne'=> 'Parisienne',
			'Passero One'=> 'Passero One',
			'Passion One'=> 'Passion One',
			'Pathway Gothic One'=> 'Pathway Gothic One',
			'Patrick Hand'=> 'Patrick Hand',
			'Patrick Hand SC'=> 'Patrick Hand SC',
			'Patua One'=> 'Patua One',
			'Paytone One'=> 'Paytone One',
			'Peddana'=> 'Peddana',
			'Peralta'=> 'Peralta',
			'Permanent Marker'=> 'Permanent Marker',
			'Petit Formal Script'=> 'Petit Formal Script',
			'Petrona'=> 'Petrona',
			'Philosopher'=> 'Philosopher',
			'Piedra'=> 'Piedra',
			'Pinyon Script'=> 'Pinyon Script',
			'Pirata One'=> 'Pirata One',
			'Plaster'=> 'Plaster',
			'Play'=> 'Play',
			'Playball'=> 'Playball',
			'Playfair Display'=> 'Playfair Display',
			'Playfair Display SC'=> 'Playfair Display SC',
			'Podkova'=> 'Podkova',
			'Poiret One'=> 'Poiret One',
			'Poller One'=> 'Poller One',
			'Poly'=> 'Poly',
			'Pompiere'=> 'Pompiere',
			'Pontano Sans'=> 'Pontano Sans',
			'Port Lligat Sans'=> 'Port Lligat Sans',
			'Port Lligat Slab'=> 'Port Lligat Slab',
			'Prata'=> 'Prata',
			'Preahvihear'=> 'Preahvihear',
			'Press Start 2P'=> 'Press Start 2P',
			'Princess Sofia'=> 'Princess Sofia',
			'Prociono'=> 'Prociono',
			'Prosto One'=> 'Prosto One',
			'Puritan'=> 'Puritan',
			'Purple Purse'=> 'Purple Purse',
			'Quando'=> 'Quando',
			'Quantico'=> 'Quantico',
			'Quattrocento'=> 'Quattrocento',
			'Quattrocento Sans'=> 'Quattrocento Sans',
			'Questrial'=> 'Questrial',
			'Quicksand'=> 'Quicksand',
			'Quintessential'=> 'Quintessential',
			'Qwigley'=> 'Qwigley',
			'Racing Sans One'=> 'Racing Sans One',
			'Radley'=> 'Radley',
			'Rajdhani'=> 'Rajdhani',
			'Raleway'=> 'Raleway',
			'Raleway Dots'=> 'Raleway Dots',
			'Ramabhadra'=> 'Ramabhadra',
			'Ramaraja'=> 'Ramaraja',
			'Rambla'=> 'Rambla',
			'Rammetto One'=> 'Rammetto One',
			'Ranchers'=> 'Ranchers',
			'Rancho'=> 'Rancho',
			'Ranga'=> 'Ranga',
			'Rationale'=> 'Rationale',
			'Ravi Prakash'=> 'Ravi Prakash',
			'Redressed'=> 'Redressed',
			'Reenie Beanie'=> 'Reenie Beanie',
			'Revalia'=> 'Revalia',
			'Ribeye'=> 'Ribeye',
			'Ribeye Marrow'=> 'Ribeye Marrow',
			'Righteous'=> 'Righteous',
			'Risque'=> 'Risque',
			'Roboto'=> 'Roboto',
			'Roboto Condensed'=> 'Roboto Condensed',
			'Roboto Slab'=> 'Roboto Slab',
			'Rochester'=> 'Rochester',
			'Rock Salt'=> 'Rock Salt',
			'Rokkitt'=> 'Rokkitt',
			'Romanesco'=> 'Romanesco',
			'Ropa Sans'=> 'Ropa Sans',
			'Rosario'=> 'Rosario',
			'Rosarivo'=> 'Rosarivo',
			'Rouge Script'=> 'Rouge Script',
			'Rozha One'=> 'Rozha One',
			'Rubik Mono One'=> 'Rubik Mono One',
			'Rubik One'=> 'Rubik One',
			'Ruda'=> 'Ruda',
			'Rufina'=> 'Rufina',
			'Ruge Boogie'=> 'Ruge Boogie',
			'Ruluko'=> 'Ruluko',
			'Rum Raisin'=> 'Rum Raisin',
			'Ruslan Display'=> 'Ruslan Display',
			'Russo One'=> 'Russo One',
			'Ruthie'=> 'Ruthie',
			'Rye'=> 'Rye',
			'Sacramento'=> 'Sacramento',
			'Sail'=> 'Sail',
			'Salsa'=> 'Salsa',
			'Sanchez'=> 'Sanchez',
			'Sancreek'=> 'Sancreek',
			'Sansita One'=> 'Sansita One',
			'Sarina'=> 'Sarina',
			'Sarpanch'=> 'Sarpanch',
			'Satisfy'=> 'Satisfy',
			'Scada'=> 'Scada',
			'Schoolbell'=> 'Schoolbell',
			'Seaweed Script'=> 'Seaweed Script',
			'Sevillana'=> 'Sevillana',
			'Seymour One'=> 'Seymour One',
			'Shadows Into Light'=> 'Shadows Into Light',
			'Shadows Into Light Two'=> 'Shadows Into Light Two',
			'Shanti'=> 'Shanti',
			'Share'=> 'Share',
			'Share Tech'=> 'Share Tech',
			'Share Tech Mono'=> 'Share Tech Mono',
			'Shojumaru'=> 'Shojumaru',
			'Short Stack'=> 'Short Stack',
			'Siemreap'=> 'Siemreap',
			'Sigmar One'=> 'Sigmar One',
			'Signika'=> 'Signika',
			'Signika Negative'=> 'Signika Negative',
			'Simonetta'=> 'Simonetta',
			'Sintony'=> 'Sintony',
			'Sirin Stencil'=> 'Sirin Stencil',
			'Six Caps'=> 'Six Caps',
			'Skranji'=> 'Skranji',
			'Slabo 13px'=> 'Slabo 13px',
			'Slabo 27px'=> 'Slabo 27px',
			'Slackey'=> 'Slackey',
			'Smokum'=> 'Smokum',
			'Smythe'=> 'Smythe',
			'Sniglet'=> 'Sniglet',
			'Snippet'=> 'Snippet',
			'Snowburst One'=> 'Snowburst One',
			'Sofadi One'=> 'Sofadi One',
			'Sofia'=> 'Sofia',
			'Sonsie One'=> 'Sonsie One',
			'Sorts Mill Goudy'=> 'Sorts Mill Goudy',
			'Source Code Pro'=> 'Source Code Pro',
			'Source Sans Pro'=> 'Source Sans Pro',
			'Source Serif Pro'=> 'Source Serif Pro',
			'Special Elite'=> 'Special Elite',
			'Spicy Rice'=> 'Spicy Rice',
			'Spinnaker'=> 'Spinnaker',
			'Spirax'=> 'Spirax',
			'Squada One'=> 'Squada One',
			'Sree Krushnadevaraya'=> 'Sree Krushnadevaraya',
			'Stalemate'=> 'Stalemate',
			'Stalinist One'=> 'Stalinist One',
			'Stardos Stencil'=> 'Stardos Stencil',
			'Stint Ultra Condensed'=> 'Stint Ultra Condensed',
			'Stint Ultra Expanded'=> 'Stint Ultra Expanded',
			'Stoke'=> 'Stoke',
			'Strait'=> 'Strait',
			'Sue Ellen Francisco'=> 'Sue Ellen Francisco',
			'Sunshiney'=> 'Sunshiney',
			'Supermercado One'=> 'Supermercado One',
			'Suranna'=> 'Suranna',
			'Suravaram'=> 'Suravaram',
			'Suwannaphum'=> 'Suwannaphum',
			'Swanky and Moo Moo'=> 'Swanky and Moo Moo',
			'Syncopate'=> 'Syncopate',
			'Tangerine'=> 'Tangerine',
			'Taprom'=> 'Taprom',
			'Tauri'=> 'Tauri',
			'Teko'=> 'Teko',
			'Telex'=> 'Telex',
			'Tenali Ramakrishna'=> 'Tenali Ramakrishna',
			'Tenor Sans'=> 'Tenor Sans',
			'Text Me One'=> 'Text Me One',
			'The Girl Next Door'=> 'The Girl Next Door',
			'Tienne'=> 'Tienne',
			'Timmana'=> 'Timmana',
			'Tinos'=> 'Tinos',
			'Titan One'=> 'Titan One',
			'Titillium Web'=> 'Titillium Web',
			'Trade Winds'=> 'Trade Winds',
			'Trocchi'=> 'Trocchi',
			'Trochut'=> 'Trochut',
			'Trykker'=> 'Trykker',
			'Tulpen One'=> 'Tulpen One',
			'Ubuntu'=> 'Ubuntu',
			'Ubuntu Condensed'=> 'Ubuntu Condensed',
			'Ubuntu Mono'=> 'Ubuntu Mono',
			'Ultra'=> 'Ultra',
			'Uncial Antiqua'=> 'Uncial Antiqua',
			'Underdog'=> 'Underdog',
			'Unica One'=> 'Unica One',
			'UnifrakturCook'=> 'UnifrakturCook',
			'UnifrakturMaguntia'=> 'UnifrakturMaguntia',
			'Unkempt'=> 'Unkempt',
			'Unlock'=> 'Unlock',
			'Unna'=> 'Unna',
			'VT323'=> 'VT323',
			'Vampiro One'=> 'Vampiro One',
			'Varela'=> 'Varela',
			'Varela Round'=> 'Varela Round',
			'Vast Shadow'=> 'Vast Shadow',
			'Vesper Libre'=> 'Vesper Libre',
			'Vibur'=> 'Vibur',
			'Vidaloka'=> 'Vidaloka',
			'Viga'=> 'Viga',
			'Voces'=> 'Voces',
			'Volkhov'=> 'Volkhov',
			'Vollkorn'=> 'Vollkorn',
			'Voltaire'=> 'Voltaire',
			'Waiting for the Sunrise'=> 'Waiting for the Sunrise',
			'Wallpoet'=> 'Wallpoet',
			'Walter Turncoat'=> 'Walter Turncoat',
			'Warnes'=> 'Warnes',
			'Wellfleet'=> 'Wellfleet',
			'Wendy One'=> 'Wendy One',
			'Wire One'=> 'Wire One',
			'Yanone Kaffeesatz'=> 'Yanone Kaffeesatz',
			'Yellowtail'=> 'Yellowtail',
			'Yeseva One'=> 'Yeseva One',
			'Yesteryear'=> 'Yesteryear',
			'Zeyada'=> 'Zeyada'
		
		);
		

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/**
 * RoadRunners Theme Options Array.
 * ============================================================================
 */
 
/**
 * Introduction to the Theme Options.
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Introduction' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_introduction',
						'std'		=> wp_kses_post( __( '<h3>Welcome to RoadRunners</h3>
											<p>Hi there! Welcome to the RoadRunners Theme Options panel. If you need to 
											play around with sliders or fiddle with switches, then this is the place to be!
											You can alter many of the themes settings here that are not already part of the WordPress
											options core. These options include changing colour schemes, uploading logos and
											customizing each section of the Homepage. If you are new to this kind of thing, you may want
											to view the Theme Documentation first for more detailed instructions on how to 
											configure settings. But if you consider yourself to be some kind of "WordPress Ninja",
											then please don\'t let me get in your way :) Have fun!</p><p>
											<a href="' . get_template_directory_uri() . '/documentation/index.html' . '" target="_blank">View Documentation</a></p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);

/**
 * General Settings
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'General Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'General Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_settings_info',
						'std'		=> wp_kses_post( __( '<h3>General Settings</h3><p>All the site\'s basic features can be configured here, such as
											the primary colour, blog title and certain other features that don\'t belong in
											any other sub menu.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Primary Colour' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Choose a colour to set as the site\'s primary colour. Note that this does not apply to the page dividers that have the orange colour in by default, since these are images, they will have to be amended manually.' , 'roadrunners' ),
						'id'		=> 'roadrunners_primary_colour',
						'std'		=> '#ff5400',
						'type'		=> 'color'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Enable the Back-to-top Button' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'This button appears in the bottom right corner of the page and allows you to scroll back to the top when clicked.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_btt',
						'std' 		=> 1,
						'on'		=> esc_html__( 'Enabled' , 'roadrunners' ),
						'off'		=> esc_html__( 'Disabled' , 'roadrunners' ),
						'type' 		=> 'switch'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Inner Page Header Background' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Upload an image to use for the header background on sub-pages.' , 'roadrunners' ),
						'id'		=> 'roadrunners_inner_page_background',
						'std'		=> '',
						'type'		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Blog Page Title' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the name of the page to be displayed if the blog template is used on the front page.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_title',
						'std'		=> 'Our Blog',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Currency Symbol' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Select a currency symbol to use. This is prefixed to all ticket prices found in Events. NOTE: Some fonts may not support all currency glyphs.' , 'roadrunners' ),
						'id'		=> 'roadrunners_currency',
						'std'		=> '$',
						'type'		=> 'select',
						'options'   => array(
						
							'$'        => wp_kses_post( __( '$ - US Dollar', 'roadrunners' ) ),
							'&pound;'  => wp_kses_post( __( '&pound; - Pound Sterling', 'roadrunners' ) ),
							'&cent;'   => wp_kses_post( __( '&cent; - Cent', 'roadrunners' ) ),
							'&#8355;'  => wp_kses_post( __( '&#8355; - Franc', 'roadrunners' ) ),
							'&yen;'    => wp_kses_post( __( '&yen; - Yen', 'roadrunners' ) ),
							'&#8356;'  => wp_kses_post( __( '&#8356; - Lira', 'roadrunners' ) ),
							'&#8359;'  => wp_kses_post( __( '&#8359; - Peseta', 'roadrunners' ) ),
							'&euro;'   => wp_kses_post( __( '&euro; - Euro', 'roadrunners' ) ),
							'&#x20B9;' => wp_kses_post( __( '&#x20B9; - Rupee', 'roadrunners' ) ),
							'&#8369;'  => wp_kses_post( __( '&#8369; - Peso', 'roadrunners' ) )
													
						)
				);

/**
 * Site Header Settings
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Site Header Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Site Header Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_heading_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Site Header Settings</h3><p>In this section
											you can upload a logo, resize it, and position it however you see fit.
											This logo will only show up in the subpages (inner pages). To upload a logo
											for the home page, go to the "Home Page Settings" tab.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Upload a Logo' , 'roadrunners' ),
						'desc' 		=> wp_kses_post( __( 'Upload a logo to use for the site\'s Page Header.<br /><br />
											<small><em><strong>TIP:</strong> Use a logo that\'s around double
											the original size for displaying on retina devices like the iPad or iPhone. You
											can use the height field below to adjust the size.</em><small>' , 'roadrunners' ) ),
						'id' 		=> 'roadrunners_page_header_logo',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Logo\'s Height in Pixels' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use this option to adjust the height of the logo in pixels. This is useful if the logo has been optimized for retina displays.' , 'roadrunners' ),
						'id'		=> 'roadrunners_page_header_logo_height',
						'std'		=> '',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Alt Text for the Logo' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter some alternate text for the logo (Optional)' , 'roadrunners' ),
						'id'		=> 'roadrunners_page_header_logo_alt_text',
						'std'		=> 'Your Website Logo',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Logo\'s distance from the TOP in pixels' , 'roadrunners' ),
						'desc'		=> wp_kses_post( __( 'Use the slider to set the logo\'s distance from the <strong>top</strong> of the page.' , 'roadrunners' ) ),
						'id'		=> 'roadrunners_page_header_logo_top',
						'std'		=> '0',
						'min'		=> '0',
						'step'		=> '1',
						'max'		=> '50',
						'type'		=> 'sliderui'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Logo\'s distance from the LEFT in pixels' , 'roadrunners' ),
						'desc'		=> wp_kses_post( __( 'Use the slider to set the logo\'s distance from the <strong>left</strong> side of the page.' , 'roadrunners' ) ),
						'id'		=> 'roadrunners_page_header_logo_left',
						'std'		=> '0',
						'min'		=> '0',
						'step'		=> '1',
						'max'		=> '50',
						'type'		=> 'sliderui'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'WordPress Custom Menu' , 'roadrunners' ),
						'desc'		=> wp_kses_post( __( 'Check this option to enable a custom menu for the main navigation. This will override any settings below. Custom menus can be configured in <strong>Appearance > Menus</strong>.' , 'roadrunners' ) ),
						'id'		=> 'roadrunners_nav_type',
						'std'		=> 0,
						'type'		=> 'checkbox'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Navigation Menu Names' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter a name for the "Home" tab.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_home',
						'std'		=> 'Home',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "About Us" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_about',
						'std'		=> 'About',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Events" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_events',
						'std'		=> 'Events',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Artists" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_artists',
						'std'		=> 'Artists',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Custom Content" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_custom',
						'std'		=> 'Custom',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Gallery" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_gallery',
						'std'		=> 'Gallery',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Blog" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_blog',
						'std'		=> 'Blog',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Enter a name for the "Contact" section.' , 'roadrunners' ),
						'id'		=> 'roadrunners_nav_name_contact',
						'std'		=> 'Contact',
						'type'		=> 'text'
				);
				
/**
 * Site Footer Settings
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Site Footer Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Site Footer Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_footer_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Site Footer Settings</h3><p>In this area, you can configure
											things that would normally appear at the bottom of each page
											of the site, such as Google Analytics code and footer text.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Footer Background' , 'roadrunners' ),
						'desc' 		=> wp_kses_post( __( 'Upload an image to use as the background in the site\'s footer area. The recommended width for this image should be <strong>1920</strong> pixels but the height can be flexible.' , 'roadrunners' ) ),
						'id' 		=> 'roadrunners_footer_image',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Google Analytics Code' , 'roadrunners' ),
						'desc'		=> wp_kses_post( __( 'If you are using Google Analytics, you can insert the code here.<br /><br /><small><em><strong>NOTE:</strong> Please enter the Javascript code WITHOUT the &lt;script&gt; tags as the theme will do this for you.</em></small>' , 'roadrunners' ) ),
						'id'		=> 'roadrunners_analytics',
						'std'		=> '',
						'type'		=> 'textarea'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Bottom Footer Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the text to be displayed at the very bottom of each page. <a>, <strong>, and <em> tags are allowed.' , 'roadrunners' ),
						'id'		=> 'roadrunners_bottom_text',
						'std'		=> "Lovingly Crafted by <a href='http://themeforest.net/user/SubatomicThemes'>Subatomic Themes</a> for <a href='http://themeforest.net/'>Themeforest.net</a> - Proudly powered by <a href='http://wordpress.org/'>WordPress</a>",
						'type'		=> 'textarea'
				);
				
/**
 * Favicon Settings
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Favicon Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Favicon Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_favicon_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Favicon Settings</h3><p>You can use these options to upload favicons for your
											site. These can range from various sizes depending on if you want to support
											retina displays. They should also ideally be in PNG format. If you\'d like to use the old fashion favicon.ico, you should
											upload an ICO version to your website\'s root directory.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Upload Favicon' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use for the site\'s main Favicon.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_favicon',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Upload Apple Touch Icon (32x32)' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use for display on Apple devices (iPhone, iPad etc..)' , 'roadrunners' ),
						'id' 		=> 'roadrunners_apple_icon_32',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Upload Apple Touch Icon (72x72)' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use for display on Apple devices with retina displays (newer versions of iPhone, iPad etc..)' , 'roadrunners' ),
						'id' 		=> 'roadrunners_apple_icon_72',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Upload Apple Touch Icon (114x114)' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use for display on Apple devices with even higher resolution displays.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_apple_icon_114',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
 
/**
 * Icon Settings
 * ============================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Icon Settings</h3><p>The header on the home page has a group of icons
											that can be used for almost any purpose, like social icons. The first field to edit is
											the name of the icon. This theme uses the <strong>Font Awesome</strong> glyph icon set. For a complete
											list of available glyphs, the 
											<a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome Cheatsheet</a> is where you\'ll find \'em.
											The second field to edit is the URL where the icon will link to. So, for example,
											you may want to have a Facebook icon that links to your Facebook page. Well, to do this
											you would have:</p>
											<p>facebook - in the first text field</p>
											<p>https://www.facebook.com/yourusername - in the second text field</p>
											<p>Note that you only need to enter the last part of the icon name, so "fa-twitter" would
											only need to be "twitter" (without the quotes).</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Open links in a new Window' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'You can use this option to enable the links to open in a new window.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_icons_target',
						'std' 		=> 0,
						'on'		=> esc_html__( 'Enabled' , 'roadrunners' ),
						'off'		=> esc_html__( 'Disabled' , 'roadrunners' ),
						'type' 		=> 'switch'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 01' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_01_icon',
						'std'		=> 'facebook-square',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_01_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 02' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_02_icon',
						'std'		=> 'twitter',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_02_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 03' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_03_icon',
						'std'		=> 'pinterest',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_03_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 04' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_04_icon',
						'std'		=> 'flickr',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_04_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 05' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_05_icon',
						'std'		=> 'instagram',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_05_url',
						'std'		=> '#',
						'type'		=> 'text'
				);			
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 06' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_06_icon',
						'std'		=> 'youtube-play',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_06_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 07' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_07_icon',
						'std'		=> 'vimeo-square',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_07_url',
						'std'		=> '#',
						'type'		=> 'text'
				);				
$of_options[] = array( 	'name' 		=> esc_html__( 'Icon 08' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Font Awesome Icon Glyph' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_08_icon',
						'std'		=> 'skype',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Icon URL' , 'roadrunners' ),
						'id'		=> 'roadrunners_icon_08_url',
						'std'		=> '#',
						'type'		=> 'text'
				);
			
/**
 * Font Settings.
 * ============================================================================
 */				
$of_options[] = array( 	'name' 		=> esc_html__( 'Font Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Font Settings' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_font_intro',
						'std'		=> wp_kses_post( __( '<h3>Font Settings</h3><p>Here you can configure the fonts that are 
											used throughout the theme. This theme uses the Google Font library, which means
											you have access to hundreds of free fonts. Whilst choosing a font, you can
											see a preview below.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Primary Font' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Choose a font to use as the site\'s primary font. This is mainly used for the body text.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_primary_font',
						'std' 		=> 'PT Sans',
						'type' 		=> 'select_google_font',
						'preview' 	=> array(
						
										'text' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.',
										'size' => '14px'
										
						),
						'options' 	=> $google_fonts_list
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Secondary Font' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Choose a font to use as the site\'s secondary font. This is mainly used for headings, menus etc.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_secondary_font',
						'std' 		=> 'PT Sans Narrow',
						'type' 		=> 'select_google_font',
						'preview' 	=> array(
						
										'text' => 'The Quick Brown Fox Jumps Over The Lazy Dog',
										'size' => '32px'
										
						),
						'options' 	=> $google_fonts_list
				);

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'roadrunners-plugin/roadrunners-plugin.php' ) ) :				
/**
 * Shortcode Snippets. (Only available if the RoadRunners Plugin is active)
 * =========================================================================================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Shortcode Snippets' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Shortcode Snippets Page' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_shortcodes_intro',
						'std'		=> wp_kses_post( __( '<h3>Shortcode Snippets</h3><p>The RoadRunners plugin also provides you with some useful
											Shortcodes to help layout your content better. Simply copy the desired Shortcode and paste
											them in the editor when you are adding a new page or post. If you are new to
											using shortcodes and how they work, then its advisable to view the 
											<a href="http://codex.wordpress.org/Shortcode_API" target="_blank">WordPress Codex</a>
											for more infromation.</p>
											<p>Don\'t forget, you can also find more detailed information in the
											<a href="' . get_template_directory_uri() . '/documentation/index.html' . '" target="_blank">documentation</a>.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Shortcode Snippets List' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_shortcodes_list',
						'std'		=> wp_kses_post( __( '<h4>Columns</h4>
											<p><em>A basic column Shortcode</em></p>
											<pre>[col grid="100"][/col]</pre>
											<p>A column Shortcode with mobile and tablet attributes</p>
											<pre>[col grid="100" tgrid="100" mgrid="100"][/col]</pre>
											<p>A column Shortcode with mobile, tablet, prefix, and suffix attributes</p>
											<pre>[col pre="10" grid="80" suf="10" tgrid="100" mgrid="100"][/col]</pre>
											<p>A column Shortcode with all available attributes</p>
											<pre>[col pre="10" grid="80" suf="10" tgrid="100" mgrid="100" dfirst="true" tfirst="true" mfirst="true" dlast="true" tlast="true" mlast="true"][/col]</pre>
											
											<h4>Column Layouts</h4>
											<p><em>Two Halfs</em></p>
											<pre>[col grid="50" tgrid="50" mgrid="100"][/col]
											[col grid="50" tgrid="50" mgrid="100"][/col]</pre>
											<p><em>Three Thirds</em></p>
											<pre>[col grid="33" tgrid="33" mgrid="100"][/col]
											[col grid="33" tgrid="33" mgrid="100"][/col]
											[col grid="33" tgrid="33" mgrid="100"][/col]</pre>
											<p><em>Four Quarters</em></p>
											<pre>[col grid="25" tgrid="50" mgrid="100"][/col]
											[col grid="25" tgrid="50" mgrid="100"][/col]
											[col grid="25" tgrid="50" mgrid="100"][/col]
											[col grid="25" tgrid="50" mgrid="100"][/col]</pre>
											
											<h4>Button</h4>
											<p><em>A simple button Shortcode</em></p>
											<pre>[button url="" target="blank"]Button Text[/button]</pre>
											
											<h4>Accordion</h4>
											<p><em>A simple Accordion Shortcode</em></p>
											<pre>[acc title="Accordion Title"]</pre>
											<p><em>An Accordion Shortcode with more attributes</em></p>
											<pre>[acc title="Accordion Title" open="true" type="toggle"]</pre>
											
											<h4>Tabs</h4>
											<p><em>A simple Tabs Shortcode</em></p>
											<pre>[tabs names="tab1:tab2:tab3"]
											[tab name="tab1"][/tab]
											[tab name="tab2"][/tab]
											[tab name="tab3"][/tab]
											[/tabs]</pre>
											' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
endif; // End if is_plugin_active()

/**
 * Labels
 * =========================================================================================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Custom Labels' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Shortcode Snippets Page' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_shortcodes_intro',
						'std'		=> wp_kses_post( __( '<h3>Custom Labels</h3><p>You can override certain hard-coded labels by editing the fields below.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Labels' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Label for "Event Date"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_event_date',
						'std'		=> 'Event Date',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Location"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_location',
						'std'		=> 'Location',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Tickets"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_tickets',
						'std'		=> 'Tickets',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Price"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_price',
						'std'		=> 'Price',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Purchase"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_purchase',
						'std'		=> 'Purchase',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Artist Name"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_artist_name',
						'std'		=> 'Artist Name',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Discography"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_discography',
						'std'		=> 'Discography',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Upcoming Releases"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_upcoming_releases',
						'std'		=> 'Upcoming Releases',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Genre"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_genre',
						'std'		=> 'Genre',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Formed In"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_formed_in',
						'std'		=> 'Formed In',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "Albums"' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_albums',
						'std'		=> 'Albums',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "View Artist" button' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_view_artist',
						'std'		=> 'View Artist',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "View All Artists" button' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_view_all_artists',
						'std'		=> 'View All Artists',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Label for "View All Events" button' , 'roadrunners' ),
						'id'		=> 'roadrunners_label_view_all_events',
						'std'		=> 'View All Events',
						'type'		=> 'text'
				);


/**
 * Import & Export Settings
 * =========================================================================================================================================
 */
$of_options[] = array( 	'name' 		=> esc_html__( 'Import and Export' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Backup &amp; Restore Settings' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_backup_intro',
						'std'		=> wp_kses_post( __( '<h3>Backup &amp; Restore Settings</h3><p>This section allows you to
											backup your theme options data, and you can also restore data that was previously
											backed up from an earlier date. This area is also useful for importing
											settings from a different install of this theme.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array(	'name'		=> esc_html__( 'Backup &amp; Restore Settings' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use the buttons below to backup and restore your Theme Settings.' , 'roadrunners' ),
						'id'		=> 'roadrunners_backup',
						'std'		=> '',
						'type'		=> 'backup'
				);
$of_options[] = array(	'name'		=> esc_html__( 'Transfer Theme Settings Data' , 'roadrunners' ),
						'desc'		=> esc_html__( 'You can use this option to transfer theme options to other installs. Simply copy the text inside the box and paste it in another install and click on "Import Options"' , 'roadrunners' ),
						'id'		=> 'roadrunners_transfer',
						'std'		=> '',
						'type'		=> 'transfer'
				);
				
/**
 * Home Page Settings
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Settings' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_home_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Home Page Settings</h3><p>These settings will allow you to configure the home page when the "Home - One-Page" template is selected when creating a new page.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Main Header Background Image' , 'roadrunners' ),
						'desc' 		=> wp_kses_post( __( 'Upload an image to be used as the background of the page header. Ideally this needs to be fairly big in size, ideally <strong>1920x1280</strong> pixels.' , 'roadrunners' ) ),
						'id' 		=> 'roadrunners_home_header_image',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Logo' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload a logo to use in the main heading. Ideally this should be the same type of logo you are using for the navigation bar in the subpages. If no logo is used, the WordPress site title will be used instead.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_home_logo',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Logo\'s Height in Pixels' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use this option to adjust the height of the logo in pixels. This is useful if the
											logo has been optimized for retina displays.' , 'roadrunners' ),
						'id'		=> 'roadrunners_home_logo_height',
						'std'		=> '',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Alt Text for the Home Page Logo' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter some alternate text for the logo (Optional)' , 'roadrunners' ),
						'id'		=> 'roadrunners_home_logo_alt_text',
						'std'		=> 'Your Home Page Website Logo',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Camera Flash Effect' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Check this if you want to have a camera flash effect in the background. Uses CSS3 animations.' , 'roadrunners' ),
						'id'		=> 'roadrunners_home_flashes',
						'std'		=> 1,
						'type'		=> 'checkbox'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Taglines' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Text for the First Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_01',
						'std'		=> 'Forming a new band? Well we can help you get you guys up and running!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Text for the Second Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_02',
						'std'		=> 'You can have quite a few Taglines here, so tell the world what you\'re all about!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Text for the Third Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_03',
						'std'		=> 'Lets Rock Together!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Text for the Fourth Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_04',
						'std'		=> 'Anyone who can appease a man\'s conscience can take his freedom away from him',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Text for the Fifth Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_05',
						'std'		=> 'Extraordinary men are always most tempted by the most ordinary things',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Text for the Sixth Tagline.' , 'roadrunners' ),
						'id'		=> 'roadrunners_tagline_06',
						'std'		=> 'You see, madness is a lot like gravity. All it takes is a little... Push',
						'type'		=> 'text'
				);

/**
 * Home Page Layout
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Layout' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Home Page Layout' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_home_layout_info',
						'std'		=> wp_kses_post( __( '<h3>Home Page Layout</h3><p>Version 1.2.0 of RoadRunners allows you to enable, disable and re-arrange each section on your homepage. Simply use the drag-and-drop interface below to get the layout you need. Note that any section in the "Disabled" column will not be deleted, just removed from the layout. You can re-add them at any time.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Edit Layout' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Highlight a block with your mouse cursor and then click and hold the button and drag it!', 'roadrunners' ),
						'id'		=> 'roadrunners_home_layout',
						'std'		=> $roadrunners_layout,
						'type' 		=> 'sorter'
				);
				
/**
 * Section - About Us
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'About Us Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'About Us Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_about_settings_info',
						'std'		=> wp_kses_post( __( '<h3>About Us - Section Settings</h3><p>Use this area to tell your visitors
											a little bit about yourself. It uses a three column layout with the middle
											box highlighted with the site\'s primary colour.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_heading_before',
						'std'		=> 'Get to Know',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_heading',
						'std'		=> 'About Us',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_heading_after',
						'std'		=> 'And More!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_tagline',
						'std'		=> 'A breif history of us and our plans for the future',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Left Column' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Heading Text. <span> tags can be used for highlighting.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_left_heading',
						'std'		=> '<span>Our</span> Achievements',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Body Text. Some HTML is allowed.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_left_body',
						'std'		=> '<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>',
						'type'		=> 'textarea'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Middle Column' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Heading Text.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_middle_heading',
						'std'		=> 'How we Formed',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Body Text. Some HTML is allowed.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_middle_body',
						'std'		=> '<p><strong>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</strong></p> <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate.</p>',
						'type'		=> 'textarea'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Right Column' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Heading Text. <span> tags can be used for highlighting.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_right_heading',
						'std'		=> '<span>Our</span> Future',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Body Text. Some HTML is allowed.' , 'roadrunners' ),
						'id'		=> 'roadrunners_about_right_body',
						'std'		=> '<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>',
						'type'		=> 'textarea'
				);

/**
 * Section - Events (Parallax)
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Events Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Events Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_events_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Events - Section Settings</h3><p>This section will
											display a short list of events (the first six) from your events
											post type, assuming you are using the RoadRunners Events &amp; Artists
											plugin.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Parallax Background Image' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use as the parallax background.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_events_background',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_events_heading_before',
						'std'		=> 'Upcoming',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_events_heading',
						'std'		=> 'Events',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_events_heading_after',
						'std'		=> 'to look forward to',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_events_tagline',
						'std'		=> 'Here\'s whats on the Horizon. It\'s gonna be a busy year!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Button URL' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the URL for the button at the bottom. This should ideally link to the Events archive page which can be created by adding a new page and selecting the "Page - Events Archive" page template.' , 'roadrunners' ),
						'id'		=> 'roadrunners_events_url',
						'std'		=> site_url(),
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Enable links to singular pages' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'You can use this option to enable or disable linking the events to their singular pages. Useful if you want to keep a minimal, one-page layout.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_events_links',
						'std' 		=> 1,
						'on'		=> esc_html__( 'Enabled' , 'roadrunners' ),
						'off'		=> esc_html__( 'Disabled' , 'roadrunners' ),
						'type' 		=> 'switch'
				);
				
/**
 * Section - Artists
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Artists Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Artists Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_artists_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Artists - Section Settings</h3><p>This section will
											display a list of posts from your artists
											post type, assuming you are using the RoadRunners Events &amp; Artists
											plugin.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_heading_before',
						'std'		=> 'All About',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_heading',
						'std'		=> 'The Artists',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_heading_after',
						'std'		=> 'We Represent',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_tagline',
						'std'		=> 'The artists we represent are incredibly talented!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Number of Posts to display' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use the slider to set the number of posts to display from the Artists post type.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_posts',
						'std'		=> '3',
						'min'		=> '0',
						'step'		=> '1',
						'max'		=> '10',
						'type'		=> 'sliderui'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Button URL' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the URL for the button at the bottom. This should ideally link to the Artist archive page which can be created by adding a new page and selecting the "Page - Artists Archive" page template.' , 'roadrunners' ),
						'id'		=> 'roadrunners_artists_url',
						'std'		=> site_url(),
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Enable links to singular pages' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'You can use this option to enable or disable linking the artists to their singular pages. Useful if you want to keep a minimal, one-page layout.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_artists_links',
						'std' 		=> 1,
						'on'		=> esc_html__( 'Enabled' , 'roadrunners' ),
						'off'		=> esc_html__( 'Disabled' , 'roadrunners' ),
						'type' 		=> 'switch'
				);

/**
 * Section - Testimonial (Parallax)
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Testimonial One Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Testimonial One Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_quote_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Testimonial One - Section Settings</h3><p>This is a simple section
											that divides up your content with a nice little testimonial from one
											of your visitors or clients.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Parallax Background Image' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use as the parallax background.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_quote_background',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Quote Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the main text for the testimonial.' , 'roadrunners' ),
						'id'		=> 'roadrunners_quote_text',
						'std'		=> 'We really enjoyed watching them play. Amazing Gig!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Quote Author' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter a name for the author.' , 'roadrunners' ),
						'id'		=> 'roadrunners_quote_author',
						'std'		=> 'Jordan Rudess',
						'type'		=> 'text'
				);

/**
 * Section - Custom Content
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Custom Content Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Custom Content Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_custom_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Custom Content - Section Settings</h3><p>In this section, you can use the
											content inserted into the post, this includes any Shortcodes you may be
											using.</p><p>To edit this content, simply edit the post content of the page that uses the "Home" page
											template.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_custom_heading_before',
						'std'		=> 'Why Not Put',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_custom_heading',
						'std'		=> 'Custom',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_custom_heading_after',
						'std'		=> 'Content Here?',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_custom_tagline',
						'std'		=> 'Use this section to insert content from the page\'s post',
						'type'		=> 'text'
				);
				
/**
 * Section - Testimonial Two (Parallax)
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Testimonial Two Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Testimonial Two Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_quote_two_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Testimonial Two - Section Settings</h3><p>This is a simple section
											that divides up your content with a nice little testimonial from one
											of your visitors or clients.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Parallax Background Image' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use as the parallax background.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_quote_two_background',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Quote Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the main text for the testimonial.' , 'roadrunners' ),
						'id'		=> 'roadrunners_quote_two_text',
						'std'		=> 'Awesome company, they organized everything for us. Highly rated!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Quote Author' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter a name for the author.' , 'roadrunners' ),
						'id'		=> 'roadrunners_quote_two_author',
						'std'		=> 'Jim Smith',
						'type'		=> 'text'
				);
				
/**
 * Section - Gallery
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Gallery Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Gallery Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_gallery_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Gallery - Section Settings</h3><p>This area is for 
											displaying a gallery of images from anything you want, perhaps
											from a recent music event. Add, remove, or re-order images
											by using the gallery options below.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_gallery_heading_before',
						'std'		=> 'Latest From',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_gallery_heading',
						'std'		=> 'The Gallery',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_gallery_heading_after',
						'std'		=> 'Take A Look',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_gallery_tagline',
						'std'		=> 'The best photos straight from our gallery',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Gallery Images' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use this option to add, delete or re-order the images in the gallery.' , 'roadrunners' ),
						'id'		=> 'roadrunners_gallery',
						'std'		=> '',
						'type'		=> 'slider'
				);

/**
 * Section - Blog (Parallax)
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Blog Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Blog Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_blog_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Blog - Section Settings</h3><p>This parallax section is used
											to display a list of regular posts from your WordPress blog.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Parallax Background Image' , 'roadrunners' ),
						'desc' 		=> esc_html__( 'Upload an image to use as the parallax background.' , 'roadrunners' ),
						'id' 		=> 'roadrunners_blog_background',
						'std' 		=> '',
						'type' 		=> 'upload'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_heading_before',
						'std'		=> 'Take a peek at',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_heading',
						'std'		=> 'Our Blog',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_heading_after',
						'std'		=> 'Keep up to date',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_tagline',
						'std'		=> 'Here\'s whats in the news lately...',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Number of Posts to display' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Use the slider to set the number of posts to display.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_posts',
						'std'		=> '3',
						'min'		=> '0',
						'step'		=> '1',
						'max'		=> '9',
						'type'		=> 'sliderui'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Button URL' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the URL for the button at the bottom. This should ideally link to the Blog overview page which is set in the Settings -&gt; Reading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_blog_url',
						'std'		=> site_url(),
						'type'		=> 'text'
				);
				
/**
 * Section - Contact
 * =========================================================================================================================================
 */			
$of_options[] = array( 	'name' 		=> esc_html__( 'Contact Section' , 'roadrunners' ),
						'type' 		=> 'heading'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Contact Settings Introduction' , 'roadrunners' ),
						'desc'		=> '',
						'id'		=> 'roadrunners_contact_settings_info',
						'std'		=> wp_kses_post( __( '<h3>Contact - Section Settings</h3><p>If you have the Contact Form 7
											plugin actived, you can configure your contact from using the plugin and
											insert the provided Shortcode in the box below to display a nice
											contact from.</p>' , 'roadrunners' ) ),
						'icon'		=> true,
						'type' 		=> 'info'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Heading Text' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Before Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_contact_heading_before',
						'std'		=> 'Got a Question?',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'Main Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_contact_heading',
						'std'		=> 'Contact Us',
						'type'		=> 'text'
				);
$of_options[] = array( 	'desc'		=> esc_html__( 'After Heading.' , 'roadrunners' ),
						'id'		=> 'roadrunners_contact_heading_after',
						'std'		=> 'And Get an Answer!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Tagline' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter text for the Tagline directly underneath the heading. If no text is entered, then it won\'t get used.' , 'roadrunners' ),
						'id'		=> 'roadrunners_contact_tagline',
						'std'		=> 'Send us your questions and wishes by filling out the form below!',
						'type'		=> 'text'
				);
$of_options[] = array( 	'name' 		=> esc_html__( 'Contact From 7 Shortcode' , 'roadrunners' ),
						'desc'		=> esc_html__( 'Enter the Shortcode to use as the contact form. This is configured using the Contact
											Form 7 WordPress plugin. After configuring your form, copy the generated 
											Shortcode and paste it here.' , 'roadrunners' ),
						'id'		=> 'roadrunners_contact_shortcode',
						'std'		=> '',
						'type'		=> 'textarea'
				);
				
} // End function: of_options()
} // End check if function exists: of_options()

?>