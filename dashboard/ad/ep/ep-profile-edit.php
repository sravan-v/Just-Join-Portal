<?php 
include '../../../snippets/edit-conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");


// $_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];    
// echo $id;
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

  <title>Just Join - Employee Profile Edit </title>
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="../../../assets/css/style.css" rel="stylesheet">
  <style>
      .form-control{
          color: black
      }
  </style>
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
          <nav class="nav-menu d-none d-lg-block">
        <ul>
         
          <li><a href="./adep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
          <li><a href="../er/ader-dashboard.php" class="btn btn-block employee">Employer</a></li>
          <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
          <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
        </ul>
      </nav>

      </div>
  </header>
  <div class="container mt160">  
    <?php
        $query = "SELECT * FROM employee WHERE id = $id";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
    ?>
    <div class="panel employee-panel-primary date-of-reg">
      <div class="panel-heading">Employee ID: JJIN<?php echo $id?><p>Registered on: <?php echo $row['date_of_registered']?></p></div> 
    </div>

  <form id='employee-form' class="employee-form">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="employeeJobName">Applying for the Job Name</label>
        <input type="text" class="form-control" id="employeeJobName" placeholder="Teacher, Supervisor, Watchman..." value="<?php echo $row['job_name']?>">
        <input type="hidden" id="employeeID" value="<?php echo $id?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="employeeFirstName">First Name<span class="mandatory">*</span></label>
        <input type="text" class="form-control" id="employeeFirstName" placeholder="First Name" value="<?php echo $row['first_name']?>">
      </div>    
      <div class="form-group col-md-4">
        <label for="employeeLastName">Last Name</label>
        <input type="text" class="form-control" id="employeeLastName" placeholder="Last Name" value="<?php echo $row['last_name']?>">
      </div>    
    </div>
    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="employeeFatherName">Father Name</label>
        <input type="text" class="form-control" id="employeeFatherName" placeholder="Father Name" value="<?php echo $row['father_name']?>">
      </div>  

      <div class="form-group col-md-4">
        <label for="employeeDOB">Date of Birth<span class="mandatory">*</span></label>
        <input type="date" class="form-control" id="employeeDOB" placeholder="MM/DD/YYYY" value="<?php echo $row['dob']?>">
      </div>  
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="employeeGender">Gender<span class="mandatory">*</span></label>
        <select id="employeeGender" class="form-control">
          <option>Choose...</option>
          <option <?php echo $row['gender'] == 'Male' ? 'selected = "selected"' : '';?>>Male</option>
          <option <?php echo $row['gender'] == 'Female' ? 'selected = "selected"' : '';?>>Female</option>
        </select>
      </div>  
    <div class="form-group col-md-4">
      <label for="employeeAddress">Address<span class="mandatory">*</span></label>
      <textarea type="text" class="form-control" id="employeeAddress" placeholder="Full address"><?php echo $row['address']?></textarea>
    </div>   
  </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="employeePhoneNumber">Phone Number<span class="mandatory">*</span></label>
        <input type="number" class="form-control" id="employeePhoneNumber" placeholder="Phone Number" pattern="pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $row['phone_number']?>">
      </div>
      <div class="form-group col-md-4">
        <label for="employeeAadhar">Aadhar Number</label>
        <input type="number" class="form-control" id="employeeAadhar" placeholder="Aadhare Number (optional)" value="<?php echo $row['aadhar']?>">
      </div>
    </div>
   
    <div class="form-row">          
      <div class="form-group col-md-12">
    <div class="panel panel-danger">
      <div class="panel-heading">Please Fill Requirement Details Below</div>      
    </div>
    </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="employeeOrganization">Looking for employee organization</label>
        <select id="employeeOrganization" class="form-control">
          <option value="null">Choose...</option>
          <option <?php echo $row['organization'] == 'School' ? 'selected = "selected"' : '';?>>School</option>
          <option <?php echo $row['organization'] == 'College' ? 'selected = "selected"' : '';?>>College</option>
          <option <?php echo $row['organization'] == 'Hospital' ? 'selected = "selected"' : '';?>>Hospital</option>
          <option <?php echo $row['organization'] == 'Super Markets' ? 'selected = "selected"' : '';?>>Super Markets</option>
          <option <?php echo $row['organization'] == 'Malls' ? 'selected = "selected"' : '';?>>Malls</option>
          <option <?php echo $row['organization'] == 'Others' ? 'selected = "selected"' : '';?>>Others</option>
        </select>
      </div>   
      <div class="form-group col-md-4">
        <label for="employeeJobType">Job Type</label>
        <select name="defaultDropdown" id="defaultDropdown" class="form-control">
            <option value="">Select Organization</option>
          </select> 
        <select id="employeeJobType" class="form-control school dropdown">
            <option>Choose School Staff</option>
            <option value="Teacher" <?php echo $row['job_type'] == 'Teacher' ? 'selected = "selected"' : '';?>>Teacher</option>
            <option value="Accountants" <?php echo $row['job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Administrative Staff" <?php echo $row['job_type'] == 'Administrative Staff' ? 'selected = "selected"' : '';?>>Administrative Staff</option>
            <option value="Front Office Staff" <?php echo $row['job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Security Guards" <?php echo $row['job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Bus and Van Drivers" <?php echo $row['job_type'] == 'Bus and Van Drivers' ? 'selected = "selected"' : '';?>>Bus and Van Drivers</option>
            <option value="Sweepers" <?php echo $row['job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control college dropdown">
            <option value="null">Choose College Staff</option>
            <option value="Lecturers" <?php echo $row['job_type'] == 'Lecturers' ? 'selected = "selected"' : '';?>>Lecturers</option>
            <option value="Accountants" <?php echo $row['job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Front Office Staff" <?php echo $row['job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Administrative Staff" <?php echo $row['job_type'] == 'Administrative Staff' ? 'selected = "selected"' : '';?>>Administrative Staff</option>
            <option value="Security Guards" <?php echo $row['job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Bus and Van Drivers" <?php echo $row['job_type'] == 'Bus and Van Drivers' ? 'selected = "selected"' : '';?>>Bus and Van Drivers</option>
            <option value="Sweepers" <?php echo $row['job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control hospital dropdown">
            <option value="null">Choose Hospital Staff</option>
            <option value="Nurses" <?php echo $row['job_type'] == 'Nurses' ? 'selected = "selected"' : '';?>>Nurses</option>
            <option value="Lab Technicians" <?php echo $row['job_type'] == 'Lab Technicians' ? 'selected = "selected"' : '';?>>Lab Technicians</option>
            <option value="X-Ray Technicians" <?php echo $row['job_type'] == 'X-Ray Technicians' ? 'selected = "selected"' : '';?>>X-Ray Technicians</option>
            <option value="Front Office Staff" <?php echo $row['job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Accountants" <?php echo $row['job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Security Guards" <?php echo $row['job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Sweepers" <?php echo $row['job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control super_markets dropdown">
            <option value="null">Choose Super Market Staff</option>  
            <option value="Sales Boys/Girls" <?php echo $row['job_type'] == 'Sales Boys/Girls' ? 'selected = "selected"' : '';?>>Sales Boys/Girls</option>    
            <option value="Cashiers" <?php echo $row['job_type'] == 'Cashiers' ? 'selected = "selected"' : '';?>>Cashiers</option>     
            <option value="Accountants" <?php echo $row['job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Security Guards" <?php echo $row['job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Sweepers" <?php echo $row['job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
          </select>
          <select id="employeeJobType" class="form-control malls dropdown">
            <option value="null">Choose Malls Staff</option>           
            <option value="Sales Boys/Girls" <?php echo $row['job_type'] == 'Sales Boys/Girls' ? 'selected = "selected"' : '';?>>Sales Boys/Girls</option>
            <option value="Supervisors" <?php echo $row['job_type'] == 'Supervisors' ? 'selected = "selected"' : '';?>>Supervisors</option>
            <option value="Assistant Managers" <?php echo $row['job_type'] == 'Assistant Managers' ? 'selected = "selected"' : '';?>>Assistant Managers</option>
            <option value="Sweepers" <?php echo $row['job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Security Guards" <?php echo $row['job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
          </select>
          <input class="form-control others dropdown" type="text" id="employeeJobTypeOthers" placeholder="Employee Type" value="<?php echo $row['job_type']?>">
      </div>  
      <div class="form-group col-md-4">
        <label for="employeeJobExperience">Experience</label>
        <select id="employeeJobExperience" class="form-control">
          <option>Choose...</option>
          <option <?php echo $row['job_exp'] == '0' ? 'selected = "selected"' : '';?>>0</option>
          <option <?php echo $row['job_exp'] == '1' ? 'selected = "selected"' : '';?>>1</option>
          <option <?php echo $row['job_exp'] == '2' ? 'selected = "selected"' : '';?>>2</option>
          <option <?php echo $row['job_exp'] == '3' ? 'selected = "selected"' : '';?>>3</option>
          <option <?php echo $row['job_exp'] == '4' ? 'selected = "selected"' : '';?>>4</option>
          <option <?php echo $row['job_exp'] == '5' ? 'selected = "selected"' : '';?>>5</option>
        </select>
      </div>   
    </div>

    <div class="form-row">     
      <div class="form-group col-md-4">
        <label for="employeePresentCompanyName">Present/Previous Organization Name </label>
        <input class="form-control" type="text" id="employeePresentCompanyName" placeholder="Company Name" value="<?php echo $row['present_or_previous_company']?>">
      </div> 
      <div class="form-group col-md-4">
        <label for="employeePresentSalary">Present Salary (per month)</label>
        <input class="form-control" type="number" id="employeePresentSalary" placeholder="Ex: 20,000" value="<?php echo $row['present_salary']?>">
      </div> 

      <div class="form-group col-md-4">
        <label for="employeeExpectedSalary">Expected Salary (per month)</label>
        <input class="form-control" type="number" id="employeeExpectedSalary" placeholder="Ex: 50,000" value="<?php echo $row['expected_salary']?>">
      </div> 
      <div class="form-group col-md-4">
        <label for="employeeStatus">Employee Joining Status</label>
        <select id="employeeStatus" class="form-control <?php echo $row['employee_status'] == 'Active' ? 'green' : 'gray';?>">
          <option value="In Active" <?php echo $row['employee_status'] == 'In Active' ? 'selected = "selected"' : '';?>>In Active</option>
          <option value="Active" <?php echo $row['employee_status'] == 'Active' ? 'selected = "selected"' : '';?>>Active</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="employeeReached">Contacted?</label>
        <select id="employeeReached" class="form-control <?php echo $row['reached'] == 'Reached' ? 'green' : 'gray';?>">
          <option value="Reached" <?php echo $row['reached'] == 'Reached' ? 'selected = "selected"' : '';?>>Reached</option>
          <option value="Not Reached" <?php echo $row['reached'] == 'Not Reached' ? 'selected = "selected"' : '';?>>Not Reached</option>
        </select>
      </div>  
      <div class="form-group col-md-4">
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
    <button id="submit-btn" type="submit" class="btn btn-primary btn-lg" style="margin-right: 10px">Update</button>
    <a href="./adep-dashboard.php" class="btn btn-danger btn-lg">Cancel</a>
  </form>

</div>
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
            <!-- <span aria-hidden="true">&times;</span> -->
            Close
          </button>
        </div>
      </div>
    </div>
</div>
 <!-- ======= Footer ======= -->
 <<!-- footer id="footer">

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

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<!-- <script src="../../../assets/vendor/jquery/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../../assets/vendor/venobox/venobox.min.js"></script>
<script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../../../assets/vendor/aos/aos.js"></script>



<!-- Template Main JS File -->
<script src="../../../assets/js/main.js"></script>
<script src="../../../assets/js/sa/ep-edit.js"></script>

</body>
</html>