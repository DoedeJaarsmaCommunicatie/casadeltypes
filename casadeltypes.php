<?php
/**
 * Plugin Name:     Casadeltypes
 * Plugin URI:      https://casadelvino.nl/
 * Description:     This plugin adds the custom post types used by Casa del Vino et al.
 * Author:          Mitch Hijlkema
 * Author URI:      https://doedejaarsma.nl/
 * Text Domain:     casadeltypes
 * Domain Path:     /languages
 * Version:         1.2.1
 *
 * @package         Casadeltypes
 */

if ( ! defined( 'WPINC' ) ) {
	die( 'No script kiddies.' );
}

define( 'CDTYPES_VERSION', '1.2.1' );

define( 'CDTYPES_PLUGIN_FILE', __FILE__ );

require_once __DIR__ . '/vendor/autoload.php';

$my_update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/DoedeJaarsmaCommunicatie/casadeltypes/',
	__FILE__,
	'casadeltypes'
);

add_filter( 'kirki_telemetry', '__return_false' );

$plugin = new \CasaDelTypes\Plugin();
$plugin->init();
