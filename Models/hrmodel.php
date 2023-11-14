<?php
require_once ("../includes/dbh.inc.php");

function getauth(){
    global $conn;
$sql="SELECT * FROM authority";

$result=mysqli_query($conn,$sql);
return $result;
}
?>

