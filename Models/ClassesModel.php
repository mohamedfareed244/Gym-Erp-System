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
    public $Coach;
   
    public static function getAllClasses(){
        global $conn;
         $sql = "SELECT * FROM `class`";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $class = new Classes();
                $class->ID = $row['ID'];
                $class->ClassID = $row['ClassID'];
                $class->Date = $row['Date'];
                $class->StartTime = $row['StartTime'];
                $class->EndTime = $row['EndTime'];
                $class->Price = $row['Price'];
                $class->Coach = $row['Coach'];
             

                $classes[] = $class;
            }
        }
        return $classes;
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
        $Coach = $class->Coach;
    
        $finalresult = true; // Initialize result
    
        foreach ($Dates as $Date) {
            $sql = "INSERT INTO assignedclass (ClassID, Date, StartTime, EndTime, isFree, Price, Coach) 
                    VALUES ('$ClassID', '$Date', '$StartTime', '$EndTime', '$isFree', '$Price', '$Coach')";
    
            $result = mysqli_query($conn, $sql);
    
            if (!$result) {
                $finalresult = false; // If any query fails, set result to false
            }
        }
    
        return $finalresult;
    }

    public static function addClassImage($name,$descr, $imagePath)
{
    global $conn; // Assuming you have a global database connection variable named $conn

    $sql = "INSERT INTO class (Name, Description,imgPath) VALUES ('$name', '$descr', '$imagePath')";

    return mysqli_query($conn, $sql);
}


    public static function getid($class){
        global $conn;
        $sql ="SELECT ID FROM assignedclass WHERE ID='$class->ID'";
        $result=mysqli_query($conn,$sql);
       
    return $result;
    }

    public function updateClass($class)
    {
        global $conn;
    
        $ClassID = $class->ClassID;
        $Date = $class->Date;
        $StartTime= $class->StartTime;
        $EndTime = $class->EndTime;
        $Price = $class->Price;        
        $Coach = $class->Coach;

    
        $class_id = $_SESSION['ID'];

            // Update with the new password
            $sql = "UPDATE assignedclass SET ClassID='$ClassID', Date='$Date', StartTime= '$StartTime', EndTime='$EndTime', Price='$Price', Coach='$Coach'
                    WHERE ID = $class_id";
                    return $conn->query($sql);
        

    }

    public function deleteClass()
    {
        global $conn;

        $sql="DELETE from class where ID =" . $_SESSION['ID'];

        return mysqli_query($conn,$sql);

    }

    }
    



?>