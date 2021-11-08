<?php 
    include './conn.php';
    //insert into database
    if(!empty($_POST)) {
        if(is_array($_FILES)) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $aadhar = $_POST['aadhar'];
            $address = $_POST['address'];
            $model = $_POST['model'];
            $fuelType = $_POST['fuelType'];
            $kilometers = $_POST['kilometers'];
            $yearOfPurchase = $_POST['yearOfPurchase'];
            $vehicleNumber = $_POST['vehicleNumber'];
            $maxPrice = $_POST['maxPrice'];
            $anyIssues = $_POST['anyIssues'];
            $dateOfSubmit = date('d-m-Y');
            $uploadDir = '../assets/uploads/car/';
            $allowTypes = array('jpg','png','jpeg','gif');

            //Inserting to database
            $finalPath = rand();
            $sql1 = "INSERT INTO car_seller (fname, lname, phone_number, aadhar, address, model, fuel_type, kilometers, purchase_year, vehicle_number, max_price, image_name, issues, submit_date) values ('$firstName', '$lastName', '$phoneNumber', '$aadhar', '$address', '$model', '$fuelType', '$kilometers', '$yearOfPurchase', '$vehicleNumber', '$maxPrice', '$finalPath', '$anyIssues', '$dateOfSubmit')";

            if(mysqli_query($conn, $sql1)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql1. "<br>" . mysqli_error($conn);
            }   

            $last_id = $conn->insert_id;
        
            if(!empty(array_filter($_FILES['files']['name']))){
                foreach($_FILES['files']['name'] as $key=>$val){
                    $file = addslashes(file_get_contents($_FILES["files"]["tmp_name"][$key]));
                    $sql = "INSERT INTO cs_images (name, img_id) VALUES ('$file', '$last_id')";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute();
                }
            }
            else {
                $errors[] = "No File Selected";
                echo "Images not uploaded";
            }
        }
    }
?>