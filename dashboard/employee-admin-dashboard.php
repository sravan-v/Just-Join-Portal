<?php
include '../snippets/conn.php';
session_start(); // start session
header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");
// do check
if (!isset($_SESSION["username"])) {
    header("location: ../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
}
$sql = "SELECT * FROM employee";
    $result = $conn->query($sql);
    $employees = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $employee = array(
                "id" => $row['id'],
                "job_name" => $row['job_name'],
                "first_name" => $row['first_name'],
                "last_name" => $row['last_name'],
                "father_name" => $row['father_name'],
                "dob" => $row['dob'],
                "gender" => $row['gender'],
                "address" => $row['address'],
                "phone_number" => $row['phone_number'],
                "aadhar" => $row['aadhar'],
                "organization" => $row['organization'],
                "job_type" => $row['job_type'],
                "job_exp" => $row['job_exp'],
                "present_or_previous_company" => $row['present_or_previous_company'],
                "present_salary" => $row['present_salary'],
                "expected_salary" => $row['expected_salary']
            );
            $employees[] = $employee;
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="../assets/img/fav-jj.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.jqueryui.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        .p0{
            padding: 0
        }
        .nav-custom{
            background-color: #040482
        }
        .nav-custom a{
            color: #ffffff;
        }
        .dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
        .pt-100{
            padding-top: 100px;
        }
    </style>
</head>

<body>
<div class="container-fluid p0">
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container-fluid custom-flex">
                <h1 class="logo mr-auto"><a href="/JJ/index.html"><img src="../assets/img/logo-trim.png"></a></h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                    <li class="pt-0 pl-0">  <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
            <li class="pt-0 pl-0"><a href = "../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                    </ul>
                </nav>

            </div>
        </header>
    </div>
    <div class="container-fluid pt-100">
        <table id="employee" class="display" max-width="100%"></table>
    </div>

    <script type="text/javascript">
        let employees = <?php echo json_encode($employees, JSON_PRETTY_PRINT) ?>;
        let dataSet = employees.map(function(employee) {
            return Object.keys(employee).map(function(key) { 
                return employee[key];
            });
        });
        // console.log(dataSet);    
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js"></script>
    <script src="../assets/js/employee-data.js"></script>
</body>

</html>