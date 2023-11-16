<?php


include_once "../includes/dbh.inc.php";


class Coach extends Employee
{
    public $ID;
    public $Name;
    public $Email;
    public $Password;
    public $Salary;
    public $JobTitle;
    public $Address;
    public $PhoneNumber;



    public function getAssignedClasses($employee)
    {
        global $conn;

        if (empty($this->ID)) {
            return [];
        }

        // $coachID = $this->ID;
        $employee_id = $_SESSION['ID'];

        $sql = "SELECT c.* FROM classes c
            INNER JOIN employee e ON c.Coach = e.ID
            WHERE e.ID = $employee_id AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

        $result = $conn->query($sql);

        $assignedClasses = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $coachclassdetails = new Coach(); // to store class details
                $coachclassdetails->ID = $row['ID'];
                $coachclassdetails->Name = $row['Name'];
                $coachclassdetails->Date = $row['Date'];
                $coachclassdetails->StartTime = $row['StartTime'];
                $coachclassdetails->EndTime = $row['EndTime'];
                $coachclassdetails->Price = $row['Price'];
                $coachclassdetails->Coach = $row['Coach'];

                $assignedClasses[] = $coachclassdetails;
            }
        }

        return $assignedClasses;
    }

    public function getPTSessions($employee)
    {
        global $conn;

        if (empty($this->ID)) {
            return [];
        }

        // $coachID = $this->ID;
        $employee_id = $_SESSION['ID'];


        $sql = "SELECT pts.* FROM pt_sessions pts
            INNER JOIN employee e ON pts.CoachID = e.ID
            WHERE e.ID = $employee_id AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

        $result = $conn->query($sql);

        $ptSessions = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ptSessionDetails = new Coach(); // Create an instance to store PT session details
                $ptSessionDetails->ClientID = $row['ClientID'];
                $ptSessionDetails->CoachID = $row['CoachID'];
                $ptSessionDetails->PrivateTrainingPackageID = $row['PrivateTrainingPackageID'];
                $ptSessionDetails->SessionsCount = $row['SessionsCount'];

                $ptSessions[] = $ptSessionDetails;
            }
        }

        return $ptSessions;
    }


}

?>