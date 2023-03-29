<?php
session_start(); //start session
$error = ''; //Variable to store error message

if (isset($_POST['Login'])) {
    if (empty($_REQUEST['House']) || empty($_REQUEST['Password'])) {
        $error = "House number or password is invalid";
    } else {
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
        //For security against injection
        $house = stripslashes($house);
        $password = stripslashes($password);
        //$param_password = password_hash($password, PASSWORD_DEFAULT);


        //$house = mysqli_real_escape_string($house);
        //$password =  mysqli_real_escape_string($password);

        //Fecting information of user and finding their match

        $sql = "SELECT * FROM southernviewcodes WHERE HouseNumber = '$house' AND Password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['login_user'] = $house; //initializing session
                header('Location:generatedCode.html'); //Redirecting to the page with a generated code
            }
        } else {
            $error = 'House Number or password is invalid';
        }
        mysqli_close($conn); //close connection
    }
}
