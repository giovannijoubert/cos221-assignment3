<?php

session_start(); // Starting Session

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
    
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$servername = "wheatley.cs.up.ac.za";
$username = "u18009035";
$password = "G10v@nn1";
$dbname = "u18009035_NFL";
    
    
$conn = new mysqli($servername, $username, $password, $dbname);
        
$username = mysqli_real_escape_string($conn,$_POST['username']);      
$password = mysqli_real_escape_string($conn,$_POST['password']); 

// SQL query to fetch information of registerd users and finds user match.
$sql = "SELECT * FROM Users WHERE cPassword='$password' AND cUsername='$username'";
$result = $conn->query($sql);
$rows = $result->num_rows;

$row = $result->fetch_assoc();
$isCoach = $row["coach"];
    
 
    
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['coach']=$isCoach;
    
if($isCoach == "Y"){
    header("location: coach.php"); // Redirecting To Other Page
    } else {
    header("location: fans.php"); 
    }
} else {
$error = "Username or Password is invalid";
}
$conn->close();
}
}
?>