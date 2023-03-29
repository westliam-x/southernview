
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
        // Define variables and initialize with empty values
        $HouseNumber = $Email = $password = $confirm_password = "";
        $HouseNumber_err = $Email_err = $password_err = $confirm_password_err = "";

        // Processing form data when form is submitted
        if (isset($_POST['Signup'])) {

            // Validate houseNumber
            if (empty(trim($_REQUEST["House"]))) {
                $HouseNumber_err = "Please enter your House Number.";
            } elseif (!preg_match('/^[a-zA-Z0-9]+$/', trim($_REQUEST["House"]))) {
                $HouseNumber_err = "House Number can only contain letters and numbers.";
            } else {
                // Prepare a select statement
                $sql = "SELECT id FROM southernviewcodes WHERE houseNumber = ? ";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_house);

                    // Set parameters
                    $param_house = trim($_REQUEST["House"]);

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // store result
                        $stmt->store_result();

                        if ($stmt->num_rows == 1) {
                            $HouseNumber_err = "This House Number has been registered.";
                        } else {
                            $HouseNumber = trim($_REQUEST["House"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }


            if (empty(trim($_REQUEST["Email"]))) {
                $HouseNumber_err = "Please enter an Email.";
            } else {
                // Prepare a select statement
                $select = "SELECT id FROM southernviewcodes WHERE email = ?";

                if ($stmt = $conn->prepare($select)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_house);

                    // Set parameters
                    $param_email = trim($_REQUEST["Email"]);

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // store result
                        $stmt->store_result();

                        if ($stmt->num_rows == 1) {
                            $Email_err = "This House Number has been registered.";
                        } else {
                            $Email = trim($_REQUEST["Email"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }

            // Validate password
            if (empty(trim($_REQUEST["Password"]))) {
                $password_err = "Please enter a password.";
            } elseif (strlen(trim($_REQUEST["Password"])) < 6) {
                $password_err = "Password must have atleast 6 characters.";
            } else {
                $password = trim($_REQUEST["Password"]);
            }

            // Validate confirm password
            if (empty(trim($_REQUEST["ConfirmPassword"]))) {
                $confirm_password_err = "Please confirm password.";
            } else {
                $confirm_password = trim($_REQUEST["ConfirmPassword"]);
                if (empty($password_err) && ($password != $confirm_password)) {
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if (empty($HouseNumber_err) && empty($password_err) && empty($confirm_password_err)) {

                // Prepare an insert statement
                $sql = "INSERT INTO southernviewcodes (houseNumber,password,Email) VALUES (?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("sss", $param_house, $param_password, $param_email);

                    // Set parameters
                    $param_email = $Email;
                    $param_house = $HouseNumber;
                    $param_password = $password; // Creates a password hash

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Redirect to login page
                        header('Location:generator.php');
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }

            // Close connection
            $conn->close();
        }
        ?>
        
        