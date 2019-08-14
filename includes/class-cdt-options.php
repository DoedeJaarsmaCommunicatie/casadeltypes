<?php

class cdt_options {

	/**
	 * cdk_options constructor.
	 */
	public function __construct() {
		\Kirki::add_config(
			'cdelt',
			[
				'capability'  => 'edit_theme_options',
				'option_type' => 'theme_mod',
			]
		);

		$this->register_panel();
		$this->register_section();
		$this->register_controls();
	}

	/**
	 * Registers the panel in the customizer
	 */
	private function register_panel():void {
		\Kirki::add_panel(
			'cdelt_settings_main_panel',
			[
				'priority'    => 160,
				'title'       => esc_html__( 'Wine Post Types Settings', 'casadeltypes' ),
				'description' => esc_html__( 'These settings make sure you get the most out of the Casadeltypes plugin', 'casadeltypes' ),
			]
		);
	}

	/**
	 * Register the section for the customizer.
	 *
	 * @return void
	 */
	private function register_section(): void {
		\Kirki::add_section(
			'cdelt_settings_region_section',
			[
				'title'       => esc_html__( 'Region Settings', 'casadeltypes' ),
				'description' => esc_html__( 'Fill in the fields to use regions.', 'casadeltypes' ),
				'panel'       => 'cdelt_settings_main_panel',
				'priority'    => 10,
			]
		);
	}

	/**
	 * Register the controls for the customizer.
	 */
	private function register_controls(): void {
		\Kirki::add_field(
			'cdelt',
			[
				'type'     => 'multicheck',
				'settings' => 'cdelt_region_supports',
				'label'    => esc_html__( 'Supports', 'casadeltypes' ),
				'section'  => 'cdelt_settings_region_section',
				'priority' => 20,
				'choices'  => [
					'title'           => __( 'Title', 'casadeltypes' ),
					'editor'          => __( 'Editor', 'casadeltypes' ),
					'page-attributes' => __( 'Attributes', 'casadeltypes' ),
					'thumbnail'       => __( 'Thumbnail', 'casadeltypes' ),
				],
			]
		);

		\Kirki::add_field(
			'cdelt',
			[
				'type'     => 'checkbox',
				'settings' => 'cdelt_region_hierarchical',
				'label'    => esc_html__( 'Hierarchical', 'casadeltypes' ),
				'section'  => 'cdelt_settings_region_section',
				'priority' => 20,
			]
		);

		\Kirki::add_field(
			'cdelt',
			[
				'type'     => 'checkbox',
				'settings' => 'cdelt_region_rest',
				'label'    => esc_html__( 'Toon in rest API', 'casadeltypes' ),
				'section'  => 'cdelt_settings_region_section',
				'priority' => 20,
			]
		);

		\Kirki::add_field(
			'cdelt',
			[
				'type'     => 'dashicons',
				'settings' => 'cdelt_region_dashicon',
				'label'    => esc_html__( 'Menu icon', 'casadeltypes' ),
				'section'  => 'cdelt_settings_region_section',
				'priority' => 20,
			]
		);

		\Kirki::add_field(
			'cdelt',
			[
				'type'     => 'text',
				'settings' => 'cdelt_region_slug',
				'label'    => esc_html__( 'Slug', 'casadeltypes' ),
				'section'  => 'cdelt_settings_region_section',
				'priority' => 20,
			]
		);
	}
}
