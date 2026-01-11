<?php 

  $servername = $host = "localhost";
  $username = $user = "root";
  $password = $pass = "";
  $db = "uquizdb";
  $conn = null;

if (!empty($conn_type) && $conn_type == "mysqli") {

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

} else {

  try {
    $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
  } catch (Exception $e) {
    die("Connection failed.");
  }
}


?>