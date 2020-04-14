function clearFilter() { 

  var current_url = window.location.href;
  var goToURL = current_url;

  if (current_url.includes('filter')) {

    goToURL = removeUrlParam(goToURL, 'filter');
    goToURL = removeUrlParam(goToURL, 'priceMin');
    goToURL = removeUrlParam(goToURL, 'priceMax');
    goToURL = removeUrlParam(goToURL, 'distMakkah');
    goToURL = removeUrlParam(goToURL, 'distMadinah');
  
    window.open(goToURL, '_self');

  } else {

    $('#f_price_min').val('');
    $('#f_price_max').val('');
    $('#f_distance_makkah').val('');
    $('#f_distance_madinah').val('');
    $('#f_agency').val('');
    $('#f_promo').val('');
    $('#f_state').val('');
    $('#f_city').val('');
    
  }  
}

function filtering() {

  var x = location.search;
  var current_url = window.location.href;

  var priceMin = $('#f_price_min').val();
  var priceMax = $('#f_price_max').val();
  var distMakkah = $('#f_distance_makkah').val();
  var distMadinah = $('#f_distance_madinah').val();
  var agency = $('#f_agency').val();
  var promotion = $('#f_promo').val();
  var state = $('#f_state').val();
  var city = $('#f_city').val();

  var goToURL = current_url;

  (current_url.includes('filter')) ? goToURL = goToURL: goToURL += '&filter=1';

  if (priceMin.length == 0 && priceMax.length == 0 && distMakkah.length == 0 && distMadinah.length == 0 && agency.length == 0 && promotion.length == 0 && state.length == 0 && city.length == 0) {
    goToURL = removeUrlParam(goToURL, 'filter');
  }

  (priceMin.length > 0) ? (current_url.includes('priceMin')) ? goToURL = replaceUrlParam(goToURL, 'priceMin', priceMin): goToURL += '&priceMin=' + priceMin: goToURL = removeUrlParam(goToURL, 'priceMin');
  (priceMax.length > 0) ? (current_url.includes('priceMax')) ? goToURL = replaceUrlParam(goToURL, 'priceMax', priceMax): goToURL += '&priceMax=' + priceMax: goToURL = removeUrlParam(goToURL, 'priceMax');
  (distMakkah.length > 0) ? (current_url.includes('distMakkah')) ? goToURL = replaceUrlParam(goToURL, 'distMakkah', distMakkah): goToURL += '&distMakkah=' + distMakkah: goToURL = removeUrlParam(goToURL, 'distMakkah');
  (distMadinah.length > 0) ? (current_url.includes('distMadinah')) ? goToURL = replaceUrlParam(goToURL, 'distMadinah', distMadinah): goToURL += '&distMadinah=' + distMadinah: goToURL = removeUrlParam(goToURL, 'distMadinah');
  (agency.length > 0) ? (current_url.includes('agency')) ? goToURL = replaceUrlParam(goToURL, 'agency', agency): goToURL += '&agency=' + agency: goToURL = removeUrlParam(goToURL, 'agency');
  (promotion.length > 0) ? (current_url.includes('promotion')) ? goToURL = replaceUrlParam(goToURL, 'promotion', promotion): goToURL += '&promotion=' + promotion: goToURL = removeUrlParam(goToURL, 'promotion');
  (state.length > 0) ? (current_url.includes('state')) ? goToURL = replaceUrlParam(goToURL, 'state', state): goToURL += '&state=' + state: goToURL = removeUrlParam(goToURL, 'state');
  (city.length > 0) ? (current_url.includes('city')) ? goToURL = replaceUrlParam(goToURL, 'city', city): goToURL += '&city=' + city: goToURL = removeUrlParam(goToURL, 'city');

  window.open(goToURL, '_self');
}

function searchingT() {

  var error = '';
  var dateDepart = $('#t_dateDepart').val();
  var noAdult = $('#t_noAdult').val();
  var noChild = $('#t_noChild').val();

  var goToURL = 'search.php?';

  if (dateDepart.length == 0) {
    error = 'Please enter Date Departure.';
  }

  if (error.length > 0) {
    document.getElementById("textAlertSearch").innerHTML = error;
    $('#searchT-alert').show('fade');

    setTimeout(function () {
      $('#searchT-alert').hide('fade');
    }, 3000);
  } else {  
    if (dateDepart.length > 0) {
      goToURL += '&dateDepart='+dateDepart;
    }
  
    if (noAdult.length > 0) {
      goToURL += '&noAdult='+noAdult;
    }
  
    if (noChild.length > 0) {
      goToURL += '&noChild='+noChild;
    }
  
    window.open(goToURL, '_self');
  } 
}

function sorting(y) {

  var x = location.search;
  var current_url = window.location.href;
  // alert(current_url);

  if (x.length > 0 ) {
    var goToURL = (current_url.includes('sort')) ? replaceUrlParam(current_url, 'sort', y): current_url + '&sort=' + y;
  } else {
    var goToURL = current_url + '?sort=' + y;
  }
  
  window.open(goToURL, '_self');
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

function findGetParameter(parameterName) {
  var result = null,
      tmp = [];
  location.search
      .substr(1)
      .split("&")
      .forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
      });
  return result;
}

$(document).ready(function () {

  document.getElementById("demo").innerHTML = calculate(100, 'MYR', 'SGD');

  if (matchMedia) {
    var mq = window.matchMedia("(max-width: 765px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
  }

  function WidthChange(mq) {
    if (mq.matches) {
      $("#filter").collapse('hide');
      $("#sort").collapse('hide');
    }
  }
});

$(function() {
  $('#t_dateDepart').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true
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
                $(this).attr('disabled', true);
            }

        } else if (type == 'plus') {

            if (currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
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