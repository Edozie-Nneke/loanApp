<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
	function chld_thm_cfg_locale_css($uri)
	{
		if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
			$uri = get_template_directory_uri() . '/rtl.css';
		return $uri;
	}
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
	function child_theme_configurator_css()
	{
		wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('responsive-style', 'icomoon-style'));
	}
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION

/**
 * ENQUEUE BOOTSTRAP 5
 */

function enqueue_bootstrap()
{
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css', array(), '5.0.0');
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js', array('jquery'), '5.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');


/**
 * ENQUEUE ALPINEJS
 */

function enqueue_alpine_js()
{
	wp_enqueue_script('alpine', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js');
}
add_action('wp_enqueue_scripts', 'enqueue_alpine_js');


/**
 * HANDLE DEFER ALPINEJS
 */

function defer_alpine_js($tag, $handle)
{
	if ('alpine' !== $handle) {
		return $tag;
	}

	return str_replace(' src', ' defer src', $tag);
}
add_filter('script_loader_tag', 'defer_alpine_js', 10, 2);

/**
 * INCLUDE API FILES
 */

include ABSPATH . 'wp-content/themes/responsive-child/api/signup_loan_user.php';



/**
 * HANDLE LOGIN TEXT CHANGE ON USER LOGIN
 */

function changeBtnTextOnUserLogin()
{

	if (is_user_logged_in()) {

		//change text to Logout
		return 'Sign out';
	} else {

		//change text to Login
		return 'Sign in';
	}
}
add_shortcode('changeBtnTextOnUserLogin', 'changeBtnTextOnUserLogin');

/**
 * HANDLE LOGIN LINK CHANGE ON USER LOGIN
 */

function changeBtnLinkOnUserLogin()
{
	$base_link = site_url();

	if (is_user_logged_in()) {

		return wp_logout_url(home_url());
	} else {

		return $base_link . '/index.php/sign-in/';
	}
}
add_shortcode('changeBtnLinkOnUserLogin', 'changeBtnLinkOnUserLogin');

/**
 * HANDLE CTA BUTTON TEXT CHANGE ON USER LOGIN
 */

function ctaBtnTextChangeOnUserLogin()
{

	if (is_user_logged_in()) {

		//change text to Logout
		return 'Get Loan';
	} else {

		//change text to Login
		return 'Create Account';
	}
}
add_shortcode('ctaBtnTextChangeOnUserLogin', 'ctaBtnTextChangeOnUserLogin');

/**
 * HANDLE CTA LINK CHANGE ON USER LOGIN
 */

function ctaBtnLinkChangeOnUserLogin()
{
	$base_link = site_url();

	if (is_user_logged_in()) {

		$base_link = site_url();

		return $base_link . '/index.php/get-loan/';
	} else {

		return $base_link . '/index.php/sign-up/';
	}
}
add_shortcode('ctaBtnLinkChangeOnUserLogin', 'ctaBtnLinkChangeOnUserLogin');
