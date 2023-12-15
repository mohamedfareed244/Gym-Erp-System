<?php

require_once("Controller.php");
include_once "../Models/EmployeeModel.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $nameErr = $phonenoErr = $jobTitleErr = $salaryErr = $emailErr = $passwordErr = $addressErr = $success = $imgerror = "";
        $isValid = true;

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $isValid = false;
        } else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
                $isValid = false;
            }
        }

        if (empty($_POST["phoneNumber"])) {
            $phonenoErr = "Phone Number is required";
            $isValid = false;
        } else {
            $phoneNumber = $_POST["phoneNumber"];
            // Regular expression for a valid 10-digit phone number
            $phoneRegex = '/^0\d{10}$/';
            if (!preg_match($phoneRegex, $phoneNumber)) {
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

        if (empty($_POST["jobTitle"])) {
            $jobTitleErr = "Job Title is required";
            $isValid = false;
        }

        if (empty($_POST["salary"])) {
            $salaryErr = "Salary is required";
            $isValid = false;
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
            $isValid = false;
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
            $isValid = false;
        } elseif (strlen($_POST["password"]) < 6) {
            $passwordErr = "Password must be at least 6 characters long";
            $isValid = false;
        }
        if (!isset($_FILES["image"])) {
            $imgerror = "you have to choose image file ";
            $isValid = false;
        }

        // Check if email already exists in the database
        $employee = new Employee();
        $email = $_POST["email"];
        $emailExists = $employee->checkExistingEmail($email);
        if ($emailExists) {
            $emailErr = "This email is already registered.";
            $isValid = false;
        }


        $Name = htmlspecialchars($_POST["name"]);
        $PhoneNumber = htmlspecialchars($_POST["phoneNumber"]);
        $Email = htmlspecialchars($_POST["email"]);
        $JobTitle = htmlspecialchars($_POST["jobTitle"]);
        $Salary = htmlspecialchars($_POST["salary"]);
        $Address = htmlspecialchars($_POST["address"]);
        $Password = htmlspecialchars($_POST["password"]);
        if ($isValid) {
            $uploadedFile = $_FILES["image"];
            $tempFilePath = $uploadedFile["tmp_name"];
            $fileExtension = pathinfo($uploadedFile["name"], PATHINFO_EXTENSION);
            $destination = "../public/Images/" . $PhoneNumber . "." . $fileExtension;

            if (!move_uploaded_file($tempFilePath, $destination)) {
                $imgerror = $destination;
                $isValid = false;
            }
        }
        // Hash the password
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        if ($isValid) {

            $newEmployee = new Employee();
            $newEmployee->setName($Name);
            $newEmployee->setPhoneNumber($PhoneNumber);
            $newEmployee->setEmail($Email);
            $newEmployee->setJobTitle($JobTitle);
            $newEmployee->setSalary($Salary);
            $newEmployee->setAddress($Address);
            $newEmployee->setPassword($hashedPassword);
            $newEmployee->setImg($destination);

            $result = $newEmployee->addEmployee($newEmployee);

            if ($result) {
                $success = "Employee addded successfully";
                $_SESSION["success"] = $success;
                unset($_SESSION["imgerror"]);
                // Data inserted successfully
                header("Location: ../views/employeesadmin.php?AddedSuccessfully");
                exit();
            }
        }
        // Set session variables with error messages
        $_SESSION["nameErr"] = $nameErr;
        $_SESSION["imgerror"] = $imgerror;
        $_SESSION["phonenoErr"] = $phonenoErr;
        $_SESSION["jobTitleErr"] = $jobTitleErr;
        $_SESSION["salaryErr"] = $salaryErr;
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["passwordErr"] = $passwordErr;
        $_SESSION["addressErr"] = $addressErr;

        header("Location: ../views/employeesadmin.php?fail");
        exit();
    }

    public function login()
    {
        $emailErr = $passwordErr = $allErr = ""; // Initialize error variables

        $employee = new Employee();

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

            $result = $employee->checkIfEmployeeExists($Email);


            if ($row = mysqli_fetch_array($result)) {
                $storedHashedPassword = $row["Password"];
                if (password_verify($Password, $storedHashedPassword)) {
                    $ID = $row["ID"];
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["Name"] = $row["Name"];
                    $_SESSION["Email"] = $row["Email"];
                    $_SESSION["PhoneNumber"] = $row["PhoneNumber"];
                    $_SESSION["Salary"] = $row["Salary"];
                    $_SESSION["Address"] = $row["Address"];
                    $_SESSION["JobTitle"] = $row["JobTitle"];
                    $_SESSION['Password'] = $row["Password"];
                    header("Location: ../views/admindashboard.php?ID=$ID");
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
        header("Location: ../views/signin.php?fail");
        exit();
    }

    public function deleteEmployee()
    {
        if (isset($_POST["employeeId"])) {
            $employeeId = $_POST["employeeId"];

            $Employee = new Employee();
            $result = $Employee->deleteEmployeeByID($employeeId);

            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
        }
    }
}


$model = new Employee();
$controller = new EmployeeController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addEmployee":
            $controller->addEmployee();
            break;
        case "login":
            $controller->login();
            break;
        case "deleteEmployee":
            $controller->deleteEmployee();
            break;
        default:
            break;
    }
}
?>
