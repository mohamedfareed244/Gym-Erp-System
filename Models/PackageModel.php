<?php

session_start();

include_once "../includes/dbh.inc.php";

class Package{
 
    public $ID;
    public $Title;
    public $isVisitsLimited;
    public $VisitsLimit;
    public $FreezeLimit;
    public $NumOfInvitations;
    public $NumOfInbodySessions;
    public $NumOfPrivateTrainingSessions;
    public $Price;

    public function addPackage($package)
    {
        global $conn;

        $title=$package->Title;
        $isLimited=$package->isVisitsLimited;
        $visitsLimit=$package->VisitsLimit;
        $freezeLimit=$package->FreezeLimit;
        $invitations=$package->NumOfInvitations;
        $inbody=$package->NumOfInbodySessions;
        $pt=$package->NumOfPrivateTrainingSessions;
        $price=$package->Price;

        $sql = "INSERT INTO package (Title, isVisitsLimited, VisitsLimit, FreezeLimit, NumOfInvitations, NumOfInbodySessions, NumOfPrivateTrainingSessions,
         Price) 
        VALUES ('$title', '$isLimited', '$visitsLimit', '$freezeLimit', '$invitations', '$inbody', '$pt', '$price')";
 
        return mysqli_query($conn, $sql); 
    }



}
?>