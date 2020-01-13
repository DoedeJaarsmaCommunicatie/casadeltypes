<?php

/**
 * This class registers the custom post types.
 *
 * @author Mitch Hijlkema
 * @package CasaDelTypes;
 */

namespace CasaDelTypes;

use CasaDelTypes\Types\Domain;
use CasaDelTypes\Types\Grape;
use CasaDelTypes\Types\Region;

/**
 * Class Registers
 *
 * @package CasaDelTypes
 */
class Registers
{
    /**
     * Cdt_registers constructor.
     */
    public function __construct()
    {
        add_action('after_setup_theme', [ $this, 'boot' ]);
    }

    /**
     * Boots the class.
     */
    public function boot()
    {
        $this->register_region();
        $this->register_domain();
        $this->register_grape();
    }

    /**
     * Registers the region post type.
     *
     * @return void
     */
    protected function register_region(): void
    {
        ( new Region() )->register();
    }

    /**
     * Registers the domain post type.
     *
     * @return void
     */
    protected function register_domain(): void
    {
        ( new Domain() )->register();
    }

    /**
     * Registers the grape post type.
     *
     * @return void
     */
    protected function register_grape(): void
    {
        ( new Grape() )->register();
    }
}
