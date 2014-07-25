<?php
  // http://docs.moodle.org/dev/Overriding_a_renderer

$THEME->name = 'screenreader';
$THEME->parents = array('clean', 'bootstrapbase');

//$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->sheets = Array('screenreader');

/* This is required */
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
//$THEME->csspostprocess = 'theme_clean_process_css';

$THEME->javascripts_footer = Array('screenreader');


/*

if (!empty($theme->settings->backgroundcolor)) {
	$backgroundcolor = $theme->settings->backgroundcolor;
} 
else
{
	$backgroundcolor = null;
}

*/