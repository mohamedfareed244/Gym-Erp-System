<?php


include_once "../includes/dbh.inc.php";

include_once "employeeModel.php";
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
        $result = $conn->query($sql);

        if ($result) {
            $ptpackages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            // Return the packages
            return $ptpackages;
        } else {
            return [];
        }
    }

    public static function getActivePtPackagesForClient($clientID)
    {
        global $conn;

        $currentDate = date("Y-m-d");
        $clientMembership = Memberships::hasActiveMembership($clientID);
        if ($clientMembership) {

            $sql = "SELECT * FROM `private training package` WHERE `isActivated` = 'Activated'";

            $result = $conn->query($sql);
            if ($result) {
                $membership = Memberships::getMembership($clientID);
                $packages = array();
                while ($row = $result->fetch_assoc()) {
                    if (strtotime($membership->endDate) >= strtotime($currentDate . " + " . $row['MinPackageMonths'] . " months")) {
                        $package = new ptPackages();
                        $package->ID = $row["ID"];
                        $package->Name = $row["Name"];
                        $package->MinPackageMonths = $row["MinPackageMonths"];
                        $package->NumOfSessions = $row["NumOfSessions"];
                        $package->Price = $row["Price"];
                        $packages[] = $package;
                    }
                }
                return $packages;
            }
        }
        return null;
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
                INNER JOIN `private training membership` ptm ON c.ID = ptm.ClientID
                INNER JOIN `private training package` ppd ON ptm.PrivateTrainingPackageID = ppd.ID
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
    public static function getPtPackage($ptPackageID)
    {
        global $conn;
        $sql = "SELECT * FROM `private training package` WHERE ID='$ptPackageID'";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $ptPackage = new PtPackages();
            $ptPackage->ID = $row["ID"];
            $ptPackage->Name = $row["Name"];
            $ptPackage->NumOfSessions = $row["NumOfSessions"];
            $ptPackage->MinPackageMonths = $row["MinPackageMonths"];
            $ptPackage->Price = $row["Price"];
            $ptPackage->isActivated = $row["isActivated"];

            return $ptPackage;
        }
        return null;
    }

    public static function ExistingPtMembership($clientID)
    {
        global $conn;
        $findClient = Client::checkClient($clientID);
        if ($findClient) {
            $sql = "SELECT * FROM `private training memebrship` WHERE ClientID = $clientID";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                return true;
            }
        }
        return false;
    }
    public static function addPackageForClient($clientID, $ptPackageID, $coachID)
    {
        global $conn;
        $findClient = Client::checkClient($clientID);
        if ($findClient) {
            $checkMembership = Memberships::hasActiveMembership($clientID);
            if ($checkMembership) {
                $coach = Employee::getEmployeeByID($coachID);
                if ($coach != null) {
                    $ptPackage = ptPackages::getPtPackage($ptPackageID);
                    if ($ptPackage != null) {
                        $sql = "INSERT INTO `private training membership` (ClientID, CoachID, PrivateTrainingPackageID, SessionsCount)
                        VALUES ('$clientID', '$coachID','$ptPackage->ID', '$ptPackage->NumOfSessions')";
                        return mysqli_query($conn, $sql);
                    }
                }
            }

        }
        return false;
    }

    public function getAllPtPackagesforClient()
    {
        $sql = "SELECT * FROM `private training package` WHERE isActivated='Activated'";
        $result = $this->db->query($sql);;

        if ($result) {
            $packages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            return $packages;
        } else {
            return [];
        }
    }


}

class clientPtPackage
{
    public $ClientID;
    public $CoachID;

    public $PrivateTrainingPackageID;

    public $SessionsCount;

}

?>