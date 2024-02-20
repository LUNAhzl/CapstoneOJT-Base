<?php
    include "conn.php";
    session_start();

    if(isset($_POST["reg"])){

        $name = $_POST['name'];
        $id = $_POST['sc_id'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

            $insertreg =mysqli_query($conn, "INSERT INTO registration VALUES('0','$name','$id', '$email','$pass')");

            if($insertreg == true){
                ?>
                <script>
                    alert("Your registration was successful!");
                    window.location.href = "index.php";
                </script>
                <?php


            }else{
                ?>
                <script>
                    alert( "Error registration!\n Try again!");
                    window.location.href = "index.php";
                </script>
                <?php

            }
        

    }
    
    if(isset($_POST["create_profile"])){
    
        $picname = $_FILES['pic']['name'];
        $fileTmpName = $_FILES['pic']['tmp_name'];
        $fname = $_POST["firstname"];
        $mname = $_POST["middlename"];
        $lname = $_POST["lastname"];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $school_id = $_POST["school_id"];
        $contact = $_POST["contact"];
        $fb = $_POST['facelink'];
        $address = $_POST["address"];
        $dept = $_POST["dept"];
        $course = $_POST["course"];
        $major = $_POST["major"];
        $coordinator = $_POST["coordinator"];
        $c_contact = $_POST["c_contact"];
        $c_email = $_POST["c_email"];
        $ename = $_POST["ename"];
        $position = $_POST["position"];
        $company = $_POST["company"];
        $econtact = $_POST["econtact"];
        $e_email = $_POST["e_email"];
        

        $insert_profile = mysqli_query($conn, "INSERT INTO create_profile VALUES ('0', '$picname', '$fname', '$mname', '$lname', '$age', '$gender', '$school_id', '$contact', '$fb', '$address', '$dept', '$course', '$major', '$coordinator', '$c_contact', '$c_email', '$ename', '$position', '$company', '$econtact', '$e_email')");

        if($insert_profile==true){
            $fileDestination = "../ojt/assets/img/upload/" .$picname;
            move_uploaded_file($fileTmpName, $fileDestination);

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




    if(isset($_POST['login'])){
        
        $email = $_POST['log_email'];
        $pass = $_POST['log_pass'];

        $check_login = mysqli_query($conn, "SELECT * FROM registration WHERE email='$email' AND password='$pass'");

        $n = mysqli_num_rows($check_login);
        
        if($n <=0 ){
        
            ?>
                <script>
                    alert("Wrong School ID or Password!");
                    window.location.href="index.php";
                </script>
            <?php
        }else{
            $_SESSION['email']=$email;
            ?>
                <script>
                    alert("Login Successfully!");
                    window.location.href="../ojt/student/index.php";
                </script>
            <?php
        }
    }

    if(isset($_POST['admin_login'])){
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $check_login = mysqli_query($conn, "SELECT * FROM admin_login WHERE email='$email' AND password = '$pass'");

        $n = mysqli_num_rows($check_login);
        
        if($n <=0 ){
        
            ?>
                <script>
                    alert("Wrong Email or Password!");
                    window.location.href="index.php";
                </script>
            <?php
        }else{
            $_SESSION['email']=$email;
            ?>
                <script>
                    alert("Login Successfully!");
                    window.location.href="../ojt/admins/index.php";
                </script>
            <?php
        }
    }
    
    if(isset($_POST["taskadd"])){
    
        $filename = $_FILES['files']['name'];
        $fileTmpName = $_FILES['files']['tmp_name'];
        $taskname = $_POST['taskname'];
        $description = $_POST['desc'];
        

        $insert_profile = mysqli_query($conn, "INSERT INTO taskadd VALUES ('0','','','[value-4]')");

        if($insert_profile==true){
            $fileDestination = "../ojt/assets/img/upload/" .$picname;
            move_uploaded_file($fileTmpName, $fileDestination);

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

    if(isset($_POST["submit_task"])){

        $school_id = $_POST["school_id"];
        $dept = $_POST["dept"];
        $tskcode= $_POST['task_code'];
        $tskname = $_POST['task_name'];
        $status = $_POST['status'];
        $file = $_FILES['files']['name'];
        $fileTmpName = $_FILES['files']['tmp_name'];

        $insert =mysqli_query($conn, " INSERT INTO tasks VALUES ('0','$school_id', '$dept','$tskcode','$tskname','$file', '$status')");

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

    if(isset($_POST['time_check'])){

        $school_id = $_POST["school_id"];
        $dept = $_POST["dept"];
        $log = $_POST['log'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $insert_time = mysqli_query($conn, "INSERT INTO time_checked VALUES ('0', '$school_id', '$dept', '$date', '$time', '$log')");

        if($insert_time==true){
            ?>
                <script>
                    alert("Data is inserted.");
                    window.location.href="../ojt/student/index.php";
                </script>
            <?php

        }else{

            ?>
                <script>
                    alert("Data is not inserted.");
                    window.location.href="../ojt/student/index.php";
                </script>
            <?php
        }
        
    }



?>
