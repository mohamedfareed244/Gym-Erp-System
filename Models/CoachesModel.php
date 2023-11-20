<?php


include_once "../includes/dbh.inc.php";
include_once "employeeModel.php";

class Coach extends Employee
{
  
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
                $ptSessionDetails = new Coach(); 
                $ptSessionDetails->ClientID = $row['ClientID'];
                $ptSessionDetails->CoachID = $row['CoachID'];
                $ptSessionDetails->PrivateTrainingPackageID = $row['PrivateTrainingPackageID'];
                $ptSessionDetails->SessionsCount = $row['SessionsCount'];

                $ptSessions[] = $ptSessionDetails;
            }
        }

        return $ptSessions;
    }




    public function getRegisteredPTClients($employee, $client)
    {
        global $conn;

        if (empty($this->ID)) {
            return [];
        }

        $employee_id = $_SESSION['ID'];

        $sql = "SELECT pts.ClientID, e.Name AS ClientName, e.Email AS ClientEmail, c.FirstName, c.LastName, c.Age, c.Gender, c.Weight, c.Height, c.Phone
            FROM pt_sessions pts
            INNER JOIN employee e ON pts.CoachID = e.ID
            INNER JOIN client c ON pts.ClientID = c.ID
            WHERE e.ID = $employee_id AND (e.JobTitle = 'Coach' OR e.JobTitle = 'Fitness Manager')";

        $result = $conn->query($sql);

        $RegisteredPTClients = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientptDetails = new Coach(); 
                $clientptDetails->ClientID = $row['ClientID'];
                $clientptDetails->ClientName = $row['ClientName'];
                $clientptDetails->ClientEmail = $row['ClientEmail'];
                $clientptDetails->FirstName = $row['FirstName'];
                $clientptDetails->LastName = $row['LastName'];
                $clientptDetails->Age = $row['Age'];
                $clientptDetails->Gender = $row['Gender'];
                $clientptDetails->Weight = $row['Weight'];
                $clientptDetails->Height = $row['Height'];
                $clientptDetails->Phone = $row['Phone'];

                $RegisteredPTClients[] = $clientptDetails;
            }
        }

        return $RegisteredPTClients;
    }

    public static function Get_All(){
        global $conn;
    $sql="SELECT * FROM employee where JobTitle = 'Coach' OR JobTitle='Fitness-manager'";
    $result=mysqli_query($conn,$sql);
 
    return $result;
    }


    public  static function getClassesForCoach( $coachID)
    {
        global $conn;

    

        $sql = "SELECT * FROM class WHERE Coach = $coachID " ;
               

        $result = $conn->query($sql);
return $result;
        // $assignedClasses = array();

        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $class = new Classes();
        //         $class->ID = $row['ID'];
        //         $class->Name = $row['Name'];
        //         $class->Date = $row['Date'];
        //         $class->StartTime = $row['StartTime'];
        //         $class->EndTime = $row['EndTime'];
        //         $class->Price = $row['Price'];
        //         $class->Coach = $row['Coach'];

        //         $assignedClasses[] = $class;
        //     }
        // }

        // return $assignedClasses;
    }
    public static function getclassdays($id){
        global $conn;
        $sql = "SELECT * FROM class_days WHERE Class = $id " ;
        $result = $conn->query($sql);
        return $result;
    }

    
}
?>