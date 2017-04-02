<?php

/*
Plugin Name: Abriendo Puertas Plugin
Description: Site Specific Plugin for Abriendo Puertas site.
Version:     1.0
Author:      11online
Author URI:  http://11online.us
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
/* Start Adding Functions Below this Line */


include_once dirname(__FILE__).'/resources.php';


/*
* CMB2
*/
//Require CMB2
if (file_exists(dirname(__FILE__).'/cmb2/init.php')) {
    require_once dirname(__FILE__).'/cmb2/init.php';
} elseif (file_exists(dirname(__FILE__).'/CMB2/init.php')) {
    require_once dirname(__FILE__).'/CMB2/init.php';
}


//* Remove worthless dashboard panels
function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
}

add_action( 'admin_init', 'remove_dashboard_meta' );


//* Remove welcome dashboard panel
function remove_welcome_panel() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    $user_id = get_current_user_id();
    if ( 0 !== get_user_meta( $user_id, 'show_welcome_panel', true ) ) {
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
}

add_action( 'load-index.php', 'remove_welcome_panel' );

//* Add "CPT" custom post type
function create_events_cpt() {

    $labels = array(
        'name'          => __( 'Events' ),
        'singular_name' => __( 'Event' )
    );

    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => true,
        'show_ui'      => true,
        'show_in_menu' => true,
        'rewrite'      => array( 'slug' => 'events' ),
        'supports'     => array( 'title', 'editor', 'genesis-seo', 'thumbnail', 'genesis-cpt-archives-settings' ),
        'taxonomies'  => array( 'category' )

    );

    register_post_type( 'events', $args );
}

add_action( 'init', 'create_events_cpt' );

//* Only show admin bar to admins
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');
