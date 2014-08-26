<?php
  // http://docs.moodle.org/dev/Overriding_a_renderer

$THEME->name = 'overridetest';
$THEME->parents = array('clean', 'bootstrapbase');

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->sheets = Array('overridetest');

$THEME->javascripts_footer = Array('user_interface_reducer');