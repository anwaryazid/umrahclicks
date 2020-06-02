$(document).ready(function () {

  $(document).on('submit', '#formContact', function(event){
    
    event.preventDefault();
    var error_text = '';
    var guest = $('#guest').val();
    var emailAddress = $('#emailAddress').val();
    var phone = $('#phone').val();
    var message = $('#message').val();

    if(guest == '' || emailAddress == '' || phone == '' || message == '') {
      error_text = '* Please fill in required field';
      $('#error_text').text(error_text);
    }
    else {
      error_text = '';
      $('#error_text').text(error_text);
    }   

    if(error_text != '') {
      return false;
    }
    else {
      $('#contactModal').modal('hide');
      $.ajax({
        url:"process/contact_action.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          $('#formContact')[0].reset();
          if (data.includes("sent")) {
          }
        }
      });
    }
  });

});

function contactForm() {
  $('#error_text').text('');
  $('#formContact')[0].reset();
  $('#contactModal').modal('show');
}

function resetSearch() {
  selectCountry('MY','MALAYSIA','MY.png');
}

function selectCountry(kod,name,image) {
  
  $('#s_country').val(kod);
  $('#countryName').html(name);

  srcFlag = 'upload/flag/'+image;

  document.getElementById('countryFlag').src=srcFlag;

}

function replaceUrlParam(url, paramName, paramValue)
{
    if (paramValue == null) {
        paramValue = '';
    }
    var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
    if (url.search(pattern)>=0) {
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    url = url.replace(/[?#]$/,'');
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
}

function removeUrlParam(url, parameter) {
  return url
    .replace(new RegExp('[?&]' + parameter + '=[^&#]*(#.*)?$'), '$1')
    .replace(new RegExp('([?&])' + parameter + '=[^&]*&'), '$1');
}

function searching() {

  var error = '';
  var country = $('#s_country').val();
  var dateDepart = $('#s_dateDepart').val();
  var noAdult = $('#s_noAdult').val();
  var noChild = $('#s_noChild').val();

  var goToURL = 'search.php?page=1';

  if (country.length == 0 || dateDepart.length == 0 || noAdult.length == 0|| noChild.length == 0) {
    if (dateDepart.length == 0)
      error = 'Please pick a Departure Date'
    else
      error = 'Please fill in the form.';
  }

  if (error.length > 0) {
    document.getElementById("textAlertSearch").innerHTML = error;

    $('#search-alert').show('fade');

    setTimeout(function () {
      $('#search-alert').hide('fade');
    }, 5000);
  } else {
    if (country.length > 0) {
      goToURL += '&country='+country;
    }
  
    if (dateDepart.length > 0) {
      goToURL += '&dateDepart='+dateDepart;
    }
  
    if (noAdult.length > 0) {
      goToURL += '&noAdult='+noAdult;
    }
  
    if (noChild.length > 0) {
      goToURL += '&noChild='+noChild;
    }
    
    goToURL += '&sort=price';
  
    window.open(goToURL, '_self');
  } 
  
  // alert(country + '\r\n' + dateDepart + '\r\n' +  noAdult + '\r\n' +  noChild);
}

$(function() {
  
  $('#s_dateDepart').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    startDate: '+1d'
  });

});

$('.btn-number').click(function(e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if (type == 'minus') {
        if (currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
        }
        if (parseInt(input.val()) == input.attr('min')) {
            // $(this).attr('disabled', true);
        }

      } else if (type == 'plus') {

        if (currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
        }
        if (parseInt(input.val()) == input.attr('max')) {
            // $(this).attr('disabled', true);
        }

      }
    } else {
      input.val(0);
    }
});
$('.input-number').focusin(function() {
  $(this).data('oldValue', $(this).val());
});
/* $('.input-number').change(function() {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }


}); */
$(".input-number").keydown(function(e) {
  // Allow: backspace, delete, tab, escape, enter and .
  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
  }
  // Ensure that it is a number and stop the keypress
  if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
  }
});

$(".input-date").keydown(function(e) {
  // Allow: backspace, delete, tab, escape, enter and .
  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
  }
  // Ensure that it is a number and stop the keypress
  if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96)) {
      e.preventDefault();
  }
});