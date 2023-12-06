<?php

require_once("Model.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Employee extends Model
{
    private $ID;
    private $Name;
    private $Email;
    private $Password;
    private $Salary;
    private $JobTitle;
    private $Address;
    private $PhoneNumber;
    private $Img;

    function __construct()
    {
        $this->db = $this->connect();
    }

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getSalary()
    {
        return $this->Salary;
    }

    public function setSalary($Salary)
    {
        $this->Salary = $Salary;
    }

    public function getJobTitle()
    {
        return $this->JobTitle;
    }

    public function setJobTitle($JobTitle)
    {
        $this->JobTitle = $JobTitle;
    }

    public function getAddress()
    {
        return $this->Address;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;
    }

    public function getImg()
    {
        return $this->Img;
    }

    public function setImg($Img)
    {
        $this->Img = $Img;
    }


    public function getAllEmployees()
    {
        $sql = "SELECT * FROM employee";
        $result = $this->db->query($sql);

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

    public function getattendance($date)
    {
        $sql = "SELECT attendance.* ,e.Name,e.PhoneNumber,e.Email,e.JobTitle,e.ID from attendance join employee e on EmployeeId=ID where Day ='$date' ";
        $result = $this->db->query($sql);

        if (mysqli_num_rows($result) <= 0) {
            Employee::addnewdate($date);
            return Employee::getattendance($date);
            exit();
        } else {
            return $result;
        }

    }
    public function attendanceforemp($id, $status, $date)
    {
        $sql = "UPDATE attendance SET Status=$status where EmployeeId=$id and Day='$date'";
        return $this->db->query($sql);


    }
    public function addnewdate($date)
    {
        $employees = Employee::getAllEmployees();
        foreach ($employees as $emp) {
            $sql = "insert into attendance (EmployeeId,Day,Status) values ($emp->ID,'$date',0)";
            $this->db->query($sql);
        }
        return;
    }
    public function addEmployee($employee)
    {

        $name = $employee->Name;
        $Sal = $employee->Salary;
        $address = $employee->Address;
        $phoneNumber = $employee->PhoneNumber;
        $jobTitle = $employee->JobTitle;
        $Email = $employee->Email;
        $Password = $employee->Password;
        $Img = $employee->Img;

        $sql = "INSERT INTO employee (Name, Salary, Address, PhoneNumber, JobTitle, Email, Password,Img) 
                VALUES ('$name', '$Sal', '$address', '$phoneNumber', '$jobTitle','$Email', '$Password','$Img')";
        return $this->db->query($sql);
    }

    public function getEmployeeByID($employeeID)
    {
        $sql = "SELECT * FROM employee WHERE ID = '$employeeID'";
        $result = $this->db->query($sql);

        if ($result) {
            $employeeData = $this->db->fetchRow($result);
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
            // No data found for the given employeeID
        }
    }


    public function updateEmployee($employee)
    {

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
            return $this->db->query($sql);
        } else {
            // Update with the new password
            $sql = $sql = "UPDATE employee SET Name='$name', Email='$Email', Salary='$Sal', PhoneNumber='$phoneNumber', Address='$address', 
            JobTitle='$jobTitle'
                    WHERE ID = $employee_id";
            return $this->db->query($sql);
        }
    }

    public function deleteEmployee()
    {
        $sql = "DELETE from employee where ID =" . $_SESSION['ID'];

        return $this->db->query($sql);
    }

    public function deleteEmployeeById($employeeID)
    {
        $sql = "DELETE from employee where ID =" . $employeeID;

        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkExistingEmail($email)
    {
        $Email = "SELECT * FROM employee WHERE Email = '$email'";

        $result = $this->db->query($Email);
        return mysqli_num_rows($result) > 0;
    }

    public function GetAllCoaches()
    {
        $results = array(); // Initialize the array

        $sql = "SELECT employee.ID, employee.Name, employee.Email, employee.PhoneNumber, employee.Salary, employee.Address, job_titles.Name AS JobTitleName,employee.Img
            FROM employee  
            INNER JOIN job_titles 
            ON (job_titles.Name = 'Coach' OR job_titles.Name = 'Fitness-manager') 
            AND employee.JobTitle = job_titles.Id";

        $result = $this->db->query($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'CoachID' => $row['ID'],
                    'Name' => $row['Name'],
                    'Email' => $row['Email'],
                    'PhoneNumber' => $row['PhoneNumber'],
                    'Salary' => $row['Salary'],
                    'Address' => $row['Address'],
                    'JobTitleName' => $row['JobTitleName'],
                    'Img' => $row['Img']
                );
            }
        }

        return $results;
    }


    public function GetAllClasses()
    {
        global $conn;

        $sql = "SELECT ID, Name FROM class";
        $result = $this->db->query($sql);

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

    public function getauth()
    {
        $sql = "SELECT * FROM authority";

        $result = $this->db->query($sql);
        return $result;
    }
    public function getjobtitles()
    {

        $sql = "SELECT * FROM job_titles";
        $result = $this->db->query($sql);

        return $result;
    }


    public function getCoachNameByID($CoachID)
    {
        $sql = "SELECT Name
    FROM employee
    where ID = $CoachID";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['Name'];
        } else {
            $name = null;
        }

        return $name;
    }
}

?>
