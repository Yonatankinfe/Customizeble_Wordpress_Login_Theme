<?php
// Add dynamic title
function title() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'title');

// Register customization for button color
function custom_theme_customize_register($wp_customize) {
    // Add section for button settings
    $wp_customize->add_section('button_settings', array(
        'title' => __('Button Settings', 'custom-theme'),
        'priority' => 30,
    ));

    // Add setting for button color
    $wp_customize->add_setting('button_color', array(
        'default' => '#0056b3',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color', // Sanitize hex color
    ));

    // Add control for button color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'button_color',
            array(
                'label' => __('Button Color', 'custom-theme'),
                'section' => 'button_settings', // Assign control to the newly created section
            )
        )
    );

    // Add setting for login heading text
    $wp_customize->add_setting('login_heading_text', array(
        'default' => 'Login',
        'transport' => 'refresh',
    ));

    // Add control for login heading text
    $wp_customize->add_control('login_heading_text', array(
        'label' => __('Login Heading Text', 'custom-theme'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));
}
add_action('customize_register', 'custom_theme_customize_register');

// Setup theme support
function custom_theme_setup() {
    add_theme_support('custom-fonts');
    add_theme_support('custom-background');
}
add_action('after_setup_theme', 'custom_theme_setup');

function custom_login_redirect($redirect_to, $request, $user) {
    // Check if the user is logging in from the login page
    if (isset($request['redirect_to'])) {
        // Redirect the user to the desired location after login
        $redirect_to = home_url('/wordpress/wp-content/themes/wordpress_themes/index.php');
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);
