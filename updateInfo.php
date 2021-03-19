
	<?php
$errorCount = 0;
	$idError="";
	$pwdError="";
	$confirmPwdError="";
	$nameError="";
	$nrcError = "";
	$phError="";
	$addressError="";
	$genderError="";
	$id = "";
	if(isset($_POST['viewSubmit'])) 
		{			
			
			if(empty($_POST["employeeID"])) 
			{
			$idError="Employee ID is required";
			$errorCount++;
			} 
			else 
			{				
			$id=$_POST["employeeID"];
			if (!preg_match("#[0-9]+#", $id)) {
				$idError = "Invalid Employee ID format";
				$errorCount++;		
			}
			}
			if(empty($_POST["name"])) 
			{
			$nameError="User Name is required";
			$errorCount++;
			} else {
			$name=$_POST["name"];
				if(!preg_match("/^[a-zA-Z ]+$/",$name)) 
				{
					$nameError="Invalid user name format";
					$errorCount++;
				}
			}
			
			
			
			if($_POST["phone"]){
			$phone=$_POST["phone"];
				if(!preg_match("/^(\+\d{1,3} ?)?(\(\d{1,5}\)|\d{1,5}) ?\d{3}?\d{0,7}( (x|xtn|ext|extn|pax|pbx|extension)?\.? ?\d{2-5})?$/i",$phone)) 
				{
					$phError="Invalid phone format";
					$errorCount++;
				}
			}
			
			if($_POST["address"]){
			$address=$_POST["address"];
				if(!preg_match("^[A-Za-z-0-99999999]^",$address)) 
				{
					$addressError="Invalid address format";
					$errorCount++;
				}
			}
			
			if (empty($_POST["nrc"])) {
				$nrcError = "NRC is required";
				$errorCount++;
			} else {
				$nrc = $_POST["nrc"];
				// check name only contains letters and whitespace
				if (!preg_match("^\d{1,2}\/\w\w\w\(\w\)\d{1,6}^", $nrc)) {
					$nrcError = "Invalid NRC format";
					$errorCount++;
				}
			}			
		if(empty($_POST['password'])) {
		$pwdError="Password is required";
		$errorCount++;
		} else {
			$pwd=$_POST['password'];
		if(strlen($pwd) < 8 or strlen($pwd) > 20) {
		$pwdError="Use at least 8 characters to make password strong!";
		$errorCount++;
		}
		}
			if(empty($_POST['confirmPassword'])) 
			{
				$confirmPwdError="Confirmed Password is required";
				$errorCount++;
			} else 
			{
				if($_POST['confirmPassword']!=$_POST['password']) 
				{
			$confirmPwdError="Password do not match";
			$errorCount++;
				}
			}
			
		if(empty($_POST['gender'])){
			$genderError = "Select your gender";
			$errorCount++;
		}
		}
    $pwdError="";
	$confirmPwdError="";
	$nameError="";
	$nrcError = "";
	$phError="";
	$addressError="";
	$genderError="";
	
	?>
	
 <?php 
$servername = "localhost";
$dbname = "bus";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  employeeID,password,confirmPassword,name,phone,address,nrc,gender from staff where employeeID='$id'";
$result = $conn->query($sql);
$errorCount;
$employeeID="";
$pwd="";
$confirmPassword="";
$name = "";
$phone = "";
$address = "";
$nrc = "";
$gender = "";

if($result)
{
	if ($result->num_rows > 0) {  
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$employeeID=$row["employeeID"];    
    	$pwd=$row["password"];
    	$confirmPassword=$row["confirmPassword"];	
    	$name=$row["name"];
    	$phone=$row["phone"];
    	$address=$row["address"];
    	$nrc=$row["nrc"];
    	$gender=$row["gender"];           
    } 	      
} 
}

$conn->close();
 ?>

	
<?php	

		
	
	$servername = "localhost";
	$dbname = "bus";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);	
	
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	if($errorCount==0){
	if(isset($_POST['updateSubmit']))
	{
		$id=$_POST['employeeID'];
		$pwd=$_POST['password'];
		$confirmPassword=$_POST['confirmPassword'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$nrc=$_POST['nrc'];			
		$gender=$_POST['gender'];	
		
		//echo $grade."<br>".$start."<br>".$end."<br>".$location;
	
	$sql = "Update staff set  password='$pwd',confirmPassword='$confirmPassword',name='$name',
		phone='$phone',nrc='$nrc',gender='$gender' where employeeID='$id'";
	$result=$conn->query($sql);	   
	
	if(!empty($result)) {
			$successmsg="Updated successfully!";				
		} else {
		    $errormsg="Problem in Update Information. Try Again!";	
		}
		
		
	}		
	}
	
	$conn->close();

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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Profile</h4>
                            </div>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span><p class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></p></span>
            			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                        <form role="form" action="updateInfo.php" method="post">                        
                            <div class="form-group">
                               <label class="control-label" for="employeeID">Employee ID</label>
                                <input type="text" class="form-control" name="employeeID" id="employeeID"   
								 value="<?php  if ( isset( $_POST["employeeID"] ) || isset($_POST["updateSubmit"]) && $errorCount!=0) echo $_POST["employeeID"]?>"/>
								 <span class='text-danger'> <?php echo $idError; ?> </span>	
                            </div>


                             <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php  if ( isset( $_POST["viewSubmit"]) || isset($_POST["updateSubmit"])) echo $pwd;?>"/>
                                <span class='text-danger'> <?php echo $pwdError; ?></span>
                            </div> 
                            
                            
                            <div class="form-group">
                                <label class="control-label" for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="<?php  if ( isset( $_POST["viewSubmit"] )  || isset($_POST["updateSubmit"])) echo $pwd;?>"/>
                                <span class='text-danger'> <?php echo $confirmPwdError; ?></span>
                            </div> 
                            
                             
							
							<div class="form-group">
                                <label class="control-label" for="name"> Username</label>
                                <input type="text" class="form-control" name="name" id="name"  value="<?php  if ( isset( $_POST["viewSubmit"] )  || isset($_POST["updateSubmit"])) echo $name;?>">
                                <span class='text-danger'> <?php echo $nameError; ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="nrc">NRC Number</label>
                                <input type="text" class="form-control" name="nrc" id="nrc"  value="<?php  if ( isset( $_POST["viewSubmit"] ) || isset($_POST["updateSubmit"])) echo $nrc;?>" >
                                <span class='text-danger'> <?php echo $nrcError; ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone"  value="<?php  if ( isset( $_POST["viewSubmit"] ) || isset($_POST["updateSubmit"])) echo $phone;?>">
                                <span class='text-danger'> <?php echo $phError; ?></span>
                                
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label" for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"  value="<?php  if ( isset( $_POST["viewSubmit"] ) || isset($_POST["updateSubmit"])) echo $address;?>">
                                  <span class='text-danger'> <?php echo $addressError; ?></span>
                            </div>             
                            
                            <div class="form-group">
                            		<label>Gender</label>
                                   	<div class="">
                                   		<label>                                   		
                                        <input type="radio" name="gender" id="male" value = "Male" <?php  if ( isset( $_POST["viewSubmit"]) || isset($_POST["updateSubmit"]) && $gender == "Male"){ print 'checked';} ?>>Male
                                    </label>
                                     <label>
                                        <input type="radio" name="gender" id="female" value = "Female" <?php  if ( isset( $_POST["viewSubmit"] ) || isset($_POST["updateSubmit"]) && $gender == "Female" ){print 'checked';}?>>Female
                                    </label>
                                   	</div>
                                    <span class='text-danger'> <?php echo $genderError; ?></span>
                           </div>
                          
							<p>
								<input type="submit" value="Update" name="updateSubmit" id="updateSubmit" class="btn btn-info"/>
								<input type="submit" value="View" name="viewSubmit" id="viewSubmit" class="btn btn-info" />
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
