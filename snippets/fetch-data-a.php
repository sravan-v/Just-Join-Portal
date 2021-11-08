<?php

include './edit-conn.php';

$column = array("id", "job_name", "first_name", "last_name", "father_name", "dob", "gender", "address", "phone_number", "aadhar", "organization", "job_type", "job_exp", "present_or_previous_company", "present_salary", "expected_salary");

$query = "SELECT * FROM employee";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE job_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR first_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR last_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR father_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR dob LIKE "%'.$_POST["search"]["value"].'%" 
 OR gender LIKE "%'.$_POST["search"]["value"].'%" 
 OR address LIKE "%'.$_POST["search"]["value"].'%" 
 OR phone_number LIKE "%'.$_POST["search"]["value"].'%" 
 OR aadhar LIKE "%'.$_POST["search"]["value"].'%" 
 OR organization LIKE "%'.$_POST["search"]["value"].'%" 
 OR job_type LIKE "%'.$_POST["search"]["value"].'%" 
 OR job_exp LIKE "%'.$_POST["search"]["value"].'%" 
 OR present_or_previous_company LIKE "%'.$_POST["search"]["value"].'%" 
 OR present_salary LIKE "%'.$_POST["search"]["value"].'%" 
 OR expected_salary LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['job_name'];
 $sub_array[] = $row['first_name'];
 $sub_array[] = $row['last_name'];
 $sub_array[] = $row['father_name'];
 $sub_array[] = $row['dob'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['phone_number'];
 $sub_array[] = $row['aadhar'];
 $sub_array[] = $row['organization'];
 $sub_array[] = $row['job_type'];
 $sub_array[] = $row['job_exp'];
 $sub_array[] = $row['present_or_previous_company'];
 $sub_array[] = $row['present_salary'];
 $sub_array[] = $row['expected_salary'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM employee";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>