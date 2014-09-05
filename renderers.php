<?php

define('JS_PATH', '/theme/screenreader/module.js');
define('HEADER_CLASS', 'theme_screenreader_custom-header');
define('NAVBAR_ID', 'theme_screenreader_navigation-bar');

// http://docs.moodle.org/dev/Overriding_a_renderer
class theme_screenreader_core_renderer extends theme_bootstrapbase_core_renderer {

	public function standard_top_of_body_html() {
		// check available renderer methods to override
	   	//var_dump(get_class_methods('core_renderer'));

		// wrapper around standard elements
		$content = html_writer::start_tag('div', array('class' => HEADER_CLASS)); 
		$content .= parent::standard_top_of_body_html(); // original - parent renderer (skip links, js, etc...)

		// if navbar display is enabled
		$navbar_enabled = $this->page->theme->settings->navbar_enabled;
		if($navbar_enabled === '1' && isloggedin()){

			
			$html_navigation_bar = array(
				'id' => NAVBAR_ID
			);


			// include js script and pass the arguments
			$js_constructor = 'M.theme_screenreader.init';
			$js_init = array(
				'name'		=>  'theme_screenreader',
				'fullpath'	=>  JS_PATH,
				'requires'	=>  array('base', 'node')
			);
			$js_data = array(
				'navBarId'		=>	NAVBAR_ID,
				'listOfLinks'	=>	$this->page->theme->settings->links,
				'listOfJumpers'	=>	$this->page->theme->settings->jumpers			
			);
			$this->page->requires->js_init_call($js_constructor, $js_data, false, $js_init);

			// language strings passing to javascript
			$this->page->requires->string_for_js('configuration-error', 'theme_screenreader');
			$this->page->requires->string_for_js('error-msg', 'theme_screenreader');
			$this->page->requires->string_for_js('error-advice', 'theme_screenreader');
			$this->page->requires->string_for_js('jump-to', 'theme_screenreader');


			// generate navigation bar as a first <body> element
			$content .= html_writer::start_tag('div', $html_navigation_bar);
				$content .= html_writer::tag('h4', get_string('nav-bar-title', 'theme_screenreader'), array('aria-hidden'=>'true'));

				// links and jumper will be rendered here within <ul> dynamically
				// TO-DO: linkovi zapravo mogu zamijeniti i jumpere ako su oblika href="#...", u tom slucaju nismo ovisni o js-u i mozemo ih tu generirati

			$content .= html_writer::end_tag('div');
		}
		
		$content .= html_writer::end_tag('div'); // end of wrapper
		return $content;

	}


}