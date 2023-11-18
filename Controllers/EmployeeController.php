<?php

include_once "../Models/employeeModel.php";

session_start();

class EmployeeController {

   public function addEmployee(){
    $nameErr = $phonenoErr = $jobTitleErr = $salaryErr = $emailErr = $passwordErr = $addressErr = $success = "";
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

// Hash the password
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    if($isValid){

    $newEmployee = new Employee();
    $newEmployee->Name = $Name;
    $newEmployee->PhoneNumber = $PhoneNumber;
    $newEmployee->Email = $Email;
    $newEmployee->JobTitle = $JobTitle;
    $newEmployee->Salary = $Salary;
    $newEmployee->Address = $Address;
    $newEmployee->Password = $hashedPassword;

    $result = $newEmployee->addEmployee($newEmployee);

    if ($result) {
        $success = "Employee addded successfully";
        $_SESSION["success"] = $success;
        // Data inserted successfully
        header("Location: ../views/employeesadmin.php");
        exit();
    }


} 
   // Set session variables with error messages
   $_SESSION["nameErr"] = $nameErr;
   $_SESSION["phonenoErr"] = $phonenoErr;
   $_SESSION["jobTitleErr"] = $jobTitleErr;
   $_SESSION["salaryErr"] = $salaryErr;
   $_SESSION["emailErr"] = $emailErr;
   $_SESSION["passwordErr"] = $passwordErr;
   $_SESSION["addressErr"] = $addressErr;

   header("Location: ../views/employeesadmin.php");
   exit();
   }
}



$controller = new EmployeeController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addEmployee":
            $controller->addEmployee();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}

?>

