<?php
function wm_customizer_footer_js($wp_customize)
{

    $wp_customize->add_section(
        'footer_js_section',
        array(
            'title'       => __('Footer JavaScript'),
            'description' => esc_html__('Add custom JavaScript to the footer.'),
            'panel'       => 'global_settings_panel',
            'priority'    => 2,
        )
    );

    $wp_customize->add_setting(
        'footer_js_code',
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'footer_js_code',
        array(
            'label'    => __('Footer JavaScript Code'),
            'section'  => 'footer_js_section',
            'type'     => 'textarea',
        )
    );
}
add_action('customize_register', 'wm_customizer_footer_js');
