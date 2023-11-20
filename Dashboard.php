<!DOCTYPE html>
<html>
<head>
    <title>Hostelites Commute</title>
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

        .add-ride-button {
            position: fixed;
            bottom: 100px;
            right: 80px;
            width: 50px;
            height: 50px;
            background-color: #4CAF50; /* Green button background color */
            border: none;
            border-radius: 50%;
            color: #fff;
            text-align: center;
            font-size: 25px;
            cursor: pointer;
        }

        a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
}

        .card {
            background-color: #4CAF50; /* Green card background color */
            color: #fff; /* Card text color */
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
            </ul>
        </div>
    </nav>

<?php
    session_start();
    $id = $_SESSION['cid'];
    require 'hosteliteClass.php';
    $obj = new db();
    $rides = $obj->getRides($id);

?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-light">
                        <h5 class="card-title">Ride Details</h5>
                        <div id="rideDetails">
                            <?php if($rides){ ?>
                        <table class="table table-bordered text-light" >
                            <thead>
                                 <tr>
                                    <th>Destination</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Passengers</th>
                                    <th>Action</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                foreach ($rides as $ride) {
                                    echo "<tr>";
                                    echo "<td>" . $ride['Destination'] . "</td>";
                                    echo "<td>" . $ride['Date'] . "</td>";
                                    echo "<td>" . $ride['Time'] . "</td>";
                                    echo "<td>" . $ride['PassangerNo'] . "</td>";
                                    echo "<td>";
                                    echo "<button class='btn btn-success mr-2 '><a href=findmatch.php?key_id=".$ride['RideId'].">Find Match</a></button>";
                                    echo "<button class='btn btn-danger ml-2'><a href=deleteRide.php?key_id=".$ride['RideId']." >Delete</a></button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<h4>Ride Details will appear here once added</h4>";
                            }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add a Ride Button -->
    <button class="add-ride-button" data-toggle="modal" data-target="#addRideModal">
        <span>+</span>
    </button>

    <div class="modal fade" id="addRideModal" tabindex="-1" role="dialog" aria-labelledby="addRideModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRideModalLabel">Add a Ride</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="ride_request.php" method="post">
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="passengers">Number of Passengers</label>
                <input type="number" class="form-control" id="passengers" name="passengers" required>
            </div>
            <button type="submit" class="btn btn-primary" >Save Ride</button>
            </form>
          </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        

                
            </div>
        </div>
    <!-- Include Bootstrap JavaScript and Font Awesome icons -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
