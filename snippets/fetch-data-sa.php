<?php
include './edit-conn.php';

$column = array("id", "name", "designation", "organization_type", "organization_name", "phone_number", "email", "address", "emp_category", "emp_job_type", "no_positions", "gender", "experience", "salary_min", "salary_max");

$query = "SELECT * FROM employer";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE name LIKE "%'.$_POST["search"]["value"].'%" 
 OR designation LIKE "%'.$_POST["search"]["value"].'%" 
 OR organization_type LIKE "%'.$_POST["search"]["value"].'%" 
 OR organization_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR phone_number LIKE "%'.$_POST["search"]["value"].'%" 
 OR email LIKE "%'.$_POST["search"]["value"].'%" 
 OR address LIKE "%'.$_POST["search"]["value"].'%" 
 OR emp_category LIKE "%'.$_POST["search"]["value"].'%" 
 OR emp_job_type LIKE "%'.$_POST["search"]["value"].'%" 
 OR no_positions LIKE "%'.$_POST["search"]["value"].'%" 
 OR gender LIKE "%'.$_POST["search"]["value"].'%" 
 OR experience LIKE "%'.$_POST["search"]["value"].'%" 
 OR salary_min LIKE "%'.$_POST["search"]["value"].'%" 
 OR salary_max LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = $row['name'];
 $sub_array[] = $row['designation'];
 $sub_array[] = $row['organization_type'];
 $sub_array[] = $row['organization_name'];
 $sub_array[] = $row['phone_number'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['emp_category'];
 $sub_array[] = $row['emp_job_type'];
 $sub_array[] = $row['no_positions'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['experience'];
 $sub_array[] = $row['salary_min'];
 $sub_array[] = $row['salary_max'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM employer";
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