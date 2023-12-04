<?php

session_start();

require_once("Controller.php");
require_once("../Models/ClientModel.php");

class ClientController extends Controller
{

    function register()
    {

        $fnameErr = $lnameErr = $ageErr = $genderErr = $phonenoErr = $emailErr = $passwordErr = "";

        $isValid = true;

        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
            $isValid = false;
        } else {
            $fname = $_POST['fname'];
            if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                $fnameErr = "Only alphabets and white space are allowed";
                $isValid = false;
            }
        }


        // Validate the "Last Name" field
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
            $isValid = false;
        } else {
            $lname = $_POST['lname'];
            if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                $lnameErr = "Only alphabets and white space are allowed";
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

        if (empty($_POST["phone"])) {
            $phonenoErr = "Phone Number is required";
            $isValid = false;
        } else {
            // Regular expression for a valid 10-digit phone number
            $phoneRegex = '/^0\d{10}$/';

            if (!preg_match($phoneRegex, $_POST["phone"])) {
                $phonenoErr = "Invalid phone number format";
                $isValid = false;
            }
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
        $Phone = htmlspecialchars($_POST["phone"]);
        $Email = htmlspecialchars($_POST["email"]);
        $Password = htmlspecialchars($_POST["password"]);
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);


        $emailExists = $client->checkExistingEmail($Email);
        if ($emailExists) {
            $emailErr = "This email is already registered.";
            $isValid = false;
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


            $newClient = new Client();
            $newClient->setFirstName($Fname);
            $newClient->setLastName($Lname);
            $newClient->setAge($Age);
            $newClient->setGender($Gender);
            $newClient->setPhone($Phone);
            $newClient->setHeight($Height);
            $newClient->setWeight($Weight);
            $newClient->setEmail($Email);
            $newClient->setPassword($hashedPassword);

            $result = $client->addClientUserSide($newClient);

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
        $_SESSION["phonenoErr"] = $phonenoErr;
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["passwordErr"] = $passwordErr;
        header("Location: ../views/register.php");
        exit();
    }


    public function addClient()
    {
        $fnameErr = $lnameErr = $ageErr = $genderErr = $phonenoErr = $emailErr = "";

        $isValid = true;

        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
            $isValid = false;
        } else {
            $fname = $_POST['fname'];
            if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                $fnameErr = "Only alphabets and white space are allowed";
                $isValid = false;
            }
        }


        // Validate the "Last Name" field
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
            $isValid = false;
        } else {
            $lname = $_POST['lname'];
            if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                $lnameErr = "Only alphabets and white space are allowed";
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

        if (empty($_POST["phone"])) {
            $phonenoErr = "Phone Number is required";
            $isValid = false;
        } else {
            // Regular expression for a valid 10-digit phone number
            $phoneRegex = '/^0\d{10}$/';

            if (!preg_match($phoneRegex, $_POST["phone"])) {
                $phonenoErr = "Invalid phone number format";
                $isValid = false;
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $isValid = false;
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }

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

        $newClient = new Client();
        $newClient->setFirstName($_POST['fname']);
        $newClient->setLastName($_POST['lname']);
        $newClient->setAge((int) $_POST['age']);
        $newClient->setGender($_POST['gender']);
        $newClient->setWeight((float) $_POST['weight']);
        $newClient->setHeight((int) $_POST['height']);
        $newClient->setEmail($_POST['email']);
        $newClient->setPhone($_POST['phone']);

        $client = new Client();

        $emailExists = $client->checkExistingEmail($newClient->getEmail());
        if ($emailExists) {
            $emailErr = "This email is already registered.";
            $isValid = false;
        }

        if ($isValid) {

            $result = $client->addClient($newClient);

            if ($result) {
                $_SESSION['AddedSuccess'] = "Account added sucessfully";
                header("Location: ../views/addclient.php");
                exit();
            }
        }


        $_SESSION["fnameErr"] = $fnameErr;
        $_SESSION["lnameErr"] = $lnameErr;
        $_SESSION["ageErr"] = $ageErr;
        $_SESSION["genderErr"] = $genderErr;
        $_SESSION["phonenoErr"] = $phonenoErr;
        $_SESSION["emailErr"] = $emailErr;
        header("Location: ../views/addclient.php");
        exit();
    }


    public function login()
    {
        $emailErr = $passwordErr = $allErr = ""; // Initialize error variables

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

            $result = $client->checkIfClientExists($Email);


            if ($row = mysqli_fetch_array($result)) {
                $storedHashedPassword = $row["Password"];
                if (password_verify($Password, $storedHashedPassword)) {
                    // Authentication successful
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["FName"] = $row["FirstName"];
                    $_SESSION["LName"] = $row["LastName"];
                    $_SESSION["Phone"] = $row["Phone"];
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
        $fnameErr = $lnameErr = $emailErr = $allErr = $phonenoErr = "";

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
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

        if (empty($_POST["phone"])) {
            $phonenoErr = "Phone Number is required";
            $isValid = false;
        } else {
            // Regular expression for a valid 10-digit phone number
            $phoneRegex = '/^0\d{10}$/';

            if (!preg_match($phoneRegex, $_POST["phone"])) {
                $phonenoErr = "Invalid phone number format";
                $isValid = false;
            }
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
            $updatedClient->setFirstName($firstname);
            $updatedClient->setLastName($lastname);
            $updatedClient->setPhone($phone);
            $updatedClient->setEmail($email);
            $updatedClient->setPassword($password);

            $result = $client->updateClient($updatedClient);

            if ($result) {
                $_SESSION["FName"] = $firstname;
                $_SESSION["LName"] = $lastname;
                $_SESSION["Phone"] = $phone;
                $_SESSION["Email"] = $email;
                header("Location: ../views/userprofsettings.php");
                $_SESSION["succ"] = "Updated Successfully";
                exit();
            }
        }

        // If there are validation errors or update fails, set session variables and redirect
        $_SESSION["fnameErr"] = $fnameErr;
        $_SESSION["lnameErr"] = $lnameErr;
        $_SESSION["phonenoErr"] = $phonenoErr;
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["allErr"] = $allErr;
        header("Location: ../views/userprofsettings.php");
        exit();
    }


    public function deleteClient()
    {

        $client = new Client();

        $result = $client->deleteClient();


        if ($result) {
            session_destroy();
            header("location:../views/index.php");
        }
    }
}

$model = new Client();
$controller = new ClientController($model);

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
        case "delete":
            $controller->deleteClient();
            break;
        case "deleteClient":
            if (isset($_POST["clientId"])) {
                $clientId = $_POST["clientId"];

                $client = new Client();
                $result = $client->deleteClientByID($clientId);

                if ($result) {
                    echo "success";
                } else {
                    echo "failure";
                }
            }
            break;
        case "addClient":
            $controller->addClient();
            break;
        default:
            break;
    }
}
?>