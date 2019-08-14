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

	/**
	 * Registers the region post type.
	 *
	 * @return void
	 */
	protected function register_region(): void {
		( new cdt_region() )->register();
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
