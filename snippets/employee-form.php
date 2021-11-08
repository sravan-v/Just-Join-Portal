<?php 
    include './conn.php';
    //insert into database
    if(!empty($_POST)) {
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
    $dateOfReg = date('d-m-Y');

    $res = "SELECT * FROM employee WHERE phone_number = '".$employeePhoneNumber."'";
    $result = $conn->query($res);
        if ($result->num_rows > 0) {
          echo 'exist';
          return;
        }
        else{
            $sql = "insert into employee (job_name, first_name, last_name, father_name, dob, gender, address, phone_number, aadhar, organization, job_type, job_exp, present_or_previous_company, present_salary, expected_salary, date_of_registered) values ('$employeeJobName', '$employeeFirstName', '$employeeLastName', '$employeeFatherName', '$employeeDOB', '$employeeGender', '$employeeAddress', '$employeePhoneNumber', '$employeeAadhar', '$employeeOrganization', '$employeeJobType', '$employeeJobExperience', '$employeePresentCompanyName', '$employeePresentSalary', '$employeeExpectedSalary', '$dateOfReg')";

            if(mysqli_query($conn, $sql)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql. "<br>" . mysqli_error($conn);
            }
        }
        
    }
?>