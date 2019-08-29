<?php
namespace CasaDelTypes\options;

class DomainOptions extends Option {
	public function __construct() {
		$this->section_id = 'cdelt_settings_domain_section';
		$this->setting_prefix = 'domain';
		
		$this->register_section(
			__('Domain Settings', 'casadeltypes')
		);
		
		$this->register_controls();
	}
}
