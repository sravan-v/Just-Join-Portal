<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["success"]) && $_SESSION["success"] === true){
//     $success = $_SESSION["success"];
//     exit;
// }
// $success = $_SESSION["success"];
// echo $success;
// Include config file
require_once "../snippets/conn.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$success = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, role FROM data_managers WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            // session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["role"] = $role;
                            
                            if($_SESSION["role"] >= 0){
                                $_SESSION["role"] = $role;
                                header("location: ../dashboard/sa/ep/saep-dashboard.php");
                            }
                            // else if($_SESSION["role"] == 0){
                            //     header("location: ../dashboard/ad/ep/adep-dashboard.php");
                            // }
                            else if($_SESSION["role"] == -1){
                                $password_err = "Not approved!";
                                $username = $password = "";
                                // $username_err = $password_err = "";
                                // $success = "";
                            }
                            
                            // Redirect user to welcome page
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Password not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Just Join Login</title>
    <link href="../assets/img/fav-jj.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
    </style>
</head>
<body class="loginBG">
    <div class="container">
        <div class="login-form">
            <!-- <form action="../snippets/auth.php" onsubmit="return validation()" method="post">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                        required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required="required">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Login" />
                </div>
                <div class="clearfix">
                    <a href="signup.php">Create an Account</a>
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>
            </form> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Username</label> -->
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Email">
                <span class="help-block err"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Password</label> -->
                <input type="password" name="password" class="form-control" placeholder="Password">
                
                <a href="forgot.php" class="float-left forgot">Forgot Password?
                    &nbsp;<span class="help-block err"><?php echo $password_err; ?></span>
                </a>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
                <span class="help-block not-approved err"><?php echo $success; ?></span>
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
            <!-- <p class="text-center"><a href="signup.html">Create an Account</a></p> -->
        </div>
    </div>
</body>
</html>