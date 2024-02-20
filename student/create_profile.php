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
      <h1>Create Profile</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Create Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Recent Activity -->
        <div class="card">
            <div class="card-body">

              <div class="activity">

                <form action="../process.php" method="POST" enctype="multipart/form-data">

                    <h3>Student Profile</h3>
                    <hr>

                    <div class="col">
                        <label">Picture</label>
                        <input type="file" class="form-control" name="pic" accept=".jpg, .jpeg, .png, .jfif, .webp" required></p>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="inputName4">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                      </div>
                      <div class="col">
                        <label for="inputName4">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name" required>
                      </div>
                      <div class="col">
                        <label for="inputName4">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <label for="inputAge">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Age" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputGender">Gender</label>
                        <select id="inputGender" class="form-control" name="gender" required>
                              <option selected>Choose...</option>
                              <option>...</option>
                              <option>Female</option>
                              <option>Male</option>
                            </select>
                      </div>
                    </div>
    
                    <div class="row">
                      <div class="col">
                        <label for="inputID">School ID Number</label>
                        <input type="text" class="form-control" name="school_id" placeholder="School ID Number" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" id="inputContact" name="contact" placeholder="Contact Number" required>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="inputFB">Facebook Link</label>
                            <input type="text" class="form-control" name="facelink" placeholder="Facebook Link" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" required>
                        </div>

                    </div>

                    
                    <div class="row">
                        <div class="col">
                            <label for="inputDept">Department</label>
                            <select id="inputDept" class="form-control" name="dept" required>
                              <option selected>Choose...</option>
                              <option>...</option>
                              <option>College of Accountancy</option>
                              <option>College of Allied Health Sciences</option>
                              <option>College of Arts and Sciences</option>
                              <option>College of Education</option>
                              <option>College of Engineering</option>
                              <option>College of Information Technology Education</option>
                              <option>College of Management</option>
                              <option>College of Maritime Education</option>
                              <option>School of Criminology and Criminal Justice</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputCourse">Course</label>
                            <select id="inputCourse" class="form-control" name="course" required>
                              <option selected>Choose...</option>
                              <option>...</option>
                              <option>Bachelor of Elementary Education</option>
                              <option>Bachelor of Secondary Education</option>
                              <option>Bachelor of Arts in Psychology</option>
                              <option>Bachelor of Science in Accountancy</option>
                              <option>Bachelor of Science in Accounting Information System</option>
                              <option>Bachelor of Science in Business Administration</option>
                              <option>Bachelor of Science in Civil Engineering</option>
                              <option>Bachelor of Science in Criminology</option>
                              <option>Bachelor of Science in Hospitality Management</option>
                              <option>Bachelor of Science in Information Technology</option>
                              <option>Bachelor of Science in Marine Engineering</option>
                              <option>Bachelor of Science in Mechanical Engineering</option>
                              <option>Bachelor of Science in Nursing</option>
                              <option>Bachelor of Science in Pharmacy</option>
                              <option>Bachelor of Science in Special Needs Education</option>
                              <option>Bachelor of Science in Tourism Management</option>
                            </select>

                        </div>

                        <div class="col">
                            <label for="inputMajor">Major</label>
                            <select id="inputMajor" class="form-control" name="major" required>
                              <option selected>Choose...</option>
                              <option>...</option>
                              <option>Major in Financial Management</option>
                              <option>Major in Marketing Management</option>
                              <option>Major in English Subject</option>
                              <option>Major in General Subjects</option>
                              <option>Major in Animation</option>
                              <option>Major in Business Informatics</option>
                              <option>Major in Computer Security</option>
                              <option>Major in Digital Arts</option>
                              <option>Major in Programming</option>
                              <option>Major in Systems Development</option>
                              <option>Major in Web Development</option>
                            </select>

                        </div>

                    </div>
    
                      <hr>
    
                      <h3>Coordinator Profile</h3>
                      <hr>
    
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="inputCoordinator">Coordinator Name</label>
                          <select id="inputCoordinator" class="form-control" name="coordinator" required>
                            <option selected>Choose...</option>
                            <option>...</option>
                            <option>Hazel Mae Luna</option>
                            <option>Eunice Tricxie Paulino</option>
                            <option>Ma. Quennie Lozada</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputContact">Contact Number</label>
                          <input type="text" class="form-control" id="inputContact" name="c_contact" placeholder="Contact Number" required>
                        </div>
                      </div>
    
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="c_email" placeholder="Email" required>
                      </div>
    
                      <hr>
    
                      <h3>Employer Profile</h3>
                      <hr>
    
                      <div class="row">
                        <div class="col">
                          <label for="inputName4">Name</label>
                          <input type="text" class="form-control" name="ename" placeholder="Name" required>
                        </div>
                        <div class="col">
                          <label for="inputPosition">Position</label>
                          <input type="text" class="form-control" name="position" placeholder="Position" required>
                        </div>
                      </div>
    
                      <div class="row">
                        <div class="col">
                          <label for="inputComp">Company Name</label>
                          <input type="text" class="form-control" name="company" placeholder="Company Name" required>
                            
                          </in>
                        </div>
                        <div class="col">
                          <label for="inputContact">Contact Number</label>
                          <input type="text" class="form-control" id="inputContact" name="econtact" placeholder="Contact Number" required>
                        </div>
                        <div class="col">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="e_email" placeholder="Email" required>
                          </div>
                      </div>
    
                      <hr>
    
                      <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary" value="CLEAR">
                        <input type="submit" class="btn btn-primary" name="create_profile" value="CREATE">
                      </div>
                   
                </form>

              </div>

            </div>
          </div><!-- End Recent Activity -->

          
              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

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