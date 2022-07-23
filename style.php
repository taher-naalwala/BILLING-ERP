<html>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
    <div class="sidebar-brand-icon rotate-n-15">

    </div>
    <div class="sidebar-brand-text mx-3">Billing Software</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="main.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Powers
  </div>

  <?php
  $forms_access = $_SESSION['forms_access'];
  if (in_array("1", $forms_access) || in_array("2", $forms_access) || in_array("3", $forms_access) || in_array("4", $forms_access)) {

  ?>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-globe-americas"></i>
        <span>Country</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Country Powers:</h6>
          <?php



          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "2" || $formid == "1") {
            ?>
              <a class="collapse-item" href="add.php?name=Country">Add</a>
              <hr>
            <?php
            }
            if ($formid == "3" || $formid == "1") {
            ?>
              <a class="collapse-item" href="edit.php?name=Country">Edit</a>
              <hr>
            <?php
            }
            ?>
            <?php
            if ($formid == "4" || $formid == "1") {
            ?>
              <a class="collapse-item" href="remove.php?name=Country">Delete</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }



  ?>


  <?php
  if (in_array("5", $forms_access) || in_array("6", $forms_access) || in_array("7", $forms_access) || in_array("8", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwore" aria-expanded="true" aria-controls="collapseTwore">
        <i class="fas fa-university"></i>
        <span>University</span>
      </a>
      <div id="collapseTwore" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">University Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "6" || $formid == "5") {
            ?>
              <a class="collapse-item" href="add.php?name=University">Add</a>
              <hr>
            <?php
            }
            if ($formid == "7" || $formid == "5") {
            ?>
              <a class="collapse-item" href="edit.php?name=University">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "8" || $formid == "5") {
            ?>
              <a class="collapse-item" href="remove.php?name=University">Remove</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>

  <?php
  if (in_array("9", $forms_access) || in_array("10", $forms_access) || in_array("11", $forms_access)  || in_array("12", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwot" aria-expanded="true" aria-controls="collapseTwot">
        <i class="fas fa-city"></i>
        <span>Campus</span>
      </a>
      <div id="collapseTwot" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Campus Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "10" || $formid == "9") {
            ?>
              <a class="collapse-item" href="add.php?name=Campus">Add</a>
              <hr>
            <?php
            }
            if ($formid == "11" || $formid == "9") {
            ?>
              <a class="collapse-item" href="edit.php?name=Campus">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "12" || $formid == "9") {
            ?>
              <a class="collapse-item" href="remove.php?name=Campus">Remove</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>
  <?php
  if (in_array("13", $forms_access) || in_array("14", $forms_access) || in_array("15", $forms_access) || in_array("16", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwob" aria-expanded="true" aria-controls="collapseTwob">
        <i class="fas fa-user-tie"></i>
        <span>Agency</span>
      </a>
      <div id="collapseTwob" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Agency Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "14" || $formid == "13") {
            ?>
              <a class="collapse-item" href="add.php?name=Agency">Add</a>
              <hr>
            <?php
            }
            if ($formid == "15" || $formid == "13") {
            ?>
              <a class="collapse-item" href="edit.php?name=Agency">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "16" || $formid == "13") {
            ?>
              <a class="collapse-item" href="remove.php?name=Agency">Delete</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>








  <?php
  if (in_array("17", $forms_access) || in_array("18", $forms_access) || in_array("20", $forms_access) || in_array("21", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwos">
        <i class="fas fa-database"></i>
        <span>Entry</span>
      </a>
      <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Entry Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "18" || $formid == "17") {
            ?>
              <a class="collapse-item" href="add.php?name=Entry">Add</a>
              <hr>
            <?php
            }
            
            if ($formid == "20" || $formid == "17") {
            ?>
              <a class="collapse-item" href="edit.php?name=Entry">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "21" || $formid == "17") {
            ?>
              <a class="collapse-item" href="remove.php?name=Entry">Delete</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>





<?php
  if (in_array("27", $forms_access) || in_array("28", $forms_access)  || in_array("30", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwop" aria-expanded="true" aria-controls="collapseTwop">
        <i class="fas fa-camera"></i>
        <span>Photo Upload</span>
      </a>
      <div id="collapseTwop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Upload Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "27" || $formid == "28") {
            ?>
              <a class="collapse-item" href="addphoto.php?name=Photo">Add</a>
              <hr>
            <?php
            }
           
            if ($formid == "27" || $formid == "30") {
            ?>
              <a class="collapse-item" href="remove.php?name=Photo">Remove</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>

<?php
  if (in_array("31", $forms_access) || in_array("19", $forms_access) || in_array("32", $forms_access) || in_array("33", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoled" aria-expanded="true" aria-controls="collapseTwos">
      <i class="fas fa-file-invoice-dollar"></i>
        <span>Ledger</span>
      </a>
      <div id="collapseTwoled" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Ledger Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "19" || $formid == "31") {
            ?>
              <a class="collapse-item" href="finish_entry.php">Complete</a>
              <hr>
            <?php
            }
            if ($formid == "32" || $formid == "31") {
            ?>
              <a class="collapse-item" href="edit_ledger.php">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "33" || $formid == "31") {
            ?>
              <a class="collapse-item" href="ledger_report.php">Report</a>
            <?php
            }
           
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>

  <?php
  if (in_array("22", $forms_access) || in_array("23", $forms_access) || in_array("24", $forms_access) || in_array("25", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoa" aria-expanded="true" aria-controls="collapseTwoa">
        <i class="fas fa-key"></i>
        <span>Access</span>
      </a>
      <div id="collapseTwoa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Access Powers:</h6>
          <?php
          $forms_access = $_SESSION['forms_access'];


          foreach ($forms_access as $formid) {
          ?>


            <?php
            if ($formid == "23" || $formid == "22") {
            ?>
              <a class="collapse-item" href="add.php?name=Access">Add</a>
              <hr>
            <?php
            }
            ?>
            <?php
            if ($formid == "24" || $formid == "22") {
            ?>
              <a class="collapse-item" href="edit.php?name=Access">Edit</a>
              <hr>
            <?php
            }
            if ($formid == "25" || $formid == "22") {
            ?>
              <a class="collapse-item" href="remove.php?name=Access">Delete</a>
          <?php
            }
          }
          ?>


        </div>
      </div>
    </li>
  <?php
  }
  ?>





  <?php
  if (in_array("26", $forms_access)) {

  ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php


    foreach ($forms_access as $formid) {
    ?>


      <?php
      if ($formid == "26") {
      ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="report.php">
            <i class="fas fa-clipboard"></i>
            <span>Reports</span></a>
        </li>
  <?php
      }
    }
  }

  ?>





  <hr class="sidebar-divider">
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="logout.php">
      <i class="fas fa-sign-out-alt"></i>
      <span>LogOut</span></a>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">





        <div class="topbar-divider d-none d-sm-block"></div>


        <a class="nav-link">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Full_Name']  ?></span>
        </a>


      </ul>

    </nav>
    <!-- End of Topbar -->

    <script>
      $(document).click(function(e) {

        if (!$(e.target).is('.nav-link')) {
          $('#collapseTwo').removeClass("show");
          $('#collapseTwore').removeClass("show");
          $('#collapseTwot').removeClass("show");
          $('#collapseTwob').removeClass("show");
          $('#collapseTwog').removeClass("show");
          $('#collapseTwor').removeClass("show");
          $('#collapseTwos').removeClass("show");
          $('#collapseTwoa').removeClass("show");
        }
      });
    </script>

</html>