<?php

use PostTypes\PostType;

class cdt_registers {

	/**
	 * Cdt_registers constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'boot' ] );
	}

	/**
	 * Boots the class.
	 */
	public function boot() {
		$this->register_region();
		$this->register_domain();
		$this->register_grape();
	}

	protected function register_region() {
		$region = new PostType(
			[
				'name'     => 'streek',
				'singular' => 'Streek',
				'plural'   => 'Streken',
				'slug'     => 'streek',
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

	protected function register_domain() {
		$domain = new PostType(
			[
				'name'     => 'producent',
				'singular' => 'Producent',
				'plural'   => 'Producenten',
				'slug'     => 'producent',
			]
		);

		$domain->register();
	}

	protected function register_grape() {
		$grape = new PostType(
			[
				'name'     => 'druif',
				'singular' => 'Druif',
				'plural'   => 'Druiven',
				'slug'     => 'druiven',
			]
		);

		$grape->register();
	}
}
