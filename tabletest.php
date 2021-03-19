
<form action="onload()" method="post">
<?php
    	session_cache_limiter('private_no_expire');

echo "<table class='table'>";
  echo "<tr>
  <th>Complain ID</th>
  <th>Date</th>
  <th>Easy to Ride</th>
  <th>Clean and Neat</th>
  <th>Facility</th>
  <th>Comments</th>
  </tr>";

class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
}
include 'dbconnect.php' ;
  $stmt=$conn->prepare("SELECT complainID,date,easyToRide,cleanAndNeat,facility,comment
 FROM complain ORDER BY complainID DESC LIMIT 10");
    $stmt->execute();
  $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v){
    	echo $v;
 

   }
   

?>
</form>
