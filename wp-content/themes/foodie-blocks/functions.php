<?php
/**
 * This file adds functions to the Foodie Blocks WordPress theme.
 *
 * @package Foodie Blocks
 * @author  WPZOOM
 * @license GNU General Public License v2 or later
 * @link    https://www.wpzoom.com/
 */

/**
 * Define Constants
 */
define( 'FOODIE_BLOCKS_THEME_DIR', trailingslashit( get_template_directory() ) );

/**
 * Enqueues scripts and styles
 */
require FOODIE_BLOCKS_THEME_DIR . 'inc/classes/class-foodie-blocks-enqueue-scripts.php';


/**
 * Theme admin notices and info page
 */
if ( is_admin() ) {
    require FOODIE_BLOCKS_THEME_DIR . 'inc/admin-notice.php';
    require FOODIE_BLOCKS_THEME_DIR . 'inc/theme-info-page.php';

    if ( current_user_can( 'manage_options' ) ) {
        require FOODIE_BLOCKS_THEME_DIR . 'inc/classes/class-foodie-blocks-notices.php';
        require FOODIE_BLOCKS_THEME_DIR . 'inc/classes/class-foodie-blocks-notice-review.php';
    }
}


if ( ! function_exists( 'foodie_blocks_setup' ) ) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function foodie_blocks_setup() {

        // Make theme available for translation.
        load_theme_textdomain( 'foodie-blocks', get_template_directory() . '/languages' );

        // Enqueue editor styles and fonts.
        add_editor_style(
            array(
                './style.css',
            )
        );

        // Remove core block patterns.
        remove_theme_support( 'core-block-patterns' );

        register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'foodie-blocks' ) ) );


    }
}
add_action( 'after_setup_theme', 'foodie_blocks_setup' );


// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'foodie_blocks_enqueue_style_sheet' );
function foodie_blocks_enqueue_style_sheet() {

    wp_enqueue_style( 'foodie-blocks', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

}


/**
 * Register block styles.
 *
 * @since 1.0.0
 */
function foodie_blocks_register_block_styles() {

    $block_styles = array(
        'core/group'           => array(
            'shadow'       => __( 'Shadow', 'foodie-blocks' ),
            'border' => __( 'Border', 'foodie-blocks' ),
            'full-height'  => __( 'Full-height', 'foodie-blocks' ),
            'round-corners'       => __( 'Rounded', 'foodie-blocks' ),
            'round-top'       => __( 'Rounded Top', 'foodie-blocks' ),
            'round-bottom'       => __( 'Rounded Bottom', 'foodie-blocks' ),
        ),
        'core/cover'           => array(
            'round-corners'       => __( 'Rounded', 'foodie-blocks' ),
            'round-top'       => __( 'Rounded Top', 'foodie-blocks' ),
            'round-bottom'       => __( 'Rounded Bottom', 'foodie-blocks' ),
        ),
        'core/column'           => array(
            'shadow'       => __( 'Shadow', 'foodie-blocks' ),
            'border' => __( 'Border', 'foodie-blocks' ),
            'pull-right'  => __( 'Pull right', 'foodie-blocks' ),
            'pull-left'  => __( 'Pull left', 'foodie-blocks' ),
            'round-corners'       => __( 'Rounded', 'foodie-blocks' ),
        ),
        'core/image'           => array(
            'shadow' => __( 'Shadow', 'foodie-blocks' ),
        ),
        'core/list'            => array(
            'no-disc' => __( 'No Disc', 'foodie-blocks' ),
        ),
        'core/media-text'      => array(
            'shadow-media' => __( 'Shadow', 'foodie-blocks' ),
        ),
        'core/navigation-link' => array(
            'fill'         => __( 'Fill', 'foodie-blocks' ),
            'fill-background'    => __( 'Fill Background', 'foodie-blocks' ),
            'outline'      => __( 'Outline', 'foodie-blocks' ),
            'outline-background' => __( 'Outline Background', 'foodie-blocks' ),
        ),
    );

    foreach ( $block_styles as $block => $styles ) {
        foreach ( $styles as $style_name => $style_label ) {
            register_block_style(
                $block,
                array(
                    'name'  => $style_name,
                    'label' => $style_label,
                )
            );
        }
    }
}
add_action( 'init', 'foodie_blocks_register_block_styles' );

/**
 * Registers block categories, and type.
 *
 * @since 1.0
 */
function foodie_blocks_register_block_pattern_categories() {

    /* Functionality specific to the Block Pattern Explorer plugin. */
    if ( function_exists( 'register_block_pattern_category_type' ) ) {
        register_block_pattern_category_type( 'foodie-blocks', array( 'label' => __( 'foodie-blocks', 'foodie-blocks' ) ) );
    }

    $block_pattern_categories = array(
        'foodie-blocks-header'  => array(
            'label'         => __( 'Header', 'foodie-blocks' ),
            'categoryTypes' => array( 'foodie-blocks' ),
        ),
        'foodie-blocks-footer'  => array(
            'label'         => __( 'Footer', 'foodie-blocks' ),
            'categoryTypes' => array( 'foodie-blocks' ),
        ),
        'foodie-blocks-general'   => array(
            'label'         => __( 'Sections', 'foodie-blocks' ),
            'categoryTypes' => array( 'foodie-blocks' ),
        ),
        'foodie-blocks-page'    => array(
            'label'         => __( 'Pages', 'foodie-blocks' ),
            'categoryTypes' => array( 'foodie-blocks' ),
        ),
        'foodie-blocks-query'   => array(
            'label'         => __( 'Blog Posts', 'foodie-blocks' ),
            'categoryTypes' => array( 'foodie-blocks' ),
        ),
    );

    foreach ( $block_pattern_categories as $name => $properties ) {
        register_block_pattern_category( $name, $properties );
    }
}
add_action( 'init', 'foodie_blocks_register_block_pattern_categories', 9 );



/* Add the link to the Customizer */
add_action('customize_register', function ( $manager ) {  },  10, 1 );

function foodie_get_custom_typography() {

	$font_families = array();

	$args = array(
		'post_type'      => 'wp_global_styles',
		'posts_per_page' => 1,
	);
	
	$get_custom_styles = get_posts( $args );
	
	if( !empty( $get_custom_styles ) ) {
		
		$styles = $get_custom_styles[0]->post_content;
		$styles = json_decode( $styles, true );
		$font_families = foodie_extract_font_families( $styles );
	}

	return $font_families;

}

function foodie_extract_font_families( $data = array() ) {

	if( empty( $data ) ) {
		return array();
	}

	$pattern  = '/var:preset\|font-family\|([^|]+)/';
	$pattern2 = '/var\(--wp--preset--font-family--(\w+)\)/';
	$preset_patern = 'var(--wp--preset--font-family--';

	$font_families = $matches = $matches2 = array();

	foreach ( $data as $key => $value ) {
        
		if( $key === 'fontFamily') {

			if ( strpos( $value, $preset_patern ) !== false ) {
				if ( preg_match( $pattern2, $value, $matches2 ) ) {
					$value = $matches2[1];
					$font_families[] = $value;	
				}
			} else {
				if( preg_match_all( $pattern, $value, $matches ) ) {
					$value = end( $matches[1] );
				}
				$font_families[] = $value;
			}
		} elseif ( is_array( $value ) ) {
			$font_families = array_merge( $font_families, foodie_extract_font_families( $value ) );
        }
    }

	$font_families = array_unique( $font_families );

	return $font_families;
}


/**
* Enqueue theme fonts.
*/
function foodie_blocks_theme_fonts() {
	
	$theme_fonts_url             = foodie_blocks_get_fonts_url();
	$theme_fonts_url_for_editor  = foodie_blocks_get_fonts_url( true );

    // Load Fonts if necessary.
    if ( $theme_fonts_url ) {
        
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
        
		wp_enqueue_style( 'foodie-theme-fonts', wptt_get_webfont_url( $theme_fonts_url ), array(), wp_get_theme()->get( 'Version' ) );
		
		add_editor_style( $theme_fonts_url_for_editor );

    }

}
add_action( 'admin_init', 'foodie_blocks_theme_fonts', 1 );
add_action( 'wp_enqueue_scripts', 'foodie_blocks_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'foodie_blocks_theme_fonts', 1 );

/*
 * Gutenberg Editor CSS
 *
 * Load a stylesheet for customizing the Gutenberg editor
 * including support for Google Fonts and @import rules.
 */
function foodie_blocks_gutenberg_editor_css() {
  
  wp_enqueue_style( 'foodie-theme-editor-css', get_stylesheet_directory_uri() . '/assets/admin/css/editor-google-fonts.css', array(), wp_get_theme()->get( 'Version' ) );

}
add_action( 'enqueue_block_editor_assets', 'foodie_blocks_gutenberg_editor_css' );


/**
 * Retrieve webfont URL to load fonts locally.
 */
function foodie_blocks_get_fonts_url( $all = false )  {

	//Set default theme typography font families
	$theme_default_typo = array(
		'inter',
		'outfit',
		'cormorant-garamond',
		'dm-sans'
	);

	$fonts_to_download = array();

    $font_families = array(
        'alegreya'           => 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
        'archivo'            => 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'bitter'             => 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'cormorant-garamond' => 'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
        'crimson-pro'        => 'Crimson+Pro:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600',
        'dm-sans'            => 'DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700',
        'epilogue'           => 'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'figtree'            => 'Figtree:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'ibm-plex-mono'      => 'IBM+Plex+Mono:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
        'ibm-plex-sans'      => 'IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
        'inter'              => 'Inter:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'josefin-sans'       => 'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
        'jost'               => 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'krona-one'          => 'Krona+One',
        'lexend'             => 'Lexend:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'libre-baskerville'  => 'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
        'libre-franklin'     => 'Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'lora'               => 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
        'manrope'            => 'Manrope:wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800',
        'merriweather'       => 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
        'montserrat'         => 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'mulish'             => 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
        'nunito'             => 'Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
        'open-sans'          => 'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
        'oswald'             => 'Oswald:wght@0,200;0,300;0,400;0,500;0,600;0,700',
        'outfit'             => 'Outfit:wght@100;200;300;400;500;600;700;800;900',
        'philosopher'        => 'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
        'playfair-display'   => 'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
        'poppins'            => 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'quicksand'          => 'Quicksand:wght@0,300;0,400;0,500;0,600;0,700',
        'raleway'            => 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'roboto'             => 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        'roboto-condensed'   => 'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
        'rubik'              => 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'source-sans-pro'    => 'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
        'source-serif-pro'   => 'Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
        'space-grotesk'      => 'Space+Grotesk:wght@0,300;0,400;0,500;0,600;0,700',
        'syne'               => 'Syne:wght@0,400;0,500;0,600;0,700;0,800,1,400;1,500;1,600;1,700;1,800',
        'urbanist'           => 'Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'work-sans'          => 'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'yeseva-one'         => 'Yeseva+One'
    );

	//Get user's saved custom typography
	$user_custom_typo = foodie_get_custom_typography();
	
	//Combine default and custom typography
	$theme_custom_typo = array_merge( $user_custom_typo, $theme_default_typo );
	
	$theme_custom_typo = array_unique( $theme_custom_typo );

	if( !empty( $theme_custom_typo ) ) {

		foreach( $theme_custom_typo as $value ) {
			$fonts_to_download[] = isset( $font_families[ $value ] ) ? $font_families[ $value ] : '';
		}

		if( $all ) {
			$fonts_to_download = $font_families;
		}

		$query_args = array(
			'family'  => implode( '|', $fonts_to_download ),
			'subset'  => urlencode( 'latin,latin-ext' ),
			'display' => urlencode( 'swap' ),
		);
	
		return apply_filters( 'foodie_blocks_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
	
	}

	return $fonts_to_download;

}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'foodie_blocks_register_required_plugins' );



/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function foodie_blocks_register_required_plugins() {


    $recipe_card_plugin = array(
        'name'         => 'Recipe Card Blocks',
        'slug'         => 'recipe-card-blocks-by-wpzoom',
        'required'     => false
    );

    if ( class_exists( 'WPZOOM_Recipe_Card_Block_Gutenberg' ) ) {

        if ( WPZOOM_Recipe_Card_Block_Gutenberg::has_pro() ) {

            $recipe_card_plugin = array(
                'name'         => 'Recipe Card Blocks PRO',
                'slug'         => 'recipe-card-blocks-by-wpzoom-pro',
                'required'     => false
            );

        }

    }

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        $recipe_card_plugin,


        // Recommended plugins from the WordPress Plugin Repository.
        array(
            'name'         => 'The Icon Block',
            'slug'         => 'icon-block',
            'required'     => true,
        ),

        array(
            'name'         => 'Breadcrumb Block',
            'slug'         => 'breadcrumb-block',
            'required'     => true,
        ),

        array(
            'name'         => 'Social Sharing Block',
            'slug'         => 'social-sharing-block',
            'required'     => true,
        ),

        array(
            'name'         => 'Instagram Widget by WPZOOM',
            'slug'         => 'instagram-widget-by-wpzoom',
            'required'     => false,
        ),

        array(
            'name'         => 'Video Popup Block by WPZOOM',
            'slug'         => 'wpzoom-video-popup-block',
            'required'     => false,
        ),


    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'foodie-blocks',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}


// Add the markup for the search form
function add_search_form_markup() {

        ?>
            <div id="mpopupBox" class="mpopup">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="wpz-search-close">×</span>
                    </div>
                    <div class="modal-body">

                        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
                            <label for="wpz-search" class="wp-block-search__label screen-reader-text">Search</label>

                            <div class="wp-block-search__inside-wrapper ">

                                <input type="search" id="wpz-search" class="wp-block-search__input" name="s" placeholder="<?php _e('Enter your keywords...', 'foodie-blocks') ?>" required=""><button type="submit" class="wp-block-search__button has-icon wp-element-button" aria-label="Search"><svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                                            <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
                                        </svg></button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

     <?php

}

add_action('wp_footer', 'add_search_form_markup');
