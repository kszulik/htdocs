<?php

namespace Elementor;

function angel_elementor_init()
{
    Plugin::instance()->elements_manager->add_category(
        'angel',
        [
            'title' => __('Angel Elements', 'angel'),
            'icon' => 'eicon-font'
        ],
        1
    );


}

add_action('elementor/init', 'Elementor\angel_elementor_init');

