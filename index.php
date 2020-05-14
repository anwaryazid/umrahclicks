<?php    
  date_default_timezone_set("Asia/Kuala_Lumpur");

  session_start();

  if (!isset($_SESSION['userName'])) {
    header("Location: home.php");
  }

  $user_name = $_SESSION['userName'];
  $user_id = $_SESSION['userId'];
  
  if (isset($_POST['mid']) && isset($_POST['m2id'])) {
    $mid = $_POST['mid'];
    $m2id = $_POST['m2id'];
    require("lib/conn.php");
    if ($m2id == '0') {
      $result = $conn->query("SELECT * FROM menu WHERE mid = '".$mid."'") or die(mysqli_error($conn));
      foreach($result as $row) {
        $pg_address = $row['menuPath'];
      }
    } else {
      $result = $conn->query("SELECT * FROM menu2nd WHERE m2id = '".$m2id."'") or die(mysqli_error($conn));
      foreach($result as $row) {
        $pg_address = $row['menu2ndPath'];
      }
    }    
  } 
  else {
    echo '<script> parent.location="login.php"; </script>';
    exit;
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

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/main-custom.css" rel="stylesheet">

  <link href="css/bootstrap-datepicker.css" rel="stylesheet">

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script type="text/javascript">

    
    function changePassword() {
      var id = <?= $_SESSION['userId'] ?>;
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
    if (<?= $_SESSION['firstTimeLogin'] ?> == 1) {
      window.onload = changePassword;
    }
  </script>

</head>

<body id="page-top">

  <div id="wrapper">
    
    <div class="sidenav">
      <?php 
        include('menu.php');
      ?> 
    </div>    

    <div id="content-wrapper" class="d-flex flex-column">     

      <div id="content" class="main">     
        
        <?php include('view/modal/malert.php'); ?>

        <div class="fix-topbar">
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm ">

            <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button> -->
                                    
            <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-lg-inline text-gray-800 small"><?= $_SESSION['userFullName']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" >
                  <a class="dropdown-item" href="#" onclick="viewProfile('<?= $_SESSION['userId'] ?>');">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile 
                  </a>
                  <a class="dropdown-item" href="#" onclick="changePassword('<?= $_SESSION['userId'] ?>');">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password 
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

        <form action="index.php" id="form_menu" method="post">
          <input type="hidden" name="mid" id="mid" value="<?= $pg_address ?>">
          <input type="hidden" name="m2id" id="m2id" value="<?= $pg_address ?>">
        </form>
        
        <div class="container-fluid">

          <?php
            include("view/$pg_address.php");   
          ?>

        </div>

      </div>
      
      <footer class="sticky-footer bg-white footer">
        <div class="container my-auto ">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UmrahClicks.my <?php echo date('Y'); ?></span>
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
    include('view/modal/mpassword.php');
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

  <script src="js/bootstrap-datepicker.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <?php
    include("view/js/j_$pg_address.php");
  ?>  

</body>

</html>
