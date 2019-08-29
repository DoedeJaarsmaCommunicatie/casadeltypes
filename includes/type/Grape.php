<?php
namespace CasaDelTypes\Types;

class Grape extends Type {
	public function __construct() {
		$this->args = [
			'name'     => 'druif',
			'singular' => 'Druif',
			'plural'   => 'Druiven',
			'slug'     => 'druiven',
		];
		
		$this->setting_prefix = 'grape';
	}
}
