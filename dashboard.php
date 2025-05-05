<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM contacts WHERE id=$id") or die($conn->error);
    header("Location: dashboard.php");
}

// Fetch contacts
$result = $conn->query("SELECT * FROM contacts") or die($conn->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Contact Responses</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>
