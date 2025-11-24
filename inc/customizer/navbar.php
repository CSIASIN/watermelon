<?php
function wm_customizer_navbar($wp_customize)
{
    $wp_customize->add_section(
        'navbar_section',
        array(
            'title'    => __('Navbar Settings'),
            'panel'    => 'global_settings_panel',
            'priority' => 30,
        )
    );
    $wp_customize->add_setting(
        'navbar_design',
        array(
            'default'   => 'default',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'navbar_design',
        array(
            'label'       => __('Navbar Design'),
            'description' => __('Select the navbar design for the site.'),
            'section'     => 'navbar_section',
            'type'        => 'radio',
            'choices'     => array(
                'default'  => 'Default (Left Aligned)',
                'centered' => 'Centered Logo',
                'dark'     => 'Dark Mode',
            ),
        )
    );
}
add_action('customize_register', 'wm_customizer_navbar');
