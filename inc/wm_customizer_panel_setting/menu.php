<?php
function wm_customizer_menu($wp_customize)
{

    $wp_customize->add_section(
        'menu_section',
        array(
            'title'    => __('Menu'),
            'panel'    => 'global_settings_panel',
            'priority' => 7,
        )
    );

    $wp_customize->add_setting(
        'menu_setting',
        array(
            'default'   => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'menu_setting',
        array(
            'label'   => __('Menu'),
            'section' => 'menu_section',
            'type'    => 'textarea',
        )
    );
}
add_action('customize_register', 'wm_customizer_menu');
