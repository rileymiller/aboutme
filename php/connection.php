<?php

function Connect(){
$servername = "localhost";
$username = "rileymiller";
$password = "EEUKQWEI";
$db = "f17_rileymiller";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Yay connected";
return $conn;
}
?>