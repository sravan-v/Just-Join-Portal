<?php 
    include '../../../snippets/conn.php';
    session_start(); // start session

    header("Pragma: no-cache");
    header("cache-Control: no-cache, must-revalidate");


    // $_SESSION['id'] = $_GET['id'];
    $id = $_GET['id'];    
    // echo $id;
    $roleAccess = $_SESSION["role"];
    if ($roleAccess < 0) {
    header("location: ../../../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
    }

    //insert into database
    if(!empty($_POST)) {
        $employeeID = $_POST['employeeID'];
        $employeeJobName = $_POST['employeeJobName'];
        $employeeFirstName = $_POST['employeeFirstName'];
        $employeeLastName = $_POST['employeeLastName'];
        $employeeFatherName = $_POST['employeeFatherName'];
        $employeeDOB = $_POST['employeeDOB'];
        $employeeGender = $_POST['employeeGender'];
        $employeeAddress = $_POST['employeeAddress'];
        $employeePhoneNumber = $_POST['employeePhoneNumber'];
        $employeeAadhar = $_POST['employeeAadhar'];
        $employeeOrganization = $_POST['employeeOrganization'];
        $employeeJobType = $_POST['employeeJobType'];
        $employeeJobExperience = $_POST['employeeJobExperience'];
        $employeePresentCompanyName = $_POST['employeePresentCompanyName'];
        $employeePresentSalary = $_POST['employeePresentSalary'];
        $employeeExpectedSalary = $_POST['employeeExpectedSalary'];
        $employeeStatus = $_POST['employeeStatus'];
        $employeeReached = $_POST['employeeReached'];
        $employeePaid = $_POST['employeePaid'];
        $employeeReachedComment = $_POST['employeeReachedComment'];



        $sql = "UPDATE employee 
        SET job_name = '".$employeeJobName."', 
        first_name = '".$employeeFirstName."', 
        last_name = '".$employeeLastName."', 
        father_name = '".$employeeFatherName."', 
        dob = '".$employeeDOB."',
        gender = '".$employeeGender."', 
        address = '".$employeeAddress."',
        phone_number = '".$employeePhoneNumber."',
        aadhar = '".$employeeAadhar."', 
        organization = '".$employeeOrganization."', 
        job_type = '".$employeeJobType."', 
        job_exp = '".$employeeJobExperience."', 
        present_or_previous_company = '".$employeePresentCompanyName."', 
        present_salary = '".$employeePresentSalary."', 
        expected_salary = '".$employeeExpectedSalary."', 
        employee_status = '".$employeeStatus."', 
        reached = '".$employeeReached."', 
        paid = '".$employeePaid."',
        employee_comment = '".$employeeReachedComment."'
        WHERE id = '".$employeeID."'";

    if(mysqli_query($conn, $sql)){
        echo "inserted".'<br>';
    } else{
        echo "Error: " . $sql. "<br>" . mysqli_error($conn);
    }

    }
?>