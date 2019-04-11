<?php
$servername = "wheatley.cs.up.ac.za";
$username = "u18009035";
$password = "G10v@nn1";
$dbname = "u18009035_NFL";
 $error = '';
    
if(isset($_POST['insert_action']))
if ($_POST['insert_action'] == "player"){
   
    
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

   
    $pPos = $_POST['pPos'];
    $pHeight = $_POST['pHeight'];
    $pWeight = $_POST['pWeight'];
     $pTeam = $_POST['pTeam'];
    
      

    
     if($_POST['btntype'] == "Modify")
    {
          $pID = $_POST['playerID'];
           $sql = "UPDATE Players SET pPos = '$pPos', pHeight='$pHeight',pWeight='$pWeight', pTeam='$pTeam'  WHERE pID='$pID'";
        $result = $conn->query($sql);
        $error = "Success";
         
     } else if($_POST['btntype'] == "Delete"){
         $pID = $_POST['playerID'];
         $sql = "DELETE FROM Stats WHERE pID='$pID'";
        
        if ($conn->query($sql) === TRUE) {
        $error = "Record Deleted Successfully";
        } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        } 
     } else {
         
         
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $birthDate = $_POST['birthDate'];
    $pPos = $_POST['pPos'];
    $pHeight = $_POST['pHeight'];
    $pWeight = $_POST['pWeight'];
     $pTeam = $_POST['pTeam'];
    
$sql = "INSERT INTO Players (fName, lName, BirthDate, pPos, pHeight, pWeight, pTeam)
VALUES ('$fName','$lName','$birthDate','$pPos','$pHeight', '$pWeight', '$pTeam')";

if ($conn->query($sql) === TRUE) {
     $error = "New record created successfully";
} else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
} 
     }

$conn->close();
    
}



if(isset($_POST['insert_action']))
if ($_POST['insert_action'] == "game"){
   
    
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $gDate = $_POST['gDate'];
    $gLocation = $_POST['gLocation'];
    $gTeamHome = $_POST['gTeamHome'];
    $gTeamAway = $_POST['gTeamAway'];
  
    
    
$sql = "INSERT INTO Games (gDate, gLocation, gTeamHome, gTeamAway)
VALUES ('$gDate', '$gLocation', '$gTeamHome', '$gTeamAway')";

if ($conn->query($sql) === TRUE) {
     $error = "New record created successfully";
} else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
} 

$conn->close();
    
}

if(isset($_POST['insert_action']))
if ($_POST['insert_action'] == "stat"){
   
    
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    
    
     if($_POST['btntype'] == "Modify")
    {
        $gIDpIDstatName = $_POST['stat'];
         $statValue = $_POST['statValue'];
         
        $sql = "UPDATE Stats SET statValue = '$statValue'  WHERE CONCAT(gID,pID,statName) ='$gIDpIDstatName'";
        $result = $conn->query($sql);
         $error = "Success";
         
     } else if($_POST['btntype'] == "Delete"){
         $gIDpIDstatName = $_POST['stat'];
         
         $sql = "DELETE FROM Stats WHERE CONCAT(gID,pID,statName) ='$gIDpIDstatName'";
        if ($conn->query($sql) === TRUE) {
        $error = "Record Deleted Successfully";
        } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        } 
     } else {
    
    
    
    
    
    $gID = $_POST['Games'];
    $pID = $_POST['Players'];
    $statName = $_POST['statName'];
    $statValue = $_POST['statValue'];
    
    
           
    $defensive = array("Tackles", "InterceptionsD", "Sacks");
    
    if(in_array($statName, $defensive)){
        $statType = "Defensive";
    } else {$statType = "Offensive";}
  
    
    
$sql = "INSERT INTO Stats (gID, pID, statType, statName, statValue)
VALUES ('$gID', '$pID', '$statType', '$statName','$statValue')";

if ($conn->query($sql) === TRUE) {
     $error = "New record created successfully";
} else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
} 
     }

$conn->close();
    
}



if(isset($_POST['insert_action']))
if ($_POST['insert_action'] == "insuser"){
   
 
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $cUsername = $_POST['cUsername'];
    $cPassword = $_POST['cPassword'];
    $coach = $_POST['coach'];
    
    if($_POST['btntype'] == "Modify")
    {
        $sql = "UPDATE Users SET cPassword = '$cPassword', coach='$coach' WHERE cUsername='$cUsername'";
        $result = $conn->query($sql);
        $error = "Success";
    } else if($_POST['btntype'] == "Delete"){
        $sql = "DELETE FROM Users WHERE cUsername='$cUsername'";
         if ($conn->query($sql) === TRUE) {
        $error = "Record Deleted Successfully";
        } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        } 
    } else {
    
    
    $sql = "SELECT * FROM Users WHERE cUsername='$cUsername'";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $error = "Username already in use!";
      } else {

$sql = "INSERT INTO Users (cUsername, cPassword, coach)
VALUES ('$cUsername', '$cPassword', '$coach')";

if ($conn->query($sql) === TRUE) {
     $error = "New record created successfully";
} else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
} 
      }
    }

$conn->close();
    
} 
?>



