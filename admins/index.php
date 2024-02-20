<?php
    include 'c:\xampp\htdocs\ojt\conn.php';
    session_start();
    

    if (empty($_SESSION)){
      ?>
          <script>
              alert("Session Expired!\nPlease Login!");
              window.location.href="../index.php";
          </script>
      <?php
    }else{
    
      $e=$_SESSION['email'];

      $getname=mysqli_query($conn, "SELECT * FROM admin_login WHERE email='$e'");
      while($row=mysqli_fetch_object($getname)){

        $name = $row -> name;
        $id = $row -> sc_id;

    
      }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>OJTIME: OJT-RM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/bck.png" rel="icon">
  <link href="../assets/img/bck.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="../assets/css/animate.min.css">
  
      <!-- Fontawesome -->
      <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
  
      <!-- Core css -->
      <link rel="stylesheet" href="../assets/css/main.css" />

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/bck.png" alt="">
        <span class="d-none d-lg-block">OJTIME: OJT-RM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php

            $e=$_SESSION['email'];

            $getname=mysqli_query($conn, "SELECT * FROM admin_login WHERE email='$e'");
            while($row=mysqli_fetch_object($getname)){

              $name = $row -> name;

              
          ?>
            <span class="d-none d-md-block dropdown-toggle ps-2" ><?php echo $name; ?></span>
            <?php } ?>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name; ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="student.php">
        <i class="bi bi-person-badge"></i>
        <span>Student Lists</span>
      </a>
    </li><!-- End Student Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="coordinator.php">
        <i class="bi bi-person-fill"></i>
        <span>Coordinator Lists</span>
      </a>
    </li><!-- End Coordinator Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="organization.php">
        <i class="bi bi-building"></i>
        <span>Organization Lists</span>
      </a>
    </li><!-- End Organization Page Nav -->

  



  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin Dashboard</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="container-fluid">
        <div class="row">
          <!-- task -->
          <div class="col-xl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>

                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Compiled<span> | Tasks</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list-check"></i>
                    </div>
                    <div class="ps-3">
                      <h3>On Process...</h3>
                      <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End task -->

            <!-- time -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>

                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Time <span>| Hours</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clock-history"></i>
                    </div>
                    
                    <h3>On Process...</h3>
                      </div>
                    
                  </div>
                </div>

              </div>
            </div><!-- End time -->

            
        </div>
        
        

      </div>

      <!---task--->
      <div class="section-body">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row clearfix">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i></i>Student Lists</h3>
                                    </div>
                                    <table id="myTable" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                
                                                <th class="cell">School ID</th>
                                                <th class="cell">Department</th>
                                                <th class="cell">Files</th>
                                                <th class="cell">Task Code</th>
                                                <th class="cell">Task Name</th>
                                                <th class="cell">Download</th>
                                                <th class="cell">Delete</th>
                                                <th class="cell">Status</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $e=$_SESSION['email'];

                                                $gettask= mysqli_query($conn, "SELECT * FROM tasks ORDER BY task_code ASC");
                                                while($row= mysqli_fetch_array($gettask)){
                                                    
                                                  ?>

                                                  <tr>
                                                    
                                                    <td> <?php echo $row['school_id'] ?> </td>
                                                    <td> <?php echo $row['dept'] ?> </td>
                                                    <td> <?php echo $row['files'] ?> </td>
                                                    <td> <?php echo $row['task_code'] ?> </td>
                                                    <td> <?php echo $row['task_name'] ?> </td>
                                                    <td> <a href="download.php?id=<?php echo $row['files'];?>"><i class="bi bi-upload"></i></a></td>
                                                    <td> <a href="delete.php?id=<?php echo $row['files'];?>"><i class="bi bi-trash"></i></a></td>
                                                    <td> <?php echo $row['status'] ?> </td>
                                                  </tr>
                                                    
                                                    


                                                  <?php
                                                }
                                                
                                              ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <!---end task--->

      <!---time--->
      <div class="section-body">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row clearfix">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i></i>Time </h3>
                                    </div>
                                    <table id="myTable" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                               
                                                <th class="cell">School ID</th>
                                                <th class="cell">Department</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Time</th>
                                                <th class="cell">Log</th>
                                                

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $e=$_SESSION['email'];

                                                $gettime= mysqli_query($conn, "SELECT * FROM time_checked ORDER BY date  ASC");
                                                while($row= mysqli_fetch_array($gettime)){
                                                    
                                                  ?>

                                                  <tr>
                                                    
                                                    <td> <?php echo $row['school_id'] ?> </td>
                                                    <td> <?php echo $row['dept'] ?> </td>
                                                    <td> <?php echo $row['date'] ?> </td>
                                                    <td> <?php echo $row['time'] ?> </td>
                                                    <td> <?php echo $row['log'] ?> </td>
                                                    
                                                  </tr>
                                                    
                                                    


                                                  <?php
                                                }
                                                
                                              ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </section>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>