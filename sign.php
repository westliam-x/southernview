<?php
if(isset($_POST['Add'])){
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
    $email = $_REQUEST['Email'];
    $house = $_REQUEST['House'];
    $password = $_REQUEST['Password'];

    $sql = "INSERT INTO southernviewcodes VALUES ('$house','$password','$email','')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
    
?>