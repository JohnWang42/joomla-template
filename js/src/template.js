// Screen size check functions
// Make sure to match breakpoints in template.css
var mobile = function(){ return jQuery(window).width() <= 768; };
var tablet = function(){ return jQuery(window).width() > 768 && jQuery(window).width() <= 1024; };
// Prevent loading of images marked as mobile or desktop only
var responsiveImgCheck = function(){
  jQuery('img[data-src]').each(function(){
    if((mobile() && jQuery(this).hasClass('mobile-only')) ||
    (!mobile() && jQuery(this).hasClass('desktop-only'))){
      var src = jQuery(this).data('src');
      jQuery(this).prop('src', src);
    }
  });
};

jQuery(document).ready(function(){
  responsiveImgCheck();
  //initialize lazy loader for img.lzld elements
  var bLazy = new Blazy({
    errorClass: 'lz-error',
    selector: '.lzld',
    successClass: 'lz-success'
  });

  // functions to run when user resizes window
  jQuery(window).resize(function(){
    responsiveImgCheck();
  });
});
