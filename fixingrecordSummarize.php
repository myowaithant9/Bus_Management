<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bus Management and Scheduling</title>
    
<link rel="stylesheet" type="text/css" media="all" href="./js1/skins/aqua/theme.css" title="Aqua" />
     <!-- main calendar program -->
   <script type="text/javascript" src="./js1/calendar.js"></script>
   <!-- language for the calendar -->
   <script type="text/javascript" src="./js1/calendar-en.js"></script>
    <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
<script type="text/javascript" src="./js1/calendar-setup.js"></script>
  <link href="js1/style.css" rel="stylesheet">
  <script src="js1/jquery.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/bootstrap-theme.min.css"></script>
<script src="js1/jquery.validate.js"></script> 

<script src="js1/script.js"></script> 
<script src="js1/script1.js"></script>



     <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <script type="text/javascript" src="./js/calendar.js"></script>
   <!-- language for the calendar -->
   <script type="text/javascript" src="./js/calendar-en.js"></script>
    <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
<script type="text/javascript" src="./js/calendar-setup.js"></script>

</head>

<body><div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                 <a href="" class="simple-text">Leoforeio</a>
            </div>

            <ul class="nav">
                <li>
                    <a href="register.php">
                        <i class="pe-7s-user"></i>
                        <p>Update Own Profile</p>
                    </a>
                </li>
             <li class="dropdown">
                              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="pe-7s-bottom-arrow"></i>    Insert
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="driverinsertfinal.php"><font color="black">Driver Insert</font></a></li>
                                <li><a href="businsertfinal.php"><font color="black">Bus Insert</font></a></li>
                               </ul>
                        </li>
                  <li class="dropdown">
                              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="pe-7s-up-arrow"></i>Update
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="driverUpdate.php"><font color="black">Driver Update</font></a></li>
                                <li><a href="busUpdate.php"><font color="black">Bus Update</font></a></li>
                               </ul>
                        </li>
                  <li class="dropdown">
                              <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="pe-7s-trash"></i>
                                   Delete
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="driverDeleteSearch.php"><font color="black">Driver Delete</font></a></li>
                                <li><a href="busDeleteSearch.php"><font color="black">Bus Delete</font></a></li>
                               </ul>
                        </li>
                <li>
                    <a href="fixingRecord.html">
                        <i class="pe-7s-file"></i>
                        <p>Fixng Record</p>
                    </a>
                </li>
                <li>
                    <a href="salary.html">
                        <i class="pe-7s-wallet"></i>
                        <p>Salary Calculation</p>
                    </a>
                </li>
                <li class="active">
                              <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="pe-7s-file"></i>
                                   Summarize Info
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="fixingrecordSummarize.php"><font color="black">Fixing Record</font></a></li>
                                <li><a href="#"><font color="black">Salary</font></a></li>
                               </ul>
                        </li>
                <li>
                    <a href="serviceNoticeInsert.php">
                        <i class="pe-7s-upload"></i>
                        <p>Service Notice</p>
                    </a>
                <li>
                <li>
                    <a href="ComplainDetail.php">
                        <i class="pe-7s-look"></i>
                        <p>View Complain</p>
                    </a>
                </li>
                <li>
                    <a href="Driversearch.php">
                        <i class="pe-7s-user"></i>
                        <p>Search Driver by Name</p>
                    </a>
                </li>
				</ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                 
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="AdminHome.php">
                              <i class="pe-7s-home"></i> Home
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="register.php" class="dropdown-toggle" data-toggle="dropdown">
                                   Register
                                    <b class="caret"></b>
                              </a>
                             
                        </li>
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



  <div class="content">
            <div class="container-fluid">

                <!-- /.row -->
                       <div class="row">
                    <div class="col-md-2">

                        <form role="form" action=" " method="post">
                              <div class="form-group">
                              
                            
                             <label>From</label> <input type="text" class="form-control input-xs" id="" name="fromdate" placeholder="Jun-26-2016">
                             <label>To</label><input type="text" class="form-control input-xs" id="" name="todate" placeholder="Jun-26-2016">
                           
                           
                             </div>
                             <input type="submit" class="btn btn-info btn-fill" name="submit" value="OK" />
                        </form>
                      
                </div>
					</div>
					<br/>
					<?php
if(isset($_POST['submit'])){
$fd=$_POST['fromdate'];
$fromdate= date("Y-m-d",strtotime($fd));
$td=$_POST['todate'];
$todate= date("Y-m-d",strtotime($td));
include 'dbconnect.php';
$sql=$conn->query("select max(fixingCount) as fc from fixingrecord where fixingDate between '$fromdate' and '$todate' ");
foreach($sql as $value){
	$fixingcount=$value['fc'];
}
$sql1=$conn->query("select busID from fixingrecord where fixingCount= '$fixingcount'");
foreach($sql1 as $value1){
	$Bid=$value1['busID'];
	
}
$sql4=$conn->query("select busColor from bus where busID LIKE '%$Bid%'");
foreach($sql4 as $value4){
	$bc=$value4['busColor'];
	
}
$sql2=$conn->query("select driverName  from driver where busID LIKE '%$Bid%'");
foreach($sql2 as $value2){
	$driver=$value2['driverName'];
}
$sql3=$conn->query("select SUM(totalCost) AS t from fixingrecord where busID LIKE '%$Bid%' ");
foreach($sql3 as $value3){
	$t=$value3['t'];
}
/*$sql5=$conn->query("select fixingParts from fixingrecord  busID LIKE '%$Bid%' group by fixingParts");
foreach($sql5 as $value5){
	$fp=$value5['fixingParts'];
}*/

?>
					<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Summarize Information about Fixing Record</h3>
                            </div>
                            <div class="panel-body">
                            <p><strong><?php echo "$Bid" ?></strong> have maximum fixing record ,<strong> <?php echo "$fixingcount"?></strong> times between 
                            <?php echo "$fromdate"?> to <?php echo "$todate"?>.<br>
                           <strong> <?php echo "$driver" ?></strong> drives this Bus (<?php echo "$Bid"?>).<br>
                            Total fixing costs is <strong><?php echo "$t" ?></strong>.
                            </p>
                             </div>
                        </div>
                    </div>
					
					
					</div><?php }?>
					</div>
					</div>
			
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- Custom Color -->
     <link href="./css/custom-color.css" rel="stylesheet">
	

</html>
	                  