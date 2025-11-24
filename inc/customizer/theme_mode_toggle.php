<?php
function wm_customizer_theme_mode_toggle($wp_customize)
{
    $wp_customize->add_section(
        'theme_mode_section',
        array(
            'title'    => __('Theme Mode Switcher'),
            'panel'    => 'global_settings_panel',
            'priority' => 4,
        )
    );
    $wp_customize->add_setting(
        'theme_mode_setting',
        array(
            'default'   => true,
            'transport' => 'refresh',
        )
    );
    $wp_customize->add_control(
        'theme_mode_setting',
        array(
            'label'   => __('Dark/Light Theme Switcher'),
            'section' => 'theme_mode_section',
            'type'    => 'checkbox',
        )
    );
}
add_action('customize_register', 'wm_customizer_theme_mode_toggle');
