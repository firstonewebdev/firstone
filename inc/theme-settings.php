<?php

function firstone_settings_page() 
{
    $page_title = 'first one Settings';
    $menu_title = 'first one';
    $capability = 'edit_posts';
    $menu_slug = 'firstone-settings_page';
    $function = 'firstone_settings_display';
    $icon_url = '';
    $position = 99;

    //add_menu_page ( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_theme_page ( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action ('admin_menu', 'firstone_settings_page');

//==========================================
// options page
//==========================================
function firstone_settings_display()
{
	echo '<h1>first one Settings</h1>';
	echo '<hr>';
}
