<?php
include 'conn.php';

// header("Pragma: no-cache");
// header("cache-Control: no-cache, must-revalidate");  

   if($_SERVER["REQUEST_METHOD"] == "POST") {

     session_start();
      // username and password sent from form 
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']); 
      $_SESSION["username"] = $username;
      
      $sql = "select * from data_managers where username = '$username' and password = '$password'";  
      $result = mysqli_query($conn, $sql);  
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

              if($row['role'] == 1){  
                header("Location: ../dashboard/employer-admin-dashboard.php");
                exit();
              }  
              else if($row['role'] == 0){
                header("Location: ../dashboard/employee-admin-dashboard.php");
                exit();
              } 
          }
        } else {
          header("Location: ../admin/login.php");
          echo "<script>alert('Login failed. Invalid username or password.')</script>";
          exit();
        }
   }
?>