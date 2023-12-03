<?php
include_once "../Models/ClassesModel.php";

// Check if classId is set in the POST request
if (isset($_POST['coachId'])) {
    $coachId = $_POST['coachId'];

    // Call your function to get days by class ID
    $Classes = new Classes();
    $results = $Classes->getSelectedCoachClasses($coachId);

    $response = '';
    $response .= "<table class='table'>";
    $response .= "<thead>";
    $response .= "<tr>";
    $response .= "<td>id</td>";
    $response .= "<td>title</td>";
    $response .= "<td>From</td>";
    $response .= "<td>To</td>";
    $response .= "<td>Days</td>";
    $response .= "</tr>";
    $response .= "</thead>";
    $response .= "<tbody>";


    foreach ($results as $result) {
        $startTime = new DateTime($result['StartTime']);
        $endTime = new DateTime($result['EndTime']);
        
        // Format the DateTime object as "H:i" (24-hour format)
        $startformattedDate = $startTime->format("H:i");
        $endformattedDate = $endTime->format("H:i");

        $response .= "<tr>";
        $response .= "<td>" . $result['CoachID'] . "</td>";
        $response .= "<td>" .  $result['ClassName'] . "</td>";
        $response .= "<td>" . $startformattedDate . "</td>";
        $response .= "<td>" . $endformattedDate . "</td>";
        $response .= "<td>" . $result['Date'] . "</td>";
        $response .= "</tr>";
    }
    $response .= "</tbody>";
    $response .= "<br>";
    $response .= "</table>";

    // Return the response
    echo $response;
}
?>
