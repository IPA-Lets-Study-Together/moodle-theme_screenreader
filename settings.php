<?php
 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	

	// Links settings
    $name = 'theme_screenreader/enabled';
    $title = 'Navigation bar';
    $description = 'Show screenreader navigation bar on top of Moodle page.';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Jumpers settings
    $name = 'theme_screenreader/jumpers';
    $title = 'Jumpers YUI selectors:';
    $description = 'TO-DO: Describe it...Use online tool for JSON validation';
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Links settings
    $name = 'theme_screenreader/links';
    $title = 'Jumpers YUI links:';
    $description = 'TO-DO: Describe it';
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