<?php

define('JS_PATH', '/theme/screenreader/module.js');

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

	public function standard_top_of_body_html() {
		// check available renderer methods to override
	   	//var_dump(get_class_methods('core_renderer'));
		

		$html_container = array(
			'class' => 'theme_screenreader_custom-header'
		);
		$html_navigation_bar = array(
			'id' => 'theme_screenreader_navigation-bar'
		);


		// include js script and pass the arguments
		$js_constructor = 'M.theme_screenreader.init';
		$js_init = array(
			'name'		=>  'theme_screenreader',
			'fullpath'	=>  JS_PATH,
			'requires'	=>  array('base', 'node')
		);
		$js_data = array(
			'navBarId'		=>	$html_navigation_bar['id'],
			'listOfLinks'	=>	$this->page->theme->settings->links,
			'listOfJumpers'	=>	$this->page->theme->settings->jumpers			
		);
		$this->page->requires->js_init_call($js_constructor, $js_data, false, $js_init);


		// generate navigation tools as a first <body> element
		$content = html_writer::start_tag('div', $html_container);
		$content .= html_writer::start_tag('div', $html_navigation_bar);
		/*<h4 aria-hidden="true">Accessibility - Screenreader shortcuts</h4>*/
		/*<ul><li><a href="">Skip shortcuts block</a></li><li><a href="#sr_jumpers">Skip links</a></li></ul>*/
		// linkovi mogu zamijeniti i jumpere ako su oblika href="#...", u tom slucaju nismo ovisni o js-u
		$content .= html_writer::end_tag('div');
		$content .= parent::standard_top_of_body_html(); // parent renderer
		$content .= html_writer::end_tag('div');
		return $content;



	}


}