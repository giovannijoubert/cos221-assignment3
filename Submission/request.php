<?php
$servername = "wheatley.cs.up.ac.za";
$username = "u18009035";
$password = "G10v@nn1";
$dbname = "u18009035_NFL";


if(isset($_GET['request']))
if($_GET['request'] == "games"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT gID, gLocation, gDate FROM Games";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 

if(isset($_GET['request']))
if($_GET['request'] == "teams"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT DISTINCT pTeam FROM Players";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 

if(isset($_GET['request']))
if($_GET['request'] == "players"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT DISTINCT pID, fName, lName, pPos FROM Players";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 


if(isset($_GET['request']))
if($_GET['request'] == "users"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT cUsername, coach FROM Users";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 

if(isset($_GET['request']))
if($_GET['request'] == "playerdetail"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $pID = $_GET["pid"];
    
$sql = "SELECT * FROM Players WHERE pID='$pID'";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 
    

if(isset($_GET['request']))
if($_GET['request'] == "playerstats"){

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $pID = $_GET["pid"];
    
$sql = "SELECT * FROM Stats JOIN Games on Stats.gID = Games.gID WHERE pID='$pID'";
$result = $conn->query($sql);
    


$to_encode = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
}
} 


if(isset($_GET['request']))
if($_GET['request'] == "ShowAllPlayers"){
      
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $statType = $_GET['statType'];
    $sortBy = $_GET['sortBy'];
    
$sql = "SELECT * FROM Players JOIN Stats ON Players.pID = Stats.pID WHERE Stats.statName='$statType' ORDER BY statValue $sortBy";
    
  
    $result = $conn->query($sql) ;
      
    


    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
                $to_encode[] = $row;
        }
        
header('Content-Type: application/json');
echo json_encode($to_encode);
    
} 
} 

?>