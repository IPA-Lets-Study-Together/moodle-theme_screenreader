
// create screenreader box
//Y.one('body').get('children').remove();



var ID_PREFIX = 'sr_';
var JUMPERS_LIST_ID = ID_PREFIX+'jumpers';
var LINKS_LIST_ID = ID_PREFIX+'links';
var ID_ATTR_LENGTH = 10; // generated id attribute length + 'sr_' part
var USED_IDs = new Array();



// create root node
var srBar = Y.Node.create('<div id="screenreader_shortcuts" style="background:#FFFFCC; padding:10px; margin:5px; border:2px solid black; z-index:1111 "></div>');

// header
var srBarHeader = Y.Node.create('<h4 aria-hidden="true">Accessibility - Screenreader shortcuts</h4>');
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

// create list of links
var listOfLinks = [
	{href:'http://localhost/moodle/course/view.php?id=2', name:'Matematika'},
	{href:'http://localhost/moodle/admin/settings.php?section=frontpagesettings', name:'Edit user settings'},
	{href:'http://localhost/moodle/calendar/view.php?view=month&time=1406200931&course=1', name:'This month'}
];

// create list of jumpers
var listOfJumpers = [
	{selector:'.block_navigation', name:'Navigation block'},
	{selector:'.block_settings', name:'Administration block'},
	{selector:'.block_calendar_month', name:'Calendar block'},
	{selector:'.main', name:'Available courses'},
	{selector:'#inst4 .title', name:'Test element with id'},
	{selector:'.kk', name:'Test 0 items'},
	//{selector:'.collapsed ', name:'Test many items with same class'}
];


var srBarListOfLinks = generateListOfLinks(listOfLinks);
var srBarListOfJumpers = generateListOfJumpers(listOfJumpers);

// attach those lists
srBar.append(srBarListOfLinks);
srBar.append(srBarListOfJumpers);

// attach root node
Y.one('body').prepend(srBar);




// ============================
function generateListOfJumpers(listOfJumpers){
	var html = Y.Node.create('<ul id="'+JUMPERS_LIST_ID+'"></ul>');
	
	for (var i = 0, len = listOfJumpers.length; i < len; i++) {
		var selectorObj = listOfJumpers[i];
	
		// test the selector
		var selectedItems = Y.all(selectorObj.selector);
		var itemsLength = selectedItems.size();

		// if there is more items found, make jumper for each
		var counter = 0;
		selectedItems.each(function (item) {
			
			// if item does not have id, assign unique one
			var itemID = item.get('id');
			if(itemID.length === 0){
				itemID = generateUniqueId(ID_ATTR_LENGTH);
				item.set('id', itemID);
			}

			// generate and append item jumper
			var suffix = (itemsLength == 1)? '' : ' #'+(counter+1);
			var listItem = Y.Node.create('<li><a href="#'+ itemID +'">Jump to '+ selectorObj.name + suffix + '</a></li>');
			html.append(listItem);

			counter++;
		});
	};
	return html;
}

// ============================
function generateListOfLinks(listOfLinks){
	var html = Y.Node.create('<ul id="'+LINKS_LIST_ID+'"></ul>');
	
	for (var i = 0, len = listOfLinks.length; i < len; i++) {
		var dataObj = listOfLinks[i];

		var linkName = dataObj.name;
		// TO-DO: itemID.length === 0...uzmi ime od pravog linka

		// make link item for each
		var listItem = Y.Node.create('<li><a href="'+ dataObj.href +'">'+ linkName + '</a></li>');
		html.append(listItem);

	};
	return html;
}

// ============================
function generateUniqueId(length){
	var ID = ID_PREFIX;
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < length; i++ )
    {
        ID += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    // check if we have generated this key already?
    if(USED_IDs.indexOf(ID) >= 0) ID = generateUniqueId(length);
    else USED_IDs.push(ID);

    return ID;
}

