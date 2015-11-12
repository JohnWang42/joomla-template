Allebach Communications starter template for Joomla 3.x

### Included Libraries ###
* [jQuery 1.11.3](https://jquery.com/)

* [Bootstrap 3](http://getbootstrap.com/): Custom Version - See bootstrap.min.css comments for config file. Includes following components:
	* Print media styles
	* Typography
	* Grid System
	* Buttons
	* Responsive Utilities
	* Breadcrumbs
	* Pagination
	* Labels
	* Alerts
	* Progress Bars 

* [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
* [Respond.js](https://github.com/scottjehl/Respond)

### Global Variables ###
The index has several global variables to aid in identification of content.

	//Category of current article
	$category
	
	//Page specific class
	$pageclass
	
	//Active menu item's alias
	$active->alias

### Grunt Automation ###
Included Gruntfile will minify all js and css files in their respective folders and upload them to the specified server. To use it, make sure you have [Node](https://nodejs.org/) installed.

Please make sure to change the file directories in **"Gruntfile.js"**. Also input your FTP credentials in **".ftppass"**.

Two tasks are availible for use:

* `grunt` minifies all css and js files and uploads them. Images and files inside `/vendor` folders are ignored.

* `grunt init` will upload everything.

### Responsive Image Loading ###
`<img>` tags that are desktop or mobile specific can be loaded responsively using the `data-src` attribute in place of the `src` attribute. This helps to ease the total size of the page load.

Use in conjunction with [gzip compression](https://bitbucket.org/snippets/allebachcommunications/5E7Ad/joomla-htaccess-with-gzip-compression) for faster page load times.