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

            <ul class="nav">
                <li>
                    <a href="servicenotice.php">
                        <i class="pe-7s-graph"></i>
                        <p>Service Notice</p>
                    </a>
                </li>
                <li class="active">
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
                <div class="navbar-header">
                   </div>
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
                                <li><a href="yellolines.html"><font color="black">Yellow lines</font></a></li>
                                <li><a href="#"><font color="black">Blue lines</font></a></li>
                                <li><a href="#"><font color="black">Red lines</font></a></li>
                              </ul>
                              
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
					       <div class="header">
                                <h4 class="title">Choose Road</h4>
                            </div>
					       <div class="content">
					               <form role="form" action="yellow.php" method="post" id="myform">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="form-group">
				                                <label>From</label>
				                                <div class="input-group">
				                                <select name="road_from" class="show-tick form-control " >
				                                <option value="Parami Road">Parami Road</option>
				                                <option value="Kabaraye Pagoda Road">Kabaraye Pagoda Road</option>
				                                
				                                <option value="Pyay Road">Pyay Road</option>
				                                
				                                
				                                </select>
				                                </div>
				                                
				                            </div>
				                            
				                            <div class="form-group">
				                                <label>To</label>
				                                <div class="input-group">
				                                <select name="road_to" class="selectpicker show-tick form-control">
				                                <option value="Kabaraye Pagoda Road">Kabaraye Pagoda Road</option>
				                                <option value="Pyay Road">Pyay Road</option>                               
				                                <option value="Parami Road">Parami Road</option>
				                                
				                                </select>
				                                </div>
				                                
				                            </div>
				                            <button type="submit" class="btn btn-primary" name="go" >Plan Trip</button>
				                            <button  class="btn btn-primary" onclick="goBack()">Back</button>
				                            
                                            </div>
                                        </div>
                                        </div>
                                   </form>
                                  </div>
					       
		                          
                       </div>

                     </div>
                     </div>
                </div>

            </div>
   
 </div>
   


</body>
     <script>
     function goBack()
     { 
       document.getElementById("myform").action="yellolines.html";
       document.forms("myform").submit();
     }
     </script>
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
