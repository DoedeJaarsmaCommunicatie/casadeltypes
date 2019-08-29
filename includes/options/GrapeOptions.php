<?php
namespace CasaDelTypes\options;

class GrapeOptions extends Option {
	public function __construct() {
		$this->section_id = 'cdelt_settings_grape_section';
		$this->setting_prefix = 'grape';
		
		$this->register_section(
			__('Grape Settings', 'casadeltypes')
		);
		
		$this->register_controls();
	}
}
