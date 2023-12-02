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
        <?php
            echo "<h1>Welcome to the Dashboard, ".$_SESSION['role']."</h1>";
        ?>
        <!-- Dashboard content -->
        <a href="profile.php">View Profile</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
