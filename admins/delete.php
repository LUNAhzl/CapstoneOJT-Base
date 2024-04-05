<?php

include 'c:\xampp\htdocs\ojt\conn.php';

// Sanitize input
$ref_id = mysqli_real_escape_string($conn, $_GET['id']);

// Delete task from database
$delete = mysqli_query($conn, "DELETE FROM tasks WHERE id='$ref_id'");

if ($delete) {
    ?>
    <script>
        alert("Your file was successfully deleted.");
        window.location.href = "../student/index.php";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Error in deleting!");
        window.location.href = "../student/index.php";
    </script>
    <?php
}

?>
