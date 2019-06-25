<?php

use PostTypes\PostType;

class cdt_registers {

	/**
	 * cdt_registers constructor.
	 */
	public function __construct() {
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

		if ( get_theme_mod( 'cdelt_region_slug' ) ) {
			$region->options(
				[
					'rewrite' => [
						'slug' => get_theme_mod( 'cdelt_region_slug' ),
					],
				]
			);
		}

		if ( get_theme_mod( 'cdelt_region_hierarchical' ) ) {
			$region->options(
				[
					'hierarchical' => true,
				]
			);
		}

		if ( get_theme_mod( 'cdelt_region_dashicon' ) ) {
			$region->icon( 'dashicons-' . get_theme_mod( 'cdelt_region_dashicon' ) );
		}

		$region->register();
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
