<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'southernview');

/* Attempt to connect to MySQL database */
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn === false) {
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}
//start session
session_start();
//store session
$house_check = $_SESSION['login_user'];

//SQL query to fetch complete information on user

$sql = "SELECT HouseNumber FROM southernviewcodes WHERE HouseNumber='$house_check'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$login_session = $row['HouseNumber'];

if (!isset($login_session)) {

  mysqli_close($conn);

  header('Location:generator.php');
}
