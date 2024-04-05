<?php
// Include your database connection file
include 'c:\xampp\htdocs\ojt\conn.php';
session_start();

// Redirect if session email is empty
if (empty($_SESSION['email'])) {
    header("Location: ../index.php");
    exit(); // Ensure script stops executing after redirection
}

$employer_email = $_SESSION['email'];

// Fetch logged-in employer's company
$companyQuery = mysqli_prepare($conn, "SELECT company FROM reg_employer WHERE email = ?");
mysqli_stmt_bind_param($companyQuery, "s", $employer_email);
mysqli_stmt_execute($companyQuery);
mysqli_stmt_bind_result($companyQuery, $logged_in_company);
mysqli_stmt_fetch($companyQuery);
mysqli_stmt_close($companyQuery);

// Count total students associated with the logged-in company
$countStudentsQuery = mysqli_prepare($conn, "SELECT COUNT(*) FROM create_profile WHERE company = ?");
mysqli_stmt_bind_param($countStudentsQuery, "s", $logged_in_company);
mysqli_stmt_execute($countStudentsQuery);
mysqli_stmt_bind_result($countStudentsQuery, $totalStudents);
mysqli_stmt_fetch($countStudentsQuery);
mysqli_stmt_close($countStudentsQuery);

// Count total remarks for applicants associated with the logged-in company
$countRemarksQuery = mysqli_prepare($conn, "SELECT COUNT(*) FROM give_remarks WHERE company = ?");
mysqli_stmt_bind_param($countRemarksQuery, "s", $logged_in_company);
mysqli_stmt_execute($countRemarksQuery);
mysqli_stmt_bind_result($countRemarksQuery, $totalRemarks);
mysqli_stmt_fetch($countRemarksQuery);
mysqli_stmt_close($countRemarksQuery);

// Fetch applicant profiles associated with the logged-in company
$getProfileQuery = mysqli_prepare($conn, "SELECT sc_id, lname, fname, mname, e_name FROM create_profile WHERE company = ?");
mysqli_stmt_bind_param($getProfileQuery, "s", $logged_in_company);
mysqli_stmt_execute($getProfileQuery);
mysqli_stmt_bind_result($getProfileQuery, $sc_id, $lname, $fname, $mname, $ename);

// Store the fetched profiles in an array
$applicants = array();
while (mysqli_stmt_fetch($getProfileQuery)) {
    $applicant = array(
        'sc_id' => $sc_id,
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'e_name' => $ename
    );
    $applicants[] = $applicant;
}
mysqli_stmt_close($getProfileQuery);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>OJTIME: OJT-RM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
    .filter-container {
        display: flex;
        align-items: center; /* Align items vertically */
        margin-bottom: 10px; /* Adjust margin as needed */
    }

    .filter-section {
        margin-right: 10px; /* Adjust spacing between filter sections */
        margin-left: 10px;
    }

    .filter-section label {
        font-weight: bold;
        margin-right: 5px;
    }

    .filter-section select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
        font-size: 14px;
        outline: none;
    }

    .filter-form {
    display: flex;
    flex-wrap: wrap;
    }

    .filter-section {
        margin-right: 10px; /* Adjust as needed for spacing between filters */
        margin-bottom: 10px; /* Adjust as needed for spacing between rows */
    }

    .filter-section label {
        margin-right: 5px;
    }

    .filter-section select,
    .filter-section input[type="text"] {
        width: 70px; /* Adjust as needed for input width */
    }

    /* Button styles */
    .filter-form button {
        padding: 8px 8px;
        padding-bottom: 5px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .filter-form button:hover {
        background-color: #45a049;
    }

  </style>

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

      <link rel="stylesheet" href="../admins/assets/css/style.css">

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

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php

            $e=$_SESSION['email'];

            $getname=mysqli_query($conn, "SELECT * FROM reg_employer WHERE email='$e'");
            while($row=mysqli_fetch_object($getname)){

              $name = $row -> name;

              
          ?>
            <span class="d-none d-md-block dropdown-toggle ps-2" ><?php echo $name; ?></span>
            <?php } ?>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name; ?></h6>
              <span>Employer</span>
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
        <span>Applicants</span>
      </a>
    </li><!-- End Student Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="remarks.php">
        <i class="bi bi-person-fill"></i>
        <span>Remarks</span>
      </a>
    </li><!-- End Coordinator Page Nav -->



  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employer Dashboard</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Employer Dashboard</li>
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
                  <h5 class="card-title">Submitted<span> | Remarks</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list-check"></i>
                    </div>
                    <div class="ps-3">
                      <h2>Total remarks submitted: <?php echo $totalRemarks; ?></h2>
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
                  <h5 class="card-title">Total <span>| Applicant Lists</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    
                    <h2>Total applicant listed: <?php echo $totalStudents; ?></h2>
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
            <div class="tab-pane fade show active" id="task-list" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i></i>Student Remarks</h3>
                            </div>
                            <?php
                                // Fetch class section options from the database
                                $classSectionOptions = array();
                                $getSections = mysqli_query($conn, "SELECT DISTINCT section FROM create_profile");
                                while ($sectionRow = mysqli_fetch_array($getSections)) {
                                    $classSectionOptions[] = $sectionRow['section'];
                                }

                                // Fetch unique departments from the database
                                $departments = array();
                                $getDepartments = mysqli_query($conn, "SELECT DISTINCT course FROM create_profile");
                                while ($deptRow = mysqli_fetch_array($getDepartments)) {
                                    $departments[] = $deptRow['course'];
                                }

                                // Fetch tasks from the database
                                $tasksQuery = "SELECT *, CONCAT(lname, ', ', fname, ' ', mname) AS full_name FROM create_profile ORDER BY sc_id ASC";
                                $getTasks = mysqli_query($conn, $tasksQuery);

                                // Filter variables
                                $classSectionFilter = isset($_GET['classSectionFilter']) ? $_GET['classSectionFilter'] : 'all';
                                $departmentFilter = isset($_GET['departmentFilter']) ? $_GET['departmentFilter'] : 'all';
                                $statusFilter = isset($_GET['statusFilter']) ? $_GET['statusFilter'] : 'all';
                                $nameFilter = isset($_GET['nameFilter']) ? $_GET['nameFilter'] : '';

                                ?>

                                <!-- Filter form -->
                                <form method="GET" action="" class="filter-form">
                                    <div class="filter-section">
                                        <label for="nameFilter">Filter by Name:</label>
                                        <input type="text" id="nameFilter" name="nameFilter" value="<?php echo $nameFilter; ?>">
                                    </div>
                                    <div class="filter-section">
                                        <label for="classSectionFilter">Filter by Class Section:</label>
                                        <select id="classSectionFilter" name="classSectionFilter">
                                            <option value="all" <?php echo ($classSectionFilter == 'all') ? 'selected' : ''; ?>>All</option>
                                            <?php
                                            // Generate class section options
                                            foreach ($classSectionOptions as $option) {
                                                echo "<option value='$option' " . ($classSectionFilter == $option ? 'selected' : '') . ">$option</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="filter-section">
                                        <label for="departmentFilter">Filter by Course:</label>
                                        <select id="departmentFilter" name="departmentFilter">
                                            <option value="all" <?php echo ($departmentFilter == 'all') ? 'selected' : ''; ?>>All</option>
                                            <?php
                                            // Generate options for departments
                                            foreach ($departments as $department) {
                                                echo "<option value='$department' " . ($departmentFilter == $department ? 'selected' : '') . ">$department</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="filter-section">
                                        <label for="statusFilter">Filter by Status:</label>
                                        <select id="statusFilter" name="statusFilter">
                                            <option value="all" <?php echo ($statusFilter == 'all') ? 'selected' : ''; ?>>All</option>
                                            <option value="Approved" <?php echo ($statusFilter == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                            <option value="Rejected" <?php echo ($statusFilter == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                            <option value="Pending" <?php echo ($statusFilter == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        </select>
                                    </div>
                                    <button type="submit">Apply Name</button>
                                </form>

                                
                                <!-- Task table 
                                <table id="taskTable" class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">School ID</th>
                                            <th class="cell">Name</th>
                                            <th class="cell">Section</th>
                                            <th class="cell">Course</th>
                                            <th class="cell">Remarks</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Update Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($getTasks)) {
                                            $status = !empty($row['status']) ? $row['status'] : 'Pending';
                                            // Determine the badge color based on the status
                                            $badgeColor = ($status === 'Pending') ? 'bg-warning' : (($status === 'Approved') ? 'bg-success' : 'bg-danger');

                                            // Apply filters
                                            if (($classSectionFilter == 'all' || $classSectionFilter == $row['section']) &&
                                                ($departmentFilter == 'all' || $departmentFilter == $row['course']) &&
                                                ($statusFilter == 'all' || $statusFilter == $status) &&
                                                (strpos(strtolower($row['full_name']), strtolower($nameFilter)) !== false)) {
                                        ?>
                                                <tr class="task-row" data-status="<?php echo $status ?>">
                                                    <td><?php echo $row['sc_id'] ?></td>
                                                    <td><?php echo $row['full_name'] ?></td>
                                                    <td><?php echo $row['section'] ?></td>
                                                    <td><?php echo $row['course'] ?></td>
                                                    <td><?php echo $row['remarks'] ?></td>
                                                    <td><span class="badge <?php echo $badgeColor ?>"><?php echo $status ?></span></td>
                                                    <td>
                                                        <form method="POST" action="update_status.php">
                                                            <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                                                            <select name="new_status">
                                                                <option hidden="Update">...</option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Rejected">Rejected</option>
                                                                <option value="Pending">Pending</option>
                                                            </select>
                                                            <button type="submit">Update</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
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
</div>---->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusFilter = document.getElementById('statusFilter');
        var rows = document.querySelectorAll('#taskTable tbody tr');

        // Event listener for department filter change
        departmentFilter.addEventListener('change', function() {
            var selectedDepartment = departmentFilter.value;
            rows.forEach(function(row) {
                var departmentCell = row.cells['c_dept']; // Assuming department is in the third cell
                var department = departmentCell.textContent.trim();
                if (selectedDepartment === 'all' || department === selectedDepartment) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });

        // Event listener for status filter change (your existing code)
        statusFilter.addEventListener('change', function() {
            var selectedStatus = statusFilter.value;
            rows.forEach(function(row) {
                var rowStatus = row.querySelector('.badge').textContent.trim(); // Get the status from the badge
                if (selectedStatus === 'all' || rowStatus === selectedStatus) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });

        // Event listener for class section filter change
        classSectionFilter.addEventListener('change', function() {
            var selectedClassSection = classSectionFilter.value;
            rows.forEach(function(row) {
                var classSection = row.cells['c_section'].textContent.trim();
                if (selectedClassSection === 'all' || classSection === selectedClassSection) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });
    });
</script>


    </section>
    

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>