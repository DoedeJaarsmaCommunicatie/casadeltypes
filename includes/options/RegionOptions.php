<?php

namespace CasaDelTypes\options;

use CasaDelTypes\Options;

class RegionOptions extends Option
{
    public function __construct()
    {
        $this->section_id = 'cdelt_settings_region_section';
        $this->setting_prefix = 'region';

        $this->register_section(
            __('Region Settings', 'casadeltypes')
        );


        $this->register_controls();

        \Kirki::add_field(
            Options::$id,
            [
                'type'      => 'checkbox',
                'settings'  => $this->settings_name('streek_has_country'),
                'label'     => esc_html__('Add Country Taxonomy', 'casadeltypes'),
                'section'   => $this->section_id
            ]
        );
    }
}
