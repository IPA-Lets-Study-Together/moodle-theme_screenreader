<?php
$capabilities = array('local/hcifilter:interface_filtering' => array(
    'captype' => 'read',
    'contextlevel' => CONTEXT_SYSTEM,
    'archetypes' => array('guest' => CAP_ALLOW, 'user' => CAP_ALLOW)
));