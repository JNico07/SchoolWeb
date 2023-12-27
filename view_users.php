<?php
session_start();

include('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch all users from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <div class="container">
        <h1>User Management</h1>
		<a href="add_student.php">Add New Student</a>
        <table border="1">
            <tr>
                <th>Full name</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['full_name']."</td>";
                echo "<td><a href='view_profile_admin.php?id=".$row['student_id']."'>View</a> | <a href='edit_user.php?id=".$row['student_id']."'>Edit</a> | <a href='delete_user.php?id=".$row['student_id']."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
} else {
    echo "No users found.";
}

$conn->close();
?>

