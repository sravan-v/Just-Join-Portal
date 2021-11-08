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
        $propertyBuyerName = $_POST['propertyBuyerName'];
        $propertyBuyerSurname = $_POST['propertyBuyerSurname'];
        $propertyType = $_POST['propertyType'];
        $propertyOthers = $_POST['propertyOthers'];
        $propertValue = $_POST['propertValue'];
        $propertyPhonenumber = $_POST['propertyPhonenumber'];
        $buyerAddress = $_POST['buyerAddress'];
        $dateOfSubmit = $_POST['dateOfSubmit'];
        $employerStatus = $_POST['employeeStatus'];
        $employerReached = $_POST['employeeReached'];
        $employerPaid = $_POST['employeePaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];

        $sql = "UPDATE real_estate_buyer SET fname = '".$propertyBuyerName."', 
        sname = '".$propertyBuyerSurname."', 
        property_type = '".$propertyType."', 
        property_type_others = '".$propertyOthers."', 
        property_value = '".$propertValue."', 
        phone_number = '".$propertyPhonenumber."', 
        buyer_address = '".$buyerAddress."',
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
?>