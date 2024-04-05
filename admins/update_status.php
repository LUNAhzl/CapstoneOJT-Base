<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "ojtime");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve task ID and new status
    $task_id = $_POST['task_id'];
    $new_status = $_POST['new_status'];

    // Update status in the database
    $sql = "UPDATE tasks SET status='$new_status' WHERE id=$task_id";

    if (mysqli_query($conn, $sql)) {
        // If update successful, redirect back to task list page
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
