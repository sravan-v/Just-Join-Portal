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
        $employerName = $_POST['employerName'];
        $employerDesignation = $_POST['employerDesignation'];
        $organizationType = $_POST['organizationType'];
        $organisationName = $_POST['organisationName'];
        $employerPhoneNumber = $_POST['employerPhoneNumber'];
        $employerEmail = $_POST['employerEmail'];
        $employerAddress = $_POST['employerAddress'];
        $employeeCategory = $_POST['employeeCategory'];
        $employeeJobType = $_POST['employeeJobType'];
        $employeePositions = $_POST['employeePositions'];
        $employeeGender = $_POST['employeeGender'];
        $employeeExperience = $_POST['employeeExperience'];
        $employeeSalaryMin = $_POST['employeeSalaryMin'];
        $employeeSalaryMax = $_POST['employeeSalaryMax'];
        $employerStatus = $_POST['employerStatus'];
        $employerReached = $_POST['employerReached'];
        $employerPaid = $_POST['employerPaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];
        

        $sql = "UPDATE employer SET name = '".$employerName."', 
        designation = '".$employerDesignation."', 
        organization_type = '".$organizationType."', 
        organization_name = '".$organisationName."', 
        phone_number = '".$employerPhoneNumber."', 
        email = '".$employerEmail."',
        address = '".$employerAddress."', 
        emp_category = '".$employeeCategory."',
        emp_job_type = '".$employeeJobType."',
        no_positions = '".$employeePositions."', 
        gender = '".$employeeGender."', 
        experience = '".$employeeExperience."', 
        salary_min = '".$employeeSalaryMin."', 
        salary_max = '".$employeeSalaryMax."',
        employer_status = '".$employerStatus."', 
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