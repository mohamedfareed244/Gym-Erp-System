<?php


include_once "../includes/dbh.inc.php";


class ptPackages
{
    public $ID;
    public $Name;
    public $NumOfSessions;
    public $MinPackageMonths;
    public $Price;


    public static function getAllptPacks()
    {
        global $conn;

        $sql = "SELECT * FROM `private training package` ";
        $result = $conn->query($sql);

        $ptpackagesarray = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ptPackage = new ptPackages();
                $ptPackage->ID = $row['ID'];
                $ptPackage->Name = $row['Name'];
                $ptPackage->NumOfSessions = $row['NumOfSessions'];
                $ptPackage->MinPackageMonths = $row['MinPackageMonths'];
                $ptPackage->Price = $row['Price'];


                $ptpackagesarray[] = $ptPackage;
            }
        }

        return $ptpackagesarray;
    }

    public function addptPacks($ptPackage)
    {
        global $conn;
    
        $Name = $ptPackage->Name;
        $NumOfSessions = $ptPackage->NumOfSessions;
        $MinPackageMonths = $ptPackage->MinPackageMonths;
        $Price = $ptPackage->Price;
    
        $sql = "INSERT INTO `private training package` (Name, NumOfSessions, MinPackageMonths, Price) 
                VALUES ('$Name', '$NumOfSessions', '$MinPackageMonths', '$Price')";
        return $conn->query($sql);
    }
    
    public function updateptPacks($ptPackage)
    {
        global $conn;
    
        $Name = $ptPackage->Name;
        $NumOfSessions = $ptPackage->NumOfSessions;
        $MinPackageMonths = $ptPackage->MinPackageMonths;
        $Price = $ptPackage->Price;
    
        $ptpackid = $ptPackage->ID;
    
        $sql = "UPDATE `private training package` 
                SET Name='$Name', NumOfSessions='$NumOfSessions', MinPackageMonths='$MinPackageMonths', Price='$Price' 
                WHERE ID = $ptpackid";
    
        return $conn->query($sql);
    }
    

    public function deleteptPacks($ptPackage)
    {
        global $conn;
    
        $ptpackid = $ptPackage->ID;
    
        $sql = "DELETE FROM `private training package` WHERE ID = $ptpackid";
    
        return $conn->query($sql);
    }
    
}
