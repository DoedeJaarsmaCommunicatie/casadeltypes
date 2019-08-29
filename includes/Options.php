<?php
namespace CasaDelTypes;

use CasaDelTypes\options\DomainOptions;
use CasaDelTypes\options\GrapeOptions;
use CasaDelTypes\options\RegionOptions;

class Options {
	
	public static $id = 'cdelt';
	
	public static $main_panel_id = 'cdelt_settings_main_panel';
	
	/**
	 * cdk_options constructor.
	 */
	public function __construct() {
		\Kirki::add_config(
			self::$id,
			[
				'capability'  => 'edit_theme_options',
				'option_type' => 'theme_mod',
			]
		);

		$this->register_panel();
		
		new RegionOptions();
		new DomainOptions();
		new GrapeOptions();
	}

	/**
	 * Registers the panel in the customizer
	 */
	private function register_panel():void {
		\Kirki::add_panel(
			self::$main_panel_id,
			[
				'priority'    => 160,
				'title'       => esc_html__( 'Wine Post Types Settings', 'casadeltypes' ),
				'description' => esc_html__( 'These settings make sure you get the most out of the Casadeltypes plugin', 'casadeltypes' ),
			]
		);
	}
}
