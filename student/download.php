<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "ojtime");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the file ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the file ID from the URL
    $fileId = $_GET['id'];
    
    // Fetch the file path from the database based on the file ID
    $sql = "SELECT files FROM tasks WHERE id = '$fileId'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        // File path found, fetch and display the file
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['files'];
        $filePath = 'C:/xampp/htdocs/ojt/assets/img/upload/' . $fileName; // Adjust the directory path
        
        // Check if the file exists
        if(file_exists($filePath)) {
            // Set appropriate headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            
            // Read the file and output it to the browser
            readfile($filePath);
            
            // Exit the script after the file is sent
            exit;
        } else {
            // File not found, display an error message
            echo "File not found: $filePath";
        }
    } else {
        // No file found with the given ID, display an error message
        echo "No file found with ID: $fileId";
    }
} else {
    // File ID not provided, display an error message
    echo "File ID not provided!";
}

// Close the database connection
mysqli_close($conn);
?>
