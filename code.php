<?php
if (isset($_POST['Signup'])) {
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

  $house = $_REQUEST['House'];
  $password = $_REQUEST['Password'];
  $email = $_REQUEST['Email'];


  $sql = "INSERT INTO southernviewcodes VALUES ('','$house','$password','$email','')";

  if (mysqli_query($conn, $sql)) {
    header('Location:https://southernview-estate.herokuapp.com/generator.html');
  } else {
    header('Location: https://southernview-estate.herokuapp.com/signupFail.html');
  }
}
