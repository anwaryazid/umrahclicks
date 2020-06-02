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

  $(document).on('submit', '#formBooking', function(event){
    
    event.preventDefault();
    var error_text = '';
    var guest_name = $('#guest_name').val();
    var guest_email = $('#guest_email').val();
    var guest_no = $('#guest_no').val();
    var add_guest = $('#add_guest').val();
    var dataValid = true;

    $('input[name^="add_guest"]').each(function() {
      if($(this).val() == '') {
        dataValid = false;
      }
    });

    if (dataValid){
      if(guest_name == '' || guest_email == '' || guest_no == '') {
        error_text = '* Please fill in required field';
        $('#error_text').text(error_text);
      }
      else {
        error_text = '';
        $('#error_text').text(error_text);
      }
    } else {
      error_text = '* Please fill in required field';
      $('#error_text').text(error_text);
    }    

    if(error_text != '') {
      return false;
    }
    else {
      $.ajax({
        url:"process/booking_action.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          $('#bookingModal').modal('hide');
          $('#formBooking')[0].reset();
          if (data.includes("added")) {
            var guestID = data.split('-').pop();
            // viewAlert(1,'Data succesfully added');
            makePayment(guestID);
          }
        }
      });
    }
  });

  $(document).on('submit', '#formPayment', function(event){
    
    event.preventDefault();
    var error_text_payment = '';
    var bank = $('#bank').val();
    var id = $('#id').val();

    if(bank == '' || id == '') {
      error_text_payment = '* Please fill in required field';
      $('#error_text_payment').text(error_text_payment);
    }
    else {
      error_text_payment = '';
      $('#error_text_payment').text(error_text_payment);
    }  

    if(error_text_payment != '') {
      return false;
    }
    else {
      $.ajax({
        url:"process/payment_action.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          $('#bookingModal').modal('hide');
          $('#paymentModal').modal('hide');
          $('#formPayment')[0].reset();
          $('#formBooking')[0].reset();
          if (data.includes("Paid")) {
            var goToURL = window.location.href + '&success=1';
            goToURL = removeUrlParam(goToURL, 'id');
            window.open(goToURL, '_self');
            // $('#confirmModal').modal('show');
          }
        }
      });
    }
  });

  $(document).on('click', '.cancel', function(){
    var id = $(this).attr("id");
    if(confirm("Are you sure you want to cancel?"))
    {
      $('#bookingModal').modal('hide');
    }
    else
    {
      return false; 
    }
  });

  $(document).on('click', '.cancel-payment', function(){
    var id = $('#id').val();
    var goToURL = window.location.href;
    goToURL = removeUrlParam(goToURL, 'id');
    goToURL = goToURL + '&id=' + id;
    // alert(goToURL);
    if(confirm("Are you sure you want to cancel?"))
    {      
      // $('#paymentModal').modal('hide');
      $.ajax({
        url:"process/booking_cancel_action.php",
        method:'POST',
        data:{
          id:id,
          url:goToURL
        },
        success:function(result)
        {
          $('#paymentModal').modal('hide');
          var goToURL = window.location.href + '&success=0';
          goToURL = removeUrlParam(goToURL, 'id');
          window.open(goToURL, '_self');
        }
      });      
    }
    else
    {
      return false; 
    }
  });
});

function closeModalConfirm() {
  $('#confirmModal').modal('hide');
  var goToURL = window.location.href;
  goToURL = removeUrlParam(goToURL, 'success');
  goToURL = removeUrlParam(goToURL, 'id');
  window.open(goToURL, '_self');
}

function booking(agency, package, room, price, promo) {
  // alert('Agency : ' + agency + '\r\nPackage : ' + package + '\r\nRoom : ' + room + '\r\nPromo : ' + promo);
  $('#formPayment')[0].reset();
  $('#formBooking')[0].reset();
  $('#error_text').text('');
  $('#agency_id').val(agency);
  $('#package_id').val(package);
  $('#package_room_id').val(room);
  $('#promo_id').val(promo);
  $('#guest_booking_price').val(price);
  $('#bookingModal').modal('show');
}

function makePayment(id) { 
  var id = id;
  $.ajax({
  url:"process/booking_fetch_single.php",
  method:"POST",
  data:{id:id},
  dataType:"json",
  success:function(data)
  {
    $('#error_text').text('');
    $('#bookingModal').modal('hide');
    $('#paymentModal').modal('show');
    $('#v_booking_id').val(data.booking_id);
    $('#v_guest_date_depart').val(data.guest_date_depart);
    $('#v_guest_name').val(data.guest_name);
    $('#v_guest_no').val(data.guest_no);
    $('#v_guest_email').val(data.guest_email);
    $('#v_guest_pax').val(data.guest_pax);
    $('#v_guest_deposit').val('RM'+data.guest_deposit);
    $('#v_guest_booking_price').val('RM'+data.guest_booking_price);
    $('#v_country').val(data.country);
    $('#v_agency').val(data.agency);
    $('#v_package').val(data.package+' ('+data.room+')');
    $('#v_actualPrice').val(data.actualPrice);
    $('#v_promo').val(data.promo);
    $('#amount').val(data.guest_deposit);
    $('#id').val(id);
  }
  })
}

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

  if (current_url.includes('filter') || current_url.includes('promo') || current_url.includes('rating')) {

    goToURL = removeUrlParam(goToURL, 'filter');
    goToURL = removeUrlParam(goToURL, 'priceMin');
    goToURL = removeUrlParam(goToURL, 'priceMax');
    goToURL = removeUrlParam(goToURL, 'distMakkah');
    goToURL = removeUrlParam(goToURL, 'distMadinah');
    goToURL = removeUrlParam(goToURL, 'agency');
    goToURL = removeUrlParam(goToURL, 'state');
    goToURL = removeUrlParam(goToURL, 'city');
    goToURL = removeUrlParam(goToURL, 'promo');
    goToURL = removeUrlParam(goToURL, 'rating');
  
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

function viewPackage(id) {
  // alert('hello');
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  var country = urlParams.get('country');
  var dateDepart = urlParams.get('dateDepart');
  var noAdult = urlParams.get('noAdult');
  var noChild = urlParams.get('noChild');
  var packageId = id;
  var goToURL = 'package.php?county='+country+'&dateDepart='+dateDepart+'&noAdult='+noAdult+'&noChild='+noChild+'&package='+packageId;
  window.open(goToURL, '_blank');
}

function filterPromo(name) {  

  var x = location.search;
  var current_url = window.location.href;

  if (x.length > 0 ) {
    var goToURL = (current_url.includes('promo')) ? replaceUrlParam(current_url, 'promo', name): current_url + '&promo=' + name;
  } else {
    var goToURL = current_url + '?promo=' + name;
  }
  
  window.open(goToURL, '_self');

  /* var x = location.search;
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

  window.open(goToURL, '_self'); */
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
  var country = $('#t_country').val();

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  // const country = urlParams.get('country');

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

    goToURL += '&sort=price';
  
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

function paging(y) {

  var x = location.search;
  var current_url = window.location.href;

  if (x.length > 0 ) {
    var goToURL = (current_url.includes('page')) ? replaceUrlParam(current_url, 'page', y): current_url + '&page=' + y;
  } else {
    var goToURL = current_url + '?page=' + y;
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
$(".input-number").keydown(function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});