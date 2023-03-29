<?php

include('session.php');
if (isset($_POST['Save'])) {

  // Create connection
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

  $codes = $_REQUEST['Code'];

  $sql = "UPDATE southernviewcodes SET code = '$codes' WHERE houseNumber='$login_session'";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['code'] = $codes; //initializing session
    header('Location:generator.php');
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
