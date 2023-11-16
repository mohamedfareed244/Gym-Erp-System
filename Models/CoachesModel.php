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



    public function getAssignedClasses(){
    global $conn;

    if (empty($this->ID)) {
        return [];
    }

    $coachID = $this->ID;

    $sql = "SELECT c.* FROM classes c
            INNER JOIN employee e ON c.Coach = e.ID
            WHERE e.ID = $coachID AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

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

    
}