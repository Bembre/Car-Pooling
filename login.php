<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "min_proj";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM reg WHERE username = ? AND password = ?");

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login successful
      //  echo "<h1>Login successful!</h1>";
        
        // Redirect to second.html page after a delay
        header("refresh:1; url=index.html");
       
exit();

        exit;
    } else {
        // Login failed
        echo "<h1>Invalid Username or password</h1>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>