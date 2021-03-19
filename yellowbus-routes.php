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
                <li class="active">
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
                <div class="row">
					<div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header text-center">
                                <h4 class="title">Find Route on Map & download PDF</h4>
                                <p class="category">Are you looking for traveling around the town? Please check our bus route on map.</p>
								<br>
                            </div>
                            <div class="content table-responsive table-full-width table-upgrade">
                                <table class="table">
                                    <thead>
                                        <th class="text-center">Bus Route</th>
                                    	<th class="text-center">Download</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                        <tr>
                                        	<td><a href="#">Nyaung Pin to Tamwe</a></td>
                                        	<td><a href="#">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

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

</html>
