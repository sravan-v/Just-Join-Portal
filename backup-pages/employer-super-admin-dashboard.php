<?php 
include '../snippets/conn.php';
session_start();
header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");
// do check
if (!isset($_SESSION["username"])) {
    header("location: ../admin/login.php");
    exit; // prevent further execution, should there be more code that follows
}
?>
<html>
 <head>
 <!-- Favicons -->
 <link href="../assets/img/fav-jj.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files --> 
    <!-- <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
  <style>
        .box{
            overflow-x: scroll;
            border: 1px solid;
            padding: 10px 15px;
        }
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
   <div class="panel panel-default">
    <!-- <div class="panel-heading">Sample Data</div> -->
    <div class="panel-body">
     <div class="table-responsive">
      <table id="employer_data" class="table table-bordered table-striped">
       <thead>
        <tr>
        <th>ID</th>
         <th>Name</th>
         <th>Desig. in Organization</th>
         <th>Organization Type</th>
         <th>Organization Name</th>
         <th>Phone Number</th>
         <th>Email</th>
         <th>Address</th>
         <th>Looking Employee Category</th>
         <th>Job Type</th>
         <th>No. of Positions</th>
         <th>Gender</th>
         <th>Experience</th>
         <th>Salary Min.</th>
         <th>Salary Max.</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="../assets/js/tabledit.min.js"></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#employer_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "scrollX": true,
  "order" : [],
  "ajax" : {
   url:"../snippets/fetch-data-sa.php",
   type:"POST"
  }
 });

 $('#employer_data').on('draw.dt', function(){
  $('#employer_data').Tabledit({
   url:'../snippets/action-data-sa.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:
        [
            [1, 'name'], 
            [2, 'designation'], 
            [3, 'organization_type', '{"School":"School","College":"College", "Hospital":"Hospital", "Super Markets":"Super Markets", "Malls":"Malls"}'], 
            [4, 'organization_name'], 
            [5, 'phone_number'], 
            [6, 'email'], 
            [7, 'address'],
            [8, 'emp_category', '{"School":"School","College":"College", "Hospital":"Hospital", "Super Markets":"Super Markets", "Malls":"Malls"}'], 
            [9, 'emp_job_type', '{"Teacher":"Teacher","Sweepers":"Sweepers", "Nurse":"Nurse", "Supervisors":"Supervisors", "Watchmen":"Watchmen"}'], 
            [10, 'no_positions'], 
            [11, 'gender', '{"Male":"Male","Female":"Female"}'], 
            [12, 'experience', '{"1":"1","2":"2", "3":"3", "4":"4", "5":"5"}'], 
            [13, 'salary_min'], 
            [14, 'salary_max']
        ]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#employer_data').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>