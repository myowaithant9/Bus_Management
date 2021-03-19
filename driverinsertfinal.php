
<?php
session_start();
	$errorCount;
	$idError="";
	$nameError="";
	$nrcError = "";
	$phError="";
	$addressError="";
	
	if(isset($_POST['registerSubmit'])) 
		{			
			$errorCount = 0;
			if(empty($_POST["Id"])) 
			{
			$idError="Driver ID is required";
			$errorCount++;
			} 
			else 
			{				
			$id=$_POST["Id"];
			if (!preg_match("^\w\/\d{1,5}\/\d{1,2}^", $id)) {
				$idError = "Invalid Driver ID format";
				$errorCount++;		
			}
			}
			if(empty($_POST["Name"])) 
			{
			$nameError="Driver Name is required";
			$errorCount++;
			} else {
			$name=$_POST["Name"];
				if(!preg_match("/^[a-zA-Z ]+$/",$name)) 
				{
					$nameError="Invalid driver name format";
					$errorCount++;
				}
			}
				
			if(empty($_POST["Phno"])){
				$phError = "Phone number is required";
				$errorCount++;
			} else {
			$phone=$_POST["Phno"];
				if(!preg_match("/^(\+\d{1,3} ?)?(\(\d{1,5}\)|\d{1,5}) ?\d{3}?\d{0,7}( (x|xtn|ext|extn|pax|pbx|extension)?\.? ?\d{2-5})?$/i",$phone)) 
				{
					$phError="Invalid phone format";
					$errorCount++;
				}
			}
			
			if(empty($_POST["Address"])){
				$addressError = "Address is required";
				$errorCount++;
			} else {
			$address=$_POST["Address"];
				if(!preg_match("^[A-Za-z-0-99999999]^",$address)) 
				{
					$addressError="Invalid address format";
					$errorCount++;
				}
			}
			
			if (empty($_POST["Nrc"])) {
				$nrcError = "NRC is required";
				$errorCount++;
			} else {
				$nrc = $_POST["Nrc"];
				// check name only contains letters and whitespace
				if (!preg_match("^\d{1,2}\/\w\w\w\(\w\)\d{1,6}^", $nrc)) {
					$nrcError = "Invalid NRC format";
					$errorCount++;
				}
			}	
	
		if($errorCount == 0) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO driver (driverId,driverName,nrcNumber,phNumber,address) VALUES
		('" . $_POST["Id"] . "', '" . $_POST["Name"] . "', '" . $_POST["Nrc"] ."', '" . $_POST["Phno"] . "', '" . $_POST["Address"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$successmsg = "Successfully inserted a new driver!";	
			unset($_POST);
		} else {
			$errormsg = "Problem in insertion. Try Again!";	
		}

	}		
	}
	
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
     	 <style>
    	p.text-success{
    		font-weight: bold;
    		text-align: center;
    	}
    </style>
    

   
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
             <li class="active">
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
                        <li>
                              <a href="register.php" >
                                   Register
                                  
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Driver Insertion File</h4>
                            </div>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <span><p class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></p></span>
            			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                        <form role="form" action="driverinsertfinal.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="driverID">Driver ID (License)</label>
                                <input type="text" class="form-control" name="Id" id="Id" placeholder="A/00000/13" 
								 value="<?php  if ( isset( $_POST["Id"] ) && $errorCount !=0) echo $_POST["Id"]?>"/>
								 <span class='text-danger'> <?php echo $idError; ?> </span>	
                            </div>

                          
                            
                             <div class="form-group">
                                <label class="control-label" for="driverName">Name</label>
                                <input type="text" class="form-control" name="Name" id="Name" placeholder="John" value="<?php
								if(isset($_POST["Name"]) && $errorCount !=0)
									echo $_POST['Name'];
							?>">
							<span class='text-danger'> <?php echo $nameError; ?></span>
                            </div>
							
                            <div class="form-group">
                                <label class="control-label" for="NRC">NRC Number</label>
                                <input type="text" class="form-control" name="Nrc" id="Nrc" placeholder="10/MlM(N)224991" value="<?php  if ( isset( $_POST["Nrc"] ) ) echo $_POST["Nrc"]?>" >
                                <span class='text-danger'> <?php echo $nrcError; ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" name="Phno" id="Phno" placeholder="09*********" value="<?php  if ( isset( $_POST["Phno"] ) && $errorCount !=0) echo $_POST["Phno"]?>">
                                <span class='text-danger'> <?php echo $phError; ?></span>
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label" for="address">Address</label>
                                <input type="text" class="form-control" name="Address" id="Address" placeholder="No.1()A,20th Street, Latha Township" value="<?php  if ( isset( $_POST["Address"] ) && $errorCount !=0) echo $_POST["Address"]?>">
                                  <span class='text-danger'> <?php echo $addressError; ?></span>
                            </div>
                            
                            
                          
							<p>
								<input type="submit" value="Register" name="registerSubmit" id="registerSubmit" class="btn btn-info"/>
								<input type="reset" value="Cancel" name="cancel" id="cancel" class="btn btn-info" />
							</p>
							
						 </form>	
                       		

                    </div>
                 </div>
                </div>   
                    
                            
         </div>
         </div>
         </div>
         </div>
         </div>           

</div>
</div>


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