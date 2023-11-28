<?php

include_once "../includes/dbh.inc.php";

class Employee
{
    public $ID;
    public $Name;
    public $Email;
    public $Password;
    public $Salary;
    public $JobTitle;
    public $Address;
    public $PhoneNumber;
public $Img;
    public static function getAllEmployees()
    {
        global $conn;

        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);

        $employees = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employee = new Employee();
                $employee->ID = $row['ID'];
                $employee->Name = $row['Name'];
                $employee->Email = $row['Email'];
                $employee->Password = $row['Password'];
                $employee->Salary = $row['Salary'];
                $employee->JobTitle = $row['JobTitle'];
                $employee->Address = $row['Address'];
                $employee->PhoneNumber = $row['PhoneNumber'];

                $employees[] = $employee;
            }
        }

        return $employees;
    }

    public function addEmployee($employee)
    {
        global $conn;

        $name = $employee->Name;
        $Sal = $employee->Salary;
        $address = $employee->Address;
        $phoneNumber = $employee->PhoneNumber;
        $jobTitle = $employee->JobTitle;
        $Email = $employee->Email;
        $Password = $employee->Password;
$Img=$employee->Img;
        $sql = "INSERT INTO employee (Name, Salary, Address, PhoneNumber, JobTitle, Email, Password,Img) 
                VALUES ('$name', '$Sal', '$address', '$phoneNumber', '$jobTitle','$Email', '$Password','$Img')";
        return mysqli_query($conn, $sql);
    }
    public static function getEmployeeByID($employeeID)
    {
        global $conn;

        $employeeID = mysqli_real_escape_string($conn, $employeeID);

        $sql = "SELECT * FROM employee WHERE ID = '$employeeID'";
        $result = $conn->query($sql);

        if ($result) {
            $employeeData = $result->fetch_assoc();

            $employee = new Employee();
            $employee->ID = $employeeData['ID'];
            $employee->Name = $employeeData['Name'];
            $employee->Email = $employeeData['Email'];
            $employee->Password = $employeeData['Password'];
            $employee->Salary = $employeeData['Salary'];
            $employee->JobTitle = $employeeData['JobTitle'];
            $employee->Address = $employeeData['Address'];
            $employee->PhoneNumber = $employeeData['PhoneNumber'];

            return $employee;
        } else {
            return null;
        }
    }
    public static function updateEmployee($employee)
    {
        global $conn;

        $name = $employee->Name;
        $Sal = $employee->Salary;
        $address = $employee->Address;
        $phoneNumber = $employee->PhoneNumber;
        $jobTitle = $employee->JobTitle;
        $Email = $employee->Email;
        $Password = $employee->Password;

        $employee_id = $employee->ID;

        if (!empty($Password)) {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE employee SET Name='$name', Email='$Email', Password='$hashedPassword', Salary='$Sal', PhoneNumber='$phoneNumber', Address='$address', 
            JobTitle='$jobTitle'
                    WHERE ID = $employee_id";
            return $conn->query($sql);
        } else {
            // Update with the new password
            $sql = $sql = "UPDATE employee SET Name='$name', Email='$Email', Salary='$Sal', PhoneNumber='$phoneNumber', Address='$address', 
            JobTitle='$jobTitle'
                    WHERE ID = $employee_id";
            return $conn->query($sql);
        }
    }

    public function deleteEmployee()
    {
        global $conn;

        $sql = "DELETE from employee where ID =" . $_SESSION['ID'];

        return mysqli_query($conn, $sql);
    }
    
    public static function deleteEmployeeById($employeeID)
    {
        global $conn;

        $sql = "DELETE from employee where ID =" . $employeeID;

        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkExistingEmail($email)
    {
        global $conn;

        $Email = "SELECT * FROM employee WHERE Email = '$email'";

        $result = mysqli_query($conn, $Email);
        return mysqli_num_rows($result) > 0;
    }

    public static function GetAllCoaches()
    {
    global $conn;

    $results = array(); // Initialize the array

    $sql = "SELECT employee.ID, employee.Name, employee.Email, employee.PhoneNumber, employee.Salary, employee.Address, job_titles.Name AS JobTitleName
            FROM employee  
            INNER JOIN job_titles 
            ON (job_titles.Name = 'Coach' OR job_titles.Name = 'Fitness-manager') 
            AND employee.JobTitle = job_titles.Id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = array(
                'CoachID' => $row['ID'],
                'Name' => $row['Name'],
                'Email' => $row['Email'],
                'PhoneNumber' => $row['PhoneNumber'],
                'Salary' => $row['Salary'],
                'Address' => $row['Address'],
                'JobTitleName' => $row['JobTitleName']
            );
        }
    }

    return $results;
    }


public static function GetAllClasses()
{
    global $conn;

    $sql = "SELECT ID, Name FROM class";
    $result = $conn->query($sql);

    if ($result) {
        $classes = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $conn->close();
        return $classes;
    } else {
        $conn->close();
        return [];
    }
}

}
