<?php
session_start();

include_once "../Models/membershipsModel.php";

class MembershipsController
{
    public function addMembership()
{
    $PackageID = $_POST["PackageID"];
    $result = Memberships::addMembershipUserSide($PackageID);

    if ($result['alreadyThisMembershipExists']) {
        $_SESSION['alreadyThisMembershipExists'][$PackageID] = "You already subscribed to this package.";
    } else if ($result['alreadyAnotherMembershipExists']) {
        $_SESSION['alreadyAnotherMembershipExists'][$PackageID] = "You are already subscribed to another package.";
    } else if ($result['success']) {
        $_SESSION['membershipsuccess'][$PackageID] = "Membership Request added. Please Visit Gym For Payment to activate your account.";
    } else {
        $_SESSION['fail'][$PackageID] = "Membership reservation failed.";
    }

    header("Location: ../views/packagebooking.php");
    exit();
}

    public function freezeMembership()
    {
        $ClientID = $_SESSION["ID"];
        $freezeWeeks = $_POST["freezeWeeks"];

        $result = Memberships::freezeMembership($ClientID, $freezeWeeks);

        if ($result['success']) {
            $_SESSION['freezeSuccess'][$ClientID] = "Membership frozen successfully.";
        } else {
            $_SESSION['freezeFail'][$ClientID] = "Failed to freeze membership.";
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
