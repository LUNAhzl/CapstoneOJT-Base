<?php
include 'c:\xampp\htdocs\ojt\conn.php';
session_start();

// Set timezone to 'Asia/Manila' for PHP
date_default_timezone_set('Asia/Manila');

// Function to log timestamp into the database
function logTimestamp($sc_id, $action, $status) {
    global $conn;
    // Get the current timestamp
    $timestamp = date("Y-m-d H:i:s");
    // Prepare the SQL query to insert the timestamp into the student_logs table
    $query = "INSERT INTO student_logs (sc_id, timestamp, action, status) VALUES ('$sc_id', '$timestamp', '$action', '$status')";
    // Execute the query
    $insertTimestamp = mysqli_query($conn, $query);
    // Check if the query was successful
    if($insertTimestamp) {
        return true;
    } else {
        // If the query fails, return false and handle the error
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

// Function to calculate and log rendered hours
function calculateAndLogRenderedHours($sc_id) {
    global $conn;
    
    // Retrieve log in and log out timestamps for the current user
    $query = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() ORDER BY timestamp";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) >= 2) {
        $row1 = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result);
        
        $login_time = strtotime($row1['timestamp']);
        $logout_time = strtotime($row2['timestamp']);
        
        // Calculate the difference in seconds
        $difference = $logout_time - $login_time;
        
        // Convert seconds to hours and minutes
        $hours = floor($difference / 3600);
        $minutes = floor(($difference % 3600) / 60);
        
        // Insert rendered hours into student_logs table
        $insert_query = "INSERT INTO student_logs (sc_id, timestamp, action, status, rendered_hours) VALUES ('$sc_id', NOW(), 'RENDERED', 'COMPLETED', '$hours.$minutes')";
        mysqli_query($conn, $insert_query);
    }
}

// Check if the user's email is set in the session
if(isset($_SESSION['email'])) {
    // Retrieve the email from the session
    $email = $_SESSION['email'];
    
    // Prepare and execute the query to fetch sc_id based on email
    $query = "SELECT sc_id FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if($result) {
        // Fetch the row from the result set
        $row = mysqli_fetch_assoc($result);
        
        // Check if a row was returned
        if($row) {
            // Retrieve the sc_id from the row
            $sc_id = $row['sc_id'];
            
            // Now you have the sc_id which you can use for logging timestamp
            // Log "in" timestamp
            if(isset($_POST["log_in"])) {
                // Check if the user has logged out on the same day
                $query = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() AND action = 'OUT'";
                $result = mysqli_query($conn, $query);

                // If the user has not logged out on the same day, reset the timestamp
                if(mysqli_num_rows($result) == 0) {
                    // Reset the timestamp
                    $status = "RESET"; // Set status to indicate reset
                    logTimestamp($sc_id, "RESET", $status);
                }

                // Log "in" timestamp after checking for reset
                $status = "PENDING"; // Set the status to pending when logging in
                logTimestamp($sc_id, "IN", $status);
            }

            // Log "out" timestamp
            if(isset($_POST["log_out"])) {
                $status = "COMPLETED"; // Set the status to completed when logging out
                logTimestamp($sc_id, "OUT", $status);
                
                // Calculate and log rendered hours
                calculateAndLogRenderedHours($sc_id);
            }
        } else {
            // Handle the case where no row was returned (email not found)
            echo "Error: Email not found in the registration table.";
        }
    } else {
        // Handle the case where the query failed
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the user's email is not set in the session
    echo "Error: Email not set in the session.";
}

if (empty($_SESSION)){
    ?>
    <script>
        alert("Session Expired!\nPlease Login!");
        window.location.href="../index.php";
    </script>
    <?php
} else {
    $e=$_SESSION['email'];
    $getname=mysqli_query($conn, "SELECT * FROM registration WHERE email='$e'");
    while($row=mysqli_fetch_object($getname)){
        $name = $row->name;
        $id =  $row->sc_id;
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
  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php

            $e=$_SESSION['email'];

            $getname=mysqli_query($conn, "SELECT * FROM registration WHERE email='$e'");
            while($row=mysqli_fetch_object($getname)){

              $name = $row -> name;

              
          ?>
            <span class="d-none d-md-block dropdown-toggle ps-2" ><?php echo $name; ?></span>
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
      <h1>Time Log</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Time Log</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="container-fluid">
      <div class="row">

        <!-- rendered -->
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
                    <h5 class="card-title">Rendered Hours</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            // Retrieve log in and log out timestamps for the current user
                            $query = "SELECT * FROM student_logs WHERE sc_id = '$id' AND DATE(timestamp) = CURDATE() ORDER BY timestamp";
                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result) >= 2) {
                                $row1 = mysqli_fetch_assoc($result);
                                $row2 = mysqli_fetch_assoc($result);
                                
                                $login_time = strtotime($row1['timestamp']);
                                $logout_time = strtotime($row2['timestamp']);
                                
                                // Calculate the difference in seconds
                                $difference = $logout_time - $login_time;
                                
                                // Convert seconds to hours and minutes
                                $hours = floor($difference / 3600);
                                $minutes = floor(($difference % 3600) / 60);
                                
                                echo "<h1>$hours hours $minutes minutes</h1>";
                            } else {
                                echo "<h3>Not enough data available to calculate rendered hours.</h3>";
                            }
                            ?>
                                <?php
                                    // Output success message
                                    if(isset($_POST["log_out"])) {
                                        echo "Logged out successfully. Rendered hours updated.";
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End rendered -->

      <!-- last rendered -->
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
                <h5 class="card-title">Total Logs Count</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <div class="ps-3">
                    <?php
                        // Check if email is set in session
                        if (!empty($_SESSION['email'])) {
                            $email = $_SESSION['email'];

                            // Query to fetch sc_id based on email
                            $sc_id_query = mysqli_query($conn, "SELECT sc_id FROM registration WHERE email = '$email'");

                            if ($sc_id_query) {
                                $row = mysqli_fetch_assoc($sc_id_query);

                                // Check if SC_ID is found
                                if ($row && isset($row['sc_id'])) {
                                    $sc_id = $row['sc_id'];

                                    // Query to count "in" and "out" actions for the specific sc_id
                                    $logs_count_query = mysqli_query($conn, "SELECT COUNT(*) AS total_logs FROM student_logs WHERE sc_id = '$sc_id' AND (action = 'IN' OR action = 'OUT')");

                                    if ($logs_count_query) {
                                        $logs_count_row = mysqli_fetch_assoc($logs_count_query);
                                        $total_logs_count = $logs_count_row['total_logs'];

                                        // Display total logs count
                                        echo "<h1>$total_logs_count</h1>";
                                    } else {
                                        // Error fetching total logs count
                                        echo "Error fetching total logs count: " . mysqli_error($conn);
                                    }
                                } else {
                                    // SC_ID not found in registration table
                                    echo "SC_ID not found in registration table for email: $email";
                                }
                            } else {
                                // Error fetching SC_ID
                                echo "Error fetching SC_ID: " . mysqli_error($conn);
                            }
                        } else {
                            // Email not set in session
                            echo "Email not set in session.";
                        }
                    ?>
                    </div>
                </div>
            </div>

          </div>

      </div><!-- End last rendered -->



      <!---time--->
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
                                              <th class="cell">School ID</th>
                                              <th class="cell">Date</th>
                                              <th class="cell">IN</th>
                                              <th class="cell">OUT</th>
                                              <th class="cell">Status</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                          $e = $_SESSION['email'];
                                          $gettime = mysqli_query($conn, "SELECT DISTINCT DATE(timestamp) AS log_date FROM student_logs WHERE sc_id='$id' ORDER BY log_date DESC");

                                          while($date_row = mysqli_fetch_array($gettime)) {
                                              $log_date = $date_row['log_date'];
                                              
                                              // Fetch IN and OUT actions for the current date
                                              $get_in_out = mysqli_query($conn, "SELECT * FROM student_logs WHERE sc_id='$id' AND DATE(timestamp)='$log_date' ORDER BY timestamp");

                                              // Initialize flags
                                              $in_timestamp = null;
                                              $out_timestamp = null;

                                              // Check for IN and OUT timestamps
                                              while($row = mysqli_fetch_array($get_in_out)) {
                                                  if ($row['action'] === 'IN') {
                                                      $in_timestamp = strtotime($row['timestamp']);
                                                  } elseif ($row['action'] === 'OUT') {
                                                      $out_timestamp = strtotime($row['timestamp']);
                                                  }
                                              }

                                              // Determine status and badge class
                                              if ($in_timestamp !== null && $out_timestamp !== null) {
                                                  $status = 'Complete';
                                                  $badgeClass = 'bg-success';
                                              } else {
                                                  $status = 'Pending';
                                                  $badgeClass = 'bg-warning';
                                              }

                                              // Output table row
                                          ?>
                                              <tr>
                                                  <td><?php echo $id; ?></td> <!-- Output $id instead of $row['sc_id'] -->
                                                  <td><?php echo $log_date; ?></td>
                                                  <td><?php echo ($in_timestamp !== null) ? date('H:i:s', $in_timestamp) : ''; ?></td>
                                                  <td><?php echo ($out_timestamp !== null) ? date('H:i:s', $out_timestamp) : ''; ?></td>
                                                  <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span></td>
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

</html>