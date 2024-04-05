<?php
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

// Prepare the SQL statement
$sql = "SELECT cp.sc_id, cp.lname, cp.fname, cp.mname, cp.e_name, gr.remarks
        FROM create_profile cp
        INNER JOIN give_remarks gr ON cp.sc_id = gr.sc_id
        WHERE cp.company = ?";
$stmt = mysqli_prepare($conn, $sql);

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
      <h1>Remarks</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Employer</a></li>
          <li class="breadcrumb-item active">Remarks</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     

    <!-- Remarks Modal --> 
    <form action="../process.php" method="POST">
            <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="remarkModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="remarkModalLabel">Submit Remarks</h5>
                            <button type="button" class="btn-submit" data-dismiss="modal" aria-label="submit"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="">
                            <!-- Form for adding remarks -->
                            <div class="form-group">
                            <input type="text" class="form-control" name="sc_id" value="<?php echo $sc_id;?>" required>
                                <label for="remarksInput">Remarks:</label>
                                <textarea class="form-control" id="remarksInput" name="remarks" placeholder="Enter remarks here..."></textarea>
                            </div>
                            <ul class="agile_info_select">
                                <li>
                                    <input type="radio" name="view" value="Excellent" id="excellent" required> 
                                    <label for="excellent">Excellent</label>
                                </li>
                                <li>
                                    <input type="radio" name="view" value="Very Good" id="very_good"> 
                                    <label for="very_good">Very Good</label>
                                </li>
                                <li>
                                    <input type="radio" name="view" value="Good" id="good"> 
                                    <label for="good">Good</label>
                                </li>
                                <li>
                                    <input type="radio" name="view" value="Poor" id="poor">
                                    <label for="poor">Poor</label>
                                </li>
                                <li>
                                    <input type="radio" name="view" value="Very Poor" id="very_poor"> 
                                    <label for="very_poor">Very Poor</label>
                                </li>
                            </ul>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" name="give_remarks">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                            </div>
            </div>
                </div>
            </div>

            <div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="list" role="tabpanel">
                <div class="row clearfix">
                    <?php
                    if(isset($_SESSION['email'])) {
                        $employer_email = $_SESSION['email'];
                        $query = "SELECT company FROM reg_employer WHERE email = '$employer_email'";
                        $result = mysqli_query($conn, $query);
                        
                        if($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $logged_in_company = $row['company'];
                            
                            $getprofile = mysqli_query($conn, "SELECT * FROM create_profile WHERE company = '$logged_in_company' ORDER BY sc_id ASC");
                            
                            if(mysqli_num_rows($getprofile) > 0) {
                    ?>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title"><?php echo $logged_in_company; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table app-table-hover mb-0 text-left">
                                                <thead>
                                                    <tr>
                                                        <th class="cell">School ID</th>
                                                        <th class="cell">First Name</th>
                                                        <th class="cell">Middle Name</th>
                                                        <th class="cell">Last Name</th>
                                                        <th class="cell">Employer Name</th>
                                                        <th class="cell">Remarks</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($applicants as $applicant): ?>
                                                  <tr>
                                                      <td><?php echo $applicant['sc_id']; ?></td>
                                                      <td><?php echo $applicant['lname']; ?></td>
                                                      <td><?php echo $applicant['fname']; ?></td>
                                                      <td><?php echo $applicant['mname']; ?></td>
                                                      <td><?php echo $applicant['e_name']; ?></td>
                                                      <!-- Hidden input field for sc_id -->
                                                      <input type="hidden" name="sc_ids[]" value="<?php echo $applicant['sc_id']; ?>">
                                                      <td>
                                                                <button class="btn btn-primary openRemarksModal" data-student-id="<?php echo $applicant['sc_id'] ?>"
                                                                    data-toggle="modal" data-target="#remarkModal">Give Remarks</button>
                                                            </td>
                                                  </tr>
                                              <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            } else {
                                echo "No profiles found for the logged-in employer";
                            }
                        } else {
                            echo "Error: Company not found for the logged-in employer";
                            exit;
                        }
                    } else {
                        echo "Error: Employer is not logged in";
                        exit;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

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

</html>