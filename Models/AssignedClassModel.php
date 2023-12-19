<?php
require_once("Model.php");

//include_once "../includes/dbh.inc.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

class AssignedClass extends Model
{

    private $ID;
    private $ClassID;
    private $Date;
    private $StartTime;
    private $EndTime;
    private $isFree;
    private $Price;
    private $CoachID;
    private $NumOfAttendants;
    private $AvailablePlaces;

    function __construct()
    {
        $this->db = $this->connect();
    }

    // Getters and Setters Start
    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getClassID()
    {
        return $this->ClassID;
    }

    public function setClassID($ClassID)
    {
        $this->ClassID = $ClassID;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    public function getStartTime()
    {
        return $this->StartTime;
    }

    public function setStartTime($StartTime)
    {
        $this->StartTime = $StartTime;
    }

    // Getter and Setter for EndTime
    public function getEndTime()
    {
        return $this->EndTime;
    }

    public function setEndTime($EndTime)
    {
        $this->EndTime = $EndTime;
    }

    public function getisFree()
    {
        return $this->isFree;
    }

    public function setisFree($isFree)
    {
        $this->isFree = $isFree;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function getCoachID()
    {
        return $this->CoachID;
    }

    public function setCoachID($CoachID)
    {
        $this->CoachID = $CoachID;
    }

    public function getNumOfAttendants()
    {
        return $this->NumOfAttendants;
    }

    public function setNumOfAttendants($NumOfAttendants)
    {
        $this->NumOfAttendants = $NumOfAttendants;
    }

    public function getAvailablePlaces()
    {
        return $this->AvailablePlaces;
    }

    public function setAvailablePlaces($AvailablePlaces)
    {
        $this->AvailablePlaces = $AvailablePlaces;
    }

    // Getters and Setters End



    public function assignClass($class)
    {

        $ClassID = $class->ClassID;
        $Dates = $class->Date;
        $StartTime = $class->StartTime;
        $EndTime = $class->EndTime;
        $isFree = $class->isFree;
        $Price = $class->Price;
        $CoachID = $class->CoachID;
        $NumOfAttendants = $class->NumOfAttendants;
        $AvailablePlaces = $class->NumOfAttendants;


        $finalresult = true; // Initialize result

        foreach ($Dates as $Date) {
            $sql = "INSERT INTO assignedclass (ClassID, Date, StartTime, EndTime, isFree, Price, CoachID,NumOfAttendants,AvailablePlaces) 
                    VALUES ('$ClassID', '$Date', '$StartTime', '$EndTime', '$isFree', '$Price', '$CoachID','$NumOfAttendants','$AvailablePlaces')";

            $result = $this->db->query($sql);

            if (!$result) {
                $finalresult = false; // If any query fails, set result to false
            }
        }

        return $finalresult;
    }


    public function getAssignedClassByID($class)
    {
        $sql = "SELECT ID FROM assignedclass WHERE ID='$class->ID'";
        $result = $this->db->query($sql);

        return $result;
    }


    public function deleteClass($classID, $coachID, $date)
    {
        $sql = "DELETE FROM assignedclass where ClassID = '$classID' and CoachID = '$coachID' and Date = '$date'";

        return $this->db->query($sql);
    }

    public function getAssignedClassDetails()
    {
        $sql = "SELECT class.imgPath, class.Name AS className , assignedclass.CoachID AS CoachID, assignedclass.Date ,assignedclass.StartTime , assignedclass.EndTime, 
        assignedclass.NumOfAttendants , assignedclass.Price, assignedclass.ID AS assignedclassID, employee.Name AS employeeName ,assignedclass.AvailablePlaces
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID
        WHERE assignedclass.AvailablePlaces != '0'";

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'imgPath' => $row['imgPath'],
                    'Name' => $row['className'],
                    'CoachID' => $row['CoachID'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'NumOfAttendants' => $row['NumOfAttendants'],
                    'Price' => $row['Price'],
                    'assignedclassID' => $row['assignedclassID'],
                    'employeeName' => $row['employeeName'],
                    'AvailablePlaces' => $row['AvailablePlaces']
                );
            }
            return $results;
        }
    }

    public function getSelectedCoachClasses($coachID)
    {
        $results = array();

        $sql = "SELECT assignedclass.CoachID, assignedclass.Date, assignedclass.StartTime, assignedclass.EndTime, class.Name
        FROM assignedclass
        INNER JOIN class ON class.ID = assignedclass.ClassID 
        WHERE assignedclass.CoachID = '$coachID' AND assignedclass.Date > CURDATE()";

        $result = $this->db->query($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'CoachID' => $row['CoachID'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'ClassName' => $row['Name'],
                );
            }
        }

        return $results;
    }

    public function getallCoachesandClasses()
    {
        $results = array();

        $sql = "SELECT assignedclass.ClassID, assignedclass.Date, class.Name AS ClassName, assignedclass.CoachID,
        employee.Name AS CoachName, employee.PhoneNumber
        FROM assignedclass
        INNER JOIN class ON assignedclass.ClassID = class.ID 
        INNER JOIN employee ON assignedclass.CoachID = employee.ID
        WHERE assignedclass.Date >= CURDATE()";

        $result = $this->db->query($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'ClassID' => $row['ClassID'],
                    'Date' => $row['Date'],
                    'CoachID' => $row['CoachID'],
                    'ClassName' => $row['ClassName'],
                    'CoachName' => $row['CoachName'],
                    'PhoneNumber' => $row['PhoneNumber'],
                );
            }
            return $results;
        }
    }

    public function getFormattedTime($Time)
    {
        $dateTime = new DateTime($Time);
        $startformattedDate = $dateTime->format("H:i");
        return $startformattedDate;
    }

    // Function to determine if the class is in the future
    public function isClassInFuture($classDetail)
    {

        $currentDateTime = strtotime(date("Y-m-d H:i")); // Current date and time
        $classStartDateTime = strtotime($classDetail['Date'] . ' ' . $this->getFormattedTime($classDetail['StartTime'])); // Class start date and time
        return $currentDateTime <= $classStartDateTime;
    }
}

if ($_SERVER["REQUEST_METHOD"] === 'GET' && isset($_GET["x"])) {

    $num = $_GET["x"];

    $sql = "SELECT c.ID,CONCAT(FirstName,'    ',LastName) as Name , Phone  from `client` c join `reserved class` on CLientID=c.ID where AssignedClassID=$num";

    $result = $this->db->query($sql);
    $word = '';
    if (mysqli_num_rows($result) <= 0) {
        echo "<tr><td colspan='4'>NO CLients In This Class</td></tr>";
    } else {
        foreach ($result as $res) {
            $word .= "<tr><td>";
            $word .= $res["ID"];
            $word .= "</td>";
            $word .= "<td class='col'>";
            $word .= $res["Name"];
            $word .= "</td>";
            $word .= " <td class='col'>";
            $word .= $res["Phone"];
            $word .= "</td>";

            $word .= "<td class='col'> <input type='checkbox' name='' id=''> </td>
        </tr>";
        }
        echo $word;
    }
    exit();
}
