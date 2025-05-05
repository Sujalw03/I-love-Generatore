<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'contact_db');

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header('Location: dashboard.php');
    } else {
        echo "Invalid credentials!";
    }
}
?>
