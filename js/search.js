$(document).ready(function () {

  if (matchMedia) {
    var mq = window.matchMedia("(max-width: 575px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
  }

  function WidthChange(mq) {
    if (mq.matches) {
      $("#sort").collapse('hide');
      $("#filter").collapse('hide');
    }
  }

  $('#onlinePayment').show();
  $('#creditDebit').hide();

  var btnOnlinePayment = document.getElementById("btnOnlinePayment");  
  var btnOnlinePaymentCheck= document.getElementById("btnOnlinePaymentCheck");
  var btnCreditDebit = document.getElementById("btnCreditDebit");  
  var btnCreditDebitCheck= document.getElementById("btnCreditDebitCheck");

  btnOnlinePayment.classList.add("active");
  btnOnlinePaymentCheck.classList.add("fa-check");
  btnCreditDebit.classList.remove("active");
  btnCreditDebitCheck.classList.remove("fa-check");
});

function selectPaymentMethod (method) {
  if (method == 1) {
    $('#onlinePayment').show();
    $('#creditDebit').hide();
    btnOnlinePayment.classList.add("active");
    btnOnlinePaymentCheck.classList.add("fa-check");
    btnCreditDebit.classList.remove("active");
    btnCreditDebitCheck.classList.remove("fa-check");
  } else {
    $('#onlinePayment').hide();
    $('#creditDebit').show();
    btnOnlinePayment.classList.remove("active");
    btnOnlinePaymentCheck.classList.remove("fa-check");
    btnCreditDebit.classList.add("active");
    btnCreditDebitCheck.classList.add("fa-check");
  }
}

function updatePax (paxLeft, updatedValue) {
  var paxLeft = paxLeft;
  var updatedValue = updatedValue;
  var updatedPax = paxLeft - updatedValue;
  $('#paxLeft').html(updatedPax);
}

function filterRating(y) {

  var x = location.search;
  var current_url = window.location.href;

  if (x.length > 0 ) {
    var goToURL = (current_url.includes('rating')) ? replaceUrlParam(current_url, 'rating', y): current_url + '&rating=' + y;
  } else {
    var goToURL = current_url + '?rating=' + y;
  }
  
  window.open(goToURL, '_self');
}

function clearFilter() { 

  var current_url = window.location.href;
  var goToURL = current_url;

  if (current_url.includes('filter') || current_url.includes('promo')) {

    goToURL = removeUrlParam(goToURL, 'filter');
    goToURL = removeUrlParam(goToURL, 'priceMin');
    goToURL = removeUrlParam(goToURL, 'priceMax');
    goToURL = removeUrlParam(goToURL, 'distMakkah');
    goToURL = removeUrlParam(goToURL, 'distMadinah');
    goToURL = removeUrlParam(goToURL, 'agency');
    goToURL = removeUrlParam(goToURL, 'state');
    goToURL = removeUrlParam(goToURL, 'city');
    goToURL = removeUrlParam(goToURL, 'promo');
  
    window.open(goToURL, '_self');

  } else {

    $('#f_price_min').val('');
    $('#f_price_max').val('');
    $('#f_distance_makkah').val('');
    $('#f_distance_madinah').val('');
    $('#f_agency').val('');
    $('#f_state').val('');
    $('#f_city').val('');

    $('#f_1star').removeClass('active');    
    $('#f_2star').removeClass('active');    
    $('#f_3star').removeClass('active');    
    $('#f_4star').removeClass('active');    
    $('#f_5star').removeClass('active');    

  }  
}

function filterPromo(name) {  

  var x = location.search;
  var current_url = window.location.href;

  var goToURL = current_url;
  // (current_url.includes('filter')) ? goToURL = goToURL: goToURL += '&filter=1';

  if (current_url.includes('promo')) {
    if (current_url.includes(name)) {
      var str = findGetParameter('promo');
      var newValue = removeValueParam(str, name);
      if (newValue.length > 0){
        goToURL = replaceUrlParam(goToURL, 'promo', newValue);
      } else {
        goToURL = removeUrlParam(goToURL, 'promo');
      }
    } else {
      var str = findGetParameter('promo');
      goToURL = replaceUrlParam(goToURL, 'promo', str+encodeURIComponent(",")+name);
      // goToURL += encodeURIComponent(",")+name;
    }
  } else {
    goToURL += '&promo='+name;
  }

  window.open(goToURL, '_self');
}

function filtering() {

  var x = location.search;
  var current_url = window.location.href;

  // var priceMin = $('#f_price_min').val();
  var priceMax = $('#f_price_max').val();
  var distMakkah = $('#f_distance_makkah').val();
  var distMadinah = $('#f_distance_madinah').val();
  var agency = $('#f_agency').val();
  var state = $('#f_state').val();
  var city = $('#f_city').val();

  var goToURL = current_url;

  (current_url.includes('filter')) ? goToURL = goToURL: goToURL += '&filter=1';

  if (priceMax.length == 0 && distMakkah.length == 0 && distMadinah.length == 0 && agency.length == 0 && state.length == 0 && city.length == 0) {
    goToURL = removeUrlParam(goToURL, 'filter');
  }

  // (priceMin.length > 0) ? (current_url.includes('priceMin')) ? goToURL = replaceUrlParam(goToURL, 'priceMin', priceMin): goToURL += '&priceMin=' + priceMin: goToURL = removeUrlParam(goToURL, 'priceMin');
  (priceMax.length > 0) ? (current_url.includes('priceMax')) ? goToURL = replaceUrlParam(goToURL, 'priceMax', priceMax): goToURL += '&priceMax=' + priceMax: goToURL = removeUrlParam(goToURL, 'priceMax');
  (distMakkah.length > 0) ? (current_url.includes('distMakkah')) ? goToURL = replaceUrlParam(goToURL, 'distMakkah', distMakkah): goToURL += '&distMakkah=' + distMakkah: goToURL = removeUrlParam(goToURL, 'distMakkah');
  (distMadinah.length > 0) ? (current_url.includes('distMadinah')) ? goToURL = replaceUrlParam(goToURL, 'distMadinah', distMadinah): goToURL += '&distMadinah=' + distMadinah: goToURL = removeUrlParam(goToURL, 'distMadinah');
  (agency.length > 0) ? (current_url.includes('agency')) ? goToURL = replaceUrlParam(goToURL, 'agency', agency): goToURL += '&agency=' + agency: goToURL = removeUrlParam(goToURL, 'agency');
  (state.length > 0) ? (current_url.includes('state')) ? goToURL = replaceUrlParam(goToURL, 'state', state): goToURL += '&state=' + state: goToURL = removeUrlParam(goToURL, 'state');
  (city.length > 0) ? (current_url.includes('city')) ? goToURL = replaceUrlParam(goToURL, 'city', city): goToURL += '&city=' + city: goToURL = removeUrlParam(goToURL, 'city');

  window.open(goToURL, '_self');
}

function searchingT() {

  var error = '';
  var dateDepart = $('#t_dateDepart').val();
  var noAdult = $('#t_noAdult').val();
  var noChild = $('#t_noChild').val();

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  const country = urlParams.get('country');

  var goToURL = 'search.php?page=1&country='+country;

  if (dateDepart.length == 0 || noAdult.length == 0 || noChild.length == 0) {
    error = 'Please fill in the form.';
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

    goToURL += '&sort=priceLowToHigh';
  
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

function removeValueParam(str,value) {
  var res = str.replace(value, "");
  var after = res.replace(/^,|,$/g, '');
  return after;
}

$(".input-distance").keydown(function(e) {
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

$(".input-price").keydown(function(e) {
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

$(function() {
  $('#t_dateDepart').datepicker({
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