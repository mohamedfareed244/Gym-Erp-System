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
        $findClient = Client::checkClient($clientId);
        $findPackage = Package::checkPackage($packageId);
        if ($findClient && $findPackage) {
            $Package = Package::getPackage($packageId);
            $startDate = date("Y-m-d");
            $endDate = date("Y-m-d", strtotime("+$Package->NumOfMonths months"));
            $freezed = 0;
            $sql = "INSERT INTO `membership` (ClientID, PackageID, StartDate, EndDate, VisitsCount, InvitationsCount, InbodyCount, PrivateTrainingSessionsCount, FreezeCount, Freezed)
                                  VALUES ('$clientId', '$packageId', '$startDate', '$endDate', '0', '$Package->NumOfInvitations', '$Package->NumOfInbodySessions', '$Package->NumOfPrivateTrainingSessions','$Package->FreezeLimit', '$freezed')";
            return mysqli_query($conn, $sql);
        }
        return false;
    }
}
