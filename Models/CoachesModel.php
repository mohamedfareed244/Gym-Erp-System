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
            $class = new stdClass(); // to store class details
            $class->ID = $row['ID'];
            $class->Name = $row['Name'];
            $class->Date = $row['Date'];
            $class->StartTime = $row['StartTime'];
            $class->EndTime = $row['EndTime'];
            $class->Price = $row['Price'];
            $class->Coach = $row['Coach'];

            $assignedClasses[] = $class;
        }
    }

    return $assignedClasses;
}

    
}