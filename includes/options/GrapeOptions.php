<?php

namespace CasaDelTypes\options;

use CasaDelTypes\Options;

class GrapeOptions extends Option
{
    public function __construct()
    {
        $this->section_id = 'cdelt_settings_grape_section';
        $this->setting_prefix = 'grape';

        $this->register_section(
            __('Grape Settings', 'casadeltypes')
        );

        $this->register_controls();

        \Kirki::add_field(
            Options::$id,
            [
                'type'      => 'checkbox',
                'settings'  => $this->settings_name('grape_has_country'),
                'label'     => esc_html__('Add Country Taxonomy', 'casadeltypes'),
                'section'   => $this->section_id
            ]
        );
    }
}
