<?php

include_once "../Models/membershipsModel.php";

session_start();

class MembershipsController
{
    public function addMembership()
    {
        $PackageID = $_POST["PackageID"];
        $ClientID = $_SESSION["ID"];

        $result=Memberships::addMembershipUserSide($ClientID, $PackageID);

        if ($result['alreadyThisMembershipExists']){
            $_SESSION['alreadyThisMembershipExists'][$ClientID]="You already subscribed to this package.";
            header("Location: ../views/packagebooking.php");
            exit();
        }
        else if ($result['alreadyAnotherMembershipExists']){
            $_SESSION['alreadyAnotherMembershipExists'][$ClientID]="You are already subscribed to another package.";
            header("Location: ../views/packagebooking.php");
            exit();
        }
        else if($result['success']){
            $_SESSION['membershipsuccess'][$ClientID]="Membership Request added. Please Visit Gym For Payment to activate your account.";
            header("Location: ../views/packagebooking.php");
            exit();
        }
        else{
            $_SESSION['fail'][$ClientID]="Membership reservation failed.";
            header("Location: ../views/packagebooking.php");
            exit();
        }
        var_dump($_SESSION);
    }
}

$controller = new MembershipsController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addMembership":
            $controller->addMembership();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}

?>