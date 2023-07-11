<?php
function followandrew_theme_support()
{
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'followandrew_theme_support');





function followandrew_menus () {

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );


    register_nav_menus($locations);
}

add_action('init', 'followandrew_menus');
function followandrew_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('followandrew-fontawesome', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('followandrew-style', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array('followandrew-bootstrap'), '5.13.0', 'all');
    wp_enqueue_style('followandrew-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');


}

add_action('wp_enqueue_scripts', 'followandrew_register_styles');

function followandrew_register_scripts()
{
    wp_enqueue_script('followandrew-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('followandrew-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('followandrew-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script('followandrew-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);

}


add_action('wp_enqueue_scripts', 'followandrew_register_scripts');

function followandrew_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );
}


add_action('widgets_init', 'followandrew_widget_areas');

?>