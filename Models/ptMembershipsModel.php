<?php

require_once("Model.php");
include_once "ptPackageModel.php";
include_once "ClientModel.php";
include_once "CoachesModel.php";
include_once "EmployeeModel.php";


class ptMemberships extends Model
{

    private $ID;
    private $ClientID;
    private $CoachID;
    private $PrivateTrainingPackageID;
    private $SessionsCount;
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

    public function getClientID()
    {
        return $this->ClientID;
    }

    public function setClientID($ClientID)
    {
        $this->ClientID = $ClientID;
    }

    public function getCoachID()
    {
        return $this->CoachID;
    }

    public function setCoachID($CoachID)
    {
        $this->CoachID = $CoachID;
    }

    public function getPrivateTrainingPackageID()
    {
        return $this->PrivateTrainingPackageID;
    }

    public function setPrivateTrainingPackageID($PrivateTrainingPackageID)
    {
        $this->PrivateTrainingPackageID = $PrivateTrainingPackageID;
    }

    public function getSessionsCount()
    {
        return $this->SessionsCount;
    }

    public function setSessionsCount($SessionsCount)
    {
        $this->SessionsCount = $SessionsCount;
    }

    public function getIsActivated()
    {
        return $this->isActivated;
    }

    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;
    }


    public function getAllPtMemberships()
    {
        $sql = "SELECT * FROM `private training membership`";
        $result = $this->db->query($sql);
        $ptmemberships = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ptmembership = new ptMemberships();
                $ptmembership->ID = $row['ID'];
                $ptmembership->ClientID = $row['ClientID'];
                $ptmembership->CoachID = $row['CoachID'];
                $ptmembership->PrivateTrainingPackageID = $row['PrivateTrainingPackageID'];
                $ptmembership->SessionsCount = $row['SessionsCount'];
                $ptmembership->isActivated = $row['isActivated'];

                $ptmemberships[] = $ptmembership;
            }
        }
        return $ptmemberships;
    }

    public function AddptMemberships($ptMembership, $PackageMinMonths)
    {
        $ClientID = $ptMembership->ClientID;
        $CoachID = $ptMembership->CoachID;
        $Sessions = $ptMembership->SessionsCount;
        $PackageID = $ptMembership->PrivateTrainingPackageID;
        $isActivated = "Not Activated";

        $check1Sql = "SELECT * FROM `private training membership` WHERE PrivateTrainingPackageID ='$PackageID' AND ClientID = '$ClientID'";
        $check1Result = $this->db->query($check1Sql);
        $alreadyThisMembershipExists = mysqli_num_rows($check1Result) > 0;

        $check2Sql = "SELECT * FROM `private training membership` WHERE ClientID = '$ClientID'";
        $check2Result = $this->db->query($check2Sql);
        $alreadyAnotherMembershipExists = mysqli_num_rows($check2Result) > 0;

        $check3Sql = "SELECT package.NumOfMonths, membership.PackageID
                FROM package 
                INNER JOIN membership ON package.ID = membership.PackageID
                WHERE membership.ClientID = '$ClientID'";
        $check3Result = $this->db->query($check3Sql);

        if ($alreadyThisMembershipExists) {
            return array('alreadyThisMembershipExists' => true, 'alreadyAnotherMembershipExists' => false, 'success' => false, 'error' => false);
        } elseif ($alreadyAnotherMembershipExists) {
            return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => true, 'success' => false, 'error' => false);
        } else {
            if ($check3Result && $check3Result->num_rows > 0) {
                $row = $check3Result->fetch_assoc();
                $packageMonths = $row['NumOfMonths'];
                if ($packageMonths >= $PackageMinMonths) {
                    $sql = "INSERT INTO `private training membership`(ClientID, CoachID, PrivateTrainingPackageID, SessionsCount, isActivated)
                        VALUES ('$ClientID', '$CoachID', '$PackageID', '$Sessions', '$isActivated')";
                    $insertResult = $this->db->query($sql);
                    return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => $insertResult, 'error' => false);
                } else {
                    return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => false, 'error' => true);
                }
            }
        }
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

    public function addPtMembershipForClient($clientID, $ptPackageID, $coachID)
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
                    $ptPackage = $ptPackage->getPtPackageByID($ptPackageID);
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

    public function getClientPtMembershipInfo()
    {

        $isActivated = "Activated";

        $sql = "SELECT `private training membership`.SessionsCount, `private training package`.NumOfSessions, `private training package`.Price, employee.Name
                FROM `private training membership`
                INNER JOIN `private training package` ON `private training package`.ID = `private training membership`.PrivateTrainingPackageID 
                INNER JOIN employee ON employee.ID = `private training membership`.CoachID
                WHERE `private training membership`.isActivated = '$isActivated' AND `private training membership`.ClientID = " . $_SESSION['ID'];

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'SessionsCount' => $row['SessionsCount'],
                    'NumOfSessions' => $row['NumOfSessions'],
                    'Name' => $row['Name'],
                    'Price' => $row['Price']
                );
            }
            return $results;
        }
    }


    public function getPtMembershipRequests()
    {

        $isActivated = "Not Activated";

        $sql = "SELECT client.ID AS ClientID,client.FirstName,Client.LastName,`private training package`.Name AS ptPackageName,`private training package`.NumOfSessions,
        `private training package`.Price,`private training membership`.SessionsCount,`private training membership`.ID AS ptMembershipID ,employee.Name AS employeeName
        FROM `private training membership`
        INNER JOIN client ON client.ID = `private training membership`.ClientID
        INNER JOIN `private training package` ON `private training package`.ID = `private training membership`.PrivateTrainingPackageID
        INNER JOIN employee ON employee.ID = `private training membership`.CoachID
        WHERE `private training membership`.isActivated = '$isActivated'";

        $result = $this->db->query($sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'ClientID' => $row['ClientID'],
                    'FirstName' => $row['FirstName'],
                    'LastName' => $row['LastName'],
                    'ptPackageName' => $row['ptPackageName'],
                    'NumOfSessions' => $row['NumOfSessions'],
                    'Price' => $row['Price'],
                    'SessionsCount' => $row['SessionsCount'],
                    'ptMembershipID' => $row['ptMembershipID'],
                    'employeeName' => $row['employeeName']

                );
            }
            return $results;
        }
    }

    public function acceptPtMembership($PrivateTrainingPackageID)
    {
        $isActivated = "Activated";

        $sql = "UPDATE `private training membership` 
        SET isActivated='$isActivated' 
        WHERE ID = $PrivateTrainingPackageID";

        return $this->db->query($sql);
    }

}
?>