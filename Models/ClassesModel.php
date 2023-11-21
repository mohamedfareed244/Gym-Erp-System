<?php


include_once "../includes/dbh.inc.php";

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
    
        $finalresult = true; // Initialize result
    
        foreach ($Dates as $Date) {
            $sql = "INSERT INTO assignedclass (ClassID, Date, StartTime, EndTime, isFree, Price, CoachID,NumOfAttendants) 
                    VALUES ('$ClassID', '$Date', '$StartTime', '$EndTime', '$isFree', '$Price', '$CoachID','$NumOfAttendants')";
    
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


    public function getSelectedCoachClasses($coachID)
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
        }
    
        return $results;
    }


    public function getClassDetails()
    {
        global $conn;

        $sql ="SELECT class.imgPath, class.Name AS className , assignedclass.CoachID AS CoachID, assignedclass.Date ,assignedclass.StartTime , assignedclass.EndTime, 
        assignedclass.NumOfAttendants , assignedclass.Price, assignedclass.ID AS assignedclassID, employee.Name AS employeeName 
        FROM class
        INNER JOIN assignedclass ON class.ID = assignedclass.ClassID
        INNER JOIN employee ON employee.ID = assignedclass.CoachID";

        $result = mysqli_query($conn, $sql);
    
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
                    'employeeName' => $row['employeeName']

                );
            }
        }
    
        return $results;


    }

    public function addReservedClass($CoachID, $AssignedClassID, $ClientID)
    {
        global $conn;
    
        $checkSql = "SELECT * FROM `reserved class` WHERE AssignedClassID = '$AssignedClassID' AND CoachID = '$CoachID' AND ClientID = '$ClientID'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        $alreadyExists = mysqli_num_rows($checkResult) > 0;
    
        if (!$alreadyExists) {
            $sql = "INSERT INTO `reserved class` (AssignedClassID,CoachID,ClientID) VALUES ('$AssignedClassID','$CoachID','$ClientID')";
            $insertResult = mysqli_query($conn, $sql);
    
            return array('inserted' => $insertResult, 'alreadyExists' => false);
        } else {
            return array('inserted' => false, 'alreadyExists' => true);
        }
    }

    }
    
    



    
    



?>