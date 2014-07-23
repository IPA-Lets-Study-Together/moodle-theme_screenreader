<?php
  // http://docs.moodle.org/dev/Overriding_a_renderer

$THEME->name = 'screenreader';
$THEME->parents = array('clean', 'bootstrapbase');

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->sheets = Array('screenreader');

$THEME->javascripts_footer = Array('hci_summariser');