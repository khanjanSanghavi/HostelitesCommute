<?php
session_start();
$id = $_GET['key_id'];
include "hosteliteClass.php";
$obj = new db();
$data = $obj->getOneRide($id);
$destination = $data["Destination"];
$date = $data["Date"];
$time = $data["Time"];
$matchedRides = $obj->FindMatch($id, $destination, $date);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Matched Rides - Hostelites Commute</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for white background with green elements */
        body {
            background-color: #fff; /* White background color */
        }

        .navbar {
            background-color: #4CAF50; /* Green navbar background color */
        }

        .navbar-light .navbar-brand {
            color: #fff; /* Navbar brand text color */
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff; /* Navbar link text color */
        }

        .navbar-toggler-icon {
            color: #fff; /* Icon color */
        }

        .matched-rides-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f5f5f5; /* Light gray background color */
        }

        .ride-card {
            background-color: #4CAF50; /* Green card background color */
            color: #fff; /* Card text color */
            margin-bottom: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Hostelites Commute</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fas fa-user"></i> Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="matched_rides.php">Matched Rides</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container matched-rides-container">
        <h2>Matched Rides</h2>
        <?php
     if($matchedRides){
       
        foreach ($matchedRides as $ride) {
            echo '<div class="ride-card">';
            echo '<h3>ID: ' . $ride['studentId'] . '</h3>';
            echo '<p>Name: ' . $ride['studentName'] . '</p>';
            echo '<p>Time: ' . $ride['Time'] . '</p>';
            echo '<p>Contact No: ' . $ride['phoneNumber'] . '</p>';
            echo '</div>';
        }
    }else{
        echo "<h1>no matches</h1>";
    }
        ?>
    </div>

    <!-- Include Bootstrap JavaScript and Font Awesome icons -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
