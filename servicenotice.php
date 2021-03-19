<?php

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


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

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                 <a href="http://www.creative-tim.com" class="simple-text">
                    Yellowlines
                </a>  
            </div>

            <ul class="nav" >
                <li class="active">
                    <a href="servicenotice.php">
                        <i class="pe-7s-graph"></i>
                        <p>Service Notice</p>
                    </a>
                </li>
                <li>
                    <a href="yellowSchedule.php">
                        <i class="pe-7s-user"></i>
                        <p>Trip Planner</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="index.php">
                              <i class="pe-7s-home"></i>Home
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Bus Route
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="yellolines.html">Yellow Lines</a></li>
                                <li><a href="#">Blue Lines</a></li>
                                <li><a href="#">Red Lines</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Service Notice
                        </h1>
                       
                    </div>
                </div>
                 <?php 
				require 'dbconnect.php';

				$sql="SELECT * FROM service order by serviceID desc limit 5";
				echo "<ul>";
				
					$rows=$conn->query($sql);
					foreach ($rows as $row){
				?>
                <div class="alert alert-info">
                    <?php  echo "<strong>"."Notice!  "."</strong>".$row["date"].":".$row["servicenotice"]; ?>
                </div>
                <?php		
				}
				

				echo "</ul>";
				
?>
                            
                        </form>

                    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
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
<script src="js1/own.js"></script>

</body>

</html>
