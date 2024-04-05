<?php
    include "conn.php";
    session_start();

    // Check if the registration form is submitted
    if(isset($_POST["reg"])){
        // Retrieve form data
        $name = $_POST['name'];
        $id = $_POST['sc_id'];
        $course = $_POST['course'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        // Check if the email domain is "@phinmaed.com"
        if (strpos($email, '@phinmaed.com') === false) {
            // If the email domain is not "@phinmaed.com", display an error message
            ?>
            <script>
                alert("Only your PHINMA email are allowed for registration!");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            // If the email domain is "@phinmaed.com", proceed with registration
            $insertreg = mysqli_query($conn, "INSERT INTO registration VALUES('0','$name','$id', '$course', '$email','$pass')");

            if($insertreg == true){
                // Registration successful
                ?>
                <script>
                    alert("Your registration was successful!");
                    window.location.href = "index.php";
                </script>
                <?php
            } else {
                // Registration failed
                ?>
                <script>
                    alert("Error during registration! Please try again.");
                    window.location.href = "index.php";
                </script>
                <?php
            }
        }
    }
    
    if(isset($_POST["create_profile"])){

        $fname = $_POST["firstname"];
        $mname = $_POST["middlename"];
        $lname = $_POST["lastname"];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $school_id = $_POST["sc_id"];
        $section = $_POST["section"];
        $contact = $_POST["contact"];
        $sc_email = $_POST['sc_email'];
        $address = $_POST["address"];
        $dept = $_POST["dept"];
        $course = $_POST["course"];
        $coordinator = $_POST["coordinator"];
        $c_contact = $_POST["c_contact"];
        $c_email = $_POST["c_email"];
        $ename = $_POST["ename"];
        $position = $_POST["position"];
        $company = $_POST["company"];
        $econtact = $_POST["econtact"];
        $e_email = $_POST["e_email"];
        

        $insert_profile = mysqli_query($conn, "INSERT INTO create_profile VALUES ('0', '$fname', '$mname', '$lname', '$age', '$gender', '$school_id', '$section', '$contact', '$sc_email', '$address', '$dept', '$course', '$coordinator', '$c_contact', '$c_email', '$ename', '$position', '$company', '$econtact', '$e_email')");

        if($insert_profile==true){

            ?>
                <script>
                    alert("Data is inserted.");
                    window.location.href="../ojt/student/users-profile.php";
                </script>
            <?php

        }else{

            ?>
                <script>
                    alert("Data is not inserted.");
                    window.location.href="../ojt/student/create_profile.php";
                </script>
            <?php
        }
        
    }

    // Check if the login form is submitted
    if(isset($_POST['login'])){
        // Retrieve form data
        $email = $_POST['log_email'];
        $pass = $_POST['log_pass'];
        $courseCode = $_POST['courseCode'];

        // Define valid course codes
        $validCourses = array('BSHM', 'BSTM');
        
        // Check if the email domain is "@phinmaed.com"
        if (strpos($email, '@phinmaed.com') === false) {
            // If the email domain is not "@phinmaed.com", display an error message
            ?>
            <script>
                alert("Only your PHINMA email is allowed for login!");
                window.location.href = "index.php";
            </script>
            <?php
        } elseif (!in_array($courseCode, $validCourses)) {
            // If the course code is not valid, display an error message
            ?>
            <script>
                alert("Invalid Course Code!");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            // If both email and course code are valid, proceed with login
            $check_login = mysqli_query($conn, "SELECT * FROM registration WHERE email='$email' AND coursecode ='$courseCode' AND coursecode IN ('" . implode("','", $validCourses) . "')");
        
            $n = mysqli_num_rows($check_login);
            
            if($n <=0 ){
                // If no matching record is found, display an error message
                ?>
                <script>
                    alert("Invalid Course or Password!");
                    window.location.href="index.php";
                </script>
                <?php
            } else {
                // If login is successful, set session variables and redirect
                $_SESSION['email']=$email;
                $_SESSION['courseCode']=$courseCode;
                
                // Check if it's the user's first login
                if (!isset($_SESSION['logged_in_before'])) {
                    // Check if user's profile exists in the database
                    $check_profile = mysqli_query($conn, "SELECT * FROM create_profile WHERE sc_email='$email'");
                    $profile_exists = mysqli_num_rows($check_profile) > 0;
                    
                    if (!$profile_exists) {
                        // Redirect the user to create profile page
                        ?>
                        <script>
                            alert("Your course is valid!\nLogin Successfully!\nPlease create your profile.");
                            window.location.href="../ojt/student/create_profile.php";
                        </script>
                        <?php
                        exit; // Make sure to exit after redirection
                    }
                }

                // If the user has already logged in before or has a profile, redirect them to the dashboard
                ?>
                <script>
                    alert("Your course is valid!\nLogin Successfully!");
                    window.location.href="../ojt/student/index.php";
                </script>
                <?php
                exit; // Make sure to exit after redirection
            }
        }
    }

    

    if(isset($_POST['admin_login'])){
        
        $email = $_POST['ad_email'];
        $pass = $_POST['ad_pass'];
        $id = $_POST['ad_id'];

        // Check if the email domain is "@phinmaed.com"
        if (strpos($email, '@phinmaed.com') === false) {
            // If the email domain is not "@phinmaed.com", display an error message
            ?>
            <script>
                alert("Only your PHINMA email are allowed for login!");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            // If both email and course code are valid, proceed with login
            $check_login = mysqli_query($conn, "SELECT * FROM admin_login WHERE email='$email' AND ad_id ='$id'");
        
            $n = mysqli_num_rows($check_login);
            
            if($n <=0 ){
                // If no matching record is found, display an error message
                ?>
                <script>
                    alert("Invalid ID or Password!");
                    window.location.href="index.php";
                </script>
                <?php
            } else {
                // If login is successful, set session variables and redirect
                $_SESSION['email']=$email;
                $_SESSION['ad_id']=$id;
                ?>
                <script>
                    alert("Your ID is valid!\nLogin Successfully!");
                    window.location.href="../ojt/admins/index.php";
                </script>
                <?php
            }
        }
    }
    
    if(isset($_POST["taskadd"])){
    
        $taskcode = $_POST['task_code'];
        $taskname = $_POST['task_name'];
        $deadline = $_POST['deadline'];
        $taskaction = $_POST['task_action'];
        

        $insert_profile = mysqli_query($conn, "INSERT INTO taskadd VALUES ('0','$taskcode','$taskname','$deadline','$taskaction')");

        if($insert_profile==true){

            ?>
                <script>
                    alert("Data is inserted.");
                    window.location.href="../ojt/admins/upload_task.php";
                </script>
            <?php

        }else{

            ?>
                <script>
                    alert("Data is not inserted.");
                    window.location.href="../ojt/admins/upload_task.php";
                </script>
            <?php
        }
        
    }

    if(isset($_POST["submit_task"])){

        $lastname= $_POST['lname'];
        $firstname= $_POST['fname'];
        $middlename= $_POST['mname'];
        $school_id = $_POST["sc_id"];
        $section= $_POST['section'];
        $dept = $_POST["dept"];
        $tskcode= $_POST['task_code'];
        $tskname = $_POST['task_name'];
        $file = $_FILES['files']['name'];
        $fileTmpName = $_FILES['files']['tmp_name'];
        $status = $_POST['task_action'];

        $insert =mysqli_query($conn, " INSERT INTO tasks VALUES ('0','$lastname', '$firstname', '$middlename', '$school_id', '$section', '$dept','$tskcode','$tskname','$file', '$status')");

        if($insert == true){
            $fileDestination = '../ojt/assets/img/upload/'.$file;
            move_uploaded_file($fileTmpName, $fileDestination);
                
            ?>
                <script>
                    alert("Your submission was successful!");
                    window.location.href = "../ojt/student/index.php";
                </script>
            <?php


        }else{
            ?>
                <script>
                    alert( "Error submission!\n Try again!");
                    window.location.href = "../ojt/student/tasks.php";
                </script>
            <?php

        }
    }

    // Check if the registration form is submitted
    if(isset($_POST["reg_employer"])){
        // Retrieve form data
        $name = $_POST['name'];
        $id = $_POST['cp_id'];
        $company = $_POST['company'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $insertreg = mysqli_query($conn, "INSERT INTO reg_employer VALUES('0','$name','$id', '$company', '$email','$pass')");

            if($insertreg == true){
                // Registration successful
                ?>
                <script>
                    alert("Your registration was successful!");
                    window.location.href = "index.php";
                </script>
                <?php
            } else {
                // Registration failed
                ?>
                <script>
                    alert("Error during registration! Please try again.");
                    window.location.href = "index.php";
                </script>
                <?php
            }
        }

        
    if(isset($_POST['employer_login'])){
        // Retrieve form data
        $email = $_POST['emp_email'];
        $pass = $_POST['emp_pass'];
        $cp_id = $_POST['cp_id'];
        
        $check_login = mysqli_query($conn, "SELECT * FROM reg_employer WHERE email='$email' AND cp_id ='$cp_id'");
        
        $n = mysqli_num_rows($check_login);
            
            if($n <=0 ){
                // If no matching record is found, display an error message
                ?>
                <script>
                    alert("Invalid ID or Password!");
                    window.location.href="index.php";
                </script>
                <?php
            } else {
                // If login is successful, set session variables and redirect
                $_SESSION['email']=$email;
                $_SESSION['cp_id']=$cp_id;
                ?>
                <script>
                    alert("Login Successfully!");
                    window.location.href="../ojt/employer/index.php";
                </script>
                <?php
            }
    }
    
    // Retrieve form data
if(isset($_POST['give_remarks'])) {
    // Check if 'sc_id' exists in $_POST
    if(isset($_POST['sc_id'])) {
        $sc_id = $_POST['sc_id'];
        
        // Assuming you've already initialized the database connection ($conn)
    
        // Prepare the SQL statement
        $sql = "INSERT INTO give_remarks (remarks, view, sc_id) VALUES (?, ?, ?)";
    
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
    
        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'ssi', $remarks, $view, $sc_id);
    
            // Retrieve data from POST request
            $remarks = $_POST['remarks'];
            $view = $_POST['view'];
    
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                ?>
                <script>
                    alert("Remarks inserted successfully");
                    window.location.href="../ojt/employer/index.php";
                </script>
                <?php
            } else {
                
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            
            echo "Error: Unable to prepare statement";
        }
    } else {
        echo "Error: 'sc_id' is not set in the form data";
    }
}




    

?>
