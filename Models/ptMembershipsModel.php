<?php
include_once "../includes/dbh.inc.php";
include_once "ptPackageModel.php";
include_once "ClientModel.php";
include_once "CoachesModel.php";
include_once "employeeModel.php";




class ptMemberships{

    private $ClientID;
    private	$CoachID;
    private	$PrivateTrainingPackageID;
    public	$SessionsCount;
    private	$isActivated;	 


    public static function getAllPtMemberships()
    {
        global $conn;
        $sql = "SELECT * FROM `private training membership`";
        $result = $conn->query($sql);
        $ptmemberships = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ptmembership = new ptMemberships();
                $ptmembership->ID = $row['ID'];
                $ptmembership->clientId = $row['ClientID'];
                $ptmembership->coachid = $row['CoachID'];
                $ptmembership->PrivateTrainingPackageID = $row['PrivateTrainingPackageID'];
                $ptmembership->SessionsCount = $row['SessionsCount'];
                $ptmembership->isActivated = $row['isActivated'];

                $ptmemberships[] = $ptmembership;
            }
        }
        return $ptmemberships;
    }


    public function activatePtMembership($PrivateTrainingPackageID)
    {
        global $conn;

        $sql = "UPDATE `private training membership` SET isActivated='Activated' WHERE ID='$PrivateTrainingPackageID'";

        return $conn->query($sql);
    }


    public function deactivatePtMembership($PrivateTrainingPackageID)
    {
        global $conn;

        $sql = "UPDATE `private training membership` SET isActivated='Deactivated' WHERE ID='$PrivateTrainingPackageID'";

        return $conn->query($sql);
    }

   
    public static function addPtMembershipUserSide($ptPackageID)
    {
        global $conn;
        $pck = new ptPackages();
        $client = new Client();
        $isActivated = "Not Activated";
        $findClient = $client->checkClient($_SESSION['ID']); // Use $_SESSION['ID'] directly
        $findPackage = $pck->checkPtPackage($ptPackageID);
    
        if ($findClient && $findPackage) {
            $Package = $pck->getPtPackage($ptPackageID);
    
            $check1Sql = "SELECT * FROM `private training membership` WHERE PrivateTrainingPackageID ='$ptPackageID' AND ClientID = " . $_SESSION['ID'];
            $check1Result = mysqli_query($conn, $check1Sql);
            $alreadyThisMembershipExists = mysqli_num_rows($check1Result) > 0;
    
            $check2Sql = "SELECT * FROM `private training membership` WHERE ClientID = " . $_SESSION['ID'];
            $check2Result = mysqli_query($conn, $check2Sql);
            $alreadyAnotherMembershipExists = mysqli_num_rows($check2Result) > 0;
    
            if ($alreadyThisMembershipExists) {
                return array('alreadyThisMembershipExists' => true, 'alreadyAnotherMembershipExists' => false, 'success' => false);
            } elseif ($alreadyAnotherMembershipExists) {
                return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => true, 'success' => false);
            } else {
                $ClientID = $_SESSION['ID'];
            $CoachID = $Package->CoachID;
                $PrivateTrainingPackageID = $Package->PrivateTrainingPackageID;
                $SessionsCount = $Package->SessionsCount;
                $isActivated = $Package->isActivated;
    
                $sql = "INSERT INTO `private training membership` (ClientID, CoachID, PrivateTrainingPackageID, SessionsCount, isActivated)
                        VALUES ('$ClientID', '$CoachID', '$PrivateTrainingPackageID', '$SessionsCount', '$isActivated')";
                $insertResult = mysqli_query($conn, $sql);
    
                return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => $insertResult);
            }
        } else {
            // Handle the case where either client or package is not found
            return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => false, 'error' => 'Client or package not found');
        }
    }
    



    public static function getClientPtMembershipInfo()
    {
        global $conn;
    
        $isActivated = "Activated";
    
        $sql = "SELECT `private training package`.Name, `private training package`.NumOfSessions, `private training package`.MinPackageMonths, `private training package`.Price
                FROM `private training package`
                INNER JOIN `private training membership` ON `private training package`.ID = `private training membership`.PrivateTrainingPackageID 
                WHERE `private training membership`.isActivated = '$isActivated' AND `private training membership`.ClientID = " . $_SESSION['ID'];
    
        $result = mysqli_query($conn, $sql);
    
        $results = array();
    
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'Name' => $row['Name'],
                    'NumOfSessions' => $row['NumOfSessions'],
                    'MinPackageMonths' => $row['MinPackageMonths'],
                    'Price' => $row['Price']
                );
            }
            return $results;
        }
    }

    public static function getPtMembershipByPackageID($packageID) {
        global $conn;

        $sql = "SELECT * FROM `private training membership` WHERE PrivateTrainingPackageID = $packageID";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $ptMembership = new ptMemberships();
            $ptMembership->ID = $row['ID'];
            $ptMembership->clientId = $row['ClientID'];
            $ptMembership->coachid = $row['CoachID'];
            $ptMembership->PrivateTrainingPackageID = $row['PrivateTrainingPackageID'];
            $ptMembership->SessionsCount = $row['SessionsCount'];
            $ptMembership->isActivated = $row['isActivated'];

            return $ptMembership;
        }
    }
    
    public static function getCoachNamesForPackage($packageID) {
        global $conn;

        $coaches = Employee::GetAllCoaches();

        $coachNames = array();

        $sql = "SELECT CoachID FROM `private training membership` WHERE PrivateTrainingPackageID = $packageID";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $coachID = $row['CoachID'];

                $coach = array_filter($coaches, function ($c) use ($coachID) {
                    return $c['CoachID'] == $coachID;
                });

                if (!empty($coach)) {
                    $coach = reset($coach);
                    $coachNames[$coachID] = $coach['Name'];
                }
            }
        }

        return $coachNames;
    }


    public static function getPtMembershipRequests()
    {
        global $conn;

        $isActivated = "Not Activated";

        $sql = "SELECT client.ID,client.FirstName,`private training package`.Name,`private training package`.NumOfSessions,`private training membership`.MinPackageMonths,`private training package`.Price,`private training membership`.SessionsCount,`private training membership`.isActivated,`private training membership`.PrivateTrainingPackageID AS membershipID
        FROM `private training membership`
        INNER JOIN client ON client.ID = `private training membership`.ClientID
        INNER JOIN `private training package` ON package.ID = `private training membership`.PrivateTrainingPackageID
        WHERE `private training membership`.isActivated = '$isActivated'";

        $result = mysqli_query($conn, $sql);

        $results = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                    'CliendID' => $row['CliendID'],
                    'CoachID' => $row['CoachID'],
                    'PrivateTrainingPackageID' => $row['PrivateTrainingPackageID'],
                    'SessionsCount' => $row['SessionsCount'],
                    'isActivated' => $row['isActivated'],
                    'Name' => $row['Name'],
                    'NumOfSessions' => $row['NumOfSessions'],
                    'MinPackageMonths' => $row['MinPackageMonths'],
                    'Price' => $row['Price'],
                    'FirstName' => $row['FirstName'],

                );
            }
            return $results;
        }
    }

    public function acceptPtMembership($PrivateTrainingPackageID)
    {
        global $conn;

        $isActivated = "Activated";

        $sql = "UPDATE `private training membership` 
        SET isActivated='$isActivated' 
        WHERE ID = $PrivateTrainingPackageID";

        return $conn->query($sql);
    }

}

?>