<?php

require_once("Model.php");
require_once("StaffModel.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Employee extends Staff
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEmployees()
    {
        $sql = "SELECT * FROM employee";
        $result = $this->db->query($sql);

        $employees = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employee = new Employee();
                $employee->setID($row['ID']);
                $employee->setName($row['Name']);
                $employee->setEmail($row['Email']);
                $employee->setPassword($row['Password']);
                $employee->setSalary($row['Salary']);
                $employee->setJobTitle($row['JobTitle']);
                $employee->setAddress($row['Address']);
                $employee->setPhoneNumber($row['PhoneNumber']);

                $employees[] = $employee;
            }
        }

        return $employees;
    }


    public function addEmployee($employee)
    {

        $name = $employee->getName();
        $Sal = $employee->getSalary();
        $address = $employee->getAddress();
        $phoneNumber = $employee->getPhoneNumber();
        $jobTitle = $employee->getJobTitle();
        $Email = $employee->getEmail();
        $Password = $employee->getPassword();
        $Img = $employee->getImg();

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
            $employee->setID($employeeData['ID']);
            $employee->setName($employeeData['Name']);
            $employee->setEmail($employeeData['Email']);
            $employee->setPassword($employeeData['Password']);
            $employee->setSalary($employeeData['Salary']);
            $employee->setJobTitle($employeeData['JobTitle']);
            $employee->setAddress($employeeData['Address']);
            $employee->setPhoneNumber($employeeData['PhoneNumber']);
            return $employee;
        } else {
            return null;
            // No data found for the given employeeID
        }
    }


    public function updateEmployee($employee)
    {
        $Name = $employee->getName();
        $Address = $employee->getAddress();
        $PhoneNumber = $employee->getPhoneNumber();
        $Email = $employee->getEmail();
        $Password = $employee->getPassword();
        $Image = $employee->getImg();
        $employee_id = $_SESSION['ID'];

        if (!empty($Password)) {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE employee SET Name='$Name', Email='$Email', Password='$hashedPassword', PhoneNumber='$PhoneNumber', Address='$Address'";
            if (!empty($Image)) {
                $sql .= ", Img='$Image'";
            }
            $sql .= " WHERE ID = $employee_id";
            return $this->db->query($sql);
        } else {
            $sql = "UPDATE employee SET Name='$Name', Email='$Email', PhoneNumber='$PhoneNumber', Address='$Address'";
            if (!empty($Image)) {
                $sql .= ", Img='$Image'";
            }
            $sql .= " WHERE ID = $employee_id";
            return $this->db->query($sql);
        }
    }


    public function updateEmployeeAdmin($employee)
    {
        $employeeInfo = new Employee();
        $employeeInfo = $employeeInfo->getEmployeeByID($employee->getID());

        if (!empty($employee->getName())) {
            $employeeInfo->setName($employee->getName());
        }

        if (!empty($employee->getAddress())) {
            $employeeInfo->setAddress($employee->getAddress());
        }

        if (!empty($employee->getPhoneNumber())) {
            $employeeInfo->setPhoneNumber($employee->getPhoneNumber());
        }

        if (!empty($employee->getEmail())) {
            $employeeInfo->setEmail($employee->getEmail());
        }

        if (!empty($employee->getPassword())) {
            $hashedPassword = password_hash($employee->getPassword(), PASSWORD_DEFAULT);
            $employeeInfo->setPassword($hashedPassword);
        }

        if (!empty($employee->getImg())) {
            $employeeInfo->setImg($employee->getImg());
        }

        $employeeID = $employee->getID();
        $name = $employeeInfo->getName();
        $address = $employeeInfo->getAddress();
        $phoneNumber = $employeeInfo->getPhoneNumber();
        $email = $employeeInfo->getEmail();
        $password = $employeeInfo->getPassword();
        $img = $employeeInfo->getImg();

        $sql = "UPDATE employee SET Name='$name', Address='$address', PhoneNumber='$phoneNumber', Email='$email', Password='$password'";

        if (!empty($img)) {
            $sql .= ", Img='$img'";
        }

        $sql .= " WHERE ID = $employeeID";

        $result = $this->db->query($sql);

        if ($result) {
            echo "Query executed successfully";
        } else {
        }

        return $result;
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

    public function checkIfEmployeeExists($email)
    {
        $sql = "SELECT * FROM employee WHERE Email = '$email'";
        return $this->db->query($sql);
    }

    public function checkExistingEmail($email)
    {
        $Email = "SELECT * FROM employee WHERE Email = '$email'";

        $result = $this->db->query($Email);
        return mysqli_num_rows($result) > 0;
    }

    public function getAuthority()
    {
        $sql = "SELECT * FROM authority";

        $result = $this->db->query($sql);
        return $result;
    }

    public function getJobTitles()
    {

        $sql = "SELECT * FROM job_titles";
        $result = $this->db->query($sql);

        return $result;
    }

    public function get_emp_auth($id)
    {
        $sql = "SELECT authority.Header,authority.FriendlyName,authority.LinkAddress FROM authority JOIN `employee authorities` as empauth on empauth.AuthorityID=authority.ID where empauth.JobTitleID =$id";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getJobTitleByID($jobTitleID)
    {
        $sql = "SELECT Name FROM job_titles WHERE Id = '$jobTitleID'";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $jobTitleName = $row['Name'];
            return $jobTitleName;
        } else {
            return null;
        }
    }
}
