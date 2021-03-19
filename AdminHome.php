<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bus Management and Scheduling</title>

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
                <li class="active">
                    <a href="updateInfo.php">
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
                
                  <li class="dropdown">
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
                    
                    <a class="navbar-brand" href="#">Leoforeio</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="AdminHome.php">
                              <i class="pe-7s-home"></i>
                            Home
                            </a>
                        </li>
                         <li class="active">
                              <a href="register.php">
                              Register
                                   </a>
                            </li>
                        
                           <li>
                            <a href="logout.php">
                              <i class="pe-7s-power"></i>  Log out
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

<?php 
include 'dbconnect.php';
$sql=$conn->query("Select * from bus  LIMIT 10");
?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                              <h2>Bus List</h2>
                                <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>Bus ID</th>
                                        <th>Bus Color</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach ($sql as $row) {?>
                                   <tr>
 		
 		<td><?php 	echo $row['busID']; ?></td>
 		<td><?php	echo $row['busColor']; ?></td>
 		</tr>
 		
 		<?php
}
?>
            </tbody>
          </table>
           <button type="submit" class="btn btn-default" onclick="BusDetail()">View Detail About Bus</button>
            </div>
        </div>
     </div>
 </div>
       <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                  <h2>Driver List</h2>
                        <p class="category">24 Hours performance</p>
                            </div>
                            <?php  $sql=$conn->query("Select * from driver LIMIT 10");?>
                       
                              <div class="table-responsive">
                            <table class="table table-bordered table-hover " id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Driver License</th>
                                        <th>Bus Id</th>
                                        <th>Driver Name</th>
                                        <th>NRC Number</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                   <?php foreach ($sql as $row) {?>
                                   <tr>
 		<td><?php 	echo $row['driverId']; ?></td>
 		<td><?php 	echo $row['busId'];?></td>
 		<td><?php 	echo $row['driverName']; ?></td>
 		<td><?php	echo $row['nrcNumber']; ?></td>
 		<td><?php	echo $row['phNumber']; ?></td>
 		<td><?php	echo $row['address']; ?></td>
 		</tr>
 		
 		<?php
}
?>
            </tbody>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-default" onclick="DriverDetail()">View Detail About Drivers</button>
                        </div>
                        </div>
                    </div>
                </div>
			  <div class="col-md-12">
                              <h2><i class="fa fa-bus" aria-hidden="true"></i>    Bus Schedules Table</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr  class="success">
                                        <th>Bus Name</th>
                                        <th>Monday</th>
                                        <th>Tueday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bus 1</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>
                                    </tr>
                                    <tr  class="success">
                                        <td>Bus 2</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>  
                                        <td>5:30</td>
                                    </tr>
                                    <tr>
                                        <td>Bus 3</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                    </tr>
                                    <tr  class="success">
                                        <td>Bus 4</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                    </tr>
                                    <tr>
                                        <td>Bus 5</td>                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        
                                    </tr>
                                    <tr  class="success">
                                        <td>Bus 6</td>
                                        <td>8:30</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                    </tr>
                                    <tr>
                                       <td>Bus 7</td>
                                        <td>5:30</td>
                                        <td>6:00</td>
                                        <td>6:30</td>
                                        <td>7:00</td>
                                        <td>7:30</td>
                                        <td>8:00</td>
                                        <td>8:30</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-default" onclick="BusDetail()">View Detail About Bus</button>
                        </div>
                    </div>
             
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
<script src="js1/own.js"></script>

</html>
