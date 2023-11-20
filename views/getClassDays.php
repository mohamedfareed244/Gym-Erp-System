<?php
include_once "../Models/ClassesModel.php";

// Check if classId is set in the POST request
if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];

    // Call your function to get days by class ID
    $days = Classes::getClassDaysById($classId);

    // Output the checkboxes for each day
    $response = '';
    $response .= "<label  for='days' style='font-size:16px;'> Select Day/s : </label>";
    foreach ($days as $day) {
        $response .= "<div class='form-check form-switch'>";
        $response .= "<input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' name='days[]' value='{$day}'>";
        $response .= "<label class='form-check-label' for='flexSwitchCheckDefault'>{$day}</label>";
        $response .= "</div>";
        $response .= "<br>";
    }

    // Return the response
    echo $response;
}
?>
