<?php
require_once("Model.php");

//include_once "../includes/dbh.inc.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

class ReservedClass extends Model
{
    private $ID;
    private $AssignedClassID;
    private $CoachID;
    private $ClientID;
    private $Attended;
    private $isActivated;

    function __construct()
    {
        $this->db = $this->connect();
    }
    
    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }

    public function setAssignedClassID($AssignedClassID) {
        $this->AssignedClassID = $AssignedClassID;
    }

    public function getAssignedClassID() {
        return $this->AssignedClassID;
    }

    public function setCoachID($CoachID) {
        $this->CoachID = $CoachID;
    }

    public function getCoachID() {
        return $this->CoachID;
    }

    public function setClientID($ClientID) {
        $this->ClientID = $ClientID;
    }

    public function getClientID() {
        return $this->ClientID;
    }

    public function setAttended($Attended) {
        $this->Attended = $Attended;
    }

    public function getAttended() {
        return $this->Attended;
    }

    public function setIsActivated($isActivated) {
        $this->isActivated = $isActivated;
    }

    public function getIsActivated() {
        return $this->isActivated;
    }

    public function ReservationFreeClass($CoachID, $AssignedClassID, $ClientID)
    {
        $isActivated = "Activated";

        $checkSql = "SELECT * FROM `reserved class` WHERE AssignedClassID = '$AssignedClassID' AND CoachID = '$CoachID' AND ClientID = '$ClientID'";
        $checkResult = $this->db->query($checkSql);

        $alreadyExists = mysqli_num_rows($checkResult) > 0;

        if (!$alreadyExists) {
            $sql = "INSERT INTO `reserved class` (AssignedClassID,CoachID,ClientID,isActivated) VALUES ('$AssignedClassID','$CoachID','$ClientID','$isActivated')";

            $result = $this->db->query($sql);

            if ($result) {
                $sql1 = "UPDATE assignedclass
            SET AvailablePlaces= AvailablePlaces - 1
            WHERE assignedclass.ID = '$AssignedClassID'";

                $insertResult = $this->db->query($sql1);

                return array('inserted' => $insertResult, 'alreadyExists' => false);
            }
        } else {
            return array('inserted' => false, 'alreadyExists' => true);
        }
    }

    public function ReservationNotFreeClass($CoachID, $AssignedClassID, $ClientID)
    {
        $isActivated = "Not Activated";

        $checkSql = "SELECT * FROM `reserved class` WHERE AssignedClassID = '$AssignedClassID' AND CoachID = '$CoachID' AND ClientID = '$ClientID'";
        $checkResult = $this->db->query($checkSql);

        $alreadyExists = mysqli_num_rows($checkResult) > 0;

        if (!$alreadyExists) {
            $sql = "INSERT INTO `reserved class` (AssignedClassID,CoachID,ClientID,isActivated) VALUES ('$AssignedClassID','$CoachID','$ClientID','$isActivated')";
            $insertResult = $this->db->query($sql);

            return array('inserted' => $insertResult, 'alreadyExists' => false);
        } else {
            return array('inserted' => false, 'alreadyExists' => true);
        }
    }
    public function getClientClassInfo()
    {
        $isActivated = "Activated";

        $sql = "SELECT class.Name AS className, assignedclass.Date, assignedclass.StartTime, assignedclass.EndTime, 
        employee.Name AS employeeName, assignedclass.Price ,  `reserved class`.ClientID
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID
        INNER JOIN `reserved class` ON `reserved class`.AssignedClassID = assignedclass.ID
        WHERE  `reserved class`.isActivated ='$isActivated' AND `reserved class`.ClientID = " . $_SESSION['ID'];

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'className' => $row['className'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'employeeName' => $row['employeeName'],
                    'Price' => $row['Price'],
                    'ClientID' => $row['ClientID'],
                );
            }
            return $results;
        }
    }
    public function getClientClasses($clientID)
    {
        $isActivated = "Activated";

        $sql = "SELECT class.Name AS className, assignedclass.Date, assignedclass.StartTime, assignedclass.EndTime, 
        employee.Name AS employeeName, assignedclass.Price ,  `reserved class`.ClientID
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID
        INNER JOIN `reserved class` ON `reserved class`.AssignedClassID = assignedclass.ID
        WHERE  `reserved class`.isActivated ='$isActivated' AND `reserved class`.ClientID = " . $clientID;

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'className' => $row['className'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'employeeName' => $row['employeeName'],
                    'Price' => $row['Price'],
                    'ClientID' => $row['ClientID'],
                );
            }
            return $results;
        }
        return false;
    }

    public function getClassRequests()
    {
        $isActivated = 'Not Activated';

        $sql = "SELECT client.ID,client.FirstName AS clientName,class.Name AS className, assignedclass.Date, assignedclass.StartTime,
        assignedclass.EndTime, employee.Name AS employeeName, assignedclass.Price , `reserved class`.ID AS reservedClassID , assignedclass.ID AS assignedClassID,
         assignedclass.AvailablePlaces
        FROM `reserved class`
        INNER JOIN client ON client.ID = `reserved class`.ClientID
        INNER JOIN assignedclass ON assignedclass.ID = `reserved class`.AssignedClassID
        INNER JOIN employee ON employee.ID = `reserved class`.CoachID
        INNER JOIN class ON class.ID = assignedclass.ClassID
        WHERE `reserved class`.isActivated = '$isActivated'";

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'ID' => $row['ID'],
                    'clientName' => $row['clientName'],
                    'className' => $row['className'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'employeeName' => $row['employeeName'],
                    'Price' => $row['Price'],
                    'reservedClassID' => $row['reservedClassID'],
                    'assignedClassID' => $row['assignedClassID'],
                    'AvailablePlaces' => $row['AvailablePlaces']
                );
            }
        }
        return $results;
    }

    public function acceptClass($reservedClassID, $assignedClassID)
    {
        $isActivated = 'Activated';

        $sql = "UPDATE `reserved class`
        SET isActivated='$isActivated'
        WHERE ID = $reservedClassID";

        if ($this->db->query($sql)) {

            $sql1 = "UPDATE assignedclass
        SET AvailablePlaces= AvailablePlaces - 1
        WHERE assignedclass.ID = '$assignedClassID'";

            return $this->db->query($sql);
        }
    }

    public function declineClass($reservedClassID)
    {
        $sql = "DELETE 
        FROM `reserved class`
        WHERE ID = $reservedClassID";

        return $this->db->query($sql);
    }

    public function getclassnum($id)
    {
        $sql = "SELECT COUNT(AssignedClassId) as num from `reserved class` where AssignedClassId=$id";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>