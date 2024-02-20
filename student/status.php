<?php
    include 'c:\xampp\htdocs\ojt\conn.php';
    session_start();

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

          <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php

            $e=$_SESSION['email'];

            $getname=mysqli_query($conn, "SELECT * FROM registration WHERE email='$e'");
            while($row=mysqli_fetch_object($getname)){

              $name = $row -> name;

              
          ?>
            <span class="d-none d-md-block dropdown-toggle ps-4" ><?php echo $name; ?></span>
            <?php } ?>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name; ?></h6>
              <span>Student</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../index.php">
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
      <a class="nav-link collapsed" href="create_profile.php">
        <i class="bi bi-person-circle"></i>
        <span>Create Profile</span>
      </a>
    </li><!-- End Task Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="tasks.php">
        <i class="bi bi-list-task"></i>
        <span>Comply Tasks</span>
      </a>
    </li><!-- End Task Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="status.php">
        <i class="bi bi-check2-circle"></i>
        <span>Status</span>
      </a>
    </li><!-- End Task Page Nav -->





  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Status</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Status</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!---
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Status</h5>
              

              
              <table class="table datatable">

                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Time-in</th>
                    <th scope="col">Status</th>
                    <th scope="col">Time-out</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">2023-07-15</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>08:00 AM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>07:00 PM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-16</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>07:00 AM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>09:00 PM</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-17</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>04:00 AM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>06:00 PM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-23</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>05:00 AM</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>08:00 PM</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-24</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>06:00 AM</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td>09:00 PM</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-25</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>04:00 AM</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td>09:00 PM</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2023-07-28</th>
                    <td>Hazel Mae Luna</td>
                    <td>Park Inn By Radisson Iloilo</td>
                    <td>2023-07-15</td>
                    <td>2024-09-21</td>
                    <td>06:00 AM</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>08:00 PM</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="fa fa-ellipsis-v"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#edit_student"><i
                                      class="fa fa-pen m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal"
                                  data-target="#delete_student"><i
                                      class="fa fa-trash m-r-5"></i> Delete</a>
                          </div>
                      </div>
                  </td>
                  </tr>
                </tbody>
              </table>
              

            </div>
          </div>

        </div>
      </div>
    </section>
            -->
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
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <script src="../assets/bundles/lib.vendor.bundle.js"></script>

  <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/form/dropify.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>