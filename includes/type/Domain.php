<?php

namespace CasaDelTypes\Types;

use PostTypes\PostType;

class Domain extends Type
{
    public function __construct()
    {
        $this->args = [
            'name'     => 'producent',
            'singular' => __('Producent', 'cdt'),
            'plural'   => __('Producenten', 'cdt'),
            'slug'     => __('producent', 'cdt'),
        ];

        $this->setting_prefix = 'domain';

        add_action('casadeltypes/types/producent/pre-register', [$this, 'generate_country']);
    }

    /**
     * @param PostType $type
     */
    public function generate_country($type): void
    {
        if (get_theme_mod($this->setting_name('domain_has_country'))) {
            $type->taxonomy('country');
            do_action("casadeltypes/type/{$type->name}/country/registered", $type);
        }
    }
}
