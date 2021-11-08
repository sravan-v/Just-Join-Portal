<?php

//fetch_data.php

include('./conn.php');

$search_key = $_POST['search_key'];
echo $search_key;
if(isset($_POST["action"]))
{
	$query = "SELECT * FROM employee WHERE id = 13";
	// if(isset($_POST["search_key"])){
	// 	$query .= "
	// 	 AND id IN('1')
	// 	";
	// }



	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
            <tbody id="tbody_after">
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                    <td>'.$row["job_name"].'</td>
                    <td>'.$row["phone_number"].'</td>
                    <td>'.$row["address"].'</td>
                    <td><a href="#" class="btn btn-dark btn-block" onclick="return edit('.$row["id"].');">View</a></td>
                </tr>
            </tbody>';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>