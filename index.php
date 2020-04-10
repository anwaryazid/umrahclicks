<?php    
  if (!isset($_GET['page'])) {
    header("Location: home.php");   
    exit();
  } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UmrahClicks.my</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>
    .btn-group-xs > .btn, .btn-xs {
      padding: .2rem .3rem;
      font-size: .875rem;
      line-height: .5;
      border-radius: .2rem;
    }
    
    .table th {
      text-align: center;   
    }
        
    .fix-menu {
      overflow: hidden;
      position: fixed;
      left: 0;
      width: 100%;
    }

    .fix-topbar {
      overflow: hidden;
      position: fixed;
      right: 0;
      top: 0;
      z-index: 999;
    }

    .sidenav {
      height: 100%; /* Full-height: remove this if you want "auto" height */
      position: fixed; /* Fixed Sidebar (stay in place on scroll) */
      z-index: 1; /* Stay on top */
      top: 0; /* Stay at the top */
      left: 0;
      overflow-x: hidden; /* Disable horizontal scroll */
    }       

    @media screen and (max-width: 769px) {
      .fix-topbar {
        left: 100px;
        right: 0;
      }
      .main {
        margin-left: 100px; 
      }
    }

    @media screen and (min-width: 770px) {
      .fix-topbar {
        left: 224px;
      }
      .main {
        margin-left: 224px; 
      }
    }
  </style>

</head>

<body id="page-top">

  <div id="wrapper">

    <div id="menu" class="sidenav">
      <?php 
        include('menu.php');
      ?> 
    </div>    

    <div id="content-wrapper" class="d-flex flex-column">     

      <!-- <nav class="navbar navbar-light bg-white topbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ahmad Bin Abu</span>
          </li>
        </ul>        
      </nav> -->

      <div id="content" class="main">      

        <div class="">
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow ">

            <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button> -->
                                    
            <ul class="navbar-nav ml-auto">

              <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-lg-inline text-gray-600 small">Ahmad Bin Abu</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" >
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            
          </nav>
        </div>   
        
        <div class="container-fluid">

          <?php
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
              include("view/$page.php");
            } else {
              include("view/dashboard.php");
            }          
          ?>

        </div>

      </div>
      
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UmrahClicks.my 2020</span>
          </div>
        </div>
      </footer>

    </div>

  </div>
  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
    include('view/modal/mlogout.php');
    include('view/modal/mprofile.php');
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/main.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script type="text/javascript">

    function showAlert(from, result, type) {

      /* 
        result = 1 - Success
        result = 2 - Unsuccesful 

        type = 1 - Register
        type = 2 - Update 
        type = 3 - Remove 
      */

      var typeText = '';
      if (type == 1) {
        var typeText = 'registered.';
      } else if (type == 2) {
        var typeText = 'updated.';
      } else {
        var typeText = 'removed';
      }

      if (result == 1) {

        document.getElementById("textAlertSuccess").innerHTML = from+" succesfully "+typeText;
        $('#success-alert').show('fade');

        setTimeout(function () {
          $('#success-alert').hresulte('fade');
        }, 3000);

      } else if (id == 2) {

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
      

    });
      
  </script>

  <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      include("view/js/j_$page.php");
    } else {
      include("view/js/j_dashboard.php");
    }          
  ?>  

</body>

</html>
