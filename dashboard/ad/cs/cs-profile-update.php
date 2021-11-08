<?php 
  include '../../../snippets/conn.php';
  session_start(); // start session
  
  header("Pragma: no-cache");
  header("cache-Control: no-cache, must-revalidate");
  
  // do check
  $roleAccess = $_SESSION["role"];
  if ($roleAccess != 0) {
    header("location: ../../../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
  }

    //insert into database
    if(!empty($_POST)) {
        $employerID = $_POST['employerID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNumber'];
        $model = $_POST['model'];
        $fuelTypeText = $_POST['fuelType'];
        $fuelType = strtolower($fuelTypeText);

        $kilometers = $_POST['kilometers'];
        $yearOfPurchase = $_POST['yearOfPurchase'];
        $ownerName = $_POST['ownerName'];
        $ownerDetails = $_POST['ownerDetails'];
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];
        $anyIssuesText = $_POST['anyIssues'];
        $anyIssues = strtolower($anyIssuesText);

        $dateOfSubmit = $_POST['dateOfSubmit'];
        $employerStatus = $_POST['employerStatus'];
        $employerReached = $_POST['employerReached'];
        $employerPaid = $_POST['employerPaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];

        $sourcePath = $_FILES['image']['tmp_name'];
        $imgPath = $_FILES['image']['name'];
        $targetPath = "../../../assets/uploads/car/".$_FILES['image']['name'];

        $finalPath = str_replace(' ', '-', $imgPath);
        $finalPath = strtolower($finalPath);

        $finalPath = str_replace(' ', '-', $imgPath);
        $finalPath = strtolower($finalPath);
        
        if(move_uploaded_file($sourcePath, $targetPath)) {
                $sql = "UPDATE car_seller SET fname = '".$firstName."', 
                lname = '".$lastName."', 
                phone_number = '".$phoneNumber."', 
                model = '".$model."', 
                fuel_type = '".$fuelType."', 
                kilometers = '".$kilometers."',
                purchase_year = '".$yearOfPurchase."', 
                owner_name = '".$ownerName."', 
                owner_details = '".$ownerDetails."', 
                image_name = '".$finalPath."', 
                min_price = '".$minPrice."',
                max_price = '".$maxPrice."', 
                issues = '".$anyIssues."', 
                submit_date = '".$dateOfSubmit."',
                employee_status = '".$employerStatus."', 
                reached = '".$employerReached."', 
                paid = '".$employerPaid."',
                employee_comment = '".$employeeReachedComment."'
                WHERE id = '".$employerID."'";

            if(mysqli_query($conn, $sql)){
                echo "inserted".'<br>';
            } else{
                echo "Error: " . $sql. "<br>" . mysqli_error($conn);
            }
        }
    }
?>