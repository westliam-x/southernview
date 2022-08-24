<?php

include('session.php');
if(isset($_POST['Save'])){
    
    // Create connection
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
    
    $codes = $_REQUEST['Code'];

    $sql = "UPDATE southernviewcodes SET code = '$codes' WHERE houseNumber='$login_session'";

    if (mysqli_query($conn, $sql)) {
      $_SESSION['code'] = $codes; //initializing session
        header('Location:https://southernview-estate.herokuapp.com/generator.html');
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    }
?>