<?php
include './snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

// do check
$roleAccess = $_SESSION["role"];
if ($roleAccess != 1) {
  header("location: ./admin/login.php");
  exit; // prevent further execution, should there be more code that follows
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Just Join - Profile Access</title>
    <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="./assets/img/fav-jj.png" rel="icon">
    <link href="./assets/img/fav-jj.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="./assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="./assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="./assets/css/style.css" rel="stylesheet">

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
        #search_key{
            margin-bottom: 10px
        }
        #search_key:focus{
            box-shadow: none
        }
        #data-not-found{
            color: red
        }
        .delete_icon{
            text-decoration: none;
        }
        .delete_icon:hover{
            text-decoration: none
        }
    </style>
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="/JJ/index.html"><img src="./assets/img/logo-trim.png"></a></h1>
           <!-- <nav class="nav-menu d-none d-lg-block">
                <ul>
                <li class="pt-0 pl-0">  <a href="javascript:void(0)" class="employer-btn scrollto"></a></li>
                 <li class="pt-0 pl-0"><a href = "./snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                </ul>
            </nav>-->
           <!-- <nav class="nav-menu d-none d-lg-block">
                <ul>                
                    <li><a href="./dashboard/sa/ep/saep-dashboard.php" class="btn employee btn-block">Employee</a></li>
                    <li><a href="./dashboard/sa/er/saer-dashboard.php" class="btn employer btn-block">Employer</a></li>
                    <li><a href="access.php" class="btn btn-danger btn-block">Profile Access</a></li>
                    <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                    <li class="pt-0 pl-0"><a href = "./snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                </ul>
            </nav>-->
            <nav class="nav-menu d-none d-lg-block">
                    <ul>
                    <li class="drop-down scrolltoDrop"><a href="#">Staffing Solutions</a> 
                        <ul>
                            <li><a href="./dashboard/sa/ep/saep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
                            <li><a href="./dashboard/sa/er/saer-dashboard.php" class="btn btn-block employee">Employer</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Realestate</a> 
                        <ul>
                            <li><a href="./dashboard/sa/rb/sarb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="./dashboard/sa/rs/sars-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Pre-Owned Cars</a> 
                        <ul>
                            <li><a href="./dashboard/sa/cb/sacb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="./dashboard/sa/cs/sacs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li><a href="access.php" class="btn btn-danger btn-block">Profile Access</a></li>
                      <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                      <li class="pt-0 pl-0"><a href = "./snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                     </ul>
                 </nav>
        </div>
    </header>

    <!-- ======= Hero Section ======= -->
  <!--  <section class="container">
    <div class="row block" id="hero">
            <div class="col-lg-6 p-0 pr-5"><a href="./dashboard/sa/ep/saep-dashboard.php" class="btn employee btn-block">Employee</a></div>
            <div class="col-lg-6 p-0"><a href="./dashboard/sa/er/saer-dashboard.php" class="btn employer btn-block">Employer</a></div>
        </div>
    </section>-->
    <?php 
        $sql = "SELECT * FROM data_managers ORDER BY id DESC";
        $result = $conn->query($sql);
        $rowsCount = mysqli_num_rows($result);
        if ($result->num_rows > 0) {
            // output data of each row
            ?>
    <section class="container pt-130">
    <div class="row">
            <div class="col-lg-4">
            <div class="form-outline">
                <input type="search" id="search_key" class="form-control" placeholder="Search record.."
                aria-label="Search" />
            </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center">
                <div class="total">Total: <?php echo $rowsCount;?></div>
            </div>
        </div>
        <div class="row block m-0 table-responsive shadow-sm bg-white rounded">
        <table class="table table-bordered">
                    <thead>
                      <tr class="table-info table-th-blue">
                        <th>Id</th>
                        <th>Username</th>
                        <th>Approval</th>
                        <th>Super Access</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    <?php
               
                while($row = $result->fetch_assoc()) {
                    // echo $row["id"];  
                    echo ' <tr>
                        <td>JJIN'.$row["id"].'</td>
                        <td>'.$row["username"].'</td>
                        <td>
                        <a href="#" onclick="return access('.$row["id"].', 0);">
                            <i class="ico-gray icofont-check-circled icofont-2x '. (($row["role"] == -1) ? 'ico-gray' : 'ico-green') .' "></i>
                            
                        </a>
                        <a href="#" onclick="return access('.$row["id"].', -1);">
                            <i class="ico-gray icofont-close-circled icofont-2x '. (($row["role"] != -1) ? 'ico-gray' : 'ico-red') .' "></i>
                        </a>
                        </td>
                        <td>
                        <a href="#" onclick="return access('.$row["id"].', 1);">
                            <i class="ico-gray icofont-check-circled icofont-2x '. (($row["role"] != 1) ? 'ico-gray' : 'ico-green') .' "></i>
                            
                        </a>
                        <a href="#" onclick="return access('.$row["id"].', 0);">
                            <i class="ico-gray icofont-close-circled icofont-2x '. (($row["role"] == 1) ? 'ico-gray' : 'ico-red') .' "></i>
                        </a>
                        </td>
                        <td>
                        <a href="#" class="btn btn-danger delete_icon" onclick="return del('.$row["id"].');">
                            <i class="icofont-ui-delete icofont-2x red-color"></i>
                        </a>
                        </td>
                        </tr>';
                }
              } else {
                echo "0 results";
              }
                  $conn->close();
              ?>
               <!-- </tr> -->
                    </tbody>
                  </table>
                  <div id="data-not-found"></div>
</table>
        </div>
    </section>

    </main><!-- End #main -->

    
    <!-- <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="./assets/vendor/php-email-form/validate.js"></script>
    <script src="./assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="./assets/vendor/venobox/venobox.min.js"></script>
    <script src="./assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="./assets/vendor/aos/aos.js"></script> -->
    <script>
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
    function access($id, $val){
        let sure = confirm("Do you want to change?");
            if (sure == false) {
                return false;
            }
            else {
                $.ajax({
                    url: "access-action.php",
                    data: {id : $id, val: $val},
                    type: "POST",
                    success: function(data){
                        // alert('done');
                        location.reload();
                    },
                    error: function(){
                            alert('failed')
                    }
                });
            }
        }
    function del($id){
        let sure = confirm("Do you want to delete?");
            if (sure == false) {
                return false;
            }
            else {
                $.ajax({
                    url: "admin-delete.php",
                    data: {id : $id},
                    type: "POST",
                    success: function(data){
                        // alert('Deleted Successfully!');
                        location.reload();
                    },
                    error: function(){
                        alert('failed')
                    }
                });
            }
    }
</script>
<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files-->
  <script src="./assets/vendor/jquery/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="./assets/vendor/php-email-form/validate.js"></script>
 <script src="./assets/vendor/waypoints/jquery.waypoints.min.js"></script> 
  <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./assets/vendor/venobox/venobox.min.js"></script>
  <script src="./assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="./assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
</body>

</html>