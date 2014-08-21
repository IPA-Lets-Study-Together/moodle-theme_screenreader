M.theme_screenreader = {

	ID_PREFIX : 'sr_',
	JUMPERS_LIST_ID : this.ID_PREFIX+'jumpers',
	LINKS_LIST_ID : this.ID_PREFIX+'links',
	ID_ATTR_LENGTH : 10, // generated id attribute length + 'sr_' part
	USED_IDs : new Array(),

	navigationBar : null,




	init: function(Y, navBarId, listOfLinks, listOfJumpers) 
	{
		this.navigationBar = Y.one('#'+navBarId);

		// tu sa JSON parse ili try cache?
		// eval("("+'{a:"www"}'+")")

		// string to array conversion
		listOfLinks = eval("("+listOfLinks+")");
		listOfJumpers = eval("("+listOfJumpers+")");

		// create list of links
		/*var listOfLinks = [
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
		];*/


		var navigationBarListOfLinks = this.generateListOfLinks(listOfLinks);
		var navigationBarListOfJumpers = this.generateListOfJumpers(listOfJumpers);

		// attach those lists
		this.navigationBar.append(navigationBarListOfLinks);
		this.navigationBar.append(navigationBarListOfJumpers);

		// attach root node
		Y.one('body').prepend(this.navigationBar);



		alert(9);
	},
	// ============================
	generateListOfJumpers: function(listOfJumpers){
		var html = Y.Node.create('<ul id="'+M.theme_screenreader.JUMPERS_LIST_ID+'"></ul>');
	
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
					itemID = M.theme_screenreader.generateUniqueId(M.theme_screenreader.ID_ATTR_LENGTH);
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
	},
	// ============================
	generateListOfLinks: function(listOfLinks){
		var html = Y.Node.create('<ul id="'+M.theme_screenreader.LINKS_LIST_ID+'"></ul>');
		
		for (var i = 0, len = listOfLinks.length; i < len; i++) {
			var dataObj = listOfLinks[i];

			var linkName = dataObj.name;
			// TO-DO: itemID.length === 0...uzmi ime od pravog linka

			// make link item for each
			var listItem = Y.Node.create('<li><a href="'+ dataObj.href +'">'+ linkName + '</a></li>');
			html.append(listItem);

		};
		return html;
	},
	// ============================
	generateUniqueId: function(length){
		var ID = M.theme_screenreader.ID_PREFIX;
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		for( var i=0; i < length; i++ )
		{
			ID += possible.charAt(Math.floor(Math.random() * possible.length));
		}

		// check if we have generated this key already?
		if(M.theme_screenreader.USED_IDs.indexOf(ID) >= 0) ID = M.theme_screenreader.generateUniqueId(length);
		else M.theme_screenreader.USED_IDs.push(ID);

		return ID;
	}
}
