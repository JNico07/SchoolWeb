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
        echo "Student deleted successfully!";
    } else {
        echo "Error deleting student: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<br>
<a href="view_users.php">Back to User Management</a>