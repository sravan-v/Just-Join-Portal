<?php 
    include './conn.php';
    //insert into database
    if(!empty($_POST)) {
    $propertyBuyerName = $_POST['propertyBuyerName'];
    $propertyBuyerSurname = $_POST['propertyBuyerSurname'];
    $aadhar = $_POST['aadhar'];
    $propertyType = $_POST['propertyType'];
    $propertyOthers = $_POST['propertyOthers'];
    $propertValue = $_POST['propertValue'];
    $propertyPhonenumber = $_POST['propertyPhonenumber'];
    $buyerAddress = $_POST['buyerAddress'];
    $dateOfSubmit = date('d-m-Y');

    // $res = "SELECT * FROM real_estate_buyer WHERE phone_number = '".$propertyPhonenumber."'";

    // $result = $conn->query($res);
    //     if ($result->num_rows > 0) {
    //       echo 'exist';
    //       return;
    //     }
    //     else{
            $sql = "insert into real_estate_buyer (fname, sname, aadhar, property_type, property_type_others, property_value, phone_number, buyer_address, submit_date) values ('$propertyBuyerName', '$propertyBuyerSurname', '$aadhar', '$propertyType', '$propertyOthers', '$propertValue', '$propertyPhonenumber', '$buyerAddress', '$dateOfSubmit')";

            if(mysqli_query($conn, $sql)){
                echo "successful".'<br>';
            } else{
                echo "Error: " . $sql. "<br>" . mysqli_error($conn);
            }
        // }
        
    }
?>