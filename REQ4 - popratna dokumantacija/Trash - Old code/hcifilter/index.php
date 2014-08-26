<?php
require_once(dirname(__FILE__) . '/../../config.php');        // 1

require_login();                                              // 2
$context = context_system::instance();                        // 3
require_capability('local/hcifilter:interface_filtering', $context);        // 4

$name = optional_param('name', '', PARAM_TEXT);               // 5
if (!$name) {
    $name = fullname($USER);                                  // 6
}

//add_to_log(SITEID, 'local_greet', 'begreeted','local/greet/index.php?name=' . urlencode($name));    // 7

$PAGE->set_context($context);                                 // 8
$PAGE->set_url(new moodle_url('/local/hcifilter/index.php'), array('name' => $name));                              // 9
$PAGE->set_title(get_string('welcome', 'local_hcifilter'));       // 10

/*
echo $OUTPUT->header();                                       // 11
echo $OUTPUT->box(get_string('hcifilter', 'local_hcifilter', format_string($name)));                               // 12
echo $OUTPUT->footer();                                       // 13
*/
$output = $PAGE->get_renderer('local_hcifilter');
echo $output->display_page($name);

$file = 'people.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "John Smith\n";
// Write the contents back to the file
file_put_contents($file, $current);