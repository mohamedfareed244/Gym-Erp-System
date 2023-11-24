<?php


include_once "../includes/dbh.inc.php";

include_once "ClientModel.php";
include_once "membershipsModel.php";

class ptPackages
{
    public $ID;
    public $Name;
    public $NumOfSessions;
    public $MinPackageMonths;
    public $Price;
    public $isActivated;

    public function getAllPtPackagesforEmployee()
    {
        global $conn;

        $sql = "SELECT * FROM `private training package`";
        // Perform the query
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            $ptpackages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            // Return the packages
            return $ptpackages;
        } else {
            return [];
        }
    }

    public function addptPacks($ptPackage)
    {
        global $conn;

        $Name = $ptPackage->Name;
        $NumOfSessions = $ptPackage->NumOfSessions;
        $MinPackageMonths = $ptPackage->MinPackageMonths;
        $Price = $ptPackage->Price;
        $isActivated = "Activated";

        $sql = "INSERT INTO `private training package` (Name, NumOfSessions, MinPackageMonths, Price, isActivated) 
                VALUES ('$Name', '$NumOfSessions', '$MinPackageMonths', '$Price','$isActivated')";
        return $conn->query($sql);
    }


    public function activatePtPackage($ptpackageID)
    {
        global $conn;

        $sql = "UPDATE `private training package` SET isActivated='Activated' WHERE ID='$ptpackageID'";

        return $conn->query($sql);
    }


    public function deactivatePtPackage($ptpackageID)
    {
        global $conn;

        $sql = "UPDATE `private training package` SET isActivated='Deactivated' WHERE ID='$ptpackageID'";

        return $conn->query($sql);
    }

    public function getUserPackageDetails($packageId)
    {
        global $conn;

        if (!isset($_SESSION['clientID'])) {
            return null;
        }

        $clientId = $_SESSION['clientID'];

        $sql = "SELECT c.*, ptm.SessionsCount, ppd.*, e.Name AS CoachName
                FROM client c
                INNER JOIN pt_membership ptm ON c.ID = ptm.ClientID
                INNER JOIN pt_package_details ppd ON ptm.PrivateTrainingPackageID = ppd.ID
                INNER JOIN employee e ON ptm.CoachID = e.ID
                WHERE c.ID = $clientId AND ptm.PrivateTrainingPackageID = $packageId";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $userPackageDetails = new stdClass();
            $userPackageDetails->ClientID = $row['ID'];
            $userPackageDetails->FirstName = $row['FirstName'];
            $userPackageDetails->LastName = $row['LastName'];
            $userPackageDetails->Age = $row['Age'];
            $userPackageDetails->Email = $row['Email'];
            $userPackageDetails->Phone = $row['Phone'];
            $userPackageDetails->SessionsCount = $row['SessionsCount'];
            $userPackageDetails->PackageID = $row['ID'];
            $userPackageDetails->PackageName = $row['Name'];
            $userPackageDetails->NumOfSessions = $row['NumOfSessions'];
            $userPackageDetails->MinPackageMonths = $row['MinPackageMonths'];
            $userPackageDetails->Price = $row['Price'];
            $userPackageDetails->CoachName = $row['CoachName'];

            return $userPackageDetails;
        } else {
            return null;
        }
    }
    public static function checkPtPackage($ptPackageID)
    {
        global $conn;
        $sql = "SELECT * FROM `private training package` WHERE ID='$ptPackageID'";
        $result = $conn->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        } else {
            return $found;
        }
    }
    public static function addPackageForClient($clientID, $ptPackageID)
    {
        global $conn;
        $findClient = Client::checkClient($clientID);
        if ($findClient) {
            $checkMembership = Memberships::hasActiveMembership($clientID);
            if ($checkMembership) {
                $findPtPackage = ptPackages::checkPtPackage($ptPackageID);
                if ($findPtPackage) {
                    
                }
            }

        }
    }

}

class clientPtPackage{
    public $ClientID;
    public $CoachID;

    public $PrivateTrainingPackageID;

    public $SessionsCount;

}

?>