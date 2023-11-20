<?php
session_start();

if(!isset($_SESSION['cid']))
{
   
       header('location:profile.php');
}
?>

<?php

    require 'hosteliteClass.php';
    $obj = new db();
    $r = $obj->fetch_info($_SESSION['cid']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Your Details </h1>
        <form action="UpdateInfo.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" class="form-control" value=<?php echo $r['studentId'];?> required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value=<?php echo $r['studentName'];?> required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" class="form-control" value=<?php echo $r['phoneNumber'];?> required>
            </div>
            <div class="form-group">
                <label for="hostel_name">Hostel Name:</label>
                <input type="text" id="hostel_name" name="hostel_name" class="form-control" value=<?php echo $r['hostelName'];?> required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value=<?php echo $r['UserName'];?> required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" value=<?php echo $r['password'];?> required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
if(isset($_REQUEST['update']))
{
    $id=$_SESSION['cid'];
    $student_id = $_POST["student_id"];
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $hostel_name = $_POST["hostel_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

        $obj = new db();

        $r = $obj->updateStudentInfo($id, $student_id, $full_name, $phone_number, $hostel_name, $username, $password);
            if($r!= 0){
                header('location:profile.php');
            }
}
?>