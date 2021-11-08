<?php 
include '../../../snippets/conn.php';
// $conn = mysqli_connect("localhost", "root", "", "test");
// $conn = mysqli_connect("localhost", "justjoin", "just_join_111", "just_join");


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

  <title>View - Just Join</title>
  <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/fav-jj.png" rel="icon">
    <link href="../../assets/img/fav-jj.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/view.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"><img class="img" alt="Template" src="../../../assets/img/logo-trim.png" /> 
                    </div>
                        <div class="col-md-8 text-right address">
                            <h4 style="color: #f80505;"><strong>Just Join</strong></h4>
                            <p>221,  Andhra Pradesh</p>
                            <p>1800-234-124</p>
                            <p>just-join@gmail.com</p>
                        </div>
                    </div> <br />
                    <div class="row">
                        <div id="my-pics" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <!-- <ol class="carousel-indicators">
                            <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                            <li data-target="#my-pics" data-slide-to="1"></li>
                            <li data-target="#my-pics" data-slide-to="2"></li>
                            </ol> -->
                            <div class="carousel-inner" role="listbox">
                                <?php 
                                    $query = "SELECT * FROM cs_images WHERE img_id = $id";
                                    $result = mysqli_query($conn, $query);
                                    $counter = 1;
                                    while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <div class="item<?php if($counter <= 1){echo " active"; } ?>">
                                            <?php $output = '<img src="data:image/jpeg;base64,'.base64_encode($row['name']).'"/>'; 
                                            echo $output;
                                            ?>
                                        </div>
                                <?php
                                    $counter++;
                                }
                                ?>

                            <!-- Content -->
                            

                            <!-- Slide 1 -->
                            <!-- <div class="item active">
                            <img src="https://www.quackit.com//pix/samples/16l.jpg" alt="Sunset over beach">
                            </div> -->

                            <!-- Slide 2 -->
                            <!-- <div class="item">
                            <img src="https://www.quackit.com//pix/samples/4l.jpg" alt="Rob Roy Glacier">
                            </div> -->

                            <!-- Slide 3 -->
                            <!-- <div class="item">
                            <img src="https://www.quackit.com//pix/samples/15l.jpg" alt="Longtail boats at Phi Phi">
                            </div> -->

                            </div>

                            <!-- Previous/Next controls -->
                            <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
                            <span class="icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
                            <span class="icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>

                            </div>
                            <?php
                            include '../../../snippets/view-conn.php';
                            // $conn = new PDO("mysql:host=localhost;dbname=just_join", "justjoin", "just_join_111");
                                // $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
                                $query = "SELECT * FROM car_seller WHERE id = $id";
                                $statement = $connection->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                                {
                                    
                            ?>
                            <div class="col-md-12 text-center">
                                    <h2>CAR DATA</h2>
                                    <h5>JJ0<?php echo $row['id']?></h5>
                                </div>
                            </div>
                    </div> <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Field</h5>
                                    </th>
                                    <th>
                                        <h5>Value</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9">Name</td>
                                    <td class="col-md-3"><?php echo $row['fname']?> <?php echo $row['lname']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Phone Number</td>
                                    <td class="col-md-3"> +91 <?php echo $row['phone_number']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Aadhar</td>
                                    <td class="col-md-3"><?php echo $row['aadhar']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Address</td>
                                    <td class="col-md-3"><?php echo $row['address']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Car Model</td>
                                    <td class="col-md-3"><?php echo $row['model']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Fuel Type</td>
                                    <td class="col-md-3"><?php echo $row['fuel_type']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Kilometers</td>
                                    <td class="col-md-3"><?php echo $row['kilometers']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Vehicle Number</td>
                                    <td class="col-md-3"><?php echo $row['vehicle_number']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Maximum Price</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $row['max_price']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Any Issues</td>
                                    <td class="col-md-3"><?php echo $row['issues']?></td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <hr />
                    <div class="footer">
                            <p><b>Date: </b><span><?php echo $row['submit_date']?></span></p>
                            <p><b>Signature: </b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
        }
    ?>
</body>
</html>