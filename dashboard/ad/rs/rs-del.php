<?php
include '../../../snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

// do check
$roleAccess = $_SESSION["role"];
if ($roleAccess != 0) {
    header("location: ../../../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_POST['delId'];

$sql = "DELETE FROM real_estate_seller WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Deleted Successfully!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>