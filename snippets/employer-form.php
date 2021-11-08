<?php 
 include './conn.php';

    //insert into database
    if(!empty($_POST)) {
    $employerName = $_POST['employerName'];
    $employerDesignation = $_POST['employerDesignation'];
    $organizationType = $_POST['organizationType'];
    $organisationName = $_POST['organisationName'];
    $employerPhoneNumber = $_POST['employerPhoneNumber'];
    $employerEmail = $_POST['employerEmail'];
    $employerAadhar = $_POST['employerAadhar'];
    $employerAddress = $_POST['employerAddress'];
    $employeeCategory = $_POST['employeeCategory'];
    $employeeJobType = $_POST['employeeJobType'];
    $employeePositions = $_POST['employeePositions'];
    $employeeGender = $_POST['employeeGender'];
    $employeeExperience = $_POST['employeeExperience'];
    $employeeSalaryMin = $_POST['employeeSalaryMin'];
    $employeeSalaryMax = $_POST['employeeSalaryMax'];
    $dateOfReg = date('d-m-Y');

    $res = "SELECT * FROM employer WHERE phone_number = '".$employerPhoneNumber."'";
    $result = $conn->query($res);
        if ($result->num_rows > 0) {
          echo 'exist';
          return;
        }
        else{
            $sql = "insert into employer (name, designation, organization_type, organization_name, phone_number, email, aadhar, address, emp_category, emp_job_type, no_positions, gender, experience, salary_min, salary_max, date_of_registered) values 
            ('$employerName', '$employerDesignation', '$organizationType', '$organisationName', '$employerPhoneNumber', '$employerEmail', '$employerAadhar', '$employerAddress', '$employeeCategory', '$employeeJobType', '$employeePositions', '$employeeGender', '$employeeExperience', '$employeeSalaryMin', '$employeeSalaryMax', '$dateOfReg')";

            if(mysqli_query($conn, $sql)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql. "<br>" . mysqli_error($conn);
            }
        }

    // $sql = "insert into employer (name, designation, organization_type, organization_name, phone_number, email, address, emp_category, emp_job_type, no_positions, gender, experience, salary_min, salary_max, date_of_registered) values 
    // ('$employerName', '$employerDesignation', '$organizationType', '$organisationName', '$employerPhoneNumber', '$employerEmail', '$employerAddress', '$employeeCategory', '$employeeJobType', '$employeePositions', '$employeeGender', '$employeeExperience', '$employeeSalaryMin', '$employeeSalaryMax', '$dateOfReg')";

    // if(mysqli_query($conn, $sql)){
    //     echo "inserted".'<br>';
    // } else{
    //     echo "Error: " . $sql. "<br>" . mysqli_error($conn);
    // }

    }
?>