<?php

function wm_customizer_colors($wp_customize)
{

    $wp_customize->add_section(
        'colors_section',
        array(
            'title'    => __('Colors'),
            'panel'    => 'global_settings_panel',
            'priority' => 6,
        )
    );

    $wp_customize->add_setting(
        'colors_setting',
        array(
            'default'   => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'colors_setting',
        array(
            'label'   => __('Colors'),
            'section' => 'colors_section',
            'type'    => 'textarea',
        )
    );
}

add_action('customize_register', 'wm_customizer_colors');
