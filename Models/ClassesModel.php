<?php


include_once "../includes/dbh.inc.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"]==='GET'&&isset($_GET["x"])){
    global $conn;
   
    $num=$_GET["x"];
  
$sql ="SELECT c.ID,CONCAT(FirstName,'    ',LastName) as Name , Phone  from `client` c join `reserved class` on CLientID=c.ID where AssignedClassID=$num";

$result=$conn->query($sql);
 $word='';
if(mysqli_num_rows($result)<=0){
    echo "<tr><td colspan='4'>NO CLients In This Class</td></tr>";
}else{
    foreach ($result as $res){
        $word.="<tr><td>";
        $word.=$res["ID"];
       $word .="</td>";
        $word.="<td class='col'>";
       $word .=$res["Name"];
        $word.="</td>";
       $word.=" <td class='col'>";
       $word .=$res["Phone"];
        $word.="</td>";
   
        $word.="<td class='col'> <input type='checkbox' name='' id=''> </td>
        </tr>";
    }
    echo $word;
}
exit();
}
class Classes{
    
    public $ID;
    public $ClassID;
    public $Date;
    public $StartTime;
    public $EndTime;
    public $isFree;
    public $Price;
    public $CoachID;
    public $NumOfAttendants;
    public $AvailablePlaces;
   
    public static function getAllClasses(){
        global $conn;

        $sql = "SELECT * FROM class";
        // Perform the query
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            $classes = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            // Return the packages
            return $classes;
        } else {
            return [];
        }
    }

    public static function assignClass($class)
    {
        global $conn;
    
        $ClassID = $class->ClassID;
        $Dates = $class->Date;
        $StartTime = $class->StartTime;
        $EndTime = $class->EndTime;
        $isFree =$class->isFree;
        $Price = $class->Price;
        $CoachID = $class->CoachID;
        $NumOfAttendants=$class->NumOfAttendants;
        $AvailablePlaces=$class->NumOfAttendants;

    
        $finalresult = true; // Initialize result
    
        foreach ($Dates as $Date) {
            $sql = "INSERT INTO assignedclass (ClassID, Date, StartTime, EndTime, isFree, Price, CoachID,NumOfAttendants,AvailablePlaces) 
                    VALUES ('$ClassID', '$Date', '$StartTime', '$EndTime', '$isFree', '$Price', '$CoachID','$NumOfAttendants','$AvailablePlaces')";
    
            $result = mysqli_query($conn, $sql);
    
            if (!$result) {
                $finalresult = false; // If any query fails, set result to false
            }
        }
    
        return $finalresult;
    }

    public static function addClass($name, $descr, $imagePath, $days)
    {
        global $conn; // Assuming you have a global database connection variable named $conn
    
        $sql = "INSERT INTO class (Name, Description, imgPath) VALUES ('$name', '$descr', '$imagePath')";
    
        // Execute the first query to insert the class
        $result1 = mysqli_query($conn, $sql);
    
        // Check if the first query was successful
        if ($result1) {
            $classId = mysqli_insert_id($conn);
    
            // Loop through the days and execute the second query for each day
            foreach ($days as $day) {
                $mysql = "INSERT INTO class_days (ClassID, Day) VALUES ('$classId', '$day')";
                $result2 = mysqli_query($conn, $mysql);
                
                // Check if the second query failed
                if (!$result2) {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }


    public static function getid($class){
        global $conn;
        $sql ="SELECT ID FROM assignedclass WHERE ID='$class->ID'";
        $result=mysqli_query($conn,$sql);
       
    return $result;
    }

    public static function getClassDaysById($classId)
    {
        global $conn; // Assuming you have a global database connection variable named $conn
    
        $sql = "SELECT Day FROM class_days WHERE ClassID = '$classId'";
    
        $result = mysqli_query($conn, $sql);
    
        $days = array();
    
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $days[] = $row['Day'];
            }
        }
    
        return $days;
    }

    public function updateClass($class)
    {
        global $conn;
    
        $ClassID = $class->ClassID;
        $Date = $class->Date;
        $StartTime= $class->StartTime;
        $EndTime = $class->EndTime;
        $Price = $class->Price;        
        $CoachID = $class->CoachID;
        $NumOfAttendants=$class->NumOfAttendants;

    
        $class_id = $_SESSION['ID'];

            // Update with the new password
            $sql = "UPDATE assignedclass SET ClassID='$ClassID', Date='$Date', StartTime= '$StartTime', EndTime='$EndTime', Price='$Price', CoachID='$CoachID' ,
            NumOfAttendants='$NumOfAttendants'
                    WHERE ID = $class_id";
                    return $conn->query($sql);
        

    }

    public function deleteClass($classID,$coachID,$date)
    {
        global $conn;

        $sql="DELETE FROM assignedclass where ClassID = '$classID' and CoachID = '$coachID' and Date = '$date'";

        return mysqli_query($conn,$sql);

    }


    public static function getSelectedCoachClasses($coachID)
    {
        global $conn;

        $results = array();

        $sql = "SELECT assignedclass.CoachID,assignedclass.Date, assignedclass.StartTime, assignedclass.EndTime, class.Name
        FROM assignedclass
        INNER JOIN class ON class.ID = assignedclass.ClassID 
        WHERE assignedclass.CoachID = '$coachID'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
               $results[] = array(
                'CoachID'=>$row['CoachID'],
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
        global $conn;
    
        $results = array();
    
        $sql = "SELECT assignedclass.ClassID, assignedclass.Date, class.Name AS ClassName, assignedclass.CoachID,
                employee.Name AS CoachName, employee.PhoneNumber
                FROM assignedclass
                INNER JOIN class ON assignedclass.ClassID = class.ID 
                INNER JOIN employee ON assignedclass.CoachID = employee.ID";
    
        $result = mysqli_query($conn, $sql);
    
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


    public function getClassDetails()
    {
        global $conn;

        $sql ="SELECT class.imgPath, class.Name AS className , assignedclass.CoachID AS CoachID, assignedclass.Date ,assignedclass.StartTime , assignedclass.EndTime, 
        assignedclass.NumOfAttendants , assignedclass.Price, assignedclass.ID AS assignedclassID, employee.Name AS employeeName ,assignedclass.AvailablePlaces
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID";

        $result = mysqli_query($conn, $sql);

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

    public function ReservationFreeClass($CoachID, $AssignedClassID, $ClientID)
    {
        global $conn;
        $isActivated="Activated";
    
        $checkSql = "SELECT * FROM `reserved class` WHERE AssignedClassID = '$AssignedClassID' AND CoachID = '$CoachID' AND ClientID = '$ClientID'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        $alreadyExists = mysqli_num_rows($checkResult) > 0;
    
        if (!$alreadyExists) {
            $sql = "INSERT INTO `reserved class` (AssignedClassID,CoachID,ClientID,isActivated) VALUES ('$AssignedClassID','$CoachID','$ClientID','$isActivated')";

            $result = mysqli_query($conn, $sql);
            
            if($result) {
            $sql1="UPDATE assignedclass
            SET AvailablePlaces= AvailablePlaces - 1
            WHERE assignedclass.ID = '$AssignedClassID'";

            $insertResult = mysqli_query($conn, $sql1);
    
            return array('inserted' => $insertResult, 'alreadyExists' => false);
            }
        } else {
            return array('inserted' => false, 'alreadyExists' => true);
        }
    }

    public function ReservationNotFreeClass($CoachID, $AssignedClassID, $ClientID)
    {
        global $conn;
        $isActivated="Not Activated";
    
        $checkSql = "SELECT * FROM `reserved class` WHERE AssignedClassID = '$AssignedClassID' AND CoachID = '$CoachID' AND ClientID = '$ClientID'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        $alreadyExists = mysqli_num_rows($checkResult) > 0;
    
        if (!$alreadyExists) {
            $sql = "INSERT INTO `reserved class` (AssignedClassID,CoachID,ClientID,isActivated) VALUES ('$AssignedClassID','$CoachID','$ClientID','$isActivated')";
            $insertResult = mysqli_query($conn, $sql);
    
            return array('inserted' => $insertResult, 'alreadyExists' => false);
        } else {
            return array('inserted' => false, 'alreadyExists' => true);
        }
    }

    public static function getClientClassInfo()
    {
        global $conn;

        $isActivated = "Activated";

        $sql="SELECT class.Name AS className, assignedclass.Date, assignedclass.StartTime, assignedclass.EndTime, 
        employee.Name AS employeeName, assignedclass.Price ,  `reserved class`.ClientID
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID
        INNER JOIN `reserved class` ON `reserved class`.AssignedClassID = assignedclass.ID
        WHERE  `reserved class`.isActivated ='$isActivated' AND `reserved class`.ClientID = " . $_SESSION['ID'];

        $result = mysqli_query($conn, $sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'className'=>$row['className'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'employeeName' => $row['employeeName'],
                    'Price' => $row['Price'],
                    'ClientID'=>$row['ClientID'],
                );
            }
            return $results;
        }

    }

    public static function getClassRequests()
    {
        global $conn;

        $isActivated='Not Activated';

        $sql="SELECT client.ID,client.FirstName AS clientName,class.Name AS className, assignedclass.Date, assignedclass.StartTime,
        assignedclass.EndTime, employee.Name AS employeeName, assignedclass.Price , `reserved class`.ID AS reservedClassID , assignedclass.ID AS assignedClassID,
         assignedclass.AvailablePlaces
        FROM `reserved class`
        INNER JOIN client ON client.ID = `reserved class`.ClientID
        INNER JOIN assignedclass ON assignedclass.ID = `reserved class`.AssignedClassID
        INNER JOIN employee ON employee.ID = `reserved class`.CoachID
        INNER JOIN class ON class.ID = assignedclass.ClassID
        WHERE `reserved class`.isActivated = '$isActivated'";

        $result = mysqli_query($conn, $sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'ID'=>$row['ID'],
                    'clientName' => $row['clientName'],
                    'className' => $row['className'],
                    'Date' => $row['Date'],
                    'StartTime' => $row['StartTime'],
                    'EndTime' => $row['EndTime'],
                    'employeeName'=>$row['employeeName'],
                    'Price'=>$row['Price'],
                    'reservedClassID' => $row['reservedClassID'],
                    'assignedClassID' => $row['assignedClassID'],
                    'AvailablePlaces' => $row['AvailablePlaces']
                );
            }
        }
        return $results;
    }

    public function acceptClass($reservedClassID,$assignedClassID)
    {
        global $conn;

        $isActivated= 'Activated';

        $sql="UPDATE `reserved class`
        SET isActivated='$isActivated'
        WHERE ID = $reservedClassID";

        if($conn->query($sql)){

        $sql1="UPDATE assignedclass
        SET AvailablePlaces= AvailablePlaces - 1
        WHERE assignedclass.ID = '$assignedClassID'";

        return $conn->query($sql1);
        }
    }

    public function declineClass($reservedClassID)
    {
        global $conn;

        $sql="DELETE 
        FROM `reserved class`
        WHERE ID = $reservedClassID";

        return $conn->query($sql);

    }
  

}
?>