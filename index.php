<?php
if (isset($_POST['submit'])){
//$d = $_POST['date'] ;
//$date= date("Y-m-d",strtotime($d));
$easyToRide = $_POST['easytoride'] ;
$cleanAndNeat = $_POST['cleanandneat'] ;
$facility = $_POST['facility'] ;
$comment = $_POST['comments'] ;
include 'dbconnect.php';
$sql ="INSERT INTO complain ( easyToRide, cleanAndNeat, facility, comment)
VALUES ('$easyToRide','$cleanAndNeat', '$facility','$comment')";
$conn->exec($sql);
//echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
session_start();
	
	require("dbconnect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['username'];
		$pwd=$_POST['password'];

$sql = "SELECT COUNT(*) FROM staff WHERE name='$uname' AND password='$pwd'";
if ($res = $conn->query($sql)) {
/* Check the number of rows that match the SELECT statement */
  if ($res->fetchColumn() > 0) {
        /* Issue the real SELECT statement and work with the results */
         header("location: AdminHome.php");
      
         }
    }
    /* No rows matched -- do something else */
			
			
					
    
}
			else
					$msg="Please enter the correct information!!";
$res = null;
$conn = null;	
	
	
if(isset($_POST['username'])){ $_SESSION["$username"] = $_POST['username']; } 
if(isset($_POST['password'])){ $password = $_POST['password']; } 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Leoforeio Control</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>
         <!--  CSS for Demo Purpose, don't include it in your project     -->
         <link href="assets/css/demo.css" rel="stylesheet" />
         
         <!-- Animation library for notifications   -->
		    <link href="assets/css/animate.min.css" rel="stylesheet"/>
		
		    <!--  Light Bootstrap Table core CSS    -->
		    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		
		
		    <!--  CSS for Demo Purpose, don't include it in your project     -->
		    <link href="assets/css/demo.css" rel="stylesheet" />
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
 
		
		    <!--     Fonts and icons     -->
		    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
		    
	</head>
	<body>
	<!---- container ---->
		<!---- header ----->
		<div class="header">
			<div class="container">
				<!--- logo ----->
				<div class="logo">
					<a href="index.html"><span>L</span>eoforeio <span>C</span>ontrol</a>
				</div>
				<!--- logo ----->
				<!--- top-nav ----->
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <font size="4"><strong>Schedules</strong></font> 
                                        <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="yellolines.html"><font color="black">Yellow lines</font></a></li>
                                <li><a href="#"><font color="black">Blue lines</font></a></li>
                                <li><a href="#"><font color="black">Red lines</font></a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="#"><font size="4"><strong>Contact</strong></font></a>
                        </li>
                        <li>
                           <a href="#"><font size="4"><strong>About</strong></font></a>
                        </li>
                       <li>
                           <button class="btn btn-info btn-fill" data-toggle="modal" data-target="#myModal">
                                <font size="4"><strong>Login</strong></font></a>
                            </button>
                           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Log In Here</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post">
										<div class="form-group">
                                    	<input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                		</div>
                               			<div class="form-group">
                                    	<input class="form-control" autocomplete="off" placeholder="Password" name="password" type="password" value="">
                                		</div>
                                		</div>
                                		<!-- Change this to a button or input when using this as a form -->
                                		<div class="modal-footer">
                               		 	<input type="submit" class="btn btn-primary" name="btn_log" value="login">
                               		 	<input type="reset" class="btn btn-default"t" value="Cancel">
                               		 	</div>                                    
										</div>
                                    	</div>
                                    	<?php echo "$msg"?>
										</form>
                                    <!-- /.modal-content -->
                                </div>
                                </li>
					</ul>
				</div>
				<div class="clearfix"> </div>
				<!--- top-nav ----->
					<!----- script-for-nav ---->
				<script>
					$( "span.menu" ).click(function() {
					  $( ".top-nav ul" ).slideToggle( "slow", function() {
					    // Animation complete.
					  });
					});
				</script>
				<!----- script-for-nav ---->
		<!---- banner-grids ---->
		<div class="banner-grids">
			<div class="col-md-4 banner-grid">
				<span><img src="img/bus.png" title="tootls" /></span>
				<h3><a href="https://www.google.com/maps/d/viewer?mid=1j-Xy4iq_8aIZw2GFBRO6VLJagwo&vomp=1&cid=mp&cv=c-R6IA2Tz98.en."><font color="yellow">Yellow Bus line</font></a></h3>
			</div>
			<div class="col-md-4 banner-grid">
				<span><img src="img/bus.png" title="tootls" /></span>
				<h3><a href="https://www.google.com/maps/d/viewer?mid=1j-Xy4iq_8aIZw2GFBRO6VLJagwo&vomp=1&cid=mp&cv=c-R6IA2Tz98.en."><font color="blue">Blue Bus Lines</font></a></h3>
				
			</div>
			<div class="col-md-4 banner-grid">
				<span><img src="img/bus.png" title="tootls" /></span>
				<h3><a href="https://www.google.com/maps/d/viewer?mid=1j-Xy4iq_8aIZw2GFBRO6VLJagwo&vomp=1&cid=mp&cv=c-R6IA2Tz98.en."><font color="white">White Bus Line</font></a></h3>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		<!---- banner-grids ---->
			</div>
			</div>
		<!---- header ----->
		<!---- welcome-Note ---->
		<div class="welcome-note">
			<div class="container">
				<div class="wel-head text-center">
					<h3>WE Are <span>L</span>eoforeio <span>C</span>ontrol</h3>
				</div>
			</div>
		</div>
		
		 <div class="col-lg-4">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bus" aria-hidden="true"></i> Make Complaints</h3>
                 </div>
                 <div class="panel-body">
                <div class="form-group">
                 <form action='' name='complainInsert' method='post'>
                 
                
                     <label>Easy to ride</label>
                     <label class="radio-inline">
                            <input type="radio" name="easytoride" id="optionsRadiosInline1" value="1">1
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="easytoride" id="optionsRadiosInline2" value="2">2
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="easytoride" id="optionsRadiosInline3" value="3">3
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="easytoride" id="optionsRadiosInline3" value="4">4
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="easytoride" id="optionsRadiosInline3" value="5">5
                     </label>
                 </div>
                <div class="form-group">
                     <label>Clean and Neat</label>
                     <label class="radio-inline">
                            <input type="radio" name="cleanandneat" id="optionsRadiosInline1" value="1">1
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="cleanandneat" id="optionsRadiosInline2" value="2">2
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="cleanandneat" id="optionsRadiosInline3" value="3">3
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="cleanandneat" id="optionsRadiosInline3" value="4">4
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="cleanandneat" id="optionsRadiosInline3" value="5">5
                     </label>
                 </div>
                <div class="form-group">
                     <label>Facility</label>
                     <label class="radio-inline">
                            <input type="radio" name="facility" id="optionsRadiosInline1" value="1">1
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="facility" id="optionsRadiosInline2" value="2">2
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="facility" id="optionsRadiosInline3" value="3">3
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="facility" id="optionsRadiosInline3" value="4">4
                     </label>
                     <label class="radio-inline">
                            <input type="radio" name="facility" id="optionsRadiosInline3" value="5">5
                     </label>
                 </div>
                 <div class="form-group">
                      <label>Enter Your Comments</label>
                      <textarea class="form-control" rows="8" name="comments"></textarea>
                 </div>
                 
                 <input type="submit" name="submit" class="btn btn-primary" value="submit">
                 </form>
                 </div>
            </div>
            </div>
		<!---- welcome-Note ---->
		
		<!---- top-grids ---->
		<div class="top-grids">
			<div class="container">
				<div class="col-md-4 top-grid">
					<h4>Yellow Line</h4>
					<p>If you want to go to KaBarAye, you can ride yellow line bus!</p>
				</div>
				<div class="col-md-4 top-grid">
					<h4>Red Line</h4>
					<p>If you want to go to ShweDaGon, you can ride Red line bus!</p>
				</div>
				<div class="col-md-4 top-grid">
					<h4>Blue Line</h4>
					<p>If you want to go to BoTaHtung, you can ride Blue line bus!</p>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<div id="map">
		</div>
		<!---- top-grids ---->
		<div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    
                                    <a href="#" class="list-group-item">
                                        <span class="badge">60</span>
                                        <i class="fa fa-fw fa-comment"></i>Total Buses
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">60</span>
                                        <i class="fa fa-fw fa-comment"></i> Total Drivers
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">60</span>
                                        <i class="fa fa-fw fa-comment"></i> Total Driver Assistants
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">3</span>
                                        <i class="fa fa-fw fa-comment"></i> Total Bus Lines
                                    </a>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Fare</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Bus No #</th>
                                                <th>Source</th>
                                                <th>Destination</th>
                                                <th>Fares (Kyats)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>4D-5115</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                             <tr>
                                                <td>3D-5634</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                             <tr>
                                                <td>3B-3326</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                             <tr>
                                                <td>4A-2412</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                             <tr>
                                                <td>5B-5335</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                             <tr>
                                                <td>3B-3326</td>
                                                <td>Dagon University</td>
                                                <td>Ta Tar Phyu</td>
                                                <td>Ks.200</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
		<!---- mid-grids ---->
		<div class="mid-grids">
			<div class="container">
				<div class="col-md-8 mid-grids-left">
					<h2>Latest News from <span><label>L</label>eoforeio <label>C</label>ontrol</span></h2>
					<p>Quisque vestibulum arcu at libero commodo lacinia. Pellentesque imperdiet placerat nisl ut vestibulum</p>
					<!---- latest-news-grids---->
					<div class="latest-news-grids">
						<div class="latest-news-grid">
							<img src="img/bus1.jpg" title="name" />
							<h4><a href="#">New Routes are available</a></h4>
							<span>17 June 2016, by <a href="#">Admin</a></span>
							<p> We have added the new routes</p>
						</div>
						<div class="latest-news-grid">
							<img src="img/donation.jpg" title="name" />
							<h4><a href="#">Donation Trip with our stakeholders</a></h4>
							<span>2 May 2016, by <a href="#">Admin</a></span>
							<p> We have donated the half money from the customers fares to the orphanage. </p>
						</div>
						<div class="latest-news-grid">
							<img src="img/busevent.jpg" title="name" />
							<h4><a href="#">We will make the event for our customers.</a></h4>
							<span>22 Sept 2016, by <a href="#">Admin</a></span>
							<p> This is free event. We invite all of you to join with us. </p>
						</div>
						<div class="latest-news-grid">
							<img src="img/insidebus.jpg" title="name" />
							<h4><a href="#">Our New Facilities</a></h4>
							<span>22 Sept 2016, by <a href="#"> Admin</a></span>
							<p> We provide new buses and facilities for citizens. </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!---- latest-news-grids---->
				</div>
				<div class="col-md-4 mid-grids-right">
					<h3><span><label>L</label>eoforeio <label>C</label>ontrol</span> Services</h3>
					<p>We wont let you down, we are here to make you feel..</p>
					<div class="services-list">
						<ul>
							<li><a href="#"><span> </span><small> Finding routes on the map.</small></a></li>
							<li><a href="#"><span> </span><small>Can plan the trip</small></a></li>
							<li><a href="#"><span> </span><small>Summarize data </small></a></li>
							<li><a href="#"><span> </span> <small>Can know the organization's event</small></a></li>
							
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!---- mid-grids ---->
	<!---- container ---->
	<div class="footer">
				<div class="top-footer">
					<div class="container">
						<div class="top-footer-grids">
							<div class="top-footer-grid">
								<h3>Contact us</h3>
								<ul class="address">
									<li><span class="map-pin"> </span><label>University of Informatin Technology, Yangon</label></li>
									<li><span class="mob"> </span>(416) 555-5252</li>
									<li><span class="msg"> </span><a href="mailto:yourname@yoursite.com">hello@uit.edu.mm</a></li>
								</ul>
							</div>
							<div class="top-footer-grid">
								<h3>Latest posts</h3>
								<ul class="latest-post">
									<li><a href="TripPlanner.php"><span class="icon2"> </span> Plan Your Trip</a> </li>
									<li><a href="#"><span class="icon1"> </span> Browse Driver Info</a> </li>
									<li><a href="#"><span class="icon3"> </span> Browse Bus Info</a> </li>
									<li><a href="#"><span class="icon4"> </span> Wearable Technology On The Rise</a> </li>
									<li><a href="#"><span class="icon5"> </span> Browse Service Notic in <label>recent hours</label></a> </li>
								</ul>
							</div>
							<div class="top-footer-grid">
								<h3>Latest tweets</h3>
								<div class="tweet-box">
									<div class="tweet-box-icon">
										<span> </span>
									</div>
									<div class="tweet-box-info">
										<p>Confucius: Life is really simple, but we insist on making it complicated. <span><a href="#">#famousquotes</a></span><label><a href="#"> 8 mins ago</a></label></p>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="tweet-box">
									<div class="tweet-box-icon">
										<span> </span>
									</div>
									<div class="tweet-box-info">
										<p>Confucius: Life is really simple, but we insist on making it complicated. <span><a href="#">#famousquotes</a></span><label><a href="#"> 8 mins ago</a></label></p>
									</div>
									<div class="clear"> </div>
								</div>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
				</div>
				<!----start-bottom-footer---->
				<div class="bottom-footer">
					<div class="container"> 
						<div class="bottom-footer-left">
							<p>&#169; Copyright 2014 Template by <a href="http://w3layouts.com/">W3layouts</a></p>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-bottom-footer---->
			</div>
			<!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
     <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat:16.8661, lng: 96.1951},
            zoom: 8
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCeXt6Hw3Ru5rpHsThnE2FJlrY6TwwoiNQ&callback=initMap">
    </script>
	</body>
</html>

