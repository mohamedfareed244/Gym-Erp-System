<?php

require_once("Controller.php");
include_once "../Models/ptPackageModel.php";
include_once "../Models/ptMembershipsModel.php";

session_start();

class ptMembershipsController extends Controller
{

    public function AddptMembership()
    {
        $CoachID = $_POST["CoachID"];
        $ClientID = $_SESSION['ID'];
        $ptPackageID = $_POST['ptPackageID'];
        $ptPackageSessions = $_POST['ptPackageSessions'];
        $PackageMinMonths = $_POST['PackageMinMonths'];

        $ptMemberships = new ptMemberships();
        $ptMemberships->setClientID($ClientID);
        $ptMemberships->setCoachID($CoachID);
        $ptMemberships->setPrivateTrainingPackageID($ptPackageID);
        $ptMemberships->setSessionsCount($ptPackageSessions);

        $ptMem = new ptMemberships();
        $result = $ptMem->AddptMemberships($ptMemberships, $PackageMinMonths);

        if ($result['alreadyThisMembershipExists']) {
            $_SESSION['alreadyThisptMembershipExists'][$ptPackageID] = "You already subscribed to this pt package.";
        } else if ($result['alreadyAnotherMembershipExists']) {
            $_SESSION['alreadyAnotherptMembershipExists'][$ptPackageID] = "You are already subscribed to another pt package.";
        } else if ($result['success']) {
            $_SESSION['ptmembershipsuccess'][$ptPackageID] = "Membership Request added. Please Visit Gym For Payment to activate your account.";
        } else {
            $_SESSION['ptfail'][$ptPackageID] = "You can't reserve this PT package as the minimum months required is greater than your normal membership months.";
        }

        header("Location: ../views/bookptpackage.php?CoachID=$CoachID");
        exit();
    }
}


$model = new ptMemberships();
$controller = new ptMembershipsController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addPtMembership":
            $controller->AddptMembership();
            break;
        case "acceptPtMembership":
            $ptmembershipID = $_POST['ptmembershipID'];

            $ptmembership = new ptMemberships();
            $result = $ptmembership->acceptPtMembership($ptmembershipID);

            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
            break;
        default:
            break;
    }
}
?>