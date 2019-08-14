<?php
/**
 * This class registers the custom post types.
 *
 * @author Mitch Hijlkema
 * @package CasaDelTypes;
 */
namespace CasaDelTypes;

use CasaDelTypes\Types\Region;
use PostTypes\PostType;

/**
 * Class Registers
 *
 * @package CasaDelTypes
 */
class Registers {
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
		( new Region() )->register();
	}

	/**
	 * Registers the domain post type.
	 *
	 * @return void
	 */
	protected function register_domain(): void {
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

	/**
	 * Registers the grape post type.
	 *
	 * @return void
	 */
	protected function register_grape(): void {
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
