<?php

namespace CasaDelTypes\Types;

use PostTypes\PostType;

class Grape extends Type
{
    public function __construct()
    {
        $this->args = [
            'name'     => 'druif',
            'singular' => 'Druif',
            'plural'   => 'Druiven',
            'slug'     => 'druiven',
        ];

        $this->setting_prefix = 'grape';

        add_action('casadeltypes/types/druif/pre-register', [$this, 'generate_country']);
    }

    /**
     * @param PostType $type
     */
    public function generate_country($type): void
    {
        if (get_theme_mod($this->setting_name('grape_has_country'))) {
            $type->taxonomy('country');
            do_action("casadeltypes/type/{$type->name}/country/registered", $type);
        }
    }
}
