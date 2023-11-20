<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    require 'hosteliteClass.php';
    // Check if password and confirm password match
    if ($password === $confirm_password) 
    {
        $student_id = $_POST["student_id"];
        $full_name = $_POST["full_name"];
        $phone_number = $_POST["phone_number"];
        $hostel_name = $_POST["hostel_name"];
        $username = $_POST["username"];

        $obj = new db();

        $r = $obj->saveStudentRegistration($student_id, $full_name, $phone_number, $hostel_name, $username, $password);
        
            if($r!= 0){
                header('location:login.html');
            }
    } 
    else {
        // Passwords do not match, display an error message
        echo "Passwords do not match. Please try again.";
    }
}
?>
