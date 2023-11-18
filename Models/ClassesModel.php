<?php


include_once "../includes/dbh.inc.php";

class Classes{
    
    public $ID;
    public $Name;
    public $Date;
    public $StartTime;
    public $EndTime;
    public $Price;
    public $Coach;
   


    public static function addClass($class)
    {
        global $conn;

        $Name=$class->Name;
        $Date=$class->Date;
        $StartTime=$class->StartTime;
        $EndTime=$class->EndTime;
        $Price=$class->Price;
        $Coach=$class->Coach;
       
        $sql = "INSERT INTO class (Name, Date, StartTime, EndTime, Price, Coach) 
                VALUES ('$Name', '$Date', '$StartTime', '$EndTime', '$Price', '$Coach')";
         
        return mysqli_query($conn, $sql);    
    }
    public static function getid($class){
        global $conn;
        $sql ="SELECT ID FROM class WHERE ID='$class->ID'";
        $result=mysqli_query($conn,$sql);
       
    return $result;
    }

    public function updateClass($class)
    {
        global $conn;
    
        $Name = $class->Name;
        $Date = $class->Date;
        $StartTime= $class->StartTime;
        $EndTime = $class->EndTime;
        $Price = $class->Price;        
        $Coach = $class->Coach;

    
        $class_id = $_SESSION['ID'];

            // Update with the new password
            $sql = "UPDATE class SET Name='$Name', Date='$Date', StartTime= '$StartTime', EndTime='$EndTime', Price='$Price', Coach='$Coach'
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