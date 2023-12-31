<?php
session_start();

include('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Use a parameterized query to prevent SQL injection
    $sql = "DELETE FROM students WHERE student_id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter
    $stmt->bind_param("s", $student_id);

    // Execute the query
    if ($stmt->execute()) {
        // Use JavaScript to show an alert for success
        echo '<script>alert("Student deleted successfully!");</script>';
        
        // Redirect to the manage_students.php page after successful deletion
        echo '<script>window.location.href = "manage_students.php";</script>';
        exit();
    } else {
        // Log the error for debugging purposes
        error_log("Error deleting student: " . $stmt->error);
        
        // Use JavaScript to show an alert for the error
        echo '<script>alert("Error deleting student. Please try again later.");</script>';
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<!-- You can keep the HTML part as it is -->
<br>
<a href="manage_students.php">Back to User Management</a>
