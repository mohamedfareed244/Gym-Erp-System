<?php
require_once ("../includes/dbh.inc.php");

function getauth(){
    global $conn;
$sql="SELECT * FROM authority";

$result=mysqli_query($conn,$sql);
return $result;
}
function getjobtitles(){
    echo "in titles";
    global $conn;
    $sql="SELECT * FROM job_titles";
    $result=mysqli_query($conn,$sql);
    echo "in titles";
    return $result;
}
?>

