<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Model.php");
include_once "EmployeeModel.php";
include_once "ClassesModel.php";
include_once "ptPackageModel.php";

include_once "../views/send_pw_email.php";

class Coach extends Employee implements Observer
{

    public function __construct() {
        parent::__construct();
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

    public function getClassesForCoach($coachID)
    {

        $sql = "SELECT c.Name, ac.StartTime, ac.EndTime, ac.Date, ac.CoachID, ac.ID 
        FROM assignedclass ac 
        JOIN class c ON ac.ClassID = c.ID  
        WHERE ac.CoachID = $coachID AND ac.Date >= CURDATE()";

        $result = $this->db->query($sql);
        return $result;
    }

    public function getptMembershipsForCoach($coachID)
    {
        $isActivated = "Activated";

        $sql = "SELECT client.FirstName AS clientFirstName , client.LastName AS clientLastName, `private training package`.Name AS ptPackageName, 
        `private training package`.NumOfSessions, `private training package`.Price, `private training membership`.SessionsCount, `private training membership`.ID
        FROM `private training membership`
        INNER JOIN `private training package` ON `private training membership`.PrivateTrainingPackageID = `private training package`.ID 
        INNER JOIN client ON `private training membership`.ClientID = client.ID
        INNER JOIN employee ON `private training membership`.CoachID = employee.ID
        WHERE `private training membership`.isActivated = '$isActivated' AND employee.ID='$coachID'";

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'ID' => $row['ID'],
                    'clientFirstName' => $row['clientFirstName'],
                    'clientLastName' => $row['clientLastName'],
                    'ptPackageName' => $row['ptPackageName'],
                    'NumOfSessions' => $row['NumOfSessions'],
                    'Price' => $row['Price'],
                    'SessionsCount' => $row['SessionsCount'],
                );
            }
            return $results;
        }
    }

    public function update($message)
    {
        $coaches = $this->getAllCoaches();

        // Loop through each coach and send the notification
        foreach ($coaches as $coach) {
            $toEmail = $coach->getEmail();

            // Call your existing function to send the email notification
            $success = ConfirmationMailer::sendNewPtPackageNotification($toEmail, $message);

            if ($success) {
                error_log("Email sent successfully for update ($message) to $toEmail");
            } else {
                error_log("Error sending email for update ($message) to $toEmail");
            }
        }
    }


}
?>
