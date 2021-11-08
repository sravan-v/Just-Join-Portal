<?php 
include './snippets/conn.php';
session_start();
header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");
// do check
if (!isset($_SESSION["username"])) {
    header("location: ./admin/login.php");
    exit; // prevent further execution, should there be more code that follows
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Just Join</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/fav-jj.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/venobox/venobox.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        #hero {
            padding-top: 180px;
        }

        .block {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/jj/index.html"><img src="assets/img/logo-trim.png"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="pt-0 pl-0">  <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
      <li class="pt-0 pl-0"><a href = "./snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                </ul>
            </nav><!-- .nav-menu -->

            <!--   <a href="employer.php" class="employer-btn scrollto">Looking Employee?</a>
	  <a href="employee.php" class="employee-btn scrollto">Need Job?</a> -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="container d-flex justify-content-center" id="hero">
        <div class="row block">
            <div class="col-lg-6"><a href="./dashboard/ad/ep/adep-dashboard.php" class="btn btn-block employee">Employee</a></div>
            <div class="col-lg-6"><a href="./dashboard/ad/er/ader-dashboard.php" class="btn btn-block employer">Employer</a></div>
        </div>
    </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
   <!-- <footer id="footer">

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
    <!-- 
    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div> -->


</body>

</html>