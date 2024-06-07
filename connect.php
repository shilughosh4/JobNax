<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "jobnax";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if($conn){
    //echo "Connection Ok";
}else{
    echo "Connection failed".mysqli_connect_error();
}

?>
