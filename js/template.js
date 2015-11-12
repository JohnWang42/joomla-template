jQuery(document).ready(function(){
  responsiveImgCheck();

  // functions to run when user resizes window
  jQuery(window).resize(function(){
    responsiveImgCheck();
  });
});

// Screen size check functions
// Make sure to match breakpoints in template.css
var mobile = function(){
  return jQuery(window).width() <= 768;
};
var tablet = function(){
  return jQuery(window).width() > 768 && jQuery(window).width() <= 1024;
};

// Prevent loading of images marked as mobile or desktop only
function responsiveImgCheck() {
  jQuery('img[data-src]').each(function(){
    if((mobile() && $(this).hasClass('mobile-only')) ||
    (!mobile() && $(this).hasClass('desktop-only'))){
      var src = $(this).data('src');
      $(this).prop('src', src);
    }
  });
}
