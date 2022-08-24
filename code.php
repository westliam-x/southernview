<?php
 if(isset($_POST['Signup'])){
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




    
?>