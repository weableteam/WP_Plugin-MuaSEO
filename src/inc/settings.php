<?php
add_action('admin_menu', 'muaseo_menu');
function muaseo_menu() {
    add_menu_page(
        'MuaSeo Configs',     
        'MuaSeo Configs',         
        'manage_options',   
        'muaseo-settings',   
        'muaseo_settings_page',
        'dashicons-businessman',
        60
    );
}
function muaseo_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    include_once MUASEO_PATH . '/src/templates/admin-settings.php';
}