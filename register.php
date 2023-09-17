<?php
// Establish a Database Connection 
$conn = new mysqli('localhost', 'username', 'password', 'podvibes');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}
$conn->close();
?>
