<?php
include 'c:\xampp\htdocs\ojt\conn.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set timezone to 'Asia/Manila' for PHP
date_default_timezone_set('Asia/Manila');


// Check if the user's email is set in the session
if(isset($_SESSION['email'])) {
    // Retrieve the email from the session
    $email = $_SESSION['email'];
    // Fetch user details from the database based on email
    $getname=mysqli_query($conn, "SELECT * FROM registration WHERE email='$email'");
    while($row=mysqli_fetch_object($getname)){
        $name = $row->name;
        $id =  $row->sc_id;
    }
}

// Check if the user is already logged in
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  $login_status = "User already logged in.";
} else {
  if(isset($_POST['log_in'])) {
      // Handle login action
      $_SESSION['logged_in'] = true;
      $_SESSION['login_time'] = date('Y-m-d H:i:s');
      $login_status = "Login successful.";
  }
}

// Check if the user is logged in to display the logout button
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  $logout_button = '
    <form action="" method="post" class="me-2">
      <input type="hidden" id="log_out_time" name="log_out_time"> <!-- Hidden field for log out time -->
      <input type="submit" name="log_out" value="Log Out" class="btn btn-danger">
    </form>';
}

if(isset($_POST['log_out'])) {
  // Handle logout action
  $_SESSION['logged_in'] = false;
  $_SESSION['logout_time'] = date('Y-m-d H:i:s');
}


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
          // Login Logic
if(isset($_POST['log_in'])) {
  // Check if the user has already logged out on the same day
  $query_logout = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() AND action = 'OUT'";
  $result_logout = mysqli_query($conn, $query_logout);

  if(mysqli_num_rows($result_logout) == 0) {
      // User has not logged out on the same day, reset the login timestamp
      $query_reset = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() AND action = 'RESET'";
      $result_reset = mysqli_query($conn, $query_reset);

      if(mysqli_num_rows($result_reset) == 0) {
          // Reset action has not been logged for the current day, proceed with resetting
          $status = "RESET"; // Set status to indicate reset
          logTimestamp($sc_id, "RESET", $status);
      }
  }

  // Check if the user has already logged in on the same day
  $query_login = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() AND action = 'IN'";
  $result_login = mysqli_query($conn, $query_login);

  if(mysqli_num_rows($result_login) == 0) {
      // User has not logged in on the same day, proceed with login
      // Log the login timestamp
      $status = "PENDING"; // Set the status to pending when logging in
      if(logTimestamp($sc_id, "IN", $status)) {
          // Proceed with login only if the timestamp is successfully logged
          $_SESSION['logged_in'] = true;
          $_SESSION['login_time'] = date('Y-m-d H:i:s');
          $login_status = "Login successful.";
      } else {
          // If logging timestamp fails, show an error message
          $login_status = "Error logging login timestamp.";
      }
  }
}


          // Check if the user has already logged out in this session
          if(!isset($_SESSION['logged_out']) || $_SESSION['logged_out'] === false) {
            // Logout Logic
            if(isset($_POST['log_out'])) {
                // Check if the user has already logged out on the same day
                $query_logout = "SELECT * FROM student_logs WHERE sc_id = '$sc_id' AND DATE(timestamp) = CURDATE() AND action = 'OUT'";
                $result_logout = mysqli_query($conn, $query_logout);

                if(mysqli_num_rows($result_logout) > 0) {
                    // User has already logged out today, prevent logout
                    echo "You have already logged out today.";
                } else {
                    // Log the logout timestamp
                    $status = "COMPLETED"; // Set the status to completed when logging out
                    logTimestamp($sc_id, "OUT", $status);
                    // Proceed with logout
                    $_SESSION['logged_in'] = false;
                    $_SESSION['logout_time'] = date('Y-m-d H:i:s');
                    

                    // Set the logged out flag to true
                    $_SESSION['logged_out'] = true;
                }
            }
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

// Check if the user's email is set in the session
if(empty($_SESSION['email'])){
  header("Location: ../index.php");
  exit;
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
      <h1>Student Dashboard</h1>
      <br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Student Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="container-fluid">
      <div class="row">

        <!-- log -->
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
                    <h5 class="card-title">Time<span> | Hours</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="ps-3">
                            <!-- Live clock -->
                            <div id="liveClockContainer">
                                <span id="liveClock"></span>
                                <span id="amPmIndicator"></span> <!-- Indicator for AM/PM -->
                            </div>
                            <br>

                            <!-- Log In and Log Out buttons -->
                            <div class="btn-group" role="group" aria-label="Log Actions">
                                <!-- Form to log "in" timestamp -->
                                <form action="" method="post" class="me-2">
                                    <input type="hidden" id="logInTime" name="log_in_time"> <!-- Hidden field for log in time -->
                                    <input type="submit" name="log_in" value="Log In" class="btn btn-primary">
                                </form>

                                <!-- Form to log "out" timestamp -->
                                <form action="" method="post">
                                    <input type="hidden" id="logOutTime" name="log_out_time"> <!-- Hidden field for log out time -->
                                    <input type="submit" name="log_out" value="Log Out" class="btn btn-danger">
                                </form>
                            </div>

                            <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            

                        </div>
                        
                    </div>
                </div>

            </div>
        </div>


        <script>
            // Function to update the live clock and custom timestamp
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var amPm = hours >= 12 ? 'PM' : 'AM'; // Determine AM or PM
                
                // Convert 24-hour format to 12-hour format
                hours = hours % 12;
                hours = hours ? hours : 12; // If hours is 0 (midnight), set it to 12 instead

                
                // Pad single digit minutes and seconds with a leading zero
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                
                // Format the time as HH:MM:SS AM/PM
                var timeString = hours + ':' + minutes + ':' + seconds;
                document.getElementById('liveClock').textContent = timeString;
                document.getElementById('amPmIndicator').textContent = amPm; // Set AM/PM indicator
                
                // Update log in and log out hidden fields with current time
                document.getElementById('logInTime').value = timeString + ' ' + amPm;
                document.getElementById('logOutTime').value = timeString + ' ' + amPm;
                
                // Update the custom timestamp
                document.getElementById('customTimeStamp').textContent = timeString;
            }

            // Call the updateClock function every second to keep the clock updated
            setInterval(updateClock, 1000);

            
        </script>

              

          <!-- Submitted task count -->
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
                      <h5 class="card-title">Submitted Task Count</h5>
                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-check-circle"></i>
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
                                        
                                        // Query to count tasks submitted by the specific sc_id
                                        $submitted_task_count_query = mysqli_query($conn, "SELECT COUNT(*) AS submitted_task_count FROM tasks WHERE sc_id = '$sc_id'");
                                        
                                        if ($submitted_task_count_query) {
                                            $submitted_task_count_row = mysqli_fetch_assoc($submitted_task_count_query);
                                            $submitted_task_count = $submitted_task_count_row['submitted_task_count'];
                                            
                                            // Display submitted task count
                                            echo "<h1>Total Submitted Tasks: $submitted_task_count</h1>";
                                        } else {
                                            // Error fetching submitted task count
                                            echo "Error fetching submitted task count: " . mysqli_error($conn);
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
          </div><!-- End complied task count -->




            
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
                                      <h3 class="card-title"><i></i>Complied Tasks</h3>
                                    </div>
                                    <table id="myTable" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
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
                                          $e = $_SESSION['email'];

                                          // Fetch tasks for the logged-in user
                                          $gettask = mysqli_query($conn, "SELECT * FROM tasks WHERE sc_id='$id'");
                                          while ($row = mysqli_fetch_array($gettask)) {
                                              // If status is null or empty, set it to "Pending"
                                              $status = !empty($row['status']) ? $row['status'] : 'Pending';
                                              // Determine the badge color based on the status
                                              $badgeColor = ($status === 'Pending') ? 'bg-warning' : 'bg-success';
                                          ?>
                                          <tr>
                                              <td><?php echo $row['files'] ?></td>
                                              <td><?php echo $row['task_code'] ?></td>
                                              <td><?php echo $row['task_name'] ?></td>
                                              <td><a href="download.php?id=<?php echo $row['id']; ?>"><i class="bi bi-download"></i></a></td>
                                              <td><a href="delete.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a></td>
                                              <td><span class="badge <?php echo $badgeColor ?>"><?php echo $status ?></span></td>
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