<?php
 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	

	// Links settings
    $name = 'theme_screenreader/navbar_enabled';
    $title = get_string('setting-navbar_enabled', 'theme_screenreader');
    $description = get_string('setting-navbar_enabled-descr', 'theme_screenreader');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Jumpers settings
    $name = 'theme_screenreader/jumpers';
    $title = get_string('setting-jumpers', 'theme_screenreader');
    $description = get_string('setting-jumpers-descr', 'theme_screenreader');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Links settings
    $name = 'theme_screenreader/links';
    $title = get_string('setting-links', 'theme_screenreader');
    $description = get_string('setting-links-descr', 'theme_screenreader');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
}



/*
// ANOTHER SETTINGS PAGE
$temp = new admin_settingpage('theme_screenreader', get_string('configtitle','theme_screenreader')); 

// Background colour setting
$name = 'theme_screenreader/backgroundcolor';
$title = 'boja';//get_string('backgroundcolor','theme_screenreader');
$description = 'opis';//get_string('backgroundcolor','theme_screenreader');
$default = '#DDD';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_CLEAN, 12);
$temp->add($setting);

// or inline
$temp->add(new admin_setting_configtext('theme_screenreader/backgroundcolors', 'aaa', 'bbb', '#DDD', PARAM_CLEAN, 12));

// Add our page to the structure of the admin tree
$ADMIN->add('themes', $temp);

*/