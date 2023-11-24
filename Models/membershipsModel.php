<?php

include_once "../includes/dbh.inc.php";
include_once "ClientModel.php";
include_once "PackageModel.php";


class Memberships
{
    public $ID;
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
    public $isActivated;

    public static function getAllMemberships()
    {
        global $conn;
        $sql = "SELECT * FROM `membership`";
        $result = $conn->query($sql);
        $memberships = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $membership = new Memberships();
                $membership->ID = $row['ID'];
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
        $isActivated = "Activated";
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


    public static function addMembershipUserSide($packageId)
    {
    global $conn;
    $isActivated = "Not Activated";
    $findClient = Client::checkClient($_SESSION['ID']); // Use $_SESSION['ID'] directly
    $findPackage = Package::checkPackage($packageId);

    if ($findClient && $findPackage) {
        $Package = Package::getPackage($packageId);

        $check1Sql = "SELECT * FROM `membership` WHERE PackageID ='$packageId' AND ClientID = " . $_SESSION['ID'];
        $check1Result = mysqli_query($conn, $check1Sql);
        $alreadyThisMembershipExists = mysqli_num_rows($check1Result) > 0;

        $check2Sql = "SELECT * FROM `membership` WHERE ClientID = " . $_SESSION['ID'];
        $check2Result = mysqli_query($conn, $check2Sql);
        $alreadyAnotherMembershipExists = mysqli_num_rows($check2Result) > 0;

        if ($alreadyThisMembershipExists) {
            return array('alreadyThisMembershipExists' => true, 'alreadyAnotherMembershipExists' => false, 'success' => false);
        } else if ($alreadyAnotherMembershipExists) {
            return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => true, 'success' => false);
        } else {
            $startDate = date("Y-m-d");
            $endDate = date("Y-m-d", strtotime("+$Package->NumOfMonths months"));
            $freezed = 0;
            $sql = "INSERT INTO `membership` (ClientID, PackageID, StartDate, EndDate, VisitsCount, InvitationsCount, InbodyCount, PrivateTrainingSessionsCount, FreezeCount, Freezed, isActivated)
                    VALUES ('" . $_SESSION['ID'] . "', '$packageId', '$startDate', '$endDate', '0', '$Package->NumOfInvitations', '$Package->NumOfInbodySessions', '$Package->NumOfPrivateTrainingSessions', '$Package->FreezeLimit', '$freezed' , '$isActivated')";
            $insertResult = mysqli_query($conn, $sql);

            return array('alreadyThisMembershipExists' => false, 'alreadyAnotherMembershipExists' => false, 'success' => $insertResult);
        }
    }
    }


    public static function hasActiveMembership($clientId)
    {
        global $conn;

        $currentDate = date("Y-m-d");

        $sql = "SELECT * FROM `membership` WHERE `ClientID` = '$clientId' AND '$currentDate' BETWEEN `StartDate` AND `EndDate`";
        $result = $conn->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        }
        return $found;
    }

    public static function getMembership($clientId)
    {
        global $conn;

        $currentDate = date("Y-m-d");

        $sql = " SELECT membership.*, package.FreezeLimit, package.Title 
        FROM membership 
        INNER JOIN package ON package.ID = membership.PackageID
        WHERE membership.ClientID = '$clientId' AND '$currentDate' BETWEEN membership.StartDate AND membership.EndDate AND membership.Freezed = 0";

        $result = $conn->query($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = array(
                'ID' => $row["ID"],
                'clientId' => $row["ClientID"],
                'packageId' => $row["PackageID"],
                'startDate' => $row["StartDate"],
                'endDate' => $row["EndDate"],
                'visitsCount' => $row["VisitsCount"],
                'inbodyCount' => $row["InvitationsCount"],
                'privateTrainingSessionsCount' => $row["PrivateTrainingSessionsCount"],
                'freezeCount' => $row["FreezeCount"],
                'freezed' => $row["Freezed"],
                'freezeLimit'=> $row["FreezeLimit"],
                'Title'=> $row["Title"]
            );
        }
    }

        return $results;

    }


    public static function getClientMembershipInfo()
    {
    global $conn;

    $isActivated = "Activated";

    $sql = "SELECT package.Title, package.NumOfInvitations, package.NumOfInbodySessions, package.NumOfPrivateTrainingSessions,
            package.FreezeLimit, package.Price , membership.StartDate, membership.EndDate, membership.InvitationsCount, membership.InbodyCount,
            membership.PrivateTrainingSessionsCount, membership.FreezeCount
            FROM package 
            INNER JOIN membership ON package.ID = membership.PackageID 
            WHERE membership.isActivated = '$isActivated' AND membership.ClientID = " . $_SESSION['ID'] ;

    $result = mysqli_query($conn, $sql);

    if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
       $results[] = array(
        'Title'=>$row['Title'],
        'NumOfInvitations' => $row['NumOfInvitations'],
        'Price' => $row['Price'],
        'NumOfInbodySessions' => $row['NumOfInbodySessions'],
        'NumOfPrivateTrainingSessions' => $row['NumOfPrivateTrainingSessions'],
        'FreezeLimit' => $row['FreezeLimit'],
        'StartDate'=>$row['StartDate'],
        'EndDate' => $row['EndDate'],
        'InvitationsCount' => $row['InvitationsCount'],
        'InbodyCount' => $row['InbodyCount'],
        'PrivateTrainingSessionsCount' => $row['PrivateTrainingSessionsCount'],
        'FreezeCount' => $row['FreezeCount']
        );
    }
    }

    return $results;
    }

}
