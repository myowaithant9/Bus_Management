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
                					   
					       		<?php 
include 'dbconnect.php';
if (isset($_POST['go']))
{
	$road_from=$_POST['road_from'];
		$road_to=$_POST['road_to'];
?><div class="row">
					<div class="col-md-8 col-md-offset-2">
<div class="card">
					       <div class="header">
                                <h4 class="title">Choose Bus Stops</h4>
                            </div>
					       		<div class="content">
					               <form role="form" action="" method="post" id="form">
<div class="form-group">

<div class="form-group">
		<label>From <?php echo " " ."$road_from";?></label>
        <div class="input-group">		

<?php 

$road_from_sql=$conn->query("SELECT  COUNT(*) FROM yellow WHERE road LIKE '%$road_from%'  ");
$road_from_res=$road_from_sql->fetchColumn();
if($road_from_res>0){
	
$s1=$conn->query("SELECT  departure FROM yellow WHERE road LIKE '%$road_from%'  ");?>
		        <select name="busStop_from" class="form-control" >
	
	<?php foreach ($s1 as $row1) {?>
	
	        <option value="<?php echo $row1['departure'];?>"><?php echo $row1['departure'];?></option>
<?php  }?>
</select>
</div>                              
</div>	
<?php }?>
       <div class="form-group">
		<label>To<?php echo " "."$road_to";?></label>
        <div class="input-group">		
 <?php  
$road_to_sql=$conn->query("SELECT  COUNT(*) FROM yellow WHERE road LIKE '%$road_to%'  ");
$road_to_res=$road_to_sql->fetchColumn();
if($road_to_res>0){
	
$s2=$conn->query("SELECT  departure, arrival FROM yellow WHERE road LIKE '%$road_to%'  ");?>
		        <select name="busStop_to" class="form-control" >                                                     

	<?php foreach ($s2 as $row2) {?>
		 	<option value="<?php echo $row2['departure'];?>"><?php echo $row2['departure'];?></option>
	<?php }	 foreach ($s2 as $ro2) {?>
	
		<option value="<?php echo $ro2['arrival'];?>"><?php echo $ro2['arrival'];?></option>
<?php  }?>
</select>
</div>                              
</div>
<?php }
 
?>
			<button type="submit" class="btn btn-primary" name="plan">Plan Trip</button>
          <button  class="btn btn-primary" onclick="goBack()">Back</button>
</div>
</form><script>
     function goBack()
     { 
       document.getElementById("form").action="yellowSchedule.php";
       document.forms("form").submit();
     }
     </script>
                             	</div><!--  -->
                       	</div>	</div>
                     </div>
                     <?php }?>
                    
    	<?php 	if (isset($_POST['plan']))
					{?>
					<div class="row">
							<div class="col-md-8 col-md-offset-2">
						 
					   			<div class="card">
					       			<div class="header">
                               			 <h4 class="title">Bus Stops & Fares</h4>
                            		</div>
					       		<div class="content">
					       		<p>Fares 200 kyats</p>
					       		<div class="table-responsive">

<table class="table table-bordered table-hover">
<thead>
<tr>
<td><strong>From</strong></td>
<td><strong>To</strong></td>
<td><strong>Duration</strong></td>
</tr>
</thead>
<?php 	$busStop_from=$_POST['busStop_from'];
		$busStop_to=$_POST['busStop_to'];
$sql1=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'  "); 
foreach ($sql1 as $row1) {
	$bid1=$row1['Schedule_ID'];
}
$sql2=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%' "); 
foreach ($sql2 as $row2) {
	$bid2=$row2['Schedule_ID'];
}

$bid=$bid2-$bid1; 
if($bid==0){
$sql3=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%' "); 
foreach ($sql3 as $row3) {
	
$depart3=$row3['departure'];
	$arri3=$row3['arrival'];
	$duration3=$row3['duration'];?>	<tbody>
		<tr>
<td><?php 	echo $depart3;?></td>
		<td><?php 	echo $arri3;?></td>
		<td><?php 	echo $duration3;?></td>	
		</tr>
	</tbody>
<?php }}
else if($bid==1){
	$sql5=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'  "); 
foreach ($sql5 as $row5) {
	$depart5=$row5['departure'];
	$arri5=$row5['arrival'];
	$duration5=$row5['duration'];?>
	<tbody>
		<tr><td><?php 	echo $depart5;?></td>
		<td><?php 	echo $arri5;?></td>
		<td><?php 	echo $duration5;?></td>
	</tr></tbody>
	<?php }
$sql4=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql4 as $row4) {
	$departure4=$row4['departure'];
	$arrival4=$row4['arrival'];
	$duration4=$row4['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure4;?></td>
		<td><?php 	echo $arrival4;?></td>
		<td><?php 	echo $duration4;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==2){
 $sql6=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql6 as $row6){
 		$departure6=$row6['departure'];
	$arrival6=$row6['arrival'];
	$duration6=$row6['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure6;?></td>
		<td><?php 	echo $arrival6;?></td>
		<td><?php 	echo $duration6;?></td>
	</tr>
	</tbody><?php }
	$sql7=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival6%'");
 foreach($sql7 as $row7){
 		$departure7=$row7['departure'];
	$arrival7=$row7['arrival'];
	$duration7=$row7['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure7;?></td>
		<td><?php 	echo $arrival7;?></td>
		<td><?php 	echo $duration7;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql8=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql8 as $row8) {
	$departure8=$row8['departure'];
	$arrival8=$row8['arrival'];
	$duration8=$row8['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure8;?></td>
		<td><?php 	echo $arrival8;?></td>
		<td><?php 	echo $duration8;?></td>
	</tr>
	</tbody>
 <?php 
 }
 }
else if($bid==3){
 $sql9=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql9 as $row9){
 		$departure9=$row9['departure'];
	$arrival9=$row9['arrival'];
	$duration9=$row9['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure9;?></td>
		<td><?php 	echo $arrival9;?></td>
		<td><?php 	echo $duration9;?></td>
	</tr>
	</tbody><?php }
	$sql10=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival9%'");
 foreach($sql10 as $row10){
 		$departure10=$row10['departure'];
	$arrival10=$row10['arrival'];
	$duration10=$row10['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure10;?></td>
		<td><?php 	echo $arrival10;?></td>
		<td><?php 	echo $duration10;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql11=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival10%'  "); 
foreach ($sql11 as $row11) {
	$departure11=$row11['departure'];
	$arrival11=$row11['arrival'];
	$duration11=$row11['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure11;?></td>
		<td><?php 	echo $arrival11?></td>
		<td><?php 	echo $duration11;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql12=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql12 as $row12) {
	$departure12=$row12['departure'];
	$arrival12=$row12['arrival'];
	$duration12=$row12['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure12;?></td>
		<td><?php 	echo $arrival12?></td>
		<td><?php 	echo $duration12;?></td>
	</tr>
	</tbody>
 <?php 
 }
 }
else if($bid==4){
 $sql13=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql13 as $row13){
 		$departure13=$row13['departure'];
	$arrival13=$row13['arrival'];
	$duration13=$row13['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure13;?></td>
		<td><?php 	echo $arrival13;?></td>
		<td><?php 	echo $duration13;?></td>
	</tr>
	</tbody><?php }
	$sql14=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival13%'");
 foreach($sql14 as $row14){
 		$departure14=$row14['departure'];
	$arrival14=$row14['arrival'];
	$duration14=$row14['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure14;?></td>
		<td><?php 	echo $arrival14;?></td>
		<td><?php 	echo $duration14;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql15=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival14%'  "); 
foreach ($sql15 as $row15) {
	$departure15=$row15['departure'];
	$arrival15=$row15['arrival'];
	$duration15=$row15['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure15;?></td>
		<td><?php 	echo $arrival15?></td>
		<td><?php 	echo $duration15;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql16=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival15%'  "); 
foreach ($sql16 as $row16) {
	$departure16=$row16['departure'];
	$arrival16=$row16['arrival'];
	$duration16=$row16['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure16;?></td>
		<td><?php 	echo $arrival16?></td>
		<td><?php 	echo $duration16;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql17=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql17 as $row17) {
	$departure17=$row17['departure'];
	$arrival17=$row17['arrival'];
	$duration17=$row17['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure17;?></td>
		<td><?php 	echo $arrival17?></td>
		<td><?php 	echo $duration17;?></td>
	</tr>
	</tbody>
 <?php 
 }
 }
 else if($bid==5){
 $sql18=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql18 as $row18){
 		$departure18=$row18['departure'];
	$arrival18=$row18['arrival'];
	$duration18=$row18['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure18;?></td>
		<td><?php 	echo $arrival18;?></td>
		<td><?php 	echo $duration18;?></td>
	</tr>
	</tbody><?php }
	$sql19=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival18%'");
 foreach($sql19 as $row19){
 		$departure19=$row19['departure'];
	$arrival19=$row19['arrival'];
	$duration19=$row19['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure19;?></td>
		<td><?php 	echo $arrival19;?></td>
		<td><?php 	echo $duration19;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql20=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival19%'  "); 
foreach ($sql20 as $row20) {
	$departure20=$row20['departure'];
	$arrival20=$row20['arrival'];
	$duration20=$row20['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure20;?></td>
		<td><?php 	echo $arrival20?></td>
		<td><?php 	echo $duration20;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql21=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival20%'  "); 
foreach ($sql21 as $row21) {
	$departure21=$row21['departure'];
	$arrival21=$row21['arrival'];
	$duration21=$row21['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure21;?></td>
		<td><?php 	echo $arrival21?></td>
		<td><?php 	echo $duration21?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql22=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival21%'  "); 
foreach ($sql22 as $row22) {
	$departure22=$row22['departure'];
	$arrival22=$row22['arrival'];
	$duration22=$row22['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure22;?></td>
		<td><?php 	echo $arrival22?></td>
		<td><?php 	echo $duration22?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql23=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql23 as $row23) {
	$departure23=$row23['departure'];
	$arrival23=$row23['arrival'];
	$duration23=$row23['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure23;?></td>
		<td><?php 	echo $arrival23?></td>
		<td><?php 	echo $duration23;?></td>
	</tr>
	</tbody>
 <?php 
 }
 }
else if($bid==6){
 $sql24=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql24 as $row24){
 		$departure24=$row24['departure'];
	$arrival24=$row24['arrival'];
	$duration24=$row24['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure24;?></td>
		<td><?php 	echo $arrival24;?></td>
		<td><?php 	echo $duration24;?></td>
	</tr>
	</tbody><?php }
	$sql25=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival24%'");
 foreach($sql25 as $row25){
 		$departure25=$row25['departure'];
	$arrival25=$row25['arrival'];
	$duration25=$row25['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure25;?></td>
		<td><?php 	echo $arrival25;?></td>
		<td><?php 	echo $duration25;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql26=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival25%'  "); 
foreach ($sql26 as $row26) {
	$departure26=$row26['departure'];
	$arrival26=$row26['arrival'];
	$duration26=$row26['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure26;?></td>
		<td><?php 	echo $arrival26?></td>
		<td><?php 	echo $duration26;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql27=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival26%'  "); 
foreach ($sql27 as $row27) {
	$departure27=$row27['departure'];
	$arrival27=$row27['arrival'];
	$duration27=$row27['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure27;?></td>
		<td><?php 	echo $arrival27?></td>
		<td><?php 	echo $duration27?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql28=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival27%'  "); 
foreach ($sql28 as $row28) {
	$departure28=$row28['departure'];
	$arrival28=$row28['arrival'];
	$duration28=$row28['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure28;?></td>
		<td><?php 	echo $arrival28?></td>
		<td><?php 	echo $duration28?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql29=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival28%'  "); 
foreach ($sql29 as $row29) {
	$departure29=$row29['departure'];
	$arrival29=$row29['arrival'];
	$duration29=$row29['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure29;?></td>
		<td><?php 	echo $arrival29?></td>
		<td><?php 	echo $duration29?></td>
	</tr>
	</tbody>
 <?php 
 }
 
$sql30=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql30 as $row30) {
	$departure30=$row30['departure'];
	$arrival30=$row30['arrival'];
	$duration30=$row30['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure30;?></td>
		<td><?php 	echo $arrival30?></td>
		<td><?php 	echo $duration30;?></td>
	</tr>
	</tbody>
 <?php 
 }
 }
 
else if($bid==7){
 $sql31=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql31 as $row31){
 		$departure31=$row31['departure'];
	$arrival31=$row31['arrival'];
	$duration31=$row31['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure31;?></td>
		<td><?php 	echo $arrival31;?></td>
		<td><?php 	echo $duration31;?></td>
	</tr>
	</tbody><?php }
	$sql32=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival31%'");
 foreach($sql32 as $row32){
 		$departure32=$row32['departure'];
	$arrival32=$row32['arrival'];
	$duration32=$row32['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure32;?></td>
		<td><?php 	echo $arrival32;?></td>
		<td><?php 	echo $duration32;?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql33=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival32%'  "); 
foreach ($sql33 as $row33) {
	$departure33=$row33['departure'];
	$arrival33=$row33['arrival'];
	$duration33=$row33['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure33;?></td>
		<td><?php 	echo $arrival33?></td>
		<td><?php 	echo $duration33;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql34=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival33%'  "); 
foreach ($sql34 as $row34) {
	$departure34=$row34['departure'];
	$arrival34=$row34['arrival'];
	$duration34=$row34['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure34;?></td>
		<td><?php 	echo $arrival34?></td>
		<td><?php 	echo $duration34?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql35=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival34%'  "); 
foreach ($sql35 as $row35) {
	$departure35=$row35['departure'];
	$arrival35=$row35['arrival'];
	$duration35=$row35['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure35;?></td>
		<td><?php 	echo $arrival35?></td>
		<td><?php 	echo $duration35?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql366=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival35%'  "); 
foreach ($sql366 as $row366) {
	$departure366=$row366['departure'];
	$arrival366=$row366['arrival'];
	$duration366=$row366['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure366;?></td>
		<td><?php 	echo $arrival366?></td>
		<td><?php 	echo $duration366?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql36=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival366%'  "); 
foreach ($sql36 as $row36) {
	$departure36=$row36['departure'];
	$arrival36=$row36['arrival'];
	$duration36=$row36['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure36;?></td>
		<td><?php 	echo $arrival36?></td>
		<td><?php 	echo $duration36?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql37=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql37 as $row37) {
	$departure37=$row37['departure'];
	$arrival37=$row37['arrival'];
	$duration37=$row37['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure37;?></td>
		<td><?php 	echo $arrival37?></td>
		<td><?php 	echo $duration37?></td>
	</tr>
	</tbody>
 <?php 
 } /*
$sql38=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql38 as $row38) {
	$departure38=$row38['departure'];
	$arrival38=$row38['arrival'];
	$duration38=$row38['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure38;?></td>
		<td><?php 	echo $arrival38?></td>
		<td><?php 	echo $duration38;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 }
else if($bid==8){
 $sql39=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql39 as $row39){
 		$departure39=$row39['departure'];
	$arrival39=$row39['arrival'];
	$duration39=$row39['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure39;?></td>
		<td><?php 	echo $arrival39;?></td>
		<td><?php 	echo $duration39;?></td>
	</tr>
	</tbody><?php }
	$sql40=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival39%'");
 foreach($sql40 as $row40){
 		$departure40=$row40['departure'];
	$arrival40=$row40['arrival'];
	$duration40=$row40['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure40;?></td>
		<td><?php 	echo $arrival40;?></td>
		<td><?php 	echo $duration40?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql41=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival40%'  "); 
foreach ($sql41 as $row41) {
	$departure41=$row41['departure'];
	$arrival41=$row41['arrival'];
	$duration41=$row41['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure41;?></td>
		<td><?php 	echo $arrival41?></td>
		<td><?php 	echo $duration41;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql42=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival41%'  "); 
foreach ($sql42 as $row42) {
	$departure42=$row42['departure'];
	$arrival42=$row42['arrival'];
	$duration42=$row42['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure42;?></td>
		<td><?php 	echo $arrival42?></td>
		<td><?php 	echo $duration42?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql43=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival42%'  "); 
foreach ($sql43 as $row43) {
	$departure43=$row43['departure'];
	$arrival43=$row43['arrival'];
	$duration43=$row43['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure43;?></td>
		<td><?php 	echo $arrival43?></td>
		<td><?php 	echo $duration43?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql44=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival43%'  "); 
foreach ($sql44 as $row44) {
	$departure44=$row44['departure'];
	$arrival44=$row44['arrival'];
	$duration44=$row44['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure44;?></td>
		<td><?php 	echo $arrival44?></td>
		<td><?php 	echo $duration44?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql45=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival44%'  "); 
foreach ($sql45 as $row45) {
	$departure45=$row45['departure'];
	$arrival45=$row45['arrival'];
	$duration45=$row45['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure45;?></td>
		<td><?php 	echo $arrival45?></td>
		<td><?php 	echo $duration45?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql46=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival45%'  "); 
foreach ($sql46 as $row46) {
	$departure46=$row46['departure'];
	$arrival46=$row46['arrival'];
	$duration46=$row46['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure46;?></td>
		<td><?php 	echo $arrival46?></td>
		<td><?php 	echo $duration46?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql47=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql47 as $row47) {
	$departure47=$row47['departure'];
	$arrival47=$row47['arrival'];
	$duration47=$row47['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure47;?></td>
		<td><?php 	echo $arrival47?></td>
		<td><?php 	echo $duration47;?></td>
	</tr>
	</tbody>
 <?php 
 }/*
$sql48=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql48 as $row48) {
	$departure48=$row48['departure'];
	$arrival48=$row48['arrival'];
	$duration48=$row48['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure48;?></td>
		<td><?php 	echo $arrival48?></td>
		<td><?php 	echo $duration48;?></td>
	</tr>
	</tbody>
 <?php  
 }*/
 }
 else if($bid==9){
 $sql49=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql49 as $row49){
 		$departure49=$row49['departure'];
	$arrival49=$row49['arrival'];
	$duration49=$row49['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure49;?></td>
		<td><?php 	echo $arrival49;?></td>
		<td><?php 	echo $duration49;?></td>
	</tr>
	</tbody><?php }
	$sql50=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival49%'");
 foreach($sql50 as $row50){
 		$departure50=$row50['departure'];
	$arrival50=$row50['arrival'];
	$duration50=$row50['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure50;?></td>
		<td><?php 	echo $arrival50;?></td>
		<td><?php 	echo $duration50?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql51=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival50%'  "); 
foreach ($sql51 as $row51) {
	$departure51=$row51['departure'];
	$arrival51=$row51['arrival'];
	$duration51=$row51['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure51;?></td>
		<td><?php 	echo $arrival51?></td>
		<td><?php 	echo $duration51;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql52=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival51%'  "); 
foreach ($sql52 as $row52) {
	$departure52=$row52['departure'];
	$arrival52=$row52['arrival'];
	$duration52=$row52['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure52;?></td>
		<td><?php 	echo $arrival52?></td>
		<td><?php 	echo $duration52?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql53=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival52%'  "); 
foreach ($sql53 as $row53) {
	$departure53=$row53['departure'];
	$arrival53=$row53['arrival'];
	$duration53=$row53['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure53;?></td>
		<td><?php 	echo $arrival53?></td>
		<td><?php 	echo $duration53?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql54=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival53%'  "); 
foreach ($sql54 as $row54) {
	$departure54=$row54['departure'];
	$arrival54=$row54['arrival'];
	$duration54=$row54['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure54;?></td>
		<td><?php 	echo $arrival54?></td>
		<td><?php 	echo $duration54?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql55=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival54%'  "); 
foreach ($sql55 as $row55) {
	$departure55=$row55['departure'];
	$arrival55=$row55['arrival'];
	$duration55=$row55['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure55;?></td>
		<td><?php 	echo $arrival55?></td>
		<td><?php 	echo $duration55?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql56=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival55%'  "); 
foreach ($sql56 as $row56) {
	$departure56=$row56['departure'];
	$arrival56=$row56['arrival'];
	$duration56=$row56['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure56;?></td>
		<td><?php 	echo $arrival56?></td>
		<td><?php 	echo $duration56?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql57=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival56%'  "); 
foreach ($sql57 as $row57) {
	$departure57=$row57['departure'];
	$arrival57=$row57['arrival'];
	$duration57=$row57['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure57;?></td>
		<td><?php 	echo $arrival57?></td>
		<td><?php 	echo $duration57;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql58=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql58 as $row58) {
	$departure58=$row58['departure'];
	$arrival58=$row58['arrival'];
	$duration58=$row58['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure58;?></td>
		<td><?php 	echo $arrival58?></td>
		<td><?php 	echo $duration58;?></td>
	</tr>
	</tbody>
 <?php 
 }/*
 $sql59=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql59 as $row59) {
	$departure59=$row59['departure'];
	$arrival59=$row59['arrival'];
	$duration59=$row59['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure59;?></td>
		<td><?php 	echo $arrival59?></td>
		<td><?php 	echo $duration59;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 }
 else if($bid==10){
 $sql60=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql60 as $row60){
 		$departure60=$row60['departure'];
	$arrival60=$row60['arrival'];
	$duration60=$row60['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure60;?></td>
		<td><?php 	echo $arrival60;?></td>
		<td><?php 	echo $duration60;?></td>
	</tr>
	</tbody><?php }
	$sql61=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival60%'");
 foreach($sql61 as $row61){
 		$departure61=$row61['departure'];
	$arrival61=$row61['arrival'];
	$duration61=$row61['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure61;?></td>
		<td><?php 	echo $arrival61;?></td>
		<td><?php 	echo $duration61?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql62=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival61%'  "); 
foreach ($sql62 as $row62) {
	$departure62=$row62['departure'];
	$arrival62=$row62['arrival'];
	$duration62=$row62['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure62;?></td>
		<td><?php 	echo $arrival62?></td>
		<td><?php 	echo $duration62;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql63=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival62%'  "); 
foreach ($sql63 as $row63) {
	$departure63=$row63['departure'];
	$arrival63=$row63['arrival'];
	$duration63=$row63['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure63;?></td>
		<td><?php 	echo $arrival63?></td>
		<td><?php 	echo $duration63?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql64=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival63%'  "); 
foreach ($sql64 as $row64) {
	$departure64=$row64['departure'];
	$arrival64=$row64['arrival'];
	$duration64=$row64['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure64;?></td>
		<td><?php 	echo $arrival64?></td>
		<td><?php 	echo $duration64?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql65=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival64%'  "); 
foreach ($sql65 as $row65) {
	$departure65=$row65['departure'];
	$arrival65=$row65['arrival'];
	$duration65=$row65['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure65;?></td>
		<td><?php 	echo $arrival65?></td>
		<td><?php 	echo $duration65?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql66=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival65%'  "); 
foreach ($sql66 as $row66) {
	$departure66=$row66['departure'];
	$arrival66=$row66['arrival'];
	$duration66=$row66['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure66;?></td>
		<td><?php 	echo $arrival66?></td>
		<td><?php 	echo $duration66?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql67=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival66%'  "); 
foreach ($sql67 as $row67) {
	$departure67=$row67['departure'];
	$arrival67=$row67['arrival'];
	$duration67=$row67['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure67;?></td>
		<td><?php 	echo $arrival67?></td>
		<td><?php 	echo $duration67?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql68=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival67%'  "); 
foreach ($sql68 as $row68) {
	$departure68=$row68['departure'];
	$arrival68=$row68['arrival'];
	$duration68=$row68['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure68;?></td>
		<td><?php 	echo $arrival68?></td>
		<td><?php 	echo $duration68;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql69=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival68%'  "); 
foreach ($sql69 as $row69) {
	$departure69=$row69['departure'];
	$arrival69=$row69['arrival'];
	$duration69=$row69['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure69;?></td>
		<td><?php 	echo $arrival69?></td>
		<td><?php 	echo $duration69;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql70=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql70 as $row70) {
	$departure70=$row70['departure'];
	$arrival70=$row70['arrival'];
	$duration70=$row70['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure70;?></td>
		<td><?php 	echo $arrival70?></td>
		<td><?php 	echo $duration70;?></td>
	</tr>
	</tbody>
 <?php 
 }/*
 $sql71=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql71 as $row71) {
	$departure71=$row71['departure'];
	$arrival71=$row71['arrival'];
	$duration71=$row71['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure71;?></td>
		<td><?php 	echo $arrival71?></td>
		<td><?php 	echo $duration71;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 }
else if($bid==11){
 $sql72=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql72 as $row72){
 		$departure72=$row72['departure'];
	$arrival72=$row72['arrival'];
	$duration72=$row72['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure72;?></td>
		<td><?php 	echo $arrival72;?></td>
		<td><?php 	echo $duration72;?></td>
	</tr>
	</tbody><?php }
	$sql73=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival72%'");
 foreach($sql73 as $row73){
 		$departure73=$row73['departure'];
	$arrival73=$row73['arrival'];
	$duration73=$row73['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure73;?></td>
		<td><?php 	echo $arrival73;?></td>
		<td><?php 	echo $duration73?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql74=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival73%'  "); 
foreach ($sql74 as $row74) {
	$departure74=$row74['departure'];
	$arrival74=$row74['arrival'];
	$duration74=$row74['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure74;?></td>
		<td><?php 	echo $arrival74?></td>
		<td><?php 	echo $duration74;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql75=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival74%'  "); 
foreach ($sql75 as $row75) {
	$departure75=$row75['departure'];
	$arrival75=$row75['arrival'];
	$duration75=$row75['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure75;?></td>
		<td><?php 	echo $arrival75?></td>
		<td><?php 	echo $duration75?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql76=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival75%'  "); 
foreach ($sql76 as $row76) {
	$departure76=$row76['departure'];
	$arrival76=$row76['arrival'];
	$duration76=$row76['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure76;?></td>
		<td><?php 	echo $arrival76?></td>
		<td><?php 	echo $duration76?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql77=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival76%'  "); 
foreach ($sql77 as $row77) {
	$departure77=$row77['departure'];
	$arrival77=$row77['arrival'];
	$duration77=$row77['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure77;?></td>
		<td><?php 	echo $arrival77?></td>
		<td><?php 	echo $duration77?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql78=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival77%'  "); 
foreach ($sql78 as $row78) {
	$departure78=$row78['departure'];
	$arrival78=$row78['arrival'];
	$duration78=$row78['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure78;?></td>
		<td><?php 	echo $arrival78?></td>
		<td><?php 	echo $duration78?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql79=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival78%'  "); 
foreach ($sql79 as $row79) {
	$departure79=$row79['departure'];
	$arrival79=$row79['arrival'];
	$duration79=$row79['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure79;?></td>
		<td><?php 	echo $arrival79?></td>
		<td><?php 	echo $duration79?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql80=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival79%'  "); 
foreach ($sql80 as $row80) {
	$departure80=$row80['departure'];
	$arrival80=$row80['arrival'];
	$duration80=$row80['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure80;?></td>
		<td><?php 	echo $arrival80?></td>
		<td><?php 	echo $duration80;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql81=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival80%'  "); 
foreach ($sql81 as $row81) {
	$departure81=$row81['departure'];
	$arrival81=$row81['arrival'];
	$duration81=$row81['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure81;?></td>
		<td><?php 	echo $arrival81?></td>
		<td><?php 	echo $duration81;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql82=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival81%'  "); 
foreach ($sql82 as $row82) {
	$departure82=$row82['departure'];
	$arrival82=$row82['arrival'];
	$duration82=$row82['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure82;?></td>
		<td><?php 	echo $arrival82?></td>
		<td><?php 	echo $duration82;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql83=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql83 as $row83) {
	$departure83=$row83['departure'];
	$arrival83=$row83['arrival'];
	$duration83=$row83['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure83;?></td>
		<td><?php 	echo $arrival83?></td>
		<td><?php 	echo $duration83;?></td>
	</tr>
	</tbody>
 <?php 
 }
 /*
$sql84=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql84 as $row84) {
	$departure84=$row84['departure'];
	$arrival84=$row84['arrival'];
	$duration84=$row84['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure84;?></td>
		<td><?php 	echo $arrival84?></td>
		<td><?php 	echo $duration84;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 }
 else if($bid==12){
 $sql85=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql85 as $row85){
 		$departure85=$row85['departure'];
	$arrival85=$row85['arrival'];
	$duration85=$row85['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure85;?></td>
		<td><?php 	echo $arrival85;?></td>
		<td><?php 	echo $duration85;?></td>
	</tr>
	</tbody><?php }
	$sql86=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival85%'");
 foreach($sql86 as $row86){
 		$departure86=$row86['departure'];
	$arrival86=$row86['arrival'];
	$duration86=$row86['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure86;?></td>
		<td><?php 	echo $arrival86;?></td>
		<td><?php 	echo $duration86?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql87=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival86%'  "); 
foreach ($sql87 as $row87) {
	$departure87=$row87['departure'];
	$arrival87=$row87['arrival'];
	$duration87=$row87['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure87;?></td>
		<td><?php 	echo $arrival87?></td>
		<td><?php 	echo $duration87;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql88=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival87%'  "); 
foreach ($sql88 as $row88) {
	$departure88=$row88['departure'];
	$arrival88=$row88['arrival'];
	$duration88=$row88['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure88;?></td>
		<td><?php 	echo $arrival88?></td>
		<td><?php 	echo $duration88?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql89=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival88%'  "); 
foreach ($sql89 as $row89) {
	$departure89=$row89['departure'];
	$arrival89=$row89['arrival'];
	$duration89=$row89['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure89;?></td>
		<td><?php 	echo $arrival89?></td>
		<td><?php 	echo $duration89?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql90=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival89%'  "); 
foreach ($sql90 as $row90) {
	$departure90=$row90['departure'];
	$arrival90=$row90['arrival'];
	$duration90=$row90['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure90;?></td>
		<td><?php 	echo $arrival90?></td>
		<td><?php 	echo $duration90?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql91=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival90%'  "); 
foreach ($sql91 as $row91) {
	$departure91=$row91['departure'];
	$arrival91=$row91['arrival'];
	$duration91=$row91['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure91;?></td>
		<td><?php 	echo $arrival91?></td>
		<td><?php 	echo $duration91?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql92=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival91%'  "); 
foreach ($sql92 as $row92) {
	$departure92=$row92['departure'];
	$arrival92=$row92['arrival'];
	$duration92=$row92['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure92;?></td>
		<td><?php 	echo $arrival92?></td>
		<td><?php 	echo $duration92?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql93=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival92%'  "); 
foreach ($sql93 as $row93) {
	$departure93=$row93['departure'];
	$arrival93=$row93['arrival'];
	$duration93=$row93['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure93;?></td>
		<td><?php 	echo $arrival93?></td>
		<td><?php 	echo $duration93;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql94=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival93%'  "); 
foreach ($sql94 as $row94) {
	$departure94=$row94['departure'];
	$arrival94=$row94['arrival'];
	$duration94=$row94['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure94;?></td>
		<td><?php 	echo $arrival94?></td>
		<td><?php 	echo $duration94;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql95=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival94%'  "); 
foreach ($sql95 as $row95) {
	$departure95=$row95['departure'];
	$arrival95=$row95['arrival'];
	$duration95=$row95['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure95;?></td>
		<td><?php 	echo $arrival95?></td>
		<td><?php 	echo $duration95;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql96=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival95%'  "); 
foreach ($sql96 as $row96) {
	$departure96=$row96['departure'];
	$arrival96=$row96['arrival'];
	$duration96=$row96['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure96;?></td>
		<td><?php 	echo $arrival96?></td>
		<td><?php 	echo $duration96;?></td>
	</tr>
	</tbody>
 <?php 
 }
 
$sql97=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql97 as $row97) {
	$departure97=$row97['departure'];
	$arrival97=$row97['arrival'];
	$duration97=$row97['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure97;?></td>
		<td><?php 	echo $arrival97?></td>
		<td><?php 	echo $duration97;?></td>
	</tr>
	</tbody>
 <?php 
 }/*
 $sql98=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql98 as $row98) {
	$departure98=$row98['departure'];
	$arrival98=$row98['arrival'];
	$duration98=$row98['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure98;?></td>
		<td><?php 	echo $arrival98?></td>
		<td><?php 	echo $duration98;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 } 
 else if($bid==13){
 $sql99=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_from%'");
 foreach($sql99 as $row99){
 		$departure99=$row99['departure'];
	$arrival99=$row99['arrival'];
	$duration99=$row99['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure99;?></td>
		<td><?php 	echo $arrival99;?></td>
		<td><?php 	echo $duration99;?></td>
	</tr>
	</tbody><?php }
	$sql100=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival99%'");
 foreach($sql100 as $row100){
 		$departure100=$row100['departure'];
	$arrival100=$row100['arrival'];
	$duration100=$row100['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure100;?></td>
		<td><?php 	echo $arrival100;?></td>
		<td><?php 	echo $duration100?></td>
	</tr>
	</tbody><?php 
	
 }
 
 $sql101=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival100%'  "); 
foreach ($sql101 as $row101) {
	$departure101=$row101['departure'];
	$arrival101=$row101['arrival'];
	$duration101=$row101['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure101;?></td>
		<td><?php 	echo $arrival101?></td>
		<td><?php 	echo $duration101;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql102=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival101%'  "); 
foreach ($sql102 as $row102) {
	$departure102=$row102['departure'];
	$arrival102=$row102['arrival'];
	$duration102=$row102['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure102;?></td>
		<td><?php 	echo $arrival102?></td>
		<td><?php 	echo $duration102?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql103=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival102%'  "); 
foreach ($sql103 as $row103) {
	$departure103=$row103['departure'];
	$arrival103=$row103['arrival'];
	$duration103=$row103['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure103;?></td>
		<td><?php 	echo $arrival103?></td>
		<td><?php 	echo $duration103?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql104=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival103%'  "); 
foreach ($sql104 as $row104) {
	$departure104=$row104['departure'];
	$arrival104=$row104['arrival'];
	$duration104=$row104['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure104;?></td>
		<td><?php 	echo $arrival104?></td>
		<td><?php 	echo $duration104?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql105=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival104%'  "); 
foreach ($sql105 as $row105) {
	$departure105=$row105['departure'];
	$arrival105=$row105['arrival'];
	$duration105=$row105['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure105;?></td>
		<td><?php 	echo $arrival105?></td>
		<td><?php 	echo $duration105?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql106=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival105%'  "); 
foreach ($sql106 as $row106) {
	$departure106=$row106['departure'];
	$arrival106=$row106['arrival'];
	$duration106=$row106['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure106;?></td>
		<td><?php 	echo $arrival106?></td>
		<td><?php 	echo $duration106?></td>
	</tr>
	</tbody>
 <?php 
 } 
$sql107=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival106%'  "); 
foreach ($sql107 as $row107) {
	$departure107=$row107['departure'];
	$arrival107=$row107['arrival'];
	$duration107=$row107['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure107;?></td>
		<td><?php 	echo $arrival107?></td>
		<td><?php 	echo $duration107;?></td>
	</tr>
	</tbody>
 <?php 
 }
$sql108=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival107%'  "); 
foreach ($sql108 as $row108) {
	$departure108=$row108['departure'];
	$arrival108=$row108['arrival'];
	$duration108=$row108['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure108;?></td>
		<td><?php 	echo $arrival108?></td>
		<td><?php 	echo $duration108;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql109=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival108%'  "); 
foreach ($sql109 as $row109) {
	$departure109=$row109['departure'];
	$arrival109=$row109['arrival'];
	$duration109=$row109['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure109;?></td>
		<td><?php 	echo $arrival109?></td>
		<td><?php 	echo $duration109;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql110=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival109%'  "); 
foreach ($sql110 as $row110) {
	$departure110=$row110['departure'];
	$arrival110=$row110['arrival'];
	$duration110=$row110['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure110;?></td>
		<td><?php 	echo $arrival110?></td>
		<td><?php 	echo $duration110;?></td>
	</tr>
	</tbody>
 <?php 
 }
 
$sql111=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$arrival110%'  "); 
foreach ($sql111 as $row111) {
	$departure111=$row111['departure'];
	$arrival111=$row111['arrival'];
	$duration111=$row111['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure111;?></td>
		<td><?php 	echo $arrival111?></td>
		<td><?php 	echo $duration111;?></td>
	</tr>
	</tbody>
 <?php 
 }
 $sql112=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql112 as $row112) {
	$departure112=$row112['departure'];
	$arrival112=$row112['arrival'];
	$duration112=$row112['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure112;?></td>
		<td><?php 	echo $arrival112?></td>
		<td><?php 	echo $duration112;?></td>
	</tr>
	</tbody>
 <?php 
 }/*
 $sql113=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_to%'  "); 
foreach ($sql113 as $row113) {
	$departure113=$row113['departure'];
	$arrival113=$row113['arrival'];
	$duration113=$row113['duration'];?>
	<tbody>
	<tr>
		<td><?php 	echo $departure113;?></td>
		<td><?php 	echo $arrival113?></td>
		<td><?php 	echo $duration113;?></td>
	</tr>
	</tbody>
 <?php 
 }*/
 }
    //...............subtraction of schedule_id is negative................ 
 
 
else if($bid==-2){
 $s1=$conn->query("SELECT * FROM yellow WHERE departure LIKE '%$busStop_to%' "); 
foreach ($s1 as $r1) {
	$dp1=$r1['departure'];
	$a1=$r1['arrival'];
	$d1=$r1['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a1;?></td>
			<td><?php 	echo $dp1;?></td>
			<td><?php 	echo $d1;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-3){
 $s2=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s2 as $r2) {
	$dp2=$r2['departure'];
	$a2=$r2['arrival'];
	$d2=$r2['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a2;?></td>
			<td><?php 	echo $dp2;?></td>
			<td><?php 	echo $d2;?></td>
	</tr>
	</tbody>
<?php }
$s3=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp2%' "); 
foreach ($s3 as $r3) {
	$dp3=$r3['departure'];
	$a3=$r3['arrival'];
	$d3=$r3['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a3;?></td>
			<td><?php 	echo $dp3;?></td>
			<td><?php 	echo $d3;?></td>
	</tr>
	</tbody>
<?php }

 }
else if($bid==-4){
 $s4=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s4 as $r4) {
	$dp4=$r4['departure'];
	$a4=$r4['arrival'];
	$d4=$r4['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a4;?></td>
			<td><?php 	echo $dp4;?></td>
			<td><?php 	echo $d4;?></td>
	</tr>
	</tbody>
<?php }
$s5=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp4%' "); 
foreach ($s5 as $r5) {
	$dp5=$r5['departure'];
	$a5=$r5['arrival'];
	$d5=$r5['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a5;?></td>
			<td><?php 	echo $dp5;?></td>
			<td><?php 	echo $d5;?></td>
	</tr>
	</tbody>
<?php }
$s6=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp5%' "); 
foreach ($s6 as $r6) {
	$dp6=$r6['departure'];
	$a6=$r6['arrival'];
	$d6=$r6['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a6;?></td>
			<td><?php 	echo $dp6;?></td>
			<td><?php 	echo $d6;?></td>
	</tr>
	</tbody>
<?php }
 } 
else if($bid==-5){
 $s7=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s7 as $r7) {
	$dp7=$r7['departure'];
	$a7=$r7['arrival'];
	$d7=$r7['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a7;?></td>
			<td><?php 	echo $dp7;?></td>
			<td><?php 	echo $d7;?></td>
	</tr>
	</tbody>
<?php }
$s8=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp7%' "); 
foreach ($s8 as $r8) {
	$dp8=$r8['departure'];
	$a8=$r8['arrival'];
	$d8=$r8['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a8;?></td>
			<td><?php 	echo $dp8;?></td>
			<td><?php 	echo $d8;?></td>
	</tr>
	</tbody>
<?php }
$s9=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp8%' "); 
foreach ($s9 as $r9) {
	$dp9=$r9['departure'];
	$a9=$r9['arrival'];
	$d9=$r9['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a9;?></td>
			<td><?php 	echo $dp9;?></td>
			<td><?php 	echo $d9;?></td>
	</tr>
	</tbody>
<?php }
$s10=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp9%' "); 
foreach ($s10 as $r10) {
	$dp10=$r10['departure'];
	$a10=$r10['arrival'];
	$d10=$r10['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a10;?></td>
			<td><?php 	echo $dp10;?></td>
			<td><?php 	echo $d10;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-6){
 $s11=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s11 as $r11) {
	$dp11=$r11['departure'];
	$a11=$r11['arrival'];
	$d11=$r11['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a11;?></td>
			<td><?php 	echo $dp11;?></td>
			<td><?php 	echo $d11;?></td>
	</tr>
	</tbody>
<?php }
$s12=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp11%' "); 
foreach ($s12 as $r12) {
	$dp12=$r12['departure'];
	$a12=$r12['arrival'];
	$d12=$r12['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a12;?></td>
			<td><?php 	echo $dp12;?></td>
			<td><?php 	echo $d12;?></td>
	</tr>
	</tbody>
<?php }
$s13=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp12%' "); 
foreach ($s13 as $r13) {
	$dp13=$r13['departure'];
	$a13=$r13['arrival'];
	$d13=$r13['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a13;?></td>
			<td><?php 	echo $dp13;?></td>
			<td><?php 	echo $d13;?></td>
	</tr>
	</tbody>
<?php }
$s14=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp13%' "); 
foreach ($s14 as $r14) {
	$dp14=$r14['departure'];
	$a14=$r14['arrival'];
	$d14=$r14['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a14;?></td>
			<td><?php 	echo $dp14;?></td>
			<td><?php 	echo $d14;?></td>
	</tr>
	</tbody>
<?php }
$s15=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp14%' "); 
foreach ($s15 as $r15) {
	$dp15=$r15['departure'];
	$a15=$r15['arrival'];
	$d15=$r15['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a15;?></td>
			<td><?php 	echo $dp15;?></td>
			<td><?php 	echo $d15;?></td>
	</tr>
	</tbody>
<?php }
 }
 else if($bid==-7){
 $s16=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s16 as $r16) {
	$dp16=$r16['departure'];
	$a16=$r16['arrival'];
	$d16=$r16['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a16;?></td>
			<td><?php 	echo $dp16;?></td>
			<td><?php 	echo $d16;?></td>
	</tr>
	</tbody>
<?php }
$s17=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp16%' "); 
foreach ($s17 as $r17) {
	$dp17=$r17['departure'];
	$a17=$r17['arrival'];
	$d17=$r17['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a17;?></td>
			<td><?php 	echo $dp17;?></td>
			<td><?php 	echo $d17;?></td>
	</tr>
	</tbody>
<?php }
$s18=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp17%' "); 
foreach ($s18 as $r18) {
	$dp18=$r18['departure'];
	$a18=$r18['arrival'];
	$d18=$r18['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a18;?></td>
			<td><?php 	echo $dp18;?></td>
			<td><?php 	echo $d18;?></td>
	</tr>
	</tbody>
<?php }
$s19=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp18%' "); 
foreach ($s19 as $r19) {
	$dp19=$r19['departure'];
	$a19=$r19['arrival'];
	$d19=$r19['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a19;?></td>
			<td><?php 	echo $dp19;?></td>
			<td><?php 	echo $d19;?></td>
	</tr>
	</tbody>
<?php }
$s20=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp19%' "); 
foreach ($s20 as $r20) {
	$dp20=$r20['departure'];
	$a20=$r20['arrival'];
	$d20=$r20['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a20;?></td>
			<td><?php 	echo $dp20;?></td>
			<td><?php 	echo $d20;?></td>
	</tr>
	</tbody>
<?php }
 $s21=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp20%' "); 
foreach ($s21 as $r21) {
	$dp21=$r21['departure'];
	$a21=$r21['arrival'];
	$d21=$r21['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a21;?></td>
			<td><?php 	echo $dp21;?></td>
			<td><?php 	echo $d21;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-8){
 $s22=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s22 as $r22) {
	$dp22=$r22['departure'];
	$a22=$r22['arrival'];
	$d22=$r22['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a22;?></td>
			<td><?php 	echo $dp22;?></td>
			<td><?php 	echo $d22;?></td>
	</tr>
	</tbody>
<?php }
$s23=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp22%' "); 
foreach ($s23 as $r23) {
	$dp23=$r23['departure'];
	$a23=$r23['arrival'];
	$d23=$r23['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a23;?></td>
			<td><?php 	echo $dp23;?></td>
			<td><?php 	echo $d23;?></td>
	</tr>
	</tbody>
<?php }
$s24=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp23%' "); 
foreach ($s24 as $r24) {
	$dp24=$r24['departure'];
	$a24=$r24['arrival'];
	$d24=$r24['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a24;?></td>
			<td><?php 	echo $dp24;?></td>
			<td><?php 	echo $d24;?></td>
	</tr>
	</tbody>
<?php }
$s222=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp24%' "); 
foreach ($s222 as $r222) {
	$dp222=$r222['departure'];
	$a222=$r222['arrival'];
	$d222=$r222['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a222;?></td>
			<td><?php 	echo $dp222;?></td>
			<td><?php 	echo $d222;?></td>
	</tr>
	</tbody>
<?php }
$s25=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp222%' "); 
foreach ($s25 as $r25) {
	$dp25=$r25['departure'];
	$a25=$r25['arrival'];
	$d25=$r25['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a25;?></td>
			<td><?php 	echo $dp25;?></td>
			<td><?php 	echo $d25;?></td>
	</tr>
	</tbody>
<?php }
 $s26=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp25%' "); 
foreach ($s26 as $r26) {
	$dp26=$r26['departure'];
	$a26=$r26['arrival'];
	$d26=$r26['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a26;?></td>
			<td><?php 	echo $dp26;?></td>
			<td><?php 	echo $d26;?></td>
	</tr>
	</tbody>
<?php }
$s27=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp26%' "); 
foreach ($s27 as $r27) {
	$dp27=$r27['departure'];
	$a27=$r27['arrival'];
	$d27=$r27['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a27;?></td>
			<td><?php 	echo $dp27;?></td>
			<td><?php 	echo $d27;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-9){
 $s28=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s28 as $r28) {
	$dp28=$r28['departure'];
	$a28=$r28['arrival'];
	$d28=$r28['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a28;?></td>
			<td><?php 	echo $dp28;?></td>
			<td><?php 	echo $d28;?></td>
	</tr>
	</tbody>
<?php }
$s29=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp28%' "); 
foreach ($s29 as $r29) {
	$dp29=$r29['departure'];
	$a29=$r29['arrival'];
	$d29=$r29['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a29;?></td>
			<td><?php 	echo $dp29;?></td>
			<td><?php 	echo $d29;?></td>
	</tr>
	</tbody>
<?php }
$s30=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp29%' "); 
foreach ($s30 as $r30) {
	$dp30=$r30['departure'];
	$a30=$r30['arrival'];
	$d30=$r30['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a30;?></td>
			<td><?php 	echo $dp30;?></td>
			<td><?php 	echo $d30;?></td>
	</tr>
	</tbody>
<?php }
$s31=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp30%' "); 
foreach ($s31 as $r31) {
	$dp31=$r31['departure'];
	$a31=$r31['arrival'];
	$d31=$r31['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a31;?></td>
			<td><?php 	echo $dp31;?></td>
			<td><?php 	echo $d31;?></td>
	</tr>
	</tbody>
<?php }
$s32=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp31%' "); 
foreach ($s32 as $r32) {
	$dp32=$r32['departure'];
	$a32=$r32['arrival'];
	$d32=$r32['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a32;?></td>
			<td><?php 	echo $dp32;?></td>
			<td><?php 	echo $d32;?></td>
	</tr>
	</tbody>
<?php }
 $s33=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp32%' "); 
foreach ($s33 as $r33) {
	$dp33=$r33['departure'];
	$a33=$r33['arrival'];
	$d33=$r33['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a33;?></td>
			<td><?php 	echo $dp33;?></td>
			<td><?php 	echo $d33;?></td>
	</tr>
	</tbody>
<?php }
$s34=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp33%' "); 
foreach ($s34 as $r34) {
	$dp34=$r34['departure'];
	$a34=$r34['arrival'];
	$d34=$r34['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a34;?></td>
			<td><?php 	echo $dp34;?></td>
			<td><?php 	echo $d34;?></td>
	</tr>
	</tbody>
<?php }
$s35=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp34%' "); 
foreach ($s35 as $r35) {
	$dp35=$r35['departure'];
	$a35=$r35['arrival'];
	$d35=$r35['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a35;?></td>
			<td><?php 	echo $dp35;?></td>
			<td><?php 	echo $d35;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-10){
 $s36=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s36 as $r36) {
	$dp36=$r36['departure'];
	$a36=$r36['arrival'];
	$d36=$r36['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a36;?></td>
			<td><?php 	echo $dp36;?></td>
			<td><?php 	echo $d36;?></td>
	</tr>
	</tbody>
<?php }
$s37=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp36%' "); 
foreach ($s37 as $r37) {
	$dp37=$r37['departure'];
	$a37=$r37['arrival'];
	$d37=$r37['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a37;?></td>
			<td><?php 	echo $dp37;?></td>
			<td><?php 	echo $d37;?></td>
	</tr>
	</tbody>
<?php }
$s38=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp37%' "); 
foreach ($s38 as $r38) {
	$dp38=$r38['departure'];
	$a38=$r38['arrival'];
	$d38=$r38['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a38;?></td>
			<td><?php 	echo $dp38;?></td>
			<td><?php 	echo $d38;?></td>
	</tr>
	</tbody>
<?php }
$s39=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp38%' "); 
foreach ($s39 as $r39) {
	$dp39=$r39['departure'];
	$a39=$r39['arrival'];
	$d39=$r39['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a39;?></td>
			<td><?php 	echo $dp39;?></td>
			<td><?php 	echo $d39;?></td>
	</tr>
	</tbody>
<?php }
$s40=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp39%' "); 
foreach ($s40 as $r40) {
	$dp40=$r40['departure'];
	$a40=$r40['arrival'];
	$d40=$r40['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a40;?></td>
			<td><?php 	echo $dp40;?></td>
			<td><?php 	echo $d40;?></td>
	</tr>
	</tbody>
<?php }
 $s41=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp40%' "); 
foreach ($s41 as $r41) {
	$dp41=$r41['departure'];
	$a41=$r41['arrival'];
	$d41=$r41['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a41;?></td>
			<td><?php 	echo $dp41;?></td>
			<td><?php 	echo $d41;?></td>
	</tr>
	</tbody>
<?php }
$s42=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp41%' "); 
foreach ($s42 as $r42) {
	$dp42=$r42['departure'];
	$a42=$r42['arrival'];
	$d42=$r42['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a42;?></td>
			<td><?php 	echo $dp42;?></td>
			<td><?php 	echo $d42;?></td>
	</tr>
	</tbody>
<?php }
$s43=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp42%' "); 
foreach ($s43 as $r43) {
	$dp43=$r43['departure'];
	$a43=$r43['arrival'];
	$d43=$r43['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a43;?></td>
			<td><?php 	echo $dp43;?></td>
			<td><?php 	echo $d43;?></td>
	</tr>
	</tbody>
<?php }
$s44=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp43%' "); 
foreach ($s44 as $r44) {
	$dp44=$r44['departure'];
	$a44=$r44['arrival'];
	$d44=$r44['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a44;?></td>
			<td><?php 	echo $dp44;?></td>
			<td><?php 	echo $d44;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-11){
 $s45=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s45 as $r45) {
	$dp45=$r45['departure'];
	$a45=$r45['arrival'];
	$d45=$r45['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a45;?></td>
			<td><?php 	echo $dp45;?></td>
			<td><?php 	echo $d45;?></td>
	</tr>
	</tbody>
<?php }
$s46=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp45%' "); 
foreach ($s46 as $r46) {
	$dp46=$r46['departure'];
	$a46=$r46['arrival'];
	$d46=$r46['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a46;?></td>
			<td><?php 	echo $dp46;?></td>
			<td><?php 	echo $d46;?></td>
	</tr>
	</tbody>
<?php }
$s47=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp46%' "); 
foreach ($s47 as $r47) {
	$dp47=$r47['departure'];
	$a47=$r47['arrival'];
	$d47=$r47['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a47;?></td>
			<td><?php 	echo $dp47;?></td>
			<td><?php 	echo $d47;?></td>
	</tr>
	</tbody>
<?php }
$s48=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp47%' "); 
foreach ($s48 as $r48) {
	$dp48=$r48['departure'];
	$a48=$r48['arrival'];
	$d48=$r48['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a48;?></td>
			<td><?php 	echo $dp48;?></td>
			<td><?php 	echo $d48;?></td>
	</tr>
	</tbody>
<?php }
$s49=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp48%' "); 
foreach ($s49 as $r49) {
	$dp49=$r49['departure'];
	$a49=$r49['arrival'];
	$d49=$r49['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a49;?></td>
			<td><?php 	echo $dp49;?></td>
			<td><?php 	echo $d49;?></td>
	</tr>
	</tbody>
<?php }
 $s50=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp49%' "); 
foreach ($s50 as $r50) {
	$dp50=$r50['departure'];
	$a50=$r50['arrival'];
	$d50=$r50['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a50;?></td>
			<td><?php 	echo $dp50;?></td>
			<td><?php 	echo $d50;?></td>
	</tr>
	</tbody>
<?php }
$s51=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp50%' "); 
foreach ($s51 as $r51) {
	$dp51=$r51['departure'];
	$a51=$r51['arrival'];
	$d51=$r51['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a51;?></td>
			<td><?php 	echo $dp51;?></td>
			<td><?php 	echo $d51;?></td>
	</tr>
	</tbody>
<?php }
$s52=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp51%' "); 
foreach ($s52 as $r52) {
	$dp52=$r52['departure'];
	$a52=$r52['arrival'];
	$d52=$r52['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a52;?></td>
			<td><?php 	echo $dp52;?></td>
			<td><?php 	echo $d52;?></td>
	</tr>
	</tbody>
<?php }
$s53=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp52%' "); 
foreach ($s53 as $r53) {
	$dp53=$r53['departure'];
	$a53=$r53['arrival'];
	$d53=$r53['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a53;?></td>
			<td><?php 	echo $dp53;?></td>
			<td><?php 	echo $d53;?></td>
	</tr>
	</tbody>
<?php }
$s54=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp53%' "); 
foreach ($s54 as $r54) {
	$dp54=$r54['departure'];
	$a54=$r54['arrival'];
	$d54=$r54['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a54;?></td>
			<td><?php 	echo $dp54;?></td>
			<td><?php 	echo $d54;?></td>
	</tr>
	</tbody>
<?php }
 }
 else if($bid==-12){
 $s55=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s55 as $r55) {
	$dp55=$r55['departure'];
	$a55=$r55['arrival'];
	$d55=$r55['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a55;?></td>
			<td><?php 	echo $dp55;?></td>
			<td><?php 	echo $d55;?></td>
	</tr>
	</tbody>
<?php }
$s56=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp55%' "); 
foreach ($s56 as $r56) {
	$dp56=$r56['departure'];
	$a56=$r56['arrival'];
	$d56=$r56['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a56;?></td>
			<td><?php 	echo $dp56;?></td>
			<td><?php 	echo $d56;?></td>
	</tr>
	</tbody>
<?php }
$s57=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp56%' "); 
foreach ($s57 as $r57) {
	$dp57=$r57['departure'];
	$a57=$r57['arrival'];
	$d57=$r57['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a57;?></td>
			<td><?php 	echo $dp57;?></td>
			<td><?php 	echo $d57;?></td>
	</tr>
	</tbody>
<?php }
$s58=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp57%' "); 
foreach ($s58 as $r58) {
	$dp58=$r58['departure'];
	$a58=$r58['arrival'];
	$d58=$r58['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a58;?></td>
			<td><?php 	echo $dp58;?></td>
			<td><?php 	echo $d58;?></td>
	</tr>
	</tbody>
<?php }
$s59=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp58%' "); 
foreach ($s59 as $r59) {
	$dp59=$r59['departure'];
	$a59=$r59['arrival'];
	$d59=$r59['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a59;?></td>
			<td><?php 	echo $dp59;?></td>
			<td><?php 	echo $d59;?></td>
	</tr>
	</tbody>
<?php }
 $s60=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp59%' "); 
foreach ($s60 as $r60) {
	$dp60=$r60['departure'];
	$a60=$r60['arrival'];
	$d60=$r60['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a60;?></td>
			<td><?php 	echo $dp60;?></td>
			<td><?php 	echo $d60;?></td>
	</tr>
	</tbody>
<?php }
$s61=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp60%' "); 
foreach ($s61 as $r61) {
	$dp61=$r61['departure'];
	$a61=$r61['arrival'];
	$d61=$r61['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a61;?></td>
			<td><?php 	echo $dp61;?></td>
			<td><?php 	echo $d61;?></td>
	</tr>
	</tbody>
<?php }
$s62=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp61%' "); 
foreach ($s62 as $r62) {
	$dp62=$r62['departure'];
	$a62=$r62['arrival'];
	$d62=$r62['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a62;?></td>
			<td><?php 	echo $dp62;?></td>
			<td><?php 	echo $d62;?></td>
	</tr>
	</tbody>
<?php }
$s63=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp62%' "); 
foreach ($s63 as $r63) {
	$dp63=$r63['departure'];
	$a63=$r63['arrival'];
	$d63=$r63['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a63;?></td>
			<td><?php 	echo $dp63;?></td>
			<td><?php 	echo $d63;?></td>
	</tr>
	</tbody>
<?php }
					$s64=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp63%' "); 
foreach ($s64 as $r64) {
	$dp64=$r64['departure'];
	$a64=$r64['arrival'];
	$d64=$r64['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a64;?></td>
			<td><?php 	echo $dp64;?></td>
			<td><?php 	echo $d64;?></td>
	</tr>
	</tbody>
<?php }
 $s65=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp64%' "); 
foreach ($s65 as $r65) {
	$dp65=$r65['departure'];
	$a65=$r65['arrival'];
	$d65=$r65['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a65;?></td>
			<td><?php 	echo $dp65;?></td>
			<td><?php 	echo $d65;?></td>
	</tr>
	</tbody>
<?php }
 }
else if($bid==-13){
 $s66=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$busStop_from%' "); 
foreach ($s66 as $r66) {
	$dp66=$r66['departure'];
	$a66=$r66['arrival'];
	$d66=$r66['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a66;?></td>
			<td><?php 	echo $dp66;?></td>
			<td><?php 	echo $d66;?></td>
	</tr>
	</tbody>
<?php }
$s67=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp66%' "); 
foreach ($s67 as $r67) {
	$dp67=$r67['departure'];
	$a67=$r67['arrival'];
	$d67=$r67['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a67;?></td>
			<td><?php 	echo $dp67;?></td>
			<td><?php 	echo $d67;?></td>
	</tr>
	</tbody>
<?php }
$s68=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp67%' "); 
foreach ($s68 as $r68) {
	$dp68=$r68['departure'];
	$a68=$r68['arrival'];
	$d68=$r68['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a68;?></td>
			<td><?php 	echo $dp68;?></td>
			<td><?php 	echo $d68;?></td>
	</tr>
	</tbody>
<?php }
$s69=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp68%' "); 
foreach ($s69 as $r69) {
	$dp69=$r69['departure'];
	$a69=$r69['arrival'];
	$d69=$r69['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a69;?></td>
			<td><?php 	echo $dp69;?></td>
			<td><?php 	echo $d69;?></td>
	</tr>
	</tbody>
<?php }
$s70=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp69%' "); 
foreach ($s70 as $r70) {
	$dp70=$r70['departure'];
	$a70=$r70['arrival'];
	$d70=$r70['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a70;?></td>
			<td><?php 	echo $dp70;?></td>
			<td><?php 	echo $d70;?></td>
	</tr>
	</tbody>
<?php }
 $s71=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp70%' "); 
foreach ($s71 as $r71) {
	$dp71=$r71['departure'];
	$a71=$r71['arrival'];
	$d71=$r71['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a71;?></td>
			<td><?php 	echo $dp71;?></td>
			<td><?php 	echo $d71;?></td>
	</tr>
	</tbody>
<?php }
$s72=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp71%' "); 
foreach ($s72 as $r72) {
	$dp72=$r72['departure'];
	$a72=$r72['arrival'];
	$d72=$r72['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a72;?></td>
			<td><?php 	echo $dp72;?></td>
			<td><?php 	echo $d72;?></td>
	</tr>
	</tbody>
<?php }
$s73=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp72%' "); 
foreach ($s73 as $r73) {
	$dp73=$r73['departure'];
	$a73=$r73['arrival'];
	$d73=$r73['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a73;?></td>
			<td><?php 	echo $dp73;?></td>
			<td><?php 	echo $d73;?></td>
	</tr>
	</tbody>
<?php }
$s74=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp73%' "); 
foreach ($s74 as $r74) {
	$dp74=$r74['departure'];
	$a74=$r74['arrival'];
	$d74=$r74['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a74;?></td>
			<td><?php 	echo $dp74;?></td>
			<td><?php 	echo $d74;?></td>
	</tr>
	</tbody>
<?php }
					$s75=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp74%' "); 
foreach ($s75 as $r75) {
	$dp75=$r75['departure'];
	$a75=$r75['arrival'];
	$d75=$r75['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a75;?></td>
			<td><?php 	echo $dp75;?></td>
			<td><?php 	echo $d75;?></td>
	</tr>
	</tbody>
<?php }
 $s76=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp75%' "); 
foreach ($s76 as $r76) {
	$dp76=$r76['departure'];
	$a76=$r76['arrival'];
	$d76=$r76['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a76;?></td>
			<td><?php 	echo $dp76;?></td>
			<td><?php 	echo $d76;?></td>
	</tr>
	</tbody>
<?php }
$s77=$conn->query("SELECT * FROM yellow WHERE arrival LIKE '%$dp76%' "); 
foreach ($s77 as $r77) {
	$dp77=$r77['departure'];
	$a77=$r77['arrival'];
	$d77=$r77['duration'];?>
	<tbody>
		<tr>
			<td><?php 	echo $a77;?></td>
			<td><?php 	echo $dp77;?></td>
			<td><?php 	echo $d77;?></td>
	</tr>
	</tbody>
<?php }
 }
?>

										</table>
							          
									</div>
					   			</div>
                    		</div>
                    	</div>
                    </div>
 <?php }?>			    
 
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