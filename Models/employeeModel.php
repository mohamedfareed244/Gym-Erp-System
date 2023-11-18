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

        $sql = "INSERT INTO employee (Name, Salary, Address, PhoneNumber, JobTitle, Email, Password) 
                VALUES ('$name', '$Sal', '$address', '$phoneNumber', '$jobTitle','$Email', '$Password')";
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

    public static function checkExistingEmail($email)
    {
        global $conn;

        $Email = "SELECT * FROM employee WHERE Email = '$email'";

        $result = mysqli_query($conn, $Email);
        return mysqli_num_rows($result) > 0;
    }

    public static function GetAllCoaches() {
        global $conn;
    
        // Query to get the IDs of the job titles 'Coach' and 'Fitness-manager'
        $sql = "SELECT ID, Name FROM job_titles WHERE Name='Coach' OR Name='Fitness-manager'";
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            return [];
        }
    
        $coaches = [];
        $fitnessManagers = [];
    
        // Iterate through the job titles and get employees for each
        while ($row = mysqli_fetch_assoc($result)) {
            $jobId = $row['ID'];
    
            // Query to get employees with a specific jobTitle
            $employeeSql = "SELECT ID, Name FROM employee WHERE jobTitle = ?";
            $stmt = mysqli_prepare($conn, $employeeSql);
    
            if ($stmt) {
                // Bind the parameters
                mysqli_stmt_bind_param($stmt, "i", $jobId);
    
                // Execute the query
                mysqli_stmt_execute($stmt);
    
                // Bind the result variables
                mysqli_stmt_bind_result($stmt, $id, $name);
    
                // Fetch the results into an array
                while (mysqli_stmt_fetch($stmt)) {
                    $employee = [
                        'ID' => $id,
                        'Name' => $name,
                        // add other columns as needed
                    ];
    
                    // Separate employees into coaches and fitness managers
                    if ($row['Name'] === 'Coach') {
                        $coaches[] = $employee;
                    } elseif ($row['Name'] === 'Fitness-manager') {
                        $fitnessManagers[] = $employee;
                    }
                }
    
                mysqli_stmt_close($stmt);
            }
        }
    
        return [
            'Coaches' => $coaches,
            'FitnessManagers' => $fitnessManagers,
        ];
    }
    
    
    public static function deleteEmployeeAdmin($employee)
    {
        global $conn;

        $sql = "DELETE from employee where ID =" . $employee->ID;

        return mysqli_query($conn, $sql);
    }
    
    

}
