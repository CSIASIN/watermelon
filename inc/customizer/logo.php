<?php
function wm_customizer_logo($wp_customize)
{

    $wp_customize->add_section(
        'logo_section',
        array(
            'title'    => __('Logo'),
            'panel'    => 'global_settings_panel',
            'priority' => 8,
        )
    );

    $wp_customize->add_setting(
        'logo_setting',
        array(
            'default'   => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'logo_setting',
        array(
            'label'   => __('Logo'),
            'section' => 'logo_section',
            'type'    => 'textarea',
        )
    );
}
add_action('customize_register', 'wm_customizer_logo');
