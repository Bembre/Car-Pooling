<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$sql="SELECT * FROM pool";
$conn = new mysqli($servername, $username, $password, $dbname);
$all = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Pooling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="header" style="background: #003F88;">
        <header style="backdrop-filter: blur(20px);">
        <h2 class="car"><img src="logo.png" style="height: 50px; width: 50px;"> Carpooling</h2>
        <nav class="navigation">
            <a href="pool.html">Car Pooling</a>
            <a href="ride.html">Car Ride</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <a class="popup" href="login.html">Login</a>
        </nav>
        </header>
    </section>
    <section id="page-header-ride">
    </section>
    <section id="form">
        <?php 
        while($row = mysqli_fetch_assoc($all)) {
        ?>
        <div class="card">
            <div class="title">
                <h4 style="color:#fff";>Name: </h4>
                <?php echo $row["name"]; ?>
                <h4 style="color:#fff";>Mode: </h4>
                <?php echo $row["mode"]; ?>
                <h4 style="color:#fff";>Pickup: </h4>
                <?php echo $row["start"]; ?>
                <h4 style="color:#fff";>Destination: </h4>
                <?php echo $row["final"]; ?>
                <h4 style="color:#fff";>Gender: </h4>
                <?php echo $row["gender"]; ?>
                <h4 style="color:#fff";>Mobile: </h4>
                <?php echo $row["mobile"]; ?>
            </div>
            <button>Accept</button>
            <button>Reject</button>
        </div>
        <?php } ?>
    </section>
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="logo.png" alt="" width="125px">
        </div>
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong> Matoshri Niwas, Ganesh Nagar, Umri</p>
            <p><strong>Phone: </strong>+919022654357, +918149241774</p>
            <p><Strong>Hours: </Strong>10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-github"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms and Condition</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="copyright">
            <p><i class="fal fa-copyright"></i>All Copyright Recived</p>
        </div>
    </footer>
    <script src="script.js"></script>
    
</body>
</html>