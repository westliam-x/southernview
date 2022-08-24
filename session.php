<?php

$cleardb_url = parse_url(getenv('CLEARDB_DATABASE_URL'));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);

    $active_group = 'default'
    $query_builder = TRUE

    // Create connection
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//start session
session_start();
//store session
$house_check = $_SESSION['login_user'];

//SQL query to fetch complete information on user

$sql= "SELECT HouseNumber FROM southernviewcodes WHERE HouseNumber='$house_check'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$login_session = $row['HouseNumber'];

if(!isset($login_session)){

    mysqli_close($conn);

    header('Location:https://southernview-estate.herokuapp.com/generator.php');
}
?>