<?php

//action.php
include './edit-conn.php';

if($_POST['action'] == 'edit')
{
 $data = array(
  ':job_name'  => $_POST['job_name'],
  ':first_name'  => $_POST['first_name'],
  ':last_name'   => $_POST['last_name'],
  ':father_name'   => $_POST['father_name'],
  ':dob'   => $_POST['dob'],
  ':gender'   => $_POST['gender'],
  ':address'   => $_POST['address'],
  ':phone_number'   => $_POST['phone_number'],
  ':aadhar'   => $_POST['aadhar'],
  ':organization'   => $_POST['organization'],
  ':job_type'   => $_POST['job_type'],
  
  ':job_exp'   => $_POST['job_exp'],
  ':present_or_previous_company'   => $_POST['present_or_previous_company'],
  ':present_salary'   => $_POST['present_salary'],
  ':expected_salary'   => $_POST['expected_salary'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE employee 
 SET job_name = :job_name, 
 first_name = :first_name, 
 last_name = :last_name, 
 father_name = :father_name, 
 dob = :dob,
 gender = :gender, 
 address = :address,
 phone_number = :phone_number,
 aadhar = :aadhar, 
 organization = :organization, 
 job_type = :job_type, 
 job_exp = :job_exp, 
 present_or_previous_company = :present_or_previous_company, 
 present_salary = :present_salary, 
 expected_salary = :expected_salary 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM employee 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>