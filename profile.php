<!DOCTYPE html>
<html>
<head>
    <title>Profile - Hostelites Commute</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for a styled profile page */
        body {
            background-color: #f0f0f0; /* Background color */
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

        .container {
            background-color: #fff; /* Container background color */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .profile-header {
            text-align: center;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-green {
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-red {
            background-color: #FF5722;
            color: #fff;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #fff;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Hostelites Commute</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    session_start();
    $id = $_SESSION['cid'];
    require 'hosteliteClass.php';
    $obj = new db();
    $r = $obj->fetchOne($id);
    ?>
    <div class="container">
        <div class="profile-header">
            <img src="profile-picture.jpg" class="profile-picture" alt="User Profile Picture">
            <h2>Hello,<?php echo $r['studentName'] ?> </h2>
            <p>Manage your profile here</p>
        </div>

        <div class="action-buttons">
            <a href="UpdateInfo.php" class="btn btn-green btn-lg">Update Profile</a>
            <a href="deleteAccount.php" class="btn btn-red btn-lg">Delete Account</a>
        </div>

        <div class="text-center mt-3">
            <a href="logout.php" class="btn btn-secondary btn-lg">Logout</a>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript and Font Awesome icons -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
