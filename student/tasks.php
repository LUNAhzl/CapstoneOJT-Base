<?php
    // Include database connection file
    include 'c:\xampp\htdocs\ojt\conn.php';

    // Start the session
    session_start();

    // Retrieve email from session
    $e = $_SESSION['email'];

    // Fetch school ID from registration table based on email
    $getname = mysqli_query($conn, "SELECT * FROM registration WHERE email='$e'");
    if (!$getname) {
        die("Error: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_object($getname)){
        $sc_id = $row->sc_id;
    }

    // Fetch course from create_profile table based on school ID
    $getcourse = mysqli_query($conn, "SELECT * FROM create_profile WHERE sc_id='$sc_id'");
    if (!$getcourse) {
        die("Error: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_object($getcourse)){
        $lname = $row->lname;
        $fname = $row->fname;
        $mname = $row->mname;
        $section = $row->section;
        $course = $row->course;
    }

    // Fetch task code, task name, and task action from taskadd table
    $gettasks = mysqli_query($conn, "SELECT task_code, task_name, task_action FROM taskadd");
    if (!$gettasks) {
        die("Error: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_object($gettasks)){
        $taskcode = $row->task_code;
        $taskname = $row->task_name;
        $taskaction = $row->task_action;
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
              <hr class="dropdown-divider">
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
      <a class="nav-link collapsed" href="tasks.php">
        <i class="bi bi-list-task"></i>
        <span>Tasks</span>
      </a>
    </li><!-- End Task Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="log.php">
        <i class="bi bi-check2-circle"></i>
        <span>Time Log</span>
      </a>
    </li><!-- End Task Page Nav -->

    <li class="nav-heading">Profiles</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.php">
        <i class="bi bi-person-bounding-box"></i>
        <span>My Profile</span>
      </a>
    </li><!-- End Task Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-person-circle"></i>
        <span>Create Profile</span>
      </a>
    </li><!-- End Task Page Nav -->



  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
      <h1>Tasks</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Tasks</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="page">
          <div class="container-fluid">
              <div class="page-header">
          </div>
              </div>
    </div>

    <div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="list" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <table id="myTable" class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Task Code</th>
                                        <th class="cell">Task Name</th>
                                        <th class="cell">Deadline</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch tasks from the database
                                    $getTasksQuery = mysqli_query($conn, "SELECT * FROM taskadd");
                                    while ($task = mysqli_fetch_assoc($getTasksQuery)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $task['task_code']; ?></td>
                                            <td><?php echo $task['task_name']; ?></td>
                                            <td class="text-danger"><?php echo $task['deadline']; ?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#comply_task_<?php echo $task['task_code']; ?>"><i
                                                                class="fa fa-th-list m-r-5"></i> Comply</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Comply Task Modal -->
                                        <div id="comply_task_<?php echo $task['task_code']; ?>" class="modal fade delete-modal animated rubberBand"
                                            role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title"><i></i>Comply Task</h3>
                                                                </div>
                                                                <form action="../process.php" method="POST" enctype="multipart/form-data">
                                                                              <div class="section-body mt-3">
                                                                                  <div class="container-fluid">
                                                                                      <div class="row clearfix">
                                                                                          <div class="col-lg-12">
                                                                                              <div class="card">
                                                                                                  <div class="card-body">
                                                                                                      <div class="row clearfix">
                                                                                                          <div class="col-sm-12">
                                                                                                              <div class="card">
                                                                                                                  <div class="card-header">
                                                                                                                      <h3 class="card-title"><i></i>Comply Tasks</h3>
                                                                                                                  </div>
                                                                                                                  <div class="row">
                                                                                                                      <div class="col-xl-12 col-sm-16">
                                                                                                                          <div class="form-group">
                                                                                                                          <div class="row">
                                                                                                                                  <div class="col">
                                                                                                                                      <div class="input-group mb-3">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-person-badge"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>" required>
                                                                                                                                      </div>
                                                                                                                                      <div class="input-group mb-3">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-person-bounding-box"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>" required>
                                                                                                                                      </div>
                                                                                                                                      <div class="input-group mb-6">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-person-circle"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="mname" value="<?php echo $mname;?>" required>
                                                                                                                                      </div>
                                                                                                                                  </div>
                                                                                                                              </div>
                                                                                                                              <div class="row">
                                                                                                                                  <div class="col">
                                                                                                                                      <div class="input-group mb-3">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-list"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="sc_id" value="<?php echo $sc_id;?>" required>
                                                                                                                                      </div>
                                                                                                                                      <div class="input-group mb-6">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-video"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="section" value="<?php echo $section;?>" required>
                                                                                                                                      </div>
                                                                                                                                      <div class="input-group mb-6">
                                                                                                                                          <div class="input-group-text">
                                                                                                                                              <i class="bi bi-buildings"></i>
                                                                                                                                          </div>
                                                                                                                                          <input type="text" class="form-control" name="dept" value="<?php echo $course;?>" required>
                                                                                                                                      </div>
                                                                                                                                  </div>
                                                                                                                              </div>
                                                                                                                          </div>
                                                                                                                          <div class="col">
                                                                                                                              <label>Upload File</label>
                                                                                                                              <input type="file" name="files" accept=".pptx, .docx, .png, .xlsx, .txt, .jpg, .pdf, .jpeg, .ppt, .doc, .docs, .xls" required></p>
                                                                                                                          </div>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  <div class="row">
                                                                                                                      <div class="col-xl-6 col-sm-12">
                                                                                                                          <div class="form-group">
                                                                                                                              <div class="col">
                                                                                                                                  <label>Task Code</label>
                                                                                                                                  <input type="number" class="form-control" name="task_code" value="<?php echo $taskcode;?>" required>
                                                                                                                              </div>
                                                                                                                              <div class="col">
                                                                                                                                  <label>Task Name</label>
                                                                                                                                  <input type="text" class="form-control" name="task_name" value="<?php echo $taskname;?>" required>
                                                                                                                              </div>
                                                                                                                              <div class="col">
                                                                                                                                  <label>Status</label>
                                                                                                                                  <input type="text" class="form-control" name="task_action" value="<?php echo $taskaction;?>" required>
                                                                                                                              </div>
                                                                                                                          </div>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  
                                                                                                                  <div class="col-sm-12">
                                                                                                                      <input type="submit" class="btn btn-secondary" name="submit_task" value="SUBMIT">
                                                                                                                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                                                                                  </div>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </form>

                                                                                                                      
                                                                                                                  </div>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
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
                                                    </div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  <div class="copyright">
      &copy; Developed by <strong><span>D' AZE</span></strong>. All Rights Reserved
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

  <script src="../assets/bundles/lib.vendor.bundle.js"></script>

  <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/form/dropify.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>