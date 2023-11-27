<?php
include_once "../Models/ClassesModel.php";

if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];

    $days = Classes::getClassDaysById($classId);

    $response = "";
    $response .= "<label for='days' style='font-size:16px;'> Select Day/s : </label>";
    $daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    foreach ($days as $day) {
        // Find the index of the selected day in the days of the week array
        $dayIndex = array_search($day, $daysOfWeek);

        // Calculate the corresponding date for the next occurrence of the selected day
        $nextOccurrence = date('Y-m-d', strtotime("next {$daysOfWeek[$dayIndex]}"));

        $response .= "<div class='form-check form-switch'>";
        $response .= "<input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' name='days[]' value='{$nextOccurrence}'>";
        $response .= "<label class='form-check-label' for='flexSwitchCheckDefault'>{$day} ({$nextOccurrence})</label>";
        $response .= "</div>";
        $response .= "<br>";
    }
    echo $response;
}
?>
