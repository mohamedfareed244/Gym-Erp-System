<?php


require_once("Model.php");

include_once "EmployeeModel.php";
include_once "ClientModel.php";
include_once "MembershipsModel.php";

class ptPackages extends Model
{
    private $ID;
    private $Name;
    private $NumOfSessions;
    private $MinPackageMonths;
    private $Price;
    private $isActivated;

    function __construct()
    {
        $this->db = $this->connect();
    }

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getNumOfSessions()
    {
        return $this->NumOfSessions;
    }

    public function setNumOfSessions($NumOfSessions)
    {
        $this->NumOfSessions = $NumOfSessions;
    }

    public function getMinPackageMonths()
    {
        return $this->MinPackageMonths;
    }

    public function setMinPackageMonths($MinPackageMonths)
    {
        $this->MinPackageMonths = $MinPackageMonths;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function getIsActivated()
    {
        return $this->isActivated;
    }

    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;
    }

    public function getAllPtPackagesforEmployee()
    {

        $sql = "SELECT * FROM `private training package`";
        $result = $this->db->query($sql);

        if ($result) {
            $ptpackages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            // Return the packages
            return $ptpackages;
        } else {
            return [];
        }
    }

    public function getActivePtPackagesForClient($clientID)
    {
        $currentDate = date("Y-m-d");
        $Memberships = new Memberships();
        $clientMembership = $Memberships->hasActiveMembership($clientID);
        if ($clientMembership) {

            $sql = "SELECT * FROM `private training package` WHERE `isActivated` = 'Activated'";

            $result = $this->db->query($sql);
            if ($result) {
                $membership = $Memberships->getMembership($clientID);
                $packages = array();
                while ($row = $result->fetch_assoc()) {
                    if (strtotime($membership->getendDate()) >= strtotime($currentDate . " + " . $row['MinPackageMonths'] . " months")) {
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
        $Name = $ptPackage->Name;
        $NumOfSessions = $ptPackage->NumOfSessions;
        $MinPackageMonths = $ptPackage->MinPackageMonths;
        $Price = $ptPackage->Price;
        $isActivated = "Activated";

        $sql = "INSERT INTO `private training package` (Name, NumOfSessions, MinPackageMonths, Price, isActivated) 
                VALUES ('$Name', '$NumOfSessions', '$MinPackageMonths', '$Price','$isActivated')";
        return $this->db->query($sql);
    }


    public function activatePtPackage($ptpackageID)
    {
        $sql = "UPDATE `private training package` SET isActivated='Activated' WHERE ID='$ptpackageID'";

        return $this->db->query($sql);
    }


    public function deactivatePtPackage($ptpackageID)
    {
        $sql = "UPDATE `private training package` SET isActivated='Deactivated' WHERE ID='$ptpackageID'";

        return $this->db->query($sql);
    }

    public function getUserPackageDetails($packageId)
    {

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

        $result = $this->db->query($sql);

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
    public function checkPtPackage($ptPackageID)
    {
        $sql = "SELECT * FROM `private training package` WHERE ID='$ptPackageID'";
        $result = $this->db->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        } else {
            return $found;
        }
    }
    public function getPtPackage($ptPackageID)
    {
        $sql = "SELECT * FROM `private training package` WHERE ID='$ptPackageID'";
        $result = $this->db->query($sql);
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

    public function ExistingPtMembership($clientID)
    {
        $Client = new Client();
        $findClient = $Client->checkClient($clientID);
        if ($findClient) {
            $sql = "SELECT * FROM `private training memebrship` WHERE ClientID = $clientID";
            $result = $this->db->query($sql);
            if ($result && $result->num_rows > 0) {
                return true;
            }
        }
        return false;
    }

    public function addPtMembership($clientID, $ptPackageID, $coachID)
    {
        $Client = new Client();
        $Employee = new Employee();
        $findClient = $Client->checkClient($clientID);
        if ($findClient) {
            $Memberships = new Memberships();
            $checkMembership = $Memberships->hasActiveMembership($clientID);
            if ($checkMembership) {
                $coach = $Employee->getEmployeeByID($coachID);
                if ($coach) {
                    $ptPackage = new ptPackages();
                    $ptPackage = $ptPackage->getPtPackage($ptPackageID);
                    $ptID = $ptPackage->getID();
                    $ptSessions = $ptPackage->getNumOfSessions();
                    if ($ptPackage) {
                        $sql = "INSERT INTO `private training membership` (ClientID, CoachID, PrivateTrainingPackageID, SessionsCount, isActivated)
                        VALUES ('$clientID', '$coachID','$ptID', '$ptSessions', 'Activated')";
                        return $this->db->query($sql);
                    }
                }
            }
        }
        return false;
    }

    public function getAllPtPackagesforClient()
    {
        $sql = "SELECT * FROM `private training package` WHERE isActivated='Activated'";
        $result = $this->db->query($sql);

        if ($result) {
            $packages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            return $packages;
        } else {
            return [];
        }
    }
}

?>