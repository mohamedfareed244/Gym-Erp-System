<?php


include_once "../includes/dbh.inc.php";

class Package
{

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
    public $isActivated;

    public function addPackage($package)
    {
        global $conn;

        $title = $package->Title;
        $months = $package->NumOfMonths;
        $isLimited = $package->isVisitsLimited;
        $visitsLimit = isset($package->VisitsLimit) ? $package->VisitsLimit : 0;
        $freezeLimit = $package->FreezeLimit;
        $invitations = $package->NumOfInvitations;
        $inbody = $package->NumOfInbodySessions;
        $pt = $package->NumOfPrivateTrainingSessions;
        $price = $package->Price;
        $isActivated = "Activated";

        $sql = "INSERT INTO package (Title, NumOfMonths, isVisitsLimited, VisitsLimit, FreezeLimit, NumOfInvitations, NumOfInbodySessions, NumOfPrivateTrainingSessions,
         Price,isActivated) 
        VALUES ('$title', '$months','$isLimited', '$visitsLimit', '$freezeLimit', '$invitations', '$inbody', '$pt', '$price','$isActivated')";


        return  mysqli_query($conn, $sql);
    }

    public function getAllPackagesforEmployee()
    {
        global $conn;

        $sql = "SELECT * FROM package";
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


    public function getAllPackagesforClient()
    {
        global $conn;

        $sql = "SELECT * FROM package WHERE isActivated='Activated'";
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

    public function activatePackage($packageID)
    {
        global $conn;

        $sql = "UPDATE package SET isActivated='Activated' WHERE ID='$packageID'";

        return $conn->query($sql);
    }


    public function deactivatePackage($packageID)
    {
        global $conn;

        $sql = "UPDATE package SET isActivated='Deactivated' WHERE ID='$packageID'";

        return $conn->query($sql);
    }
}
