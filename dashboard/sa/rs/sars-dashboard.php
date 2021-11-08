<?php
include '../../../snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

// do check
$roleAccess = $_SESSION["role"];
if ($roleAccess < 0) {
    header("location: ../../../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Just Join -Employee  Dashboard</title>
    <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/fav-jj.png" rel="icon">
    <link href="../../../assets/img/fav-jj.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet"> 

    <style>
        #hero {
            padding-top: 60px;
            margin: 0;
        }
        .block {
            width: 100%;
        }
        .ico-gray{
            color: #cdcdcd;
        }
        .ico-red{
            color: red;
        }
        .ico-green{
            color: green;
        }
        .pt-0{
            padding-top: 0 !important;
        }
        .pr-5{
            padding-right: 5px
        }
        #loading
        {
            text-align:center; 
            background: url('../../../assets/img/loader.gif') no-repeat center; 
            height: 150px;
        }
        #search_key{
            margin-bottom: 10px
        }
        #search_key:focus{
            box-shadow: none
        }
        #data-not-found{
            color: red
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="../../../index.html"><img src="../../../assets/img/logo-trim.png"></a></h1>
          
          <!--  <nav class="nav-menu d-none d-lg-block">
                <ul>                
                    <li><a href="./saep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
                    <li><a href="../er/saer-dashboard.php" class="btn btn-block employee">Employer</a></li>
                    <li><a href="../../../access.php" class="btn btn-block employer">Profile Access</a></li>
                    <li class="pt-0 pl-0 pb-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                    <li class="pt-0 pl-0 pb-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                </ul>
              </nav>-->
              <nav class="nav-menu d-none d-lg-block">
                    <ul>
                      <li class="drop-down scrolltoDrop"><a href="#">Staffing Solutions</a> 
                        <ul>
                            <li><a href="../ep/saep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
                            <li><a href="../er/saer-dashboard.php" class="btn btn-block employee">Employer</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Realestate</a> 
                        <ul>
                            <li><a href="../rb/sarb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="./sars-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Pre-Owned Cars</a> 
                        <ul>
                            <li><a href="../cb/sacb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../cs/sacs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li><?php echo $roleAccess == 1 ? '<a href="../../../access.php" class="btn btn-block employer">Profile Access</a>' : ''; ?></li>
                      <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                      <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                     </ul>
                 </nav>
        </div>
    </header>
    <?php       
        
        $dataSchools = array();
        $dataSchoolsCat = array();
        $sqlSchool = "SELECT * FROM real_estate_seller  WHERE property_type = 'house' && (employee_status='Complete' || employee_status='Progress') ORDER BY id DESC";
        $resultSchool = $conn->query($sqlSchool);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultSchool){
            while($rowSchool = $resultSchool->fetch_assoc()) {
                $dataSchoolsCat[] = $rowSchool['property_type'];
                $dataSchools[] = $rowSchool['employee_status'];
            }
        }
        foreach($dataSchoolsCat as $ss){ 
            $dataSchoolsCat =  $ss;
        } 

        $dataColleges = array();
        $dataCollegesCat = array();
        $sqlCollege = "SELECT * FROM real_estate_seller  WHERE property_type = 'land' && (employee_status='Complete' || employee_status='Progress') ORDER BY id DESC";
        $resultCollege = $conn->query($sqlCollege);
        // $rowsCountCollege = mysqli_num_rows($resultCollege);
        if($resultCollege){
            while($rowCollege = $resultCollege->fetch_assoc()) {
                $dataCollegesCat[] = $rowCollege['property_type'];
                $dataColleges[] = $rowCollege['employee_status'];
            }
        }
        foreach($dataCollegesCat as $cc){ 
            $dataCollegesCat =  $cc;
        } 

        $dataHospitals = array();
        $dataHospitalsCat = array();
        $sqlHospital = "SELECT * FROM real_estate_seller WHERE property_type = 'agriculture' && (employee_status='Complete' || employee_status='Progress') ORDER BY id DESC";
        $resultHospital = $conn->query($sqlHospital);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultHospital){
            while($rowHospital = $resultHospital->fetch_assoc()) {
                $dataHospitalsCat[] = $rowHospital['property_type'];
                $dataHospitals[] = $rowHospital['employee_status'];
            }
        }
        
        foreach($dataHospitalsCat as $hh){ 
            $dataHospitalsCat =  $hh;
        } 

        $dataSuperMarketss = array();
        $dataSuperMarketssCat = array();
        $sqlSuperMarkets = "SELECT * FROM real_estate_seller WHERE property_type = 'others' && (employee_status='Complete' || employee_status='Progress') ORDER BY id DESC";
        $resultSuperMarkets = $conn->query($sqlSuperMarkets);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultSuperMarkets){
            while($rowSuperMarkets = $resultSuperMarkets->fetch_assoc()) {
                $dataSuperMarketssCat[] = $rowSuperMarkets['property_type'];
                $dataSuperMarketss[] = $rowSuperMarkets['employee_status'];
            }
            // $dataSuperMarkets[0]['property_type'];
        }
        // foreach($dataSuperMarketss as $sm){ 
        //     $dataSuperMarketss =  $sm;
        // } 
        foreach($dataSuperMarketssCat as $smm){ 
            $dataSuperMarketssCat =  $smm;
        }
        
        $sql = "SELECT * FROM real_estate_seller ORDER BY id DESC";
        $result = $conn->query($sql);
        $rowsCount = mysqli_num_rows($result);
        if ($result->num_rows > 0) {

        // Total Completed
        $sqlActive = "SELECT * FROM real_estate_seller WHERE employee_status = 'Complete'";
        $activeResult = $conn->query($sqlActive);
        $activeTotal = mysqli_num_rows($activeResult);
        if ($activeResult->num_rows > 0){
            $len = $activeTotal;
        }
        else{
            $len = 0;
        }

        // Total In Completed
        $sqlInActive = "SELECT * FROM real_estate_seller WHERE employee_status = 'Progress'";
        $inActiveResult = $conn->query($sqlInActive);
        $inActiveTotal = mysqli_num_rows($inActiveResult);
        if ($inActiveResult->num_rows > 0){
            $inLen = $inActiveTotal;
        }
        else{
            $inLen = 0;
        }
        ?>
    <div class="container pt-130">
    <div class="panel employee-panel-primary">
      <div class="panel-heading">Realestate Buyer </div>      
    </div>
    <div class="row m-0 collapse_bar shadow-sm bg-white rounded">
        <div class="col-md-3 col-xs-3">
            <div class="row">
               <label class="col-12">House</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                   <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                            <?php 
                                                $schoolCompletedData = '';
                                                if ($dataSchoolsCat == 'house') {
                                                    $schoolCompleted=mysqli_query($conn, "SELECT count(*) as schoolCompleteTotal FROM real_estate_seller WHERE property_type = 'house' GROUP BY property_type");
                                                    $schoolCompletedData=mysqli_fetch_assoc($schoolCompleted);
                                                    echo $schoolCompletedData['schoolCompleteTotal'];
                                                    $schoolCompletedData = implode("", $schoolCompletedData);
                                                }
                                                else{
                                                    $schoolCompletedData = 0;
                                                    echo $schoolCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                            <?php 
                                                    $schoolInCompletedData = '';
                                                    foreach($dataSchools as $s){
                                                        if ($dataSchoolsCat == 'house' && $s == 'Complete') {
                                                            $schoolInCompleted=mysqli_query($conn, "SELECT count(*) as schoolInCompleteTotal FROM real_estate_seller WHERE property_type = 'house' && employee_status = 'Complete' GROUP BY property_type");
                                                            $schoolInCompletedData=mysqli_fetch_assoc($schoolInCompleted);
                                                            echo $schoolInCompletedData['schoolInCompleteTotal'];
                                                            $schoolInCompletedData = implode("", $schoolInCompletedData);
                                                            break;
                                                        }
                                                    }
                                                    if($dataSchoolsCat !== 'house' || $s == 'Progress'){
                                                        $schoolInCompletedData = 0;
                                                        echo $schoolInCompletedData;
                                                    }                                       
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                            <?php 
                                                echo $schoolCompletedData - $schoolInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- College -->
        <div class="col-md-3 col-xs-3">
            <div class="row">
               <label class="col-12">Land</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                    <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $collegeCompletedData = '';
                                                if ($dataCollegesCat == 'land') {
                                                    $collegeCompleted=mysqli_query($conn, "SELECT count(*) as collegeCompleteTotal FROM real_estate_seller WHERE property_type = 'land' GROUP BY property_type");
                                                    $collegeCompletedData = mysqli_fetch_assoc($collegeCompleted);
                                                    echo $collegeCompletedData['collegeCompleteTotal'];
                                                    $collegeCompletedData = implode("", $collegeCompletedData);
                                                }
                                                else{
                                                    $collegeCompletedData = 0;
                                                    echo $collegeCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $collegeInCompletedData = '';
                                                    foreach($dataColleges as $c){
                                                        if ($dataCollegesCat == 'land' && $c == 'Complete') {
                                                            $collegeInCompleted=mysqli_query($conn, "SELECT count(*) as collegeInCompleteTotal FROM real_estate_seller WHERE property_type = 'land' && employee_status = 'Complete' GROUP BY property_type");
                                                            $collegeInCompletedData=mysqli_fetch_assoc($collegeInCompleted);
                                                            echo $collegeInCompletedData['collegeInCompleteTotal'];
                                                            $collegeInCompletedData = implode("", $collegeInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataCollegesCat !== 'land' || $c == 'Progress'){
                                                        $collegeInCompletedData = 0;
                                                        echo $collegeInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $collegeCompletedData - $collegeInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- Hospital -->
        <div class="col-md-3 col-xs-3">
            <div class="row">
               <label class="col-12">Agriculture</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                    <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $hospitalCompletedData = '';
                                                if ($dataHospitalsCat == 'agriculture') {
                                                    $hospitalCompleted=mysqli_query($conn, "SELECT count(*) as hospitalCompleteTotal FROM real_estate_seller WHERE property_type = 'agriculture' GROUP BY property_type");
                                                    $hospitalCompletedData=mysqli_fetch_assoc($hospitalCompleted);
                                                    echo $hospitalCompletedData['hospitalCompleteTotal'];
                                                    $hospitalCompletedData = implode("", $hospitalCompletedData);
                                                }
                                                else{
                                                    $hospitalCompletedData = 0;
                                                    echo $hospitalCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $hospitalInCompletedData = '';
                                                    foreach($dataHospitals as $h){
                                                        if ($dataHospitalsCat == 'agriculture' && $h == 'Complete') {
                                                            $hospitalInCompleted=mysqli_query($conn, "SELECT count(*) as hospitalInCompleteTotal FROM real_estate_seller WHERE property_type = 'agriculture' && employee_status = 'Complete' GROUP BY property_type");
                                                            $hospitalInCompletedData=mysqli_fetch_assoc($hospitalInCompleted);
                                                            echo $hospitalInCompletedData['hospitalInCompleteTotal'];
                                                            $hospitalInCompletedData = implode("", $hospitalInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataHospitalsCat !== 'agriculture' || $h == 'Progress'){
                                                        $hospitalInCompletedData = 0;
                                                        echo $hospitalInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $hospitalCompletedData - $hospitalInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- others -->
        <div class="col-md-3 col-xs-3">
            <div class="row">
               <label class="col-12">Others</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                     <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $superMarketsCompletedData = '';
                                                if ($dataSuperMarketssCat == 'others') {
                                                    $superMarketsCompleted=mysqli_query($conn, "SELECT count(*) as superMarketsCompleteTotal FROM real_estate_seller WHERE property_type = 'others' GROUP BY property_type");
                                                    $superMarketsCompletedData=mysqli_fetch_assoc($superMarketsCompleted);
                                                    echo $superMarketsCompletedData['superMarketsCompleteTotal'];
                                                    $superMarketsCompletedData = implode("", $superMarketsCompletedData);
                                                }
                                                else{
                                                    $superMarketsCompletedData = 0;
                                                    echo $superMarketsCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php
                                                    $superMarketsInCompletedData = '';
                                                    foreach($dataSuperMarketss as $smm){
                                                        if ($dataSuperMarketssCat == 'others' && $smm == 'Complete') {
                                                            $superMarketsInCompleted=mysqli_query($conn, "SELECT count(*) as superMarketsInCompleteTotal FROM real_estate_seller WHERE property_type = 'others' && employee_status = 'Complete' GROUP BY property_type");
                                                            $superMarketsInCompletedData=mysqli_fetch_assoc($superMarketsInCompleted);
                                                            echo $superMarketsInCompletedData['superMarketsInCompleteTotal'];
                                                            $superMarketsInCompletedData = implode("", $superMarketsInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataSuperMarketssCat !== 'others' || $smm == 'Progress'){
                                                        $superMarketsInCompletedData = 0;
                                                        echo $superMarketsInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $superMarketsCompletedData - $superMarketsInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
     </div>
    </div>
    </div>
<!-- requirement details end -->

    <section class="container">
        <div class="row">
            <div class="col-md-3 col-xs-4 d-flex align-items-center">
                <div class="total">Total New: <span id="newArrival">0</span></div>
            </div>
            <div class="col-md-3 col-xs-4 d-flex align-items-center">
                <div class="total">Today New: <span id="todayNewArrival">0</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
            <div class="form-outline">
                <input type="search" id="search_key" class="form-control" placeholder="Search record.."
                aria-label="Search" />
            </div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Total: <?php echo $rowsCount;?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Completed: <?php echo $len?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Pending: <?php echo $inLen?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total"><a href="./export.php" class="download-file">Download</a></div>
            </div>
        </div>
        <div class="row block">
            <div class="col-lg-12 table-responsive shadow-sm bg-white rounded" id="table_container">
                <table class="table table-bordered" id="table_main">
                        <thead>
                            <tr class="table-info table-th-blue">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Property Type</th>
                            <th>Property Value</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php 
                             while($row = $result->fetch_assoc()) {
                                $new = $row["read_record"] == 0 ? ' new' : '';
                                $roleAccess == 1 ? $delete = '<a href="javascript:void(0)" onclick="return del('.$row["id"].');"><span class="glyphicon glyphicon-trash red-color"></span></a>' : $delete = '';
                                echo '<tr class="each-row'.$new.'" data-id="'.$row["id"].'">
                                <td> JJIN'.$row["id"].'</td>
                                <td>'.$row["fname"].' '.$row["lname"].'</td>
                                <td>'.$row["property_type"].'</td>
                                <td>'.$row["property_value"].'</td>
                                <td>'.$row["phone_number"].'</td>
                                <td>'.$row["employee_status"].'</td>
                                <td><a href="javascript:void(0)" class="pr-3" onclick="return edit('.$row["id"].');"><span class="glyphicon glyphicon-edit blue-color"></span></a>
                                <a href="javascript:void(0)" class="pr-3" onclick="return view('.$row["id"].');"><span class="glyphicon glyphicon-eye-open blue-color"></span></span></a>
                                '.$delete.'</td>
                                <input type="hidden" class="regDate" value="'.$row['submit_date'].'"/>
                                </tr>';
                             }
                            }else {
                                echo "<td><td>No Data Found</td></tr>";
                            }
                                $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <div id="data-not-found"></div>
                </div>
            </div>
        </section>

     <!-- success modal -->
     <div class="modal" id="success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Deleted Successfully!</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Thank you reaching us!<br>Our Team will reach you soon. </p>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <!-- <button type="button" class="btn btn-primary">Close</button> -->
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                <!-- <span aria-hidden="true">&times;</span> -->
                Close
              </button>
            </div>
          </div>
        </div>
    </div>    

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files-->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!-- <script src="../../../assets/vendor/php-email-form/validate.js"></script> -->
 <!-- <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>-->

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
  <script>
function newCount(){
    $('.each-row').each(function(){
        let d = $(this).find('.regDate').val();
        if(d === new Date().toISOString().replace(/T.*/,'').split('-').reverse().join('-') && $(this).hasClass('new')){
            $(this).find('.regDate').addClass("today");
            $('#todayNewArrival').text($('.today').length);
        }else {
            $(this).find('.regDate').removeClass("today");
            $('#todayNewArrival').text($('.today').length);
        }
    });
    $("#newArrival").text($(".new").length); 
}   
// filter 
$(document).ready(function(){
    newCount();

    $('.each-row').each(function(){
        $(this).on('click', function(){
            let attr = $(this).attr('data-id');
            updateStatus(attr);
            // remove class
            if($(this).hasClass('new')){
                $(this).removeClass('new');
            }
            $(this).find('.regDate').removeClass("today");
            $("#newArrival").text($(".new").length);
            $("#todayNewArrival").text($(".today").length);
            // newCount();
        });
    });

    $("#search_key").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tbody tr:not('.no-records')").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        var trSel =  $("#tbody tr:not('.no-records'):visible")
        // Check for number of rows & append no records found row
        if(trSel.length == 0){
            $("#data-not-found").html('<p>Data not found</p>');
        }
        else{
            $('.no-records').remove();
            $("#data-not-found").html('');
        }
    });
    // page reload
    setInterval(() => {
        location.reload();
    }, 100000);
});

function updateStatus(id){
    newCount();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            console.log(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "update.php?id=" +id, true);
    xmlhttp.send();

}

// edit 
function edit(id){
    window.open('./rs-profile-edit.php?id='+id, '_self');
}
function view(id){
    window.open('./view.php?id='+id, '_blank');
}
function del(delId){
    var del = delId;
    alert(del);
    let sure = confirm("Do you want to delete?");
    if (sure == false) {
        return false;
    }
    else {
            $.ajax({
                url: "./rs-del.php",
                action: 'delete',
                type: "POST",
                data: {delId : del},
                success: function(data){
                    alert(data);
                    alert('deleted');
                    location.reload();
                },
                error: function(){
                alert('error');
                }
            });
        }
}
</script>
</body>

</html>