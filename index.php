<?php
  include 'c:\xampp\htdocs\ojt\conn.php';
  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OJTime: OJT-RM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/bck.png" rel="icon">
  <link href="assets/img/bck.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Rapid
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">OJTime: OJT-RM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li class="dropdown"><a href="#"><span>Login and Registration</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../ojtime/student/index.php" data-bs-toggle="modal" data-bs-target="#exampleModal1">Login as Student</a></li>
              <li><a href="../ojtime/coordinator/index.php" data-bs-toggle="modal" data-bs-target="#exampleModal2">Login as Coordinator</a></li>
              <li><a href="../ojtime/admin/index.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Login as Admin</a></li>
              <li><a href="../ojtime/employer/index.php" data-bs-toggle="modal" data-bs-target="#exampleModal3">Login as Employer</a></li>
              <li><a href="../ojtime/index.php" data-bs-toggle="modal" data-bs-target="#exampleModal5">Registration</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2> OJTIME: OJT Records Management for <br> COLLEGE OF MANAGEMENT of <span> PHINMA UNIVERSITY OF ILOILO</span></h2>

          <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>

        <div class="col-lg-6 intro-img order-lg-last order-first "  data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/bgs.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/bgs.png" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>About Us</h2>
              <h3>What is OJTime: OJT Records Management?</h3>
              <p>The OJTime Records Management System project is a system that allows organizations to keep track of and monitor students who 
                undergo on-the-job training. The system will automate the keeping of the student trainee’s record for easy monitoring and 
                retrieval of data. In order to eliminate the problems encountered in the manual process, this project is to have systematic 
                monitoring to the students for their on-the-job training.
              </p>
              <p>The system will serve as a repository for the records of the students who undergo OJT in an organization. The purpose of this 
                project was to replace the manual record-keeping of student activities and reports on their respective assignments. The system 
                will allow the organization, specifically to the OJT coordinator, to keep track of the progress of the trainee as well as the 
                tasks completed. The system will also keep the trainee records electronically for easy retrieval.</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Develop a system that will let the OJT coordinators easily monitor the progress of the 
                  student trainees.
                </li>
                <li><i class="bi bi-check-circle"></i> Lessen the paper works of the OJT Coordinator and increase the level of systematic records.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid" data-aos="fade-up">

        <header class="section-header">
          <h3>OJTIME: OJT-RM</h3>
          <p>Provides a better records management system for everyone.</p>
        </header>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="why-us-img">
              <img src="assets/img/sec.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <p>OJTIME: OJT-RM provides you a better system for a user-friendly, easy access of records with an all out features for you to explore
                and to present a better data summary of your students' records wherein it could provide you less works and easy to find each of the 
                trainee records.
              </p>
              <p>
                Further more, this system provides features that were not found in any other system. We are on the talks to provides more features 
                were it could help the users an easy and better use throughout our system.
              </p>

              <div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-bookmarks" style="color: #f058dc;"></i>
                <h4>System Easy Monitoring</h4>
                <p>To develop a system that will let the OJT coordinators easily monitor the progress of the student trainees.</p>
              </div>

              <div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-files" style="color: #ffb774;"></i>
                <h4>Less Paperworks</h4>
                <p>To lessen the paper work and increase the level of systematic records.</p>
              </div>

            </div>

          </div>

        </div>

      </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-info">
                  <h3>OJTIME: OJT-RM</h3>
                  <p>The OJTime Records Management System project is a system that allows organizations to keep track of and monitor students who 
                    undergo on-the-job training. The system will automate the keeping of the student trainee’s record for easy monitoring and 
                    retrieval of data. In order to eliminate the problems encountered in the manual process, this project is to have systematic 
                    monitoring to the students for their on-the-job training.
                  </p>
                </div>

              </div>

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    Rizal Street <br>
                    Iloilo City, 5000<br>
                    Iloilo, Philippines <br>
                    <strong>Phone:</strong> 
                    +63 (033) 338-1071 (TEL NO) / +63 (033) 337-3743 (FAX) / +63 927-982-7512 / +63 950-402-8859 ( MOBILE)<br>
                    <strong>Email:</strong> info.ui@phinmaed.com<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">

              <h4>Send us a message</h4>
              <p>Any concern, just send us a message. OJTIME: OJT-RM Team will be glad to recieve your message. Thank you!</p>

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN as Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
            <form action="process.php" method="POST">
  
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-envelope-check-fill"></i>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              
              <div class="input-group">
                <div class="input-group-text">
                  <i class="bi bi-key-fill"></i> 
                </div>
                <input type="password" class="form-control" name="pass" id="myInput" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
              </div>
              <input type="checkbox" onclick="myFunction()">Show Password
            
    
              <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="CLEAR">
                <input type="submit" class="btn btn-primary" name="admin_login" value="LOGIN">
              </div>
               
            </form>
          </div>
  
        </div>
      </div>
    </div>
  
    <script>
      function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN as Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
            <form action="process.php" method="POST">
  
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-envelope"></i>
                </div>
                <input type="text" class="form-control" name="log_email" placeholder="Enter Email" required>
              </div>
              
              <div class="input-group">
                <div class="input-group-text">
                  <i class="bi bi-key-fill"></i> 
                </div>
                <input type="password" class="form-control" name="log_pass" id="myInput1" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
              </div>
              <input type="checkbox" onclick="myFunction1()">Show Password
            
    
              <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="CLEAR">
                <input type="submit" class="btn btn-primary" name="login" value="LOGIN">
              </div>
               
            </form>
          </div>
  
        </div>
      </div>
    </div>

    <script>
      function myFunction1() {
        var x = document.getElementById("myInput1");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN as Coordinator</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
            <form action="process.php" method="POST">
  
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-envelope-check-fill"></i>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              
              <div class="input-group">
                <div class="input-group-text">
                  <i class="bi bi-key-fill"></i> 
                </div>
                <input type="password" class="form-control" name="pass" id="myInput2" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
              </div>
              <input type="checkbox" onclick="myFunction2()">Show Password
            
    
              <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="CLEAR">
                <input type="submit" class="btn btn-primary" name="login" value="LOGIN">
              </div>
               
            </form>
          </div>
  
        </div>
      </div>
    </div>

    <script>
      function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN as Employer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
            <form action="process.php" method="POST">
  
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-envelope-check-fill"></i>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              
              <div class="input-group">
                <div class="input-group-text">
                  <i class="bi bi-key-fill"></i>
                </div>
                <input type="password" class="form-control" name="pass" id="myInput3" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
              </div>
              <input type="checkbox" onclick="myFunction3()">Show Password
            
    
              <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="CLEAR">
                <input type="submit" class="btn btn-primary" name="login" value="LOGIN">
              </div>
               
            </form>
          </div>
  
        </div>
      </div>
    </div>

    <script>
      function myFunction3() {
        var x = document.getElementById("myInput3");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
            <form action="process.php" method="POST">
  
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-person"></i>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-person-badge"></i>
                </div>
                <input type="text" class="form-control" name="sc_id" placeholder="Enter School/Company ID" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-text">
                  <i class="bi bi-envelope-check-fill"></i>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              
              <div class="input-group">
                <div class="input-group-text">
                  <i class="bi bi-key-fill"></i>
                </div>
                <input type="password" class="form-control" name="pass" id="myInput5" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
              </div>
              <input type="checkbox" onclick="myFunction5()">Show Password
            
    
              <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="CLEAR">
                <input type="submit" class="btn btn-primary" name="reg" value="REGISTER">
              </div>
               
            </form>
          </div>
  
        </div>
      </div>
    </div>

    <script>
      function myFunction5() {
        var x = document.getElementById("myInput5");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

  

</body>

</php>