<?php
$servername = "wheatley.cs.up.ac.za";
$username = "u18009035";
$password = "G10v@nn1";
$dbname = "u18009035_NFL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br/>";

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row["cUsername"]. " - password: " . $row["cPassword"]. " " . $row["coach"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
