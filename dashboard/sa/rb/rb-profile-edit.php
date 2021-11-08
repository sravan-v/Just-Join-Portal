<?php 
include '../../../snippets/edit-conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");


// $_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];    
// echo $id;
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

  <title>Employer - Just Join</title>
  <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/fav-jj.png" rel="icon">
    <link href="../../assets/img/fav-jj.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="../../../assets/css/style.css" rel="stylesheet">
  <style>
      .form-control{
          color: black
      }
  </style>
</head>

<body>
     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="/JJ/index.html"><img src="../../../assets/img/logo-trim.png"></a></h1>
       <!--     <nav class="nav-menu d-none d-lg-block">
              <ul>              
                <li><a href="../ep/saep-dashboard.php" class="btn btn-block">Employee</a></li>
                <li><a href="../er/saer-dashboard.php" class="btn btn-danger btn-block employee">Employer</a></li>
                <li><a href="../../../access.php" class="btn btn-block employer">Profile Access</a></li>
                <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
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
                            <li><a href="./sarb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../rs/sars-dashboard.php" class="employer">Seller</a></li>
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
  <div class="container mt160 shadow-sm bg-white rounded">
  <?php
        $query = "SELECT * FROM real_estate_buyer WHERE id = $id";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
    ?>
    <div class="panel employer-panel-primary date-of-reg">
      <div class="panel-heading">Employee id: JJIN<?php echo $id?><p>Registered on: <?php echo $row['submit_date']?></div>
      <input type="hidden" id="employerID" value="<?php echo $id?>">
    </div>

    <form id='propertyBuyer' class="employer-form">
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="propertyBuyerName">First Name<span class="mandatory">*</span></label>
          <input type="text" class="form-control" id="propertyBuyerName" placeholder="First Name" value="<?php echo $row['fname']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="propertyBuyerSurname">Last Name</label>
          <input type="text" class="form-control" id="propertyBuyerSurname"
            placeholder="Last Name" value="<?php echo $row['sname']?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="aadhar">Aadhar Number (Optional)</label>
          <input type="number" class="form-control" id="aadhar" placeholder="Aadhare Number" value="<?php echo $row['aadhar']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="propertyType">Property Type</label>
          <select id="propertyType" class="form-control">
            <option value="null" selected>Choose</option>
            <option <?php echo $row['property_type'] == 'house' ? 'selected = "selected"' : '';?>>House</option>
            <option <?php echo $row['property_type'] == 'land' ? 'selected = "selected"' : '';?>>Land</option>
            <option <?php echo $row['property_type'] == 'agriculture' ? 'selected = "selected"' : '';?>>Agriculture</option>           
            <option <?php echo $row['property_type'] == 'others' ? 'selected = "selected"' : '';?>>Others</option>
          </select>
          <input class="form-control others dropdown mt-4" type="text" id="propertyOthers" placeholder="Other Property Name" value="<?php echo $row['property_type_others']?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="propertValue">Property Value</label>
          <input type="text" class="form-control" id="propertValue"
            placeholder="EX: 10,00,00.." value="<?php echo $row['property_value']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="propertyPhonenumber">Phone Number<span class="mandatory">*</span></label>
          <input type="number" class="form-control" id="propertyPhonenumber" placeholder="Phone Number" pattern="pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $row['phone_number']?>">
        </div>  
          
      </div>
      <div class="form-row">        
        <!-- <div class="form-group col-md-6">
          <label for="date">Date of Submit<span class="mandatory">*</span></label>
          <input type="Date" class="form-control" id="dateOfSubmit" placeholder="" value="<?php echo $row['submit_date']?>">
        </div> 
    -->
      <div class="form-group col-md-6">
        <label for="employeeStatus">Employee Joining Status</label>
          <select id="employeeStatus" class="form-control <?php echo $row['employee_status'] == 'Complete' ? 'green' : 'gray';?>">
            <option value="Progress" <?php echo $row['employee_status'] == 'Progress' ? 'selected = "selected"' : '';?>>Progress</option>
            <option value="Complete" <?php echo $row['employee_status'] == 'Complete' ? 'selected = "selected"' : '';?>>Complete</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="employeeReached">Contacted?</label>
          <select id="employeeReached" class="form-control <?php echo $row['reached'] == 'Reached' ? 'green' : 'gray';?>">
            <option value="Reached" <?php echo $row['reached'] == 'Reached' ? 'selected = "selected"' : '';?>>Reached</option>
            <option value="Not Reached" <?php echo $row['reached'] == 'Not Reached' ? 'selected = "selected"' : '';?>>Not Reached</option>
          </select>
        </div>  
        <div class="form-group col-md-6">
          <label for="employeePaid">Paid?</label>
          <select id="employeePaid" class="form-control <?php echo $row['paid'] == 'Paid' ? 'green' : 'gray';?>">
            <option value="Paid" <?php echo $row['paid'] == 'Paid' ? 'selected = "selected"' : '';?>>Paid</option>
            <option value="Unpaid" <?php echo $row['paid'] == 'Unpaid' ? 'selected = "selected"' : '';?>>Unpaid</option>
          </select>
        </div>  
        <div class="form-group col-md-12">
          <label for="employeeReachedComment">Response from the employee</label>
          <textarea type="text" class="form-control" id="employeeReachedComment" placeholder="Customer Feedback.."><?php echo $row['employee_comment']?></textarea>
        </div>
        </div>
      <?php
        }
    ?>
      <button id="submit" type="submit" class="btn btn-primary btn-lg" style="margin-right: 10px">Update</button>
      <a href="./sarb-dashboard.php" class="btn btn-danger btn-lg">Cancel</a>
    </form>

  </div>

  <!-- ======= Footer ======= -->
  <!--<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Just Join</h3>
            <p>
              Narasaraopet <br>
              Guntur, Andrapradesh<br>
              <strong>Phone:</strong> +91 9632642380<br>
              <strong>Email:</strong> nagesh.kankanampati@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="employer.php">Looking Employee?</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="employee.php">Need Job?</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Man power</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Real Estate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Car Buy/ Sell</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>

            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Just Join</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https:www.justjoin.in">Just Join</a>
      </div>
    </div>
  </footer>-->
  <!-- End Footer -->

       <!-- success modal -->
       <div class="modal" id="success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Updated Successfully!</h3>
  
            </div>
            <div class="modal-body">
              <p>Thank you!</p>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <!-- <button type="button" class="btn btn-primary">Close</button> -->
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="return location.reload();">
                Close
              </button>
            </div>
          </div>
        </div>
    </div>

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
  <script src="../../../assets/js/sa/rb-edit.js"></script>

</body>

</html>