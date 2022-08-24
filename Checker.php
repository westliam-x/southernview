<?php
if(isset($_POST['Check'])){
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
    $code = $_REQUEST['Code'];

$sql = "SELECT HouseNumber FROM southernviewcodes WHERE code ='$code'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
    header('Location:https://southernview-estate.herokuapp.com/confirmation.html');

}
} else {
    header('Location:https://southernview-estate.herokuapp.com/invalid.html');
}

mysqli_close($conn);
    }
?>