<?php

function wm_customizer_responsive($wp_customize)
{

    $wp_customize->add_section(
        'responsive_section',
        array(
            'title'    => __('Responsive'),
            'panel'    => 'global_settings_panel',
            'priority' => 5,
        )
    );

    $wp_customize->add_setting(
        'responsive_setting',
        array(
            'default'   => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'responsive_setting',
        array(
            'label'   => __('Responsive'),
            'section' => 'responsive_section',
            'type'    => 'textarea',
        )
    );
}

add_action('customize_register', 'wm_customizer_responsive');
