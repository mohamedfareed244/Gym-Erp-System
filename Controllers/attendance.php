<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include_once "../Models/AttendanceModel.php";

    $json_data = file_get_contents("php://input");
    $decoded_data = json_decode($json_data, true);
    $date = $decoded_data["date"];


    foreach ($decoded_data as $key => $value) {
        $x=$value;
        if ($key !== "date") {

            $key = str_replace('emp', '', $key);

            $attendance = new Attendance();
            $attendance->attendanceforemp($key, $value, $date);
        }
    }
    echo json_encode(["status" => "success"]);
    // echo json_encode(["status" => "success"]);
}
?>
