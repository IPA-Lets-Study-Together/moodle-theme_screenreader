
// create screenreader box
//Y.one('body').get('children').remove();

var srBar = Y.Node.create('<div id="screenreader_shortcuts" style="background:#FFFFCC; padding:10px; margin:5px; border:2px solid black; z-index:1111 "></div>');

var srBarHeader = Y.Node.create('<h1>Screenreader shortcuts</h1>');
srBar.append(srBarHeader);
var srBarHeaderLinks = Y.Node.create('<ul><li><a href="">Skip shortcuts block</a></li><li><a href="#sr_jumpers">Skip links</a></li></ul>');
srBar.append(srBarHeaderLinks);

// Set toolbar styles
/*Y.StyleSheet('MyApp').set(
"q.uoted select.or[str=ing]", {
    fontSize   : "150%",         // note the camel casing
    background : "#030 url(/images/bg_image.png) scroll repeat-y top left",
    cssFloat   : "left",
    opacity    : 0.5
});
*/

var listOfLinks = [{href:'#', name:'Courses'}, {href:'#', name:'Calendar'}, {href:'#', name:'Forum'}];
var srBarListOfLinks = Y.Node.create('<ul id="sr_links"></ul>');

var listOfJumpers = [{href:'#', name:'Main content'}];
var srBarListOfJumpers = Y.Node.create('<ul id="sr_jumpers"></ul>');


for (var i = listOfLinks.length - 1; i >= 0; i--) {
	var item = listOfLinks[i];
	var listItem = Y.Node.create('<li><a href="'+ item.href +'">'+ item.name +'</a></li>'); 
	srBarListOfLinks.append(listItem);

	// provjeri postoji li taj ID, ako ne dodjeli ga...
};

for (var i = listOfJumpers.length - 1; i >= 0; i--) {
	var item = listOfJumpers[i];
	var listItem = Y.Node.create('<li><a href="'+ item.href +'">'+ item.name +'</a></li>'); 
	srBarListOfJumpers.append(listItem);
};

srBar.append(srBarListOfLinks);
srBar.append(srBarListOfJumpers);

Y.one('body').prepend(srBar);