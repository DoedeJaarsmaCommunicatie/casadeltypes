<?php

namespace CasaDelTypes\Types;

use PostTypes\PostType;

abstract class Type
{
    /**
     * Holds the args to create the post type.
     *
     * @var array $args
     */
    protected $args = [];

    /**
     * Holds the settings prefix.
     *
     * @var string $setting_prefix
     */
    protected $setting_prefix;

    /**
     * Register this post type
     *
     * @return void
     */
    public function register(): void
    {
        $this->_register();
    }

    protected function _register(): void
    {
        $type = new PostType($this->args);


        $options = [];

        do_action("casadeltypes/types/{$type->name}/pre-register", $type);

        if (get_theme_mod($this->setting_name('slug'))) {
            $options ['rewrite'] = [
                'slug'  => get_theme_mod($this->setting_name('slug'))
            ];
        }

        if (get_theme_mod($this->setting_name('hierarchical'))) {
            $options ['hierarchical'] = true;
        }

        if (get_theme_mod($this->setting_name('supports'))) {
            $options['supports'] = get_theme_mod($this->setting_name('supports'));
        }

        if (get_theme_mod($this->setting_name('rest'))) {
            $options['show_in_rest'] = true;
        }

        $type->options((array) apply_filters("casadeltypes/types/{$type->name}/options", $options));

        if (get_theme_mod($this->setting_name('dashicon'))) {
            $type->icon('dashicons-' . get_theme_mod($this->setting_name('dashicon')));
        }

        $type->register();

        if (
            apply_filters("casadeltypes/types/{$type->name}/flush-rewrite", false)
             || get_theme_mod($this->setting_name('slug'))
        ) {
            $type->flush();
        }
    }

    protected function setting_name(string $setting)
    {
        return "cdelt_{$this->setting_prefix}_{$setting}";
    }
}
