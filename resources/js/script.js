//@codekit-prepend "plugins.js"

// Helpers /////////////////////////////////////////////////////////
var $window = $(window);
var window_width = $window.width();
var breakpoint = 0;


// Functions /////////////////////////////////////////////////////////

// Menu Bar --------------------------------------------------------
// Close the nav
$('.head nav')
  .attr('aria-expanded', 'false')
  .removeClass('closed');


// Toggle the nav
$('.menu_bar').click(function() {
  if ( $('.head nav').attr('aria-expanded') === 'true' ) {
    $('.head nav').attr('aria-expanded', 'false');
  } else {
    $('.head nav').attr('aria-expanded', 'true');
  }
});

// Naughty ---------------------------------------------------------
// Remove empty paragraphs
$('p').each(function() {
 var $this = $(this);
 if($this.html().replace(/\s|&nbsp;/g, '').length == 0) {
   $this.remove();
  }
});


// Resize //////////////////////////////////////////////////////////
$window.resize(function(){

  // Update window width
  window_width = $window.width();

});


// Loaded //////////////////////////////////////////////////////////
$window.load(function () {
  
});