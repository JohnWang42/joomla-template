Allebach Communications starter template for Joomla 3.x

### Included Libraries ###
* [jQuery 1.11.3](https://jquery.com/)
* [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
* [Respond.js](https://github.com/scottjehl/Respond)
* [bLazy.js](http://dinbror.dk/blog/blazy)

### Global Variables ###
The index has several global variables to aid in identification of content.

	//Category of current article
	$category

	//Page specific class
	$pageclass

	//Active menu item's alias
	$active->alias

### Gulp Automation ###
Included Gulpfile will automatically compile and minify SASS and minify JS.

Two tasks are availible for use:

* `gulp js` and `gulp sass` will compile and minfy Javascript and SASS respectively.

* Appending `:watch` to the above commands will automatically compile files as you save them.

* `gulp tasks:watch` will monitor both the js and sass commands in realtime.

### Responsive Image Loading ###
`<img>` tags that are desktop or mobile specific can be loaded responsively using the `data-src` attribute in place of the `src` attribute. Use the classes `mobile-only` or `desktop-only` to specify when this should show up. This helps to ease the total size of the page load.

### Lazy Loading Images ###
If you are loading a lot of images at once, the [bLazy](http://dinbror.dk/blog/blazy) script has been included for your use. Use the `data-src` attribute along with the class `.lzld` to load images on demand. The source of the image must be a placeholder, like this example `src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==`

Use in conjunction with [gzip compression](https://bitbucket.org/snippets/allebachcommunications/5E7Ad/joomla-htaccess-with-gzip-compression) for faster page load times.
