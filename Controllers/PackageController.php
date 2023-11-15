<?php

include_once "../Models/PackageModel.php";


class PackageController{

    function addPackage()
    {
        $visitsErr = $limitDaysErr = $freezeLimitErr = $monthsErr = $invitationErr = $inbodyErr = $ptSessionErr = $priceErr = $success ="";

$isValid = true;

if (empty($_POST["visits"])) {
    $visitsErr = "Visits is required";
    $isValid = false;
}

if ($_POST["visits"] === "limited" && empty($_POST["limitDays"])) {
    $limitDaysErr = "Visit Limit is required";
    $isValid = false;
}

if (empty($_POST["freezelimit"])) {
    $freezeLimitErr = "Freeze Limit is required";
    $isValid = false;
}

if (empty($_POST["months"])) {
    $monthsErr = "Package Title is required";
    $isValid = false;
}

if (empty($_POST["invitation"])) {
    $invitationErr = "Number of Invitations is required";
    $isValid = false;
}

if (empty($_POST["inbody"])) {
    $inbodyErr = "Number of Inbody Sessions is required";
    $isValid = false;
}

if (empty($_POST["ptsession"])) {
    $ptSessionErr = "Number of PT sessions is required";
    $isValid = false;
}

if (empty($_POST["price"])) {
    $priceErr = "Price is required";
    $isValid = false;
}

$visits = htmlspecialchars($_POST["visits"]);
$limitVisits = htmlspecialchars($_POST["limitDays"]);
$freezeLimit = htmlspecialchars($_POST["freezelimit"]);
$months = htmlspecialchars($_POST["months"]);
$invitation = htmlspecialchars($_POST["invitation"]);
$inbody = htmlspecialchars($_POST["inbody"]);
$ptsession = htmlspecialchars($_POST["ptsession"]);
$price = htmlspecialchars($_POST["price"]);


if($isValid){
    $package=new Package();

    $newpackage= new Package();

    $newpackage->Title=$months;
    $newpackage->isVisitsLimited=$visits;
    if($visits=="limited"){
        $newpackage->VisitsLimit=$limitVisits;
    }
    $newpackage->FreezeLimit=$freezeLimit;
    $newpackage->NumOfInvitations=$invitation;
    $newpackage->NumOfInbodySessions=$inbody;
    $newpackage->NumOfPrivateTrainingSessions=$ptsession;
    $newpackage->Price=$price;

    $result=$package->addPackage($newpackage);

    if ($result) {
        $success = "Package added successfully";
        $_SESSION["success"] = $success;
        header("Location: ../views/addPackageadmin.php");
        exit();
    } 
}
        // If the package addition was unsuccessful, redirect back to the form with error messages
        $_SESSION["visitsErr"] = $visitsErr;
        $_SESSION["limitDaysErr"] = $limitDaysErr;
        $_SESSION["freezeLimitErr"] = $freezeLimitErr;
        $_SESSION["monthsErr"] = $monthsErr;
        $_SESSION["invitationErr"] = $invitationErr;
        $_SESSION["inbodyErr"] = $inbodyErr;
        $_SESSION["ptSessionErr"] = $ptSessionErr;
        $_SESSION["priceErr"] = $priceErr;
        header("Location: ../views/addPackageadmin.php");
        exit();


}




}

$controller = new PackageController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addPackage":
            $controller->addPackage();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}

?>