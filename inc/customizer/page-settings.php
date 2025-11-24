<?php
function wm_customizer_page_settings($wp_customize)
{
    $wp_customize->add_section(
        'page_settings_section',
        array(
            'title'    => 'Page Settings',
            'panel'    => 'global_settings_panel',
            'priority' => 20,
        )
    );
    $wp_customize->add_setting(
        'page_container_type',
        array(
            'default'   => 'container',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'page_container_type',
        array(
            'label'       => 'Container Type',
            'description' => 'Select the container type for the main page layout.',
            'section'     => 'page_settings_section',
            'type'        => 'select',
            'choices'     => array(
                'container'       => 'Default',
                'container-fluid' => 'Fluid',
                'container-sm'    => 'Small',
                'container-md'    => 'Medium',
                'container-lg'    => 'Large',
                'container-xl'    => 'Extra Large',
                'container-xxl'   => 'Extra Extra Large',
            ),
        )
    );
}
add_action('customize_register', 'wm_customizer_page_settings');
