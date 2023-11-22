<?php

include_once "../includes/dbh.inc.php";
include_once "ClientModel.php";
include_once "PackageModel.php";


class Memberships
{
    public $clientId;
    public $packageId;
    public $startDate;
    public $endDate;
    public $visitsCount;
    public $invitationsCount;
    public $inbodyCount;
    public $privateTrainingSessionsCount;
    public $freezeCount;
    public $freezed;

    public static function getAllMemberships()
    {
        global $conn;
        $sql = "SELECT * FROM `membership`";
        $result = $conn->query($sql);
        $memberships = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $membership = new Memberships();
                $membership->clientId = $row['ClientID'];
                $membership->packageId = $row['PackageID'];
                $membership->startDate = $row['StartDate'];
                $membership->endDate = $row['EndDate'];
                $membership->visitsCount = $row['VisitsCount'];
                $membership->invitationsCount = $row['InvitationsCount'];
                $membership->inbodyCount = $row['InbodyCount'];
                $membership->privateTrainingSessionsCount = $row['PrivateTrainingSessionsCount'];
                $membership->freezeCount = $row['FreezeCount'];
                $membership->freezed = $row['Freezed'];

                $memberships[] = $membership;
            }
        }
        return $memberships;
    }

    public static function createMembership($clientId, $packageId)
    {
        global $conn;
        $isActivated="Activated";
        $findClient = Client::checkClient($clientId);
        $findPackage = Package::checkPackage($packageId);
        if ($findClient && $findPackage) {
            $Package = Package::getPackage($packageId);
            $startDate = date("Y-m-d");
            $endDate = date("Y-m-d", strtotime("+$Package->NumOfMonths months"));
            $freezed = 0;
            $sql = "INSERT INTO `membership` (ClientID, PackageID, StartDate, EndDate, VisitsCount, InvitationsCount, InbodyCount, PrivateTrainingSessionsCount, FreezeCount, Freezed, isActivated)
                                  VALUES ('$clientId', '$packageId', '$startDate', '$endDate', '0', '$Package->NumOfInvitations', '$Package->NumOfInbodySessions', '$Package->NumOfPrivateTrainingSessions','$Package->FreezeLimit', '$freezed','$isActivated')";
            return mysqli_query($conn, $sql);
        }
        return false;
    }


    public static function addMembershipUserSide($clientId, $packageId)
    {
        global $conn;
        $isActivated="Not Activated";
        $findClient = Client::checkClient($clientId);
        $findPackage = Package::checkPackage($packageId);
        if ($findClient && $findPackage) {
            $Package = Package::getPackage($packageId);

            $check1Sql = "SELECT * FROM `membership` WHERE ClientID = '$clientId' AND PackageID ='$packageId'";
            $check1Result = mysqli_query($conn, $check1Sql);
            $alreadyThisMembershipExists = mysqli_num_rows($check1Result) > 0;
            
            $check2Sql = "SELECT * FROM `membership` WHERE ClientID = '$clientId'";
            $check2Result = mysqli_query($conn, $check2Sql);
            $alreadyAnotherMembershipExists = mysqli_num_rows($check2Result) > 0;

            if($alreadyThisMembershipExists)
            {
                return array('alreadyThisMembershipExists' => true, 'alreadyAnotherMembershipExists' => false, 'success' => false);
            }
            else if( $alreadyAnotherMembershipExists){
                return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => true, 'success' => false);
            }

           else{
            $startDate = date("Y-m-d");
            $endDate = date("Y-m-d", strtotime("+$Package->NumOfMonths months"));
            $freezed = 0;
            $sql = "INSERT INTO `membership` (ClientID, PackageID, StartDate, EndDate, VisitsCount, InvitationsCount, InbodyCount, PrivateTrainingSessionsCount, FreezeCount, Freezed, isActivated)
                                  VALUES ('$clientId', '$packageId', '$startDate', '$endDate', '0', '$Package->NumOfInvitations', '$Package->NumOfInbodySessions', '$Package->NumOfPrivateTrainingSessions','$Package->FreezeLimit', '$freezed' , '$isActivated')";
            $insertResult = mysqli_query($conn, $sql);
            return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => $insertResult );
           }
        }
    }


    public static function hasActiveMembership($clientId)
    {
        global $conn;

        $currentDate = date("Y-m-d");

        $sql = "SELECT * FROM `membership` WHERE `ClientID` = '$clientId' AND '$currentDate' BETWEEN `StartDate` AND `EndDate'";
        $result = $conn->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        } else {
            return $found;
        }
    }
}
