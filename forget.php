<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wt";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username=$_POST['username'];
$EMAIL=$_POST['email'];
$otp=$_POST['otp'];
$newpassword=$_POST['newpassword'];
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO forget(username,email,mobile, newpassword, conpassword) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("ssds", $username,$EMAIL,$otp,$newpassword);
    
    if ($stmt->execute()) {
        // Registration completed
        echo "Registration completed successfully!";
        
        // Redirect to login page after a delay
        header("refresh:3; url=login.html");
        exit;
    } else {
        // An error occurred while storing credentials
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>