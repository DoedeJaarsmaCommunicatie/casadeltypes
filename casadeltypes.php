<?php
/**
 * Plugin Name:     Casadeltypes
 * Plugin URI:      https://casadelvino.nl/
 * Description:     This plugin adds the custom post types used by Casa del Vino et al.
 * Author:          Mitch Hijlkema
 * Author URI:      https://doedejaarsma.nl/
 * Text Domain:     casadeltypes
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Casadeltypes
 */

// Your code starts here.

require_once __DIR__ . '/vendor/autoload.php';

add_filter( 'kirki_telemetry', '__return_false' );

new cdt_options();
new cdt_registers();
