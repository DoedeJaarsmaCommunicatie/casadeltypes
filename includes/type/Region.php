<?php
namespace CasaDelTypes\Types;

/**
 * Class cdt_region
 */
class Region extends Type {
	public function __construct() {
		$this->args = [
			'name'     => 'streek',
			'singular' => __( 'Streek', 'cdt' ),
			'plural'   => __( 'Streken', 'cdt' ),
			'slug'     => __( 'streek', 'cdt' ),
		];
		
		$this->setting_prefix = 'region';
	}
}
