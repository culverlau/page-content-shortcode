<?php
/*
Plugin Name: Page Content Shortcode
Plugin URI:     https://github.com/culverlau/page-content-shortcode
Description: A simple shortcode to display the content of another page, by slug. As simple as [show-page path="category/slug"]
Version: 1.0
Author: Culver Lau
Author URI: https://www.culverlau.com
License: GPL v2 or later
 */

function show_page_content($atts = array())
{

    // set up default parameters
    extract(shortcode_atts(array(
        'path' => null)
        , $atts));

    $post = get_page_by_path($path);
    if ($post) {
        $content = apply_filters('the_content', $post->post_content);
        return $content;
    } else {
        return 'path not found';
    }
}

add_shortcode('show-page', 'show_page_content');
