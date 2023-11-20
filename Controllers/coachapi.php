<?php
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once "../Models/CoachesModel.php";
    $data = json_decode(file_get_contents("php://input"), true);
    $id;
    foreach ($data as $key => $value) {
       $id=$value;
    }
    $daysarr=array();
    $result=Coach::getClassesForCoach($id);
   foreach ($result as $row){
    $result1=Coach::getclassdays($row['ID']);
    $daysarr[$row['ID']]=array();
    foreach ($result1 as $row1){
$
    }
   }
$arr=[];
$arr['key']='hello';
$arr['key1']='hello';
$arr['key2']='hello';

    if ($data !== null) {
        $response = ['message' => 'This is a POST request.', 'data' => $arr];
        echo json_encode($response);
    } else {
        $response = ['error' => 'Invalid JSON data.'];
        echo json_encode($response);
    }
}
?>