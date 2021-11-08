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
        $propertyTypeText = $_POST['propertyType'];
        $propertyType = strtolower($propertyTypeText);

        $propertyTypeOthers = $_POST['propertyTypeOthers'];
        $propertyLength = $_POST['propertyLength'];
        $propertyUnitText = $_POST['propertyUnit'];
        $propertyUnit = strtolower($propertyUnitText);

        $propertyUnitOthers = $_POST['propertyUnitOthers'];
        $propertyValue = $_POST['propertyValue'];
        $propertyAddress = $_POST['propertyAddress'];
        $documentsClearText = $_POST['documentsClear'];
        $documentsClear = strtolower($documentsClearText);

        $dateOfSubmit = $_POST['dateOfSubmit'];
        $employerStatus = $_POST['employeeStatus'];
        $employerReached = $_POST['employeeReached'];
        $employerPaid = $_POST['employeePaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];

        $sourcePath = $_FILES['image']['tmp_name'];
        $imgPath = $_FILES['image']['name'];
        $targetPath = "../../../assets/uploads/property/".$_FILES['image']['name'];

        $finalPath = str_replace(' ', '-', $imgPath);
        $finalPath = strtolower($finalPath);

        $finalPath = str_replace(' ', '-', $imgPath);
        $finalPath = strtolower($finalPath);

            if(move_uploaded_file($sourcePath, $targetPath)) {
                $sql = "UPDATE real_estate_seller SET fname = '".$firstName."', 
                lname = '".$lastName."', 
                phone_number = '".$phoneNumber."', 
                property_type = '".$propertyType."', 
                property_type_others = '".$propertyTypeOthers."', 
                property_length = '".$propertyLength."', 
                property_unit = '".$propertyUnit."',
                property_unit_others = '".$propertyUnitOthers."',
                property_value = '".$propertyValue."', 
                image_name = '".$finalPath."', 
                property_address = '".$propertyAddress."', 
                documents_clear = '".$documentsClear."', 
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