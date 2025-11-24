<?php
function wm_customizer_header_js($wp_customize)
{

    $wp_customize->add_section(
        'header_js_section',
        array(
            'title'       => __('Header JavaScript'),
            'description' => esc_html__('Add custom JavaScript to the header.'),
            'panel'       => 'global_settings_panel',
            'priority'    => 1,
        )
    );

    $wp_customize->add_setting(
        'header_js_code',
        array(
            'default'   => '',
            'transport' => 'refresh',
            'type'      => 'theme_mod',
        )
    );

    $wp_customize->add_control(
        'header_js_code',
        array(
            'label'    => __('Header JavaScript Code'),
            'section'  => 'header_js_section',
            'type'     => 'textarea',
        )
    );
}
add_action('customize_register', 'wm_customizer_header_js');
