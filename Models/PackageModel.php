<?php

session_start();

include_once "../includes/dbh.inc.php";

class Package{
 
    public $ID;
    public $Title;
    public $NumOfMonths;
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
        $months=$package->NumOfMonths;
        $isLimited=$package->isVisitsLimited;
        $visitsLimit=$package->VisitsLimit;
        $freezeLimit=$package->FreezeLimit;
        $invitations=$package->NumOfInvitations;
        $inbody=$package->NumOfInbodySessions;
        $pt=$package->NumOfPrivateTrainingSessions;
        $price=$package->Price;

        $sql = "INSERT INTO package (Title, NumOfMonths, isVisitsLimited, VisitsLimit, FreezeLimit, NumOfInvitations, NumOfInbodySessions, NumOfPrivateTrainingSessions,
         Price) 
        VALUES ('$title', '$months','$isLimited', '$visitsLimit', '$freezeLimit', '$invitations', '$inbody', '$pt', '$price')";
 
        return mysqli_query($conn, $sql); 
    }

    public function getAllPackages()
    {
        global $conn;

        $sql="SELECT * FROM package";
            // Perform the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        $packages = $result->fetch_all(MYSQLI_ASSOC);

        $result->free_result();

        // Return the packages
        return $packages;
    } else {
        return [];
    }
    }



}
?>