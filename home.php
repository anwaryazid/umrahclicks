<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UmrahClicks.my</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/main.css" rel="stylesheet">
  <!-- <link href="css/jquery.datetimepicker.min.css" rel="stylesheet"> -->
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">
  
  <style>
    .container2 {
      padding-right: 2.5rem;
      padding-left: 2.5rem;
      margin-right: auto;
      margin-left: auto;
    }
    .caros {
        max-width: 100%;
        min-height: 100%;
        display: block; /* remove extra space below image */
        object-fit: cover;
    }
    .box{
        height: 550px;        
    }    

    @media screen and (max-width: 1200px) {
      .container2 {
        max-width: 650px;
      }
    } 
  </style>

</head>

<body class="">

  <div class="container2">   

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-xl-8 col-md-12 d-none d-xl-block">
            <div id="imgIndicator" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                <li data-target="#imgIndicator" data-slide-to="1"></li>
                <li data-target="#imgIndicator" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active box">
                  <img class="d-block caros w-100" src="img/smart1.jpg">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros w-100" src="img/smart2.jpg">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros w-100" src="img/kaabah.jpg">
                </div>
              </div>
              <a class="carousel-control-prev" href="#imgIndicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#imgIndicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-12">
            <div class="p-5">
              <div class="text-center">
                <h5 class="h5 text-primary mb-4" style="font-weight: 700;"><i class="fas fa-fw fa-kaaba text-gray-900"></i>&nbsp;UmrahClicks.my</h5>
              </div>
              <form>
                <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Country</label>
                  <div class="col-sm-7">
                    <select class="form-control form-control-sm" id="country">
                      <option value="">Select Country</option>
                      <option value="Malaysia" selected>Malaysia</option>
                    </select>
                  </div>                 
                </div>
                <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Date Depart From</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="date_Depart" name="date_Depart" placeholder="dd/mm/yyyy">
                  </div>               
                </div>
                <!-- <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Adult</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="no_adult" placeholder="No. of Adult">
                  </div>                 
                </div>                
                <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Children</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="no_children" placeholder="No. of Children">
                  </div>                
                </div> -->
                <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Adult</label>
                  <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary btn-number" type="button" id="button-minus-min" data-type="minus" data-field="quant[1]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[1]" class="form-control text-center input-number" id="no_adult" placeholder="No. of Adult" min="0" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-number" type="button" id="button-plus-min" data-type="plus" data-field="quant[1]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>                 
                </div>
                <div class="form-group row text-md">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Children</label>
                  <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary btn-number" type="button" id="button-minus-min" data-type="minus" data-field="quant[2]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[2]" class="form-control text-center input-number" id="no_children" placeholder="No. of Children" min="0" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-number" type="button" id="button-plus-min" data-type="plus" data-field="quant[2]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>                 
                </div>
                <a href="packages.php" class="btn btn-outline-primary btn-block" style="font-size: 0.9rem;">
                  <i class="fas fa-search fa-sm"></i> Search
                </a>                
              </form>
              <hr>
              <div class="text-center"> 
                <a class="small" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a> | 
                <a class="small" href="packages.php">Packages</a> | 
                <a class="small" href="#" data-toggle="modal" data-target="#contactModal">Contact Us</a>
              </div>
              <hr class="d-none d-sm-block">
              <div class="text-center d-none d-sm-block">
                <a class="small" href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      include('view/modal/mcontact.php');
      include('view/modal/magencies.php');
    ?>

    <div class="row">
      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary text-md">Jawrah Info</h6>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-md">Package 1</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/smart1.jpg">
            <br>
            <p>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</p>
          </div>
          <div class="card-footer bg-white">
            <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">Go to Page &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-md">Package 2</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/epl1.JPG">
            <br>
            <p>EPL Travel & Tours Sdn Bhd</p>
          </div>
          <div class="card-footer bg-white">
            <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">Go to Page &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-md">Package 3</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/epl2.JPG">
            <br>
            <p>EPL Travel & Tours Sdn Bhd</p>
          </div>
          <div class="card-footer bg-white">
            <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">Go to Page &rarr;</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/main.js"></script>

  <!-- <script src="js/date-picker.js"></script> -->
  <!-- <script src="js/jquery.datetimepicker.full.min.js"></script> -->
  <script src="js/bootstrap-datepicker.js"></script>

  <script>
    $(function() {
      $('#date_Depart').datepicker({
        'format': 'dd/mm/yyyy',
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
    $('.input-number').change(function() {

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


    });
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
  </script>

</body>

</html>
