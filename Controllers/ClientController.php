<?php

include_once "../Models/ClientModel.php";


class ClientController{

function register(){

$fnameErr = $lnameErr = $ageErr = $genderErr = $emailErr = $passwordErr = "";

    $isValid = true;

    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $isValid = false;
    }
    else{
        $fname=$_POST['fname'];
        if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
            $fnameErr="Only alphabets and white space are allowed";
            $isValid = false;
        }
    }


// Validate the "Last Name" field
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $isValid = false;
    }

    // Validate the "Age" field
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $isValid = false;
    } elseif (!filter_var($_POST["age"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 16, "max_range" => 100)))) {
        $ageErr = "Invalid age. Must be between 16 and 100.";
        $isValid = false;
    }

    // Validate the "Gender" field
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $isValid = false;
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

 if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $isValid = false;
} else if (strlen($_POST["password"]) < 6) {
    $passwordErr = "Password must be at least 6 characters long";
    $isValid = false;
} 

$client = new Client();

$Fname = htmlspecialchars($_POST["fname"]);
$Lname = htmlspecialchars($_POST["lname"]);
$Age = htmlspecialchars($_POST["age"]);
$Gender = htmlspecialchars($_POST["gender"]);
$Email = htmlspecialchars($_POST["email"]);
$Password = htmlspecialchars($_POST["password"]);


$emailExists = $client->checkExistingEmail($Email);
if ($emailExists) {
    $emailErr = "This email is already registered.";
    $isValid=false;
}

    if ($isValid) {

        if (!empty($_POST["weight"])) {
            $Weight = htmlspecialchars($_POST["weight"]);
        } else {
            $Weight = '';  // Set to an empty string
        }

        if (!empty($_POST["height"])) {
            $Height = htmlspecialchars($_POST["height"]);
        } else {
            $Height = '';  // Set to an empty string
        }


            $newClient= new Client();
            $newClient->FirstName=$Fname;
            $newClient->LastName=$Lname;
            $newClient->Age=$Age;
            $newClient->Gender=$Gender;
            $newClient->Height=$Height;
            $newClient->Weight=$Weight;
            $newClient->Email=$Email;
            $newClient->Password=$Password;

            $result = $client->addClient($newClient);

            if ($result) {
                // Data inserted successfully
                header("Location: ../views/login.php");
                exit();
            }
        
    }
}
}

$controller = new ClientController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "register":
            $controller->register();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}


?>
