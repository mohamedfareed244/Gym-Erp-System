<?php

$fnameErr = $lnameErr = $ageErr = $genderErr = $emailErr = $passwordErr = ""; // Initialize error variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the "First Name" field
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    }
    else{
        $fname=$_POST['fname'];
        if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
            $fnameErr="Only alphabets and white space are allowed";
        }
    }


// Validate the "Last Name" field
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    }

    // Validate the "Age" field
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } elseif (!filter_var($_POST["age"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 16, "max_range" => 100)))) {
        $ageErr = "Invalid age. Must be between 16 and 100.";
    }

    // Validate the "Gender" field
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    }

    // Validate the "Email" field
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Validate the "Password" field
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $passwordErr = "Password must be at least 6 characters long";
    }

    // Prepare the response data
    $response = array(
        "success" => empty($fnameErr) && empty($lnameErr) && empty($ageErr) && empty($genderErr) && empty($emailErr) && empty($passwordErr),
        "errors" => array(
            "fname" => $fnameErr,
            "lname" => $lnameErr,
            "age" => $ageErr,
            "gender" => $genderErr,
            "email" => $emailErr,
            "password" => $passwordErr
        )
    );


    if($response=="success"){

    }
    // Send the response as JSON
    echo json_encode($response);


}
?>