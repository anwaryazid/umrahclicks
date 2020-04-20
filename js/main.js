/*!
 * Start Bootstrap - SB Admin 2 v4.0.7 (https://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin-2/blob/master/LICENSE)
 */

! function(t) {
    "use strict";
    t("#sidebarToggle, #sidebarToggleTop").on("click", function(o) {
        t("body").toggleClass("sidebar-toggled"), t(".sidebar").toggleClass("toggled"), t(".sidebar").hasClass("toggled") && t(".sidebar .collapse").collapse("hide")
    }), t(window).resize(function() {
        t(window).width() < 768 && t(".sidebar .collapse").collapse("hide")
    }), t("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function(o) {
        if (768 < t(window).width()) {
            var e = o.originalEvent,
                l = e.wheelDelta || -e.detail;
            this.scrollTop += 30 * (l < 0 ? 1 : -1), o.preventDefault()
        }
    }), t(document).on("scroll", function() {
        100 < t(this).scrollTop() ? t(".scroll-to-top").fadeIn() : t(".scroll-to-top").fadeOut()
    }), t(document).on("click", "a.scroll-to-top", function(o) {
        var e = t(this);
        t("html, body").stop().animate({
            scrollTop: t(e.attr("href")).offset().top
        }, 1e3, "easeInOutExpo"), o.preventDefault()
    })
}(jQuery);

function viewAlert(result, text) {
  if (result == 1) {

    document.getElementById("textAlertSuccess").innerHTML = text;
    $('#success-alert').show('fade');

    setTimeout(function () {
      $('#success-alert').hide('fade');
    }, 3000);

  } else if (result == 2) {

    document.getElementById("textAlertDanger").innerHTML = text;
    $('#danger-alert').show('fade');

    setTimeout(function () {
      $('#danger-alert').hide('fade');
    }, 3000);

  } else {
    alert('x');
  }
  
}

function showAlert(from, result, type) {

  /* 
    result = 1 - Success
    result = 2 - Unsuccesful 

    type = 1 - Register
    type = 2 - Update 
    type = 3 - Remove 
    type = 4 - Added
  */

  var typeText = '';
  if (type == 1) {
    var typeText = 'added.';
  } else if (type == 2) {
    var typeText = 'updated.';
  } else if (type == 3) {
    var typeText = 'removed.';
  } else {
    var typeText = 'added.';
  }

  if (result == 1) {

    document.getElementById("textAlertSuccess").innerHTML = from+" succesfully "+typeText;
    $('#success-alert').show('fade');

    setTimeout(function () {
      $('#success-alert').hide('fade');
    }, 3000);

  } else if (result == 2) {

    document.getElementById("textAlertDanger").innerHTML = from+" unsuccesfully "+typeText;
    $('#danger-alert').show('fade');

    setTimeout(function () {
      $('#danger-alert').hide('fade');
    }, 3000);

  } else {
    alert('x');
  }
  
}

function closeAlert(id) {
  $('#'+id).hide('fade');
}

$(document).ready(function() {

  $('.modal').on('hidden.bs.modal', function () {
    if($(".modal:visible").length > 0) {
      // setTimeout(function() {
        $('body').addClass('modal-open');
      // },10)
    }
  });

});