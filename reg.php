<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $stmt = $conn->prepare("INSERT INTO reg (username,email,password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username,$email,$password);
        if ($stmt->execute()) {
        header("refresh:0.5; url=login.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>