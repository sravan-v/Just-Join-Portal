<?php
include '../../../snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

$id = $_SESSION['id'];

// code start
if(isset($_POST["action"]))
{
  // $conn = mysqli_connect("localhost", "root", "", "test");
  // $conn = mysqli_connect("localhost", "justjoin", "just_join_111", "just_join");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM tbl_images WHERE img_id = $id";
  $result = mysqli_query($conn, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">ID</th>
     <th width="70%">Image</th>
     <th width="10%">Change</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["id"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['name']).'" height="60" width="75" class="img-thumbnail" />
     </td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "INSERT INTO tbl_images (name, img_id) VALUES ('$file', '$id')";
  if(mysqli_query($conn, $query))
  {
   echo 'Image Inserted into Database';
  }
  else{
    echo "Failed 1";
  }
 }

 if($_POST["action"] == "update")
 {
  $file2 = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE tbl_images SET name = '$file2' WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($conn, $query))
  {
   echo 'Image Updated into Database';
  }
  else{
    echo "Failed 2";
  }
 }

 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM tbl_images WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($conn, $query))
  {
   echo 'Image Deleted from Database';
  }
  else{
    echo "Failed 3";
  }
 }

}
?>