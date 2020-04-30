function viewProfile(userId) {
  var id = userId;
  $.ajax({
    url:"process/profile_fetch_single.php",
    method:"POST",
    data:{id:id},
    dataType:"json",
    success:function(data)
    {
      $('#profileModal').modal('show');
      $('#error_text_profile').text('');
      $('#error_password_profile').text('');
      $('#puserFullName').val(data.userFullName);
      $('#puserEmail').val(data.userEmail);
      $('#puserName').val(data.userName);
      $('#puserStatus').val(data.userStatus);
      $('#puserType').val(data.userType);
      $('#userid').val(id);
      $('.modal-title').text("Profile");
      $('#action_profile').val("Update");
      $('#operation_profile').val("Update");
    }
  })
}

function changePassword(userId) {
  var id = userId;
  $.ajax({
    url:"process/profile_fetch_single.php",
    method:"POST",
    data:{id:id},
    dataType:"json",
    success:function(data)
    {
      $('#passwordModal').modal('show');
      $('#error_text_password').text('');
      $('#error_password_password').text('');
      $('#cpuserFullName').val(data.userFullName);
      $('#cpuserEmail').val(data.userEmail);
      $('#cpuserName').val(data.userName);
      $('#cpuserid').val(id);
      $('.modal-title').text("Change Password");
      $('#action_password').val("Update");
      $('#operation_password').val("Update");
    }
  })
}

$(document).ready(function() {
  $(document).on('submit', '#formPassword', function(event){
    event.preventDefault();
    var error_text_password = '';
    var error_password_password = '';
    var cpuserPassword = $('#cpuserPassword').val();
    var cpuserNewPassword = $('#cpuserNewPassword').val();
    var cpuserConfirmPassword = $('#cpuserConfirmPassword').val();
    if(cpuserPassword == '' || cpuserNewPassword == '' || cpuserConfirmPassword == '') {
      error_text_password = '* Please fill in the form';
      $('#error_text_password').text(error_text_password);
    }
    else {
      error_text_password = '';
      $('#error_text_password').text(error_text_password);
    }
    if(cpuserConfirmPassword != cpuserNewPassword) {
      error_password_password = 'Password not match';
      $('#error_password_password').text(error_password_password);
    }
    else {
      error_password_password = '';
      $('#error_password_password').text(error_password_password);
    }

    if(error_text_password != '' || error_password_password != '') {
      return false;
    }
    else {
      $.ajax({
        url:"process/password_update.php",
        type:'POST',
        dataType: "json",
        data: $("#formPassword").serializeArray(),
        async: false,
        success: function(resp) 
        {
          if (resp.success == 'true') {
            viewAlert(1,'Password succesfully changed');
            $('#passwordModal').modal('hide');  
          } else {
            $('#error_text_password').text(resp.result);
          }            
        }
      });
    }
  });
});

function f_menu_redirect(menu_id, menu2nd_id,) {

  $('#mid').val(menu_id);
  $('#m2id').val(menu2nd_id);
  $('#form_menu').submit();
}

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

    document.getElementById("textAlert").innerHTML = text;
    document.getElementById("result-alert").classList.add("alert-success");
    $('#result-alert').show('fade');

    setTimeout(function () {
      $('#result-alert').hide('fade');
    }, 5000);

  } else if (result == 2) {

    document.getElementById("textAlert").innerHTML = text;
    document.getElementById("result-alert").classList.add("alert-danger");
    $('#result-alert').show('fade');

    setTimeout(function () {
      $('#result-alert').hide('fade');
    }, 5000);

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