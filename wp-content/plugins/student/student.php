<?php
/*
 * Plugin Name: Student
 * Description: Simple WordPress plugin.
 * Version: 1.0
 * Author: Nikolay
 * Text Domain: student
 */

if (!function_exists('add_action')) {
    echo 'Not allowed. Do not call me directly.';
    exit();
}

// Setup
define('STUDENT_PLUGIN_URL', __FILE__);

// Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/admin/init.php');
include('process/save-post.php');
include('process/filter-content.php');
include('process/student-shortcode.php');

// Hooks
register_activation_hook(__FILE__, 'nnk_activate_plugin');
add_action('init', 'student_init');
add_action('admin_init', 'student_admin_init');
add_action('save_post_student', 'nnk_save_post_admin', 10, 3);
add_filter('template_include', 'nnk_include_single_template', 1);

/// Shortcodes
add_shortcode('student_listing', 'nnk_student_render');
