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
            'default'   => '#673AB7',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'colors_setting',
            array(
                'label'   => __('Base Color'),
                'section' => 'colors_section',
                'settings' => 'colors_setting',
            )
        )
    );

    $wp_customize->add_control(
        'colors_setting_predefined',
        array(
            'label'    => __('Predefined Colors'),
            'section'  => 'colors_section',
            'settings' => 'colors_setting',
            'type'     => 'radio',
            'choices'  => array(
                '#673AB7' => '#673AB7',
                '#F44336' => '#F44336',
                '#2196F3' => '#2196F3',
                '#4CAF50' => '#4CAF50',
                '#FF9800' => '#FF9800',
                '#000000' => '#000000',
            ),
        )
    );
}
add_action('customize_register', 'wm_customizer_colors');
