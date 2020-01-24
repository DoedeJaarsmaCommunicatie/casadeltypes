<?php

namespace CasaDelTypes\Types;

use PostTypes\PostType;
use PostTypes\Taxonomy;

/**
 * Class cdt_region
 */
class Region extends Type
{
    public function __construct()
    {
        $this->args = [
            'name'     => 'streek',
            'singular' => __('Streek', 'cdt'),
            'plural'   => __('Streken', 'cdt'),
            'slug'     => __('streek', 'cdt'),
        ];

        $this->setting_prefix = 'region';

        add_action('casadeltypes/types/streek/pre-register', [ $this, 'generate_country']);
    }

    /**
     * @param PostType $type
     */
    public function generate_country($type): void
    {
        if (get_theme_mod($this->setting_name('streek_has_country'))) {
            $type->taxonomy('country');

            $country = new Taxonomy('country');
            $country->options([
                'show_in_rest'  => true,
                'rewrite' => [
                    'slug' => __('land')
                ]
            ]);
            $country->register();

            do_action("casadeltypes/type/{$type->name}/country/registered", $type);

            add_filter("casadeltypes/types/{$type->name}/options", function (array $options) {
                $options['rewrite']['slug'] = get_theme_mod($this->setting_name('slug')) . '/%country%';

                return $options;
            });

            add_filter('post_type_link', function ($post_link, $id = 0) {
                $post = get_post($id);
                if (is_object($post)) {
                    $terms = wp_get_object_terms($post->ID, 'country');
                    if ($terms) {
                        return str_replace('%country%', $terms[0]->slug, $post_link);
                    }
                }
                return $post_link;
            }, 1, 2);
        }
    }
}
