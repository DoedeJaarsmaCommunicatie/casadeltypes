<?php

use PostTypes\PostType;

/**
 * Class cdt_region
 */
class cdt_region {
	/**
	 * Registers the post type
	 *
	 * @return void
	 */
	public function register() {
		$this->_register();
	}

	private function _register() {
		$region = new PostType(
			[
				'name'     => 'streek',
				'singular' => __( 'Streek', 'cdt' ),
				'plural'   => __( 'Streken', 'cdt' ),
				'slug'     => __( 'streek', 'cdt' ),
			]
		);

		$option = [];

		if ( get_theme_mod( 'cdelt_region_slug' ) ) {
			$option ['rewrite'] = [
				'slug' => get_theme_mod( 'cdelt_region_slug' ),
			];
		}

		if ( get_theme_mod( 'cdelt_region_hierarchical' ) ) {
			$option['hierarchical'] = true;
		}

		if ( get_theme_mod( 'cdelt_region_supports' ) ) {
			$option['supports'] = get_theme_mod( 'cdelt_region_supports' );
		}

		if ( get_theme_mod( 'cdelt_region_rest' ) ) {
			$option['show_in_rest'] = get_theme_mod( 'cdelt_region_rest' );
		}

		$region->options( $option );

		if ( get_theme_mod( 'cdelt_region_dashicon' ) ) {
			$region->icon( 'dashicons-' . get_theme_mod( 'cdelt_region_dashicon' ) );
		}

		$region->register();

		if ( get_theme_mod( 'cdelt_region_slug' ) ) {
			$region->flush();
		}
	}
}
