<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'theme_screenreader', language 'en'
 *
 * @package   theme_screenreader
 * @copyright 2014 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Screenreader';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';

$string['nav-bar-title'] = 'Accessibility - Screenreader shortcuts';
$string['configuration-error'] = $string['pluginname'].' theme configuration is not correct';
$string['error-msg'] = 'Error message';
$string['error-advice'] = "If you don't succeed to fix errors, consider contacting developers or changing to another theme in Moodle";
$string['jump-to'] = "Jump to";


/* Configuration form */
$string['setting-navbar_enabled'] = 'Display navigation bar';
$string['setting-navbar_enabled-descr'] = 'Choose whether navigation bar should be displayed on top of Moodle page. Please note that <em>Screenreader</em> theme must be selected in order for this to work';
$string['setting-jumpers'] = 'Jumpers JSON configuration';
$string['setting-jumpers-descr'] = 'Please use online JSON validation tool (e.g. http://jsonformatter.curiousconcept.com) to validate entry before submit.
<br>Configuration should look like this: <pre><code>[{"selector": "<em>my_CSS_selector</em>", "name":"<em>my_name</em>"}, {...}, ... ]</code></pre> where <code><em>my_CSS_selector</code></em> is CSS selector that references some element of currently loaded web page where jumper should switch the focus and <code><em>my_name</code></em> is a name of a link (jumper) within navigation bar that is visible to a user.
<br>Please check configuration instructions document for more help';
$string['setting-links'] = 'Links JSON configuration';
$string['setting-links-descr'] = 'Please use online JSON validation tool (e.g. http://jsonformatter.curiousconcept.com) to validate entry before submit.
<br>Configuration should look like this: <pre><code>[{"href": "<em>my_http</em>", "name":"<em>my_name</em>"}, {...}, ... ]</code></pre> where <code><em>my_http</code></em> is absolute or relative web page destination path (or even internal link using #) and <code><em>my_name</code></em> is a name of a link (jumper) within navigation bar that is visible to a user.
<br>Please check configuration instructions document for more help';


/* README */
$string['choosereadme'] = '
<div class="clearfix">
<div class="well">
<h2>Screenreader Theme</h2>
<p><img class=img-polaroid src="screenreader/pix/screenshot.jpg" /></p>
</div>
<div class="well">
<h3>About</h3>
<p>Screenreader theme extends existing Moodle theme "Clean" with a navigation bar on top of Moodle page and its configuration form that can be accessed through "appearance" administration menu. Clean is a modified Moodle bootstrap theme which inherits styles and renderers from its parent theme.</p>
<h3>Theme Credits</h3>
Project manager:
<ul>
<li>Marko Hell, EFST (contact person); marko.hell@efst.hr</li>
</ul>
Code developers:
<ul>
<li>Hrvoje Golčić, FESB; hrvoje.golcic@gmail.com</li>
<li>Ivana Skelić, FESB; is.moirae@gmail.com</li>
<li>Maja Štula (mentor), FESB; maja.stula@fesb.hr</li>
</ul>
<h3>Report a bug:</h3>
<p><a href="https://github.com/IPA-Lets-Study-Together">Github repository</a></p>

</div></div>';