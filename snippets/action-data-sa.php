<?php
include './edit-conn.php';

if($_POST['action'] == 'edit')
{
 $data = array(
  ':name'  => $_POST['name'],
  ':designation'  => $_POST['designation'],
  ':organization_type'   => $_POST['organization_type'],
  ':organization_name'   => $_POST['organization_name'],
  ':phone_number'   => $_POST['phone_number'],
  ':email'   => $_POST['email'],
  ':address'   => $_POST['address'],
  ':emp_category'   => $_POST['emp_category'],
  ':emp_job_type'   => $_POST['emp_job_type'],
  ':no_positions'   => $_POST['no_positions'],
  ':gender'   => $_POST['gender'],
  ':experience'   => $_POST['experience'],
  ':salary_min'   => $_POST['salary_min'],
  ':salary_max'   => $_POST['salary_max'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE employer 
 SET name = :name, 
 designation = :designation, 
 organization_type = :organization_type, 
 organization_name = :organization_name, 
 phone_number = :phone_number,
 email = :email, 
 address = :address,
 emp_category = :emp_category,
 emp_job_type = :emp_job_type, 
 no_positions = :no_positions, 
 gender = :gender, 
 experience = :experience, 
 salary_min = :salary_min, 
 salary_max = :salary_max 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM employer 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>