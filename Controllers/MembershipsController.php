<?php

include_once "../Models/membershipsModel.php";

session_start();

class MembershipsController
{
    public function addMembership()
    {
        $PackageID = $_POST["PackageID"];
        $ClientID = $_SESSION["ID"];

        $result = Memberships::addMembershipUserSide($ClientID, $PackageID);

        if ($result['alreadyThisMembershipExists']) {
            $_SESSION['alreadyThisMembershipExists'][$ClientID] = "You already subscribed to this package.";
        } else if ($result['alreadyAnotherMembershipExists']) {
            $_SESSION['alreadyAnotherMembershipExists'][$ClientID] = "You are already subscribed to another package.";
        } else if ($result['success']) {
            $_SESSION['membershipsuccess'][$ClientID] = "Membership Request added. Please Visit Gym For Payment to activate your account.";
        } else {
            $_SESSION['fail'][$ClientID] = "Membership reservation failed.";
        }
        
        var_dump($_SESSION);
        header("Location: ../views/packagebooking.php");
        exit();
    }

    public function freezeMembership()
    {
        $ClientID = $_SESSION["ID"];
        $freezeWeeks = $_POST["freezeWeeks"];

        // Fetch initial freeze info to check remaining freeze attempts
        $initialFreezeInfo = Memberships::getPackageFreezeLimit($_SESSION['PackageID']);
        $remainingFreezeAttempts = $initialFreezeInfo - $_SESSION['FreezeCount'];

        if ($freezeWeeks >= 1 && $freezeWeeks <= $remainingFreezeAttempts) {
            // Update freeze count on the server
            $result = Memberships::freezeMembership($ClientID, $freezeWeeks);

            if ($result['success']) {
                $_SESSION['freezeSuccess'][$ClientID] = "Membership frozen successfully.";
            } else {
                $_SESSION['freezeFail'][$ClientID] = "Failed to freeze membership.";
            }
        } else {
            $_SESSION['freezeFail'][$ClientID] = "Invalid freeze request.";
        }

        header("Location: ../views/reqfreeze.php");
        exit();
    }
}

$controller = new MembershipsController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addMembership":
            $controller->addMembership();
            break;
        case "freezeMembership":
            $controller->freezeMembership();
            break;
        default:
            break;
    }
}
?>
