<?php
function wm_customizer_layout($wp_customize)
{

    $wp_customize->add_section(
        'layout_section',
        array(
            'title'    => __('Layout'),
            'panel'    => 'global_settings_panel',
            'priority' => 3,
        )
    );

    $wp_customize->add_setting(
        'layout_setting',
        array(
            'default'   => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'layout_setting',
        array(
            'label'   => __('Layout'),
            'section' => 'layout_section',
            'type'    => 'textarea',
        )
    );
}
add_action('customize_register', 'wm_customizer_layout');
