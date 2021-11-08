<?php 

include '../../../snippets/conn.php';
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    $update = "UPDATE real_estate_buyer SET read_record = 1 WHERE id = '".$id."'";

    if (mysqli_query($conn, $update))
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
    die;
}
?>