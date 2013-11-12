// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {

  // All pages
  common: {
    init: function() {
      $("html").addClass("active");
    },
    finalize: function() { }
  },

  single_e9_interior: {
    init: function () {
      $(".sprite-expand").click(function () {
        $("body").addClass("show-main");
      });

      $(".sprite-collapse").click(function () {
        $("body").removeClass("show-main");
      });
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);


$(window).load(function () {
  $('.flexslider').each(function () {
    var $slider = $(this);

    $slider.flexslider({
      animation: "slide",
      useCSS: true,
      slideshow: true,
      controlNav: "1" === $slider.data("pager"),
      slideshowSpeed: Number($slider.data("speed")),
      pauseOnHover: false
    });
  });

  if (Modernizr.backgroundsize) {
    // handle resizing slide images in IE
  }
});
