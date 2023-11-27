<?php
include_once "../includes/dbh.inc.php";
include_once "ptPackageModel.php";
include_once "ClientModel.php";
include_once "CoachesModel.php";



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

    public static function createPtMembership($clientId, $ptpackageID)
    {
        global $conn;
        $isActivated = "Activated";
        $client=new Client();
        $package = new ptPackages();
        $findClient = $client->checkClient($clientId);
        $findPackage = $package->checkPtPackage($ptpackageID);
        // if ($findClient && $findPackage) {
        //     $Package = $package->getPtPackage($ptpackageID);
        //     $sql = "INSERT INTO `private training membership` (ClientID, CoachID, PrivateTrainingPackageID, SessionsCount, isActivated)
        //     -- VALUES ('$clientId', '$','$getisActivated()')";
        //     return mysqli_query($conn, $sql);
        // }
        // return false;
    }

    function getCoachNames($ptMemberships, $coaches) {
        $coachNames = array();
    
        foreach ($ptMemberships as $ptMembership) {
            $clientId = $ptMembership['ClientID'];
            $coachId = $ptMembership['CoachID'];
    
            $coach = array_filter($coaches, function ($c) use ($coachId) {
                return $c['ID'] == $coachId;
            });
    
            if (!empty($coach)) {
                $coach = reset($coach);
                $coachNames[$clientId] = $coach['Name'];
            }
        }
    
        return $coachNames;
    }
}

?>