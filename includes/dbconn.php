<?php
$host = 'localhost';
$port = 3307;
$user = 'colin';
$password = 'Nyamiaka@321';
$database = 'onlineflightdb';

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connection sucess";
?>