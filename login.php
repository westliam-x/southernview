<?php
session_start(); //start session
$error='';//Variable to store error message

if(isset($_POST['Login'])){
    if(empty($_REQUEST['House'])|| empty($_REQUEST['Password'])){
        $error = "House number or password is invalid";
    }
    else{
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
//For security against injection
$house = stripslashes($house);
$password = stripslashes($password);
//$param_password = password_hash($password, PASSWORD_DEFAULT);


//$house = mysqli_real_escape_string($house);
//$password =  mysqli_real_escape_string($password);

//Fecting information of user and finding their match

$sql = "SELECT * FROM southernviewcodes WHERE HouseNumber = '$house' AND Password = '$password'";
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 ) {
        while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['login_user'] = $house; //initializing session
        header('Location:https://southernview-estate.herokuapp.com/generatedCode.html');//Redirecting to the page with a generated code
        }
    } else {
   $error = 'House Number or password is invalid';
}
mysqli_close($conn);//close connection
}
}

?>