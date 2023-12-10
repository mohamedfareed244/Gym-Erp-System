<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $input_data = json_decode(file_get_contents('php://input'), true);
    $start = $input_data['start'];
    $end =$input_data['end'];
    echo $start;
}
?>