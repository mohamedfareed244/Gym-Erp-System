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

    public function getUserPackageDetails($packageId)
    {
        global $conn;

         if (!isset($_SESSION['clientID'])) {
            return null;
        }

        $clientId = $_SESSION['clientID'];

        $sql = "SELECT c.*, ptm.SessionsCount, ppd.*
                FROM client c
                INNER JOIN pt_membership ptm ON c.ID = ptm.ClientID
                INNER JOIN pt_package_details ppd ON ptm.PrivateTrainingPackageID = ppd.ID
                WHERE c.ID = $clientId AND ptm.PrivateTrainingPackageID = $packageId";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $userPackageDetails = new ptPackages();
            $userPackageDetails->ClientID = $row['ID'];
            $userPackageDetails->FirstName = $row['FirstName'];
            $userPackageDetails->LastName = $row['LastName'];
            $userPackageDetails->SessionsCount = $row['SessionsCount'];
            $userPackageDetails->PackageID = $row['ID'];
            $userPackageDetails->PackageName = $row['Name'];
            $userPackageDetails->NumOfSessions = $row['NumOfSessions'];
            $userPackageDetails->MinPackageMonths = $row['MinPackageMonths'];
            $userPackageDetails->Price = $row['Price'];

            return $userPackageDetails;
        } else {
            return null; 
        }
    }

    
}


?>