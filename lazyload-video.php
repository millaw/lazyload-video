<?php
/**
 * Plugin Name: LazyLoad Video
 * Plugin URI: https://github.com/millaw/lazyload-video
 * Description: A WordPress plugin to enable lazy loading for <video> elements using IntersectionObserver.
 * Version: 1.0
 * Author: Milla Wynn
 * Author URI: https://github.com/millaw
 * License: GPL2
 * Text Domain: lazyload-video
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue JavaScript for Lazy Loading
function lazyload_video_enqueue_scripts() {
    wp_enqueue_script(
        'lazyload-video-js',
        plugin_dir_url(__FILE__) . 'assets/lazyload-video.js',
        array(),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'lazyload_video_enqueue_scripts');

// Modify video shortcodes to use data-src instead of src
function modify_video_lazyload($html) {
    // Replace 'src' with 'data-src' to defer loading
    $html = preg_replace('/<video(.*?)src=/', '<video\1data-src=', $html);
    $html = preg_replace('/<source(.*?)src=/', '<source\1data-src=', $html);

    return wp_kses_post($html); // Sanitize the HTML
}
add_filter('wp_video_shortcode', 'modify_video_lazyload');
