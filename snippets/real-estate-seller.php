<?php 
    include './conn.php';
    if(!empty($_POST)) {
        if(is_array($_FILES)) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $aadhar = $_POST['aadhar'];
            $address = $_POST['address'];
            $propertyType = $_POST['propertyType'];
            $propertyTypeOthers = $_POST['propertyTypeOthers'];
            $propertyDetails = $_POST['propertyDetails'];
            $propertyValue = $_POST['propertyValue'];
            $propertyAddress = $_POST['propertyAddress'];
            $documentsClear = $_POST['documentsClear'];
            $dateOfSubmit = date('d-m-Y');
            $uploadDir = '../assets/uploads/property/';
            $allowTypes = array('jpg','png','jpeg','gif');
            
            //Inserting to database
            $finalPath = rand();
            $sql1 = "insert into real_estate_seller (fname, lname, phone_number, aadhar, address, property_type, property_type_others, property_details, property_value, image_name, property_address, submit_date, documents_clear) values ('$firstName', '$lastName', '$phoneNumber', '$aadhar', '$address', '$propertyType', '$propertyTypeOthers', '$propertyDetails', '$propertyValue', '$finalPath', '$propertyAddress', '$dateOfSubmit', '$documentsClear')";

            if(mysqli_query($conn, $sql1)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql1. "<br>" . mysqli_error($conn);
            }

            $last_id = $conn->insert_id;

            if(!empty(array_filter($_FILES['files']['name']))){
                foreach($_FILES['files']['name'] as $key=>$val){
                    $file = addslashes(file_get_contents($_FILES["files"]["tmp_name"][$key]));
                    $sql = "INSERT INTO rs_images (name, img_id) VALUES ('$file', '$last_id')";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute();
                } 
            }
            else {
                $errors[] = "No File Selected";
                echo "No Image Added";
            }
        }
    }
?>