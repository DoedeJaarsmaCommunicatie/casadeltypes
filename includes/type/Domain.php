<?php
namespace CasaDelTypes\Types;

class Domain extends Type {
	public function __construct() {
		$this->args = [
			'name'     => 'producent',
			'singular' => __('Producent', 'cdt'),
			'plural'   => __('Producenten', 'cdt'),
			'slug'     => __('producent', 'cdt'),
		];
		
		$this->setting_prefix = 'domain';
	}
}
