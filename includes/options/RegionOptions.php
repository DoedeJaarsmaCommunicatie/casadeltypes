<?php
namespace CasaDelTypes\options;

class RegionOptions extends Option {
	public function __construct() {
		$this->section_id = 'cdelt_settings_region_section';
		$this->setting_prefix = 'region';
		
		$this->register_section(
			__('Region Settings', 'casadeltypes')
		);
		
		$this->register_controls();
	}
}
