<?php
require("../Models/ReportModel.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){

    $input_data = json_decode(file_get_contents('php://input'), true);
    $start = $input_data['start'];
    $end =$input_data['end'];
// $obj=new Report();
// $result=$obj->getsoldpackages($start,$end);
$word="";
// foreach($result as $res){
// $word.=$res["Title"];
// }
    echo $start;
}
?>