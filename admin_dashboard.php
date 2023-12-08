<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <div class="container">
        <h1>Welcome to the Admin Dashboard</h1>
        <a href="view_users.php">View Users</a>
		<a href="logout.php">Logout</a>
        <!-- Add other links or features for admin dashboard -->
    </div>
</body>
</html>