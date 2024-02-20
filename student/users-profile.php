<?php
    include 'c:\xampp\htdocs\ojt\conn.php';
    session_start();

    $e=$_SESSION['email'];

    $getname=mysqli_query($conn, "SELECT * FROM registration WHERE email='$e'");
    while($row=mysqli_fetch_object($getname)){

      $name = $row -> name;
      $id = $row -> sc_id;

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
  * Updated: Aug 30 4043 with Bootstrap v5.3.1
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
        <i class="bi bi-check-circle"></i>
        <span>Status</span>
      </a>
    </li><!-- End Task Page Nav -->





  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      
        <div class="col">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-4">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                      <img src="../assets/img/upload/<?php echo $row['picture'] ?>" width="150px" height="150px" alt="Profile" class="rounded-circle">
                      <h4><?php echo $name; ?></h4>
                      <div class="social-links mt-4">
                        <a href="<?php echo $row['fb']; ?>"><i class="bi bi-facebook"></i></a>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                      <?php

                        $e=$_SESSION['email'];

                        $getprofile= mysqli_query($conn, "SELECT * FROM create_profile WHERE school_id='$id'");
                        while($row= mysqli_fetch_array($getprofile)){
                            
                          ?>
                            
                            <hr></hr>
                            <h2>My Profile</h2><hr>

                            <h4>First Name: <?php echo $row['fname']; ?> </h4>
                            <h4>Middle Name: <?php echo $row['mname']; ?> </h4>
                            <h4>Last Name: <?php echo $row['lname']; ?> </h4>
                            <h4>Age: <?php echo $row['age']; ?> </h4>
                            <h4>Gender: <?php echo $row['gender']; ?> </h4>
                            <h4>School ID: <?php echo $row['school_id']; ?> </h4>
                            <h4>Contact: <?php echo $row['contact']; ?> </h4>
                            <h4>Facebook: <?php echo $row['fb']; ?> </h4>
                            <h4>Address: <?php echo $row['address']; ?> </h4>

                            <hr>
                            <h2>Education Profile</h2><hr>

                            <h4>Department: <?php echo $row['dept']; ?> </h4>
                            <h4>Course: <?php echo $row['course']; ?> </h4>
                            <h4>Major: <?php echo $row['major']; ?> </h4>

                            <hr>
                            <h2>Department Profile | <?php echo $row['dept']; ?></h2><hr>

                            <h4>Coordinator: <?php echo $row['coordinator']; ?> </h4>
                            <h4>Contact Number: <?php echo $row['coor_contact']; ?> </h4>
                            <h4>Email: <?php echo $row['coor_email']; ?> </h4>

                            <hr>
                            <h2>Employer Profile | <?php echo $row['company']; ?></h2><hr>
                            
                            <h4>Name: <?php echo $row['e_name']; ?> </h4>
                            <h4>Position: <?php echo $row['position']; ?> </h4>
                            <h4>Contact Number: <?php echo $row['e_contact']; ?> </h4>
                            <h4>Email: <?php echo $row['e_email']; ?> </h4>


                          <?php
                        }
                        
                      ?>

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