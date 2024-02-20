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
      <h1>Tasks</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
        <a href="tasks.php">TASK</a> &nbsp; |  &nbsp;
        <a href="taskdone.php">COMPLIED TASK</a>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="page">
          <div class="container-fluid">
              <div class="page-header">
          </div>
              </div>
    </div>
            <form action="../process.php" method="POST" enctype="multipart/form-data">
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                              <form class="card-body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                          <div class="card">
                                              <div class="card-header">
                                                  <h3 class="card-title"><i></i>Comply Tasks</h3>
                                              </div>
                                              <div class="row">
                                                <div class="col-xl-6 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col">
                                                      <div class="input-group mb-3">
                                                        <div class="input-group-text">
                                                          <i class="bi bi-person-badge"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="school_id" placeholder="School ID Number" required>
                                                      </div>
                                                      <div class="input-group mb-6">
                                                        <div class="input-group-text">
                                                          <i class="bi bi-buildings"></i>
                                                        </div>
                                                        <select id="inputDept" class="form-control" name="dept" required>
                                                          <option selected>Department...</option>
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
                                                      </div>
                                                      
                                                    </div>
                                                    
                                                  </div>
                                                    <div class="col">
                                                      <label>Upload File</label>
                                                      <input type="file"  name="files" accept=".pptx, .docx, .png, .xlsx, .txt, .jpg, .pdf, .jpeg, .ppt, .doc, .docs, .xls" required></p>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xl-6 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="col">
                                                      <label>Task Code</label>
                                                      <input type="number" class="form-control" name="task_code" placeholder="Input Task Code Here............." required>
                                                    </div>
                                                    <div class="col">
                                                      <label>Task Name</label>
                                                      <input type="text" class="form-control" name="task_name" placeholder="Input Task Name Here................" required>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xl-6 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="col">
                                                      <label>Status</label>
                                                      <input type="text" class="form-control" name="status" >
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                          </div>

                                          <div class="col-sm-12">
                                            <input type="submit" class="btn btn-secondary" name="submit_task" value="SUBMIT">
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
          

            
      <!----
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
                                              <th class="cell">Description</th>
                                              <th class="cell">Deadline</th>
                                              <th class="text-right">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>04-203</td>
                                              <td>Resume</td>
                                              <td>A provided resume from the organization I'll join with.</td>
                                              <td class="text-danger">10-11-2023</td>
                                              <td class="text-right">
                                                  <div class="dropdown dropdown-action">
                                                      <a href="#" class="action-icon dropdown-toggle"
                                                          data-toggle="dropdown" aria-expanded="false"><i
                                                              class="fa fa-ellipsis-v"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-right">
                                                          <a class="dropdown-item" href="#" data-toggle="modal"
                                                              data-target="#edit_task"><i
                                                                  class="fa fa-pen m-r-5"></i> Edit</a>
                                                          <a class="dropdown-item" href="#" data-toggle="modal"
                                                              data-target="#delete_task"><i
                                                                  class="fa fa-trash m-r-5"></i> Delete</a>
                                                      </div>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                            <td>04-120</td>
                                            <td>Weekly Report Evaluation</td>
                                            <td>A provided weekly evaluation report from the company.</td>
                                            <td class="text-danger">10-21-2023</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#edit_task"><i
                                                                class="fa fa-pen m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#delete_task"><i
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
                  <div class="tab-pane fade" id="addnew" role="tabpanel">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i></i>Upload Tasks</h3>
                                  </div>
                                  <div class="card-body">
                                    <form action="../process.php" method="POST" enctype="multipart/form-data">
                                      <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Upload</label>
                                                <input type="file" class="form-control" name="files" accept=".pptx, .ppt, .doc, .docx, .pdf, .txt, .wps, .csv, .xls, .xlsx" required></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Task Name</label>
                                                <input type="text" class="form-control" name="taskname" placeholder="Task Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="desc" placeholder="Description" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                          <input type="submit" class="btn btn-primary" name="taskadd" value="UPLOAD">
                                          <input type="reset" class="btn btn-secondary" value="CLEAR">
                                        </div>
                                      </div>
                                    </form>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div id="delete_task" class="modal fade delete-modal animated rubberBand" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-body text-center">
                  <img src="../assets/images/sent.png" alt="" width="50" height="46">
                  <h3>Are you sure want to delete this tasks?</h3>
                  <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div id="edit_task" class="modal fade delete-modal animated rubberBand" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="row">
                          <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i></i>Update Tasks</h3>
                                  </div>
                                  <form class="card-body">
                                      <div class="row clearfix">
                                          <div class="col-md-6 col-sm-12">
                                              <div class="form-group">
                                                  <label>Task Code</label>
                                                  <input type="number" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-md-6 col-sm-12">
                                              <div class="form-group">
                                                  <label>Task Name</label>
                                                  <input type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-md-6 col-sm-12">
                                              <div class="form-group">
                                                  <label>Description</label>
                                                  <input type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-md-6 col-sm-12">
                                              <div class="form-group">
                                                  <label>Deadline</label>
                                                  <input type="date" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-sm-12">
                                              <button type="submit" class="btn btn-primary">Update</button>
                                              <button type="submit"
                                                  class="btn btn-outline-secondary">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
          </div>
      </div>
  </div>
</div>
--->

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

  <script src="../assets/bundles/lib.vendor.bundle.js"></script>

  <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/form/dropify.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>