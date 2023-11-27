<?php
require_once("Model.php");

class Package
{

    private $ID;
    private $Title;
    private $NumOfMonths;
    private $isVisitsLimited;
    private $VisitsLimit;
    private $FreezeLimit;
    private $NumOfInvitations;
    private $NumOfInbodySessions;
    private $NumOfPrivateTrainingSessions;
    private $Price;
    private $isActivated;

    function __construct() {
        $this->db = $this->connect();
    }

    
    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getID() {
        return $this->ID;
    }
    public function setTitle($Title) {
        $this->Title = $Title;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function setNumOfMonths($NumOfMonths) {
        $this->NumOfMonths = $NumOfMonths;
    }

    public function getNumOfMonths() {
        return $this->NumOfMonths;
    }

    public function setIsVisitsLimited($isVisitsLimited) {
            $this->isVisitsLimited = $isVisitsLimited;
        }
    
    public function getIsVisitsLimited() {
            return $this->isVisitsLimited;
        }

    public function setVisitsLimit($VisitsLimit) {
            $this->VisitsLimit = $VisitsLimit;
        }

    public function getVisitsLimit() {
            return $this->VisitsLimit;
        }

    public function setFreezeLimit($FreezeLimit) {
            $this->FreezeLimit = $FreezeLimit;
        }

    public function getFreezeLimit() {
            return $this->FreezeLimit;
        }

    public function setNumOfInvitations($NumOfInvitations) {
            $this->NumOfInvitations = $NumOfInvitations;
        }
  
    public function getNumOfInvitations() {
            return $this->NumOfInvitations;
        }
  
    public function setNumOfInbodySessions($NumOfInbodySessions) {
            $this->NumOfInbodySessions = $NumOfInbodySessions;
        }

    public function getNumOfInbodySessions() {
            return $this->NumOfInbodySessions;
        }

    public function setNumOfPrivateTrainingSessions($NumOfPrivateTrainingSessions) {
            $this->NumOfPrivateTrainingSessions = $NumOfPrivateTrainingSessions;
        }

    public function getNumOfPrivateTrainingSessions() {
            return $this->NumOfPrivateTrainingSessions;
        }

    public function setPrice($Price) {
            $this->Price = $Price;
        }

    public function getPrice() {
            return $this->Price;
        }

    public function setIsActivated($isActivated) {
        $this->isActivated = $isActivated;
    }

    public function getIsActivated() {
        return $this->isActivated;
    }

    public function addPackage($package)
    {
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


        return $this->db->query($sql);
    }

    public function getAllPackagesforEmployee()
    {
        $sql = "SELECT * FROM package";
        $result = $this->db->query($sql);

        if ($result) {
            $packages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            return $packages;
        } else {
            return [];
        }
    }


    public function getAllPackagesforClient()
    {
        $sql = "SELECT * FROM package WHERE isActivated='Activated'";
        $result = $this->db->query($sql);;

        if ($result) {
            $packages = $result->fetch_all(MYSQLI_ASSOC);

            $result->free_result();

            return $packages;
        } else {
            return [];
        }
    }

    public function activatePackage($packageID)
    {
        $sql = "UPDATE package SET isActivated='Activated' WHERE ID='$packageID'";
        return $this->db->query($sql);;
    }


    public function deactivatePackage($packageID)
    {
        $sql = "UPDATE package SET isActivated='Deactivated' WHERE ID='$packageID'";
        return $this->db->query($sql);;
    }

    public function getPackage($packageID)
    {
        $sql = "SELECT * FROM package WHERE ID='$packageID'";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows > 0) {
            $packageData = $result->fetch_assoc();
            $package = new Package();
            $package->ID = $packageData['ID'];  
            $package->NumOfMonths = $packageData['NumOfMonths'];
            $package->isVisitsLimited = $packageData['isVisitsLimited'];
            $package->FreezeLimit = $packageData['FreezeLimit'];
            $package->NumOfInvitations = $packageData['NumOfInvitations'];
            $package->NumOfInbodySessions = $packageData['NumOfInbodySessions'];
            $package->NumOfPrivateTrainingSessions = $packageData['NumOfPrivateTrainingSessions'];
            $package->Price = $packageData['Price'];
            $package->isActivated = $packageData['isActivated'];

            return $package;
        }
        else{
            return null;
        }
    }
    public function checkPackage($packageID)
    {
        $sql = "SELECT * FROM package WHERE ID='$packageID'";
        $result = $this->db->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        } else {
            return $found;
        }
    }

    
public function getPackageFreezeLimit($PackageID)
{
    $sql = "SELECT `FreezeLimit` FROM `package` WHERE `ID`='$PackageID'";
    $result = $this->db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['FreezeLimit'];
    } else {
        return 0; 
    }
}


}

?>
