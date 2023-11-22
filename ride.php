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
    $name = $_POST["name"];
    $adhar = $_POST["adhar"];
    $start = $_POST["start"];
    $final = $_POST["final"];
    $time = $_POST["time"];
    $mode = $_POST["mode"];
    $gender = $_POST["gender"];
    $mobile = $_POST["mobile"];
    $stmt = $conn->prepare("INSERT INTO ride (name,adhar,start,final,time,mode,gender,mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsssssd",$name,$adhar,$start,$final,$time,$mode,$gender,$mobile);
        if ($stmt->execute()) {
            echo "Thank you for showing your interest";
            echo "We will get to you as soon as some one shows interest";
        header("refresh:1.5; url=data.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>