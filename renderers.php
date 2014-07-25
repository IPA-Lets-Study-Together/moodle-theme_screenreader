<?php
 // http://docs.moodle.org/dev/Overriding_a_renderer
class theme_screenreader_core_renderer extends theme_bootstrapbase_core_renderer {


	/**
	 * Outputs a heading
	 * @param string $text The text of the heading
	 * @param int $level The level of importance of the heading. Defaulting to 2
	 * @param string $classes A space-separated list of CSS classes
	 * @param string $id An optional ID
	 * @return string the HTML to output.
	 */
	
	/*public function heading($text, $level = 2, $classes = 'main', $id = null) {
	    $level = (integer) $level;
	    if ($level < 1 or $level > 6) {
	        throw new coding_exception('Heading level must be an integer between 1 and 6.');
	    }
	    return html_writer::tag('h' . $level, $text, array('id' => $id, 'class' => renderer_base::prepare_classes($classes)));
	}*/

	/*public function heading($text, $level = 2, $classes = 'main', $id = null) {
	    $content  = html_writer::start_tag('div', array('class'=>'headingcontainer'));
	    $content .= html_writer::empty_tag('img', array('src'=>$this->pix_url('headingpic', 'theme'), 'alt'=>'', 'class'=>'headingimage'));
	    $content .= parent::heading($text, $level, $classes, $id); // parent renderer
	    $content .= html_writer::end_tag('div');
		return $content;
	}*/


	public function heading($text, $level = 2, $classes = 'main', $id = null) {
	   global $PAGE;


	   var_dump(get_class_methods('core_renderer'));
	   return $PAGE->theme->settings->backgroundcolor;
	}


}