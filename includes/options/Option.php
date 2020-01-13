<?php

namespace CasaDelTypes\options;

use CasaDelTypes\Options;

abstract class Option
{
    protected $section_id;
    protected $setting_prefix;

    /**
     * Registers controls for this setting type.
     */
    protected function register_controls(): void
    {
        \Kirki::add_field(
            Options::$id,
            [
                'type'     => 'multicheck',
                'settings' => $this->settings_name('supports'),
                'label'    => esc_html__('Supports', 'casadeltypes'),
                'section'  => $this->section_id,
                'priority' => 20,
                'choices'  => [
                    'title'           => __('Title', 'casadeltypes'),
                    'editor'          => __('Editor', 'casadeltypes'),
                    'page-attributes' => __('Attributes', 'casadeltypes'),
                    'thumbnail'       => __('Thumbnail', 'casadeltypes'),
                    'excerpt'         => __('Excerpt', 'casadeltypes'),
                ],
            ]
        );

        \Kirki::add_field(
            Options::$id,
            [
                'type'     => 'checkbox',
                'settings' => $this->settings_name('hierarchical'),
                'label'    => esc_html__('Hierarchical', 'casadeltypes'),
                'section'  => $this->section_id,
                'priority' => 20,
            ]
        );

        \Kirki::add_field(
            Options::$id,
            [
                'type'     => 'checkbox',
                'settings' => $this->settings_name('rest'),
                'label'    => esc_html__('Toon in rest API', 'casadeltypes'),
                'section'  => $this->section_id,
                'priority' => 20,
            ]
        );

        \Kirki::add_field(
            Options::$id,
            [
                'type'     => 'dashicons',
                'settings' => $this->settings_name('dashicon'),
                'label'    => esc_html__('Menu icon', 'casadeltypes'),
                'section'  => $this->section_id,
                'priority' => 20,
            ]
        );

        \Kirki::add_field(
            Options::$id,
            [
                'type'     => 'text',
                'settings' => $this->settings_name('slug'),
                'label'    => esc_html__('Slug', 'casadeltypes'),
                'section'  => $this->section_id,
                'priority' => 20,
            ]
        );
    }

    public function register_section(string $title, string $description = '', int $priority = 10): void
    {
        \Kirki::add_section(
            $this->section_id,
            [
                'title'         => $title,
                'description'   => $description,
                'panel'         => Options::$main_panel_id,
                'priority'      => $priority
            ]
        );
    }

    protected function settings_name(string $setting): string
    {
        return "cdelt_{$this->setting_prefix}_{$setting}";
    }

    /**
     * @return mixed
     */
    public function getSectionId()
    {
        return $this->section_id;
    }

    /**
     * @return mixed
     */
    public function getSettingPrefix()
    {
        return $this->setting_prefix;
    }
}
