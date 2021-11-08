<?php 
    include '../../../snippets/conn.php';
    session_start(); // start session

    header("Pragma: no-cache");
    header("cache-Control: no-cache, must-revalidate");

    // do check
    $roleAccess = $_SESSION["role"];
    if ($roleAccess < 0) {
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
        $dateOfSubmit = $_POST['dateOfSubmit'];
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];
        $employerStatus = $_POST['employerStatus'];
        $employerReached = $_POST['employerReached'];
        $employerPaid = $_POST['employerPaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];
        

        $sql = "UPDATE car_buyer SET fname = '".$firstName."', 
        lname = '".$lastName."', 
        phone_number = '".$phoneNumber."', 
        model = '".$model."', 
        fuel_type = '".$fuelType."', 
        kilometers = '".$kilometers."',
        purchase_year = '".$yearOfPurchase."', 
        submit_date = '".$dateOfSubmit."',
        min_price = '".$minPrice."',
        max_price = '".$maxPrice."', 
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
?>