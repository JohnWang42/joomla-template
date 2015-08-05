Allebach Communications starter template for Joomla 3.x

### Included Libraries ###
* [jQuery 1.11.1](https://jquery.com/)

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

### Automated JS and CSS minification ###
Included Gruntfile will minify all js and css files in their respective folders. To use it, make sure you have [Node](https://nodejs.org/) installed.