<?php

namespace CasaDelTypes\options;

use CasaDelTypes\Options;

class DomainOptions extends Option
{
    public function __construct()
    {
        $this->section_id = 'cdelt_settings_domain_section';
        $this->setting_prefix = 'domain';

        $this->register_section(
            __('Domain Settings', 'casadeltypes')
        );

        $this->register_controls();

        \Kirki::add_field(
            Options::$id,
            [
                'type'      => 'checkbox',
                'settings'  => $this->settings_name('domain_has_country'),
                'label'     => esc_html__('Add Country Taxonomy', 'casadeltypes'),
                'section'   => $this->section_id
            ]
        );
    }
}
