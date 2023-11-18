<?php
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data !== null) {
        $response = ['message' => 'This is a POST request.', 'data' => $data];
        echo json_encode($response);
    } else {
        $response = ['error' => 'Invalid JSON data.'];
        echo json_encode($response);
    }
}
?>