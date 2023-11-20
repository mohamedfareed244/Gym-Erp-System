<?php
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once "../Models/CoachesModel.php";
    $data = json_decode(file_get_contents("php://input"), true);
    $id;
    foreach ($data as $key => $value) {
        $id = $value;
    }
    $result = Coach::getClassesForCoach($id);
    $arr = [];

    $arr['key'] = 'hello';
    // foreach($result as $row){
    //     $arr[]='key'=>'hello';

    // }
    if ($data !== null) {
        $response = ['message' => 'This is a POST request.', 'data' => $arr];
        echo json_encode($response);
    } else {
        $response = ['error' => 'Invalid JSON data.'];
        echo json_encode($response);
    }
}
