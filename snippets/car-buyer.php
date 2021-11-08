<?php 
    include './conn.php';
    //insert into database
    if(!empty($_POST)) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $aadhar = $_POST['aadhar'];
    $model = $_POST['model'];
    $fuelType = $_POST['fuelType'];
    $kilometers = $_POST['kilometers'];
    $yearOfPurchase = $_POST['yearOfPurchase'];
    $dateOfSubmit = date('d-m-Y');
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];

    // $res = "SELECT * FROM real_estate_buyer WHERE phone_number = '".$kilometers."'";

    // $result = $conn->query($res);
    //     if ($result->num_rows > 0) {
    //       echo 'exist';
    //       return;
    //     }
    //     else{
            $sql = "insert into car_buyer (fname, lname, phone_number, aadhar, model, fuel_type, kilometers, purchase_year, submit_date, min_price, max_price) values ('$firstName', '$lastName', '$phoneNumber', '$aadhar', '$model', '$fuelType', '$kilometers', '$yearOfPurchase', '$dateOfSubmit', '$minPrice', '$maxPrice')";

            if(mysqli_query($conn, $sql)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql. "<br>" . mysqli_error($conn);
            }
        // }
        
    }
?>