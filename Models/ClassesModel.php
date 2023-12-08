<?php
require_once("Model.php");

//include_once "../includes/dbh.inc.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Classes extends Model
{

    private $ID;
    private $Name;
    private $Description;
    private $ImgPath;

    public function setID($id)
    {
        $this->ID = $id;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setDescription($description)
    {
        $this->Description = $description;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setImgPath($imgPath)
    {
        $this->ImgPath = $imgPath;
    }

    public function getImgPath()
    {
        return $this->ImgPath;
    }

    public function getAllClasses()
    {

        $sql = "SELECT * FROM class";
        // Perform the query
        $result = $this->db->query($sql);

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

    public function addClass($name, $descr, $imagePath, $days)
    {

        $sql = "INSERT INTO class (Name, Description, imgPath) VALUES ('$name', '$descr', '$imagePath')";

        // Execute the first query to insert the class
        $result1 = $this->db->query($sql);

        // Check if the first query was successful
        if ($result1) {
            $classId = $this->db->getConn()->insert_id;

            // Loop through the days and execute the second query for each day
            foreach ($days as $day) {
                $mysql = "INSERT INTO class_days (ClassID, Day) VALUES ('$classId', '$day')";
                $result2 = $this->db->query($mysql);

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

    public function getClassName($classID)
    {
        $sql = "SELECT `Name` FROM class WHERE ID='$classID'";
        $result = $this->db->query($sql);

        return $result;
    }

    
    public function getClassDaysById($classId)
    {
        $sql = "SELECT Day FROM class_days WHERE ClassID = '$classId'";

        $result = $this->db->query($sql);

        $days = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $days[] = $row['Day'];
            }
        }

        return $days;
    }


}
?>
