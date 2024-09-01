<!-- <?php

$connect = new mysqli('localhost','root','','dsms');

if($connect->connect_error){
	die("connection failed :".$connect->connect_error);
}

?> -->


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dsms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}
// echo "Connected successfully";
?>