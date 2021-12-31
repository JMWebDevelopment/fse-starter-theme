<?php
/**
 * FSE starter themes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FSE Starter Theme
 * @since 1.0
 */


if ( ! function_exists( 'fse_starter_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function fse_starter_theme_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css', 'https://fonts.googleapis.com/css2?family=Montserrat+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap' );

	}

endif;

add_action( 'after_setup_theme', 'fse_starter_theme_support' );

if ( ! function_exists( 'fse_starter_theme_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function fse_starter_theme_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'fse_starter_theme-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'fse_starter_theme-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'fse_starter_theme_styles' );

if ( ! function_exists( 'fse_starter_theme_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function fse_starter_theme_preload_webfonts() {
		?>
		<link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat+Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'fse_starter_theme_preload_webfonts' );

// Add block patterns
//require get_template_directory() . '/inc/block-patterns.php';
