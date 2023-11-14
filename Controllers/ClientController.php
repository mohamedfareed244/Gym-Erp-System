<?php

include_once "../Models/ClientModel.php";

session_start();

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
    else{
        $fname=$_POST['lname'];
        if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
            $lnameErr="Only alphabets and white space are allowed";
            $isValid = false;
        }
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
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);


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
            $newClient->Password=$hashedPassword;

            $result = $client->addClient($newClient);

            if ($result) {
                // Data inserted successfully
                header("Location: ../views/login.php");
                exit();
            }
        
    }

            // If the login was unsuccessful, redirect back to the login page with error messages
            $_SESSION["fnameErr"] = $fnameErr;
            $_SESSION["lnameErr"] = $lnameErr;
            $_SESSION["ageErr"] = $ageErr;
            $_SESSION["genderErr"] = $genderErr;
            $_SESSION["emailErr"] = $emailErr;
            $_SESSION["passwordErr"] = $passwordErr;
            header("Location: ../views/register.php");
            exit(); 
}


public function login()
{
    $emailErr = $passwordErr = $allErr= ""; // Initialize error variables

    $client = new Client();
    
        $isValid = true;
    
         if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $isValid = false;
        } 
    
     if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $isValid = false;
    } 
    
    
    
    
    if ($isValid) {
        // Validation successful, save data to the database
        $Email = $_POST["email"];
        $Password = $_POST["password"];
    
        $result=$client->checkIfClientExists($Email);
    
    
        if ($row=mysqli_fetch_array($result)) {
            $storedHashedPassword = $row["Password"];
            if (password_verify($Password, $storedHashedPassword)) {
                // Authentication successful
                $_SESSION["ID"] = $row[0];
                $_SESSION["FName"] = $row["FirstName"];
                $_SESSION["LName"] = $row["LastName"];
                $_SESSION["Age"] = $row["Age"];
                $_SESSION["Gender"] = $row["Gender"];
                $_SESSION["Email"] = $row["Email"];
                header("Location: ../views/userprofile.php");
                exit();
            } else {
                // Password is incorrect
                $passwordErr = "Incorrect password. Try Again.";
            }
        } else {
            // Client does not exist
            $allErr = "Wrong email and password. Try Again.";
        }
    }
    
    
        // If the login was unsuccessful, redirect back to the login page with error messages
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["passwordErr"] = $passwordErr;
        $_SESSION["allErr"] = $allErr;
        header("Location: ../views/login.php");
        exit(); 
    

}

public function updateClientInfo()
{
    $isValid = true;
    $fnameErr = $lnameErr = $emailErr = $allErr = "";

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Validate first name
    if (empty($firstname)) {
        $fnameErr = "First Name is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $fnameErr = "Only alphabets and white space are allowed";
        $isValid = false;
    }

    // Validate last name
    if (empty($lastname)) {
        $lnameErr = "Last Name is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lnameErr = "Only alphabets and white space are allowed";
        $isValid = false;
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Email is required";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

    // Validate password
    if (!empty($password) && empty($confirmPassword)) {
        $isValid = false;
        $allErr = "Please confirm password.";
    } else if ($password != $confirmPassword) {
        $isValid = false;
        $allErr = "Password and Confirm password don't match.";
    }


    if ($isValid) {
        $client = new Client();

        $updatedClient = new Client();
        $updatedClient->FirstName = $firstname;
        $updatedClient->LastName = $lastname;
        $updatedClient->Email = $email;
        $updatedClient->Password = $password;

        $result = $client->updateClient($updatedClient);

        if ($result) {
            $_SESSION["FName"] = $firstname;
            $_SESSION["LName"] = $lastname;
            $_SESSION["Email"] = $email;
            header("Location: ../views/userprofsettings.php");
            $_SESSION["succ"] = "Updated Successfully";
            exit();
        }
    }

    // If there are validation errors or update fails, set session variables and redirect
    $_SESSION["fnameErr"] = $fnameErr;
    $_SESSION["lnameErr"] = $lnameErr;
    $_SESSION["emailErr"] = $emailErr;
    $_SESSION["allErr"] = $allErr;
    header("Location: ../views/userprofsettings.php");
    exit();
}

}

$controller = new ClientController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "register":
            $controller->register();
            break;
        case "login":
            $controller->login();
            break;
        case "update":
            $controller->updateClientInfo();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}


?>
