<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Model.php");
include_once "../includes/dbh.inc.php";
include_once "EmployeeModel.php";
include_once "ClassesModel.php";
include_once "ptPackageModel.php";

class Coach extends Employee
{

    function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAssignedClasses($employee)
    {

        if (empty($this->getID())) {
            return [];
        }

        // $coachID = $this->ID;
        $employee_id = $_SESSION['ID'];

        $sql = "SELECT c.* FROM classes c
            INNER JOIN employee e ON c.Coach = e.ID
            WHERE e.ID = $employee_id AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

        $result = $this->db->query($sql);

        $assignedClasses = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $coachclassdetails = new Classes(); // to store class details
                $coachclassdetails->setID($row['ID']);
                // $coachclassdetails->Name = $row['Name'];
                $coachclassdetails->setDate($row['Date']);
                $coachclassdetails->setStartTime($row['StartTime']);
                $coachclassdetails->setEndTime($row['EndTime']);
                $coachclassdetails->setPrice($row['Price']);
                $coachclassdetails->setCoachID($row['Coach']);

                $assignedClasses[] = $coachclassdetails;
            }
        }

        return $assignedClasses;
    }

    public function getRegisteredPTClients($employee, $client)
    {

        if (empty($this->getID())) {
            return [];
        }

        $employee_id = $_SESSION['ID'];

        $sql = "SELECT pts.ClientID, e.Name AS ClientName, e.Email AS ClientEmail, c.FirstName, c.LastName, c.Age, c.Gender, c.Weight, c.Height, c.Phone
            FROM 'private training membership'
            INNER JOIN employee e ON pts.CoachID = e.ID
            INNER JOIN client c ON pts.ClientID = c.ID
            WHERE e.ID = $employee_id AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

        $result = $this->db->query($sql);

        $RegisteredPTClients = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientptDetails = new Client();
                $clientptDetails->setID($row['ClientID']);
                $clientptDetails->setFirstName($row['FirstName']);
                $clientptDetails->setLastName($row['LastName']);
                $clientptDetails->setEmail($row['Email']);
                $clientptDetails->setAge($row['Age']);
                $clientptDetails->setGender($row['Gender']);
                $clientptDetails->setWeight($row['Weight']);
                $clientptDetails->setHeight($row['Height']);
                $clientptDetails->setPhone($row['Phone']);

                $RegisteredPTClients[] = $clientptDetails;
            }
        }

        return $RegisteredPTClients;
    }

    public function getCoaches()
    {
        $sql = "SELECT * FROM employee where JobTitle = 'Coach' OR JobTitle='Fitness-manager'";
        $result = $this->db->query($sql);

        return $result;
    }


    public function getClassesForCoach($coachID)
    {

        $sql = "SELECT c.Name,ac.StartTime,ac.EndTime,ac.Date,ac.CoachID,ac.ID from assignedclass ac join class c on ac.ClassID=c.ID  where ac.CoachID=$coachID";

        $result = $this->db->query($sql);
        return $result;
    }
    public function getclassnum($id)
    {
        $sql = "SELECT COUNT(AssignedClassId) as num from `reserved class` where AssignedClassId=$id";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>
