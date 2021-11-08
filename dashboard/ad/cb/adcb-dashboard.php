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
                 <nav class="nav-menu d-none d-lg-block">
                    <ul>
                      <li class="drop-down scrolltoDrop"><a href="#">Staffing Solutions</a> 
                        <ul>
                            <li><a href="../ep/adep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
                            <li><a href="../er/ader-dashboard.php" class="btn btn-block employee">Employer</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Realestate</a> 
                        <ul>
                            <li><a href="../rb/adrb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../rs/adrs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Pre-Owned Cars</a> 
                        <ul>
                            <li><a href="./adcb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../cs/adcs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                      <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                     </ul>
                 </nav>
        </div>
    </header>    
  
    <div class="container pt-130">
        <div class="panel employee-panel-primary">
             <div class="panel-heading">Car Buyer </div>      
        </div>  
    </div>
<!-- requirement details end -->
    <?php 
        $sql = "SELECT * FROM car_buyer ORDER BY id DESC";
        $result = $conn->query($sql);
        $rowsCount = mysqli_num_rows($result);
        if ($result->num_rows > 0) {
            // Total Completed
            $sqlActive = "SELECT * FROM car_buyer WHERE employee_status = 'Active'";
            $activeResult = $conn->query($sqlActive);
            $activeTotal = mysqli_num_rows($activeResult);
            if ($activeResult->num_rows > 0){
                $len = $activeTotal;
            }
            else{
                $len = 0;
            }

            // Total In Completed
            $sqlInActive = "SELECT * FROM car_buyer WHERE employee_status = 'In Active'";
            $inActiveResult = $conn->query($sqlInActive);
            $inActiveTotal = mysqli_num_rows($inActiveResult);
            if ($inActiveResult->num_rows > 0){
                $inLen = $inActiveTotal;
            }
            else{
                $inLen = 0;
            }
    ?>
    <section class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
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
        </div>
        <div class="row block">
            <div class="col-lg-12 table-responsive bg-white rounded" id="table_container">
                <table class="table table-bordered" id="table_main">
                        <thead>
                            <tr class="table-info table-th-blue">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Car Model</th>
                            <th>Year of purchase</th>                            
                            <th>Maximum Price</th>
                            <th>Status</th>      
                            <th>&nbsp;</th>                      
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php
                                while($row = $result->fetch_assoc()) {
                                    echo ' <tr>
                                        <td> JJIN'.$row["id"].'</td>
                                        <td>'.$row["fname"].' '.$row["lname"].'</td>
                                        <td>'.$row["phone_number"].'</td>
                                        <td>'.$row["model"].'</td>
                                        <td>'.$row["purchase_year"].'</td>
                                        <td>'.$row["max_price"].'</td>
                                        <td>'.$row["employee_status"].'</td>
                                        <td><a href="javascript:void(0)" class="pr-3" onclick="return edit('.$row["id"].');"><span class="glyphicon glyphicon-edit blue-color"></span></a>
                                        <a href="javascript:void(0)" class="" onclick="return del('.$row["id"].');">
                                        <span class="glyphicon glyphicon-trash red-color"></span>
                                        </a></td>
                                        </tr>';
                                }
                            } else {
                                echo "0 results";
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

// filter 
$(document).ready(function(){
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
});
// edit 
function edit(id){
    window.open('./cb-profile-edit.php?id='+id, '_self');
}
function del(delId){
    let sure = confirm("Do you want to delete?");
    if (sure == false) {
        return false;
    }
    else {
            $.ajax({
                url: "./cb-del.php",
                action: 'delete',
                data: {delId : delId},
                type: "POST",
                success: function(data){                   
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