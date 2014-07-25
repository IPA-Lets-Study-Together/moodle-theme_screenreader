<?php
 
/**
 * Settings for the screenreader theme



 mozda me treba vise ovako preko $ADMIN->add.... jer i prije se samo od sebe stavilo,a sad su dvije... vidi na clean
 */
 
$temp = new admin_settingpage('theme_screenreader', get_string('configtitle','theme_screenreader')); 



// Background colour setting
$name = 'theme_screenreader/backgroundcolor';
$title = 'boja';//get_string('backgroundcolor','theme_screenreader');
$description = 'opis';//get_string('backgroundcolor','theme_screenreader');
$default = '#DDD';

$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_CLEAN, 12);
$temp->add($setting);


$temp->add(new admin_setting_configtext('theme_screenreader/backgroundcolors', 'aaa', 'bbb', '#DDD', PARAM_CLEAN, 12));

// Add our page to the structure of the admin tree
$ADMIN->add('themes', $temp);