<?php
class local_hcifilter_renderer extends plugin_renderer_base {
    public function display_page($name) {
        $output = '';
        $output .= $this->header();
        $output .= $this->box(get_string('hcifilter', 'local_hcifilter', format_string($name)));  
        $output .= $this->footer();
        return $output;
    }
}