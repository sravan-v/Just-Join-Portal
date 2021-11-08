<?php
include './snippets/conn.php';
// session_start(); // start session

// header("Pragma: no-cache");
// header("cache-Control: no-cache, must-revalidate");

// // do check
// if (!isset($_SESSION["username"])) {
//     header("location: ./admin/login.php");
//     exit; // prevent further execution, should there be more code that follows
// }

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_POST['id'];
$val= $_POST['val'];

$sql = "UPDATE data_managers SET role='$val' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Updated Successfully!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>