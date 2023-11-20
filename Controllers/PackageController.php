<?php

include_once "../Models/PackageModel.php";
include_once "../Models/membershipsModel.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

class PackageController
{

    function addPackage()
    {
        $visitsErr = $limitDaysErr = $freezeLimitErr = $monthsErr = $titleErr = $invitationErr = $inbodyErr = $ptSessionErr = $priceErr = $success = "";

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
        } elseif (!is_numeric($_POST["freezelimit"]) || $_POST["freezelimit"] <= 0) {
            $freezeLimitErr = "Freeze Limit must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["months"])) {
            $monthsErr = "Number of Months is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["months"]) || $_POST["months"] <= 0) {
            $monthsErr = "Number of Months must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["title"])) {
            $titleErr = "Package Title is required";
            $isValid = false;
        }

        if (empty($_POST["invitation"])) {
            $invitationErr = "Number of Invitations is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["invitation"]) || $_POST["invitation"] < 0) {
            $invitationErr = "Number of Invitations must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["inbody"])) {
            $inbodyErr = "Number of Inbody Sessions is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["inbody"]) || $_POST["inbody"] < 0) {
            $inbodyErr = "Number of Inbody Sessions must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["ptsession"])) {
            $ptSessionErr = "Number of PT sessions is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["ptsession"]) || $_POST["ptsession"] < 0) {
            $ptSessionErr = "Number of  PT sessions must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["price"])) {
            $priceErr = "Price is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["price"]) || $_POST["price"] <= 0) {
            $priceErr = "Price must be a positive number";
            $isValid = false;
        }

        $visits = htmlspecialchars($_POST["visits"]);
        $limitVisits = htmlspecialchars($_POST["limitDays"]);
        $freezeLimit = htmlspecialchars($_POST["freezelimit"]);
        $months = htmlspecialchars($_POST["months"]);
        $title = htmlspecialchars($_POST["title"]);
        $invitation = htmlspecialchars($_POST["invitation"]);
        $inbody = htmlspecialchars($_POST["inbody"]);
        $ptsession = htmlspecialchars($_POST["ptsession"]);
        $price = htmlspecialchars($_POST["price"]);


        if ($isValid) {
            $package = new Package();

            $newpackage = new Package();

            $newpackage->Title = $title;
            $newpackage->NumOfMonths = $months;
            $newpackage->isVisitsLimited = $visits;
            if ($visits == "limited") {
                $newpackage->VisitsLimit = $limitVisits;
            }
            $newpackage->FreezeLimit = $freezeLimit;
            $newpackage->NumOfInvitations = $invitation;
            $newpackage->NumOfInbodySessions = $inbody;
            $newpackage->NumOfPrivateTrainingSessions = $ptsession;
            $newpackage->Price = $price;

            $result = $package->addPackage($newpackage);

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
        $_SESSION["titleErr"] = $titleErr;
        $_SESSION["invitationErr"] = $invitationErr;
        $_SESSION["inbodyErr"] = $inbodyErr;
        $_SESSION["ptSessionErr"] = $ptSessionErr;
        $_SESSION["priceErr"] = $priceErr;
        header("Location: ../views/addPackageadmin.php");
        exit();
    }

    public function activatePackage()
    {
        if (isset($_POST["package_id"])) {
            $packageId = $_POST["package_id"];

            $package = new Package();

            $result = $package->activatePackage($packageId);

            if ($result) {
                $success = "Package activated successfully";
                $_SESSION["success"] = $success;
                header("Location: ../views/viewpackagesadmin.php");
                exit();
            }

            $fail = "Package failed to activate";
            $_SESSION["fail"] = $fail;
            header("Location: ../views/viewpackagesadmin.php");
            exit();
        }
    }

    public function deactivatePackage()
    {
        if (isset($_POST["package_id"])) {
            $packageId = $_POST["package_id"];

            $package = new Package();

            $result = $package->deactivatePackage($packageId);

            if ($result) {
                $success = "Package deactivated successfully";
                $_SESSION["success"] = $success;
                header("Location: ../views/viewpackagesadmin.php");
                exit();
            }

            $fail = "Package failed to deactivate";
            $_SESSION["fail"] = $fail;
            header("Location: ../views/viewpackagesadmin.php");
            exit();
        }
    }

}

$controller = new PackageController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addPackage":
            $controller->addPackage();
            break;
        case "activatePackage":
            $controller->activatePackage();
            break;
        case "deactivatePackage":
            $controller->deactivatePackage();
            break;
        case "activateMembership":
            if (isset($_POST["clientId"]) && isset($_POST["packageId"])) {
                $clientId = $_POST["clientId"];
                $packageId = $_POST["packageId"];

                $result = Memberships::createMembership($clientId, $packageId);
                if ($result) {
                    echo "success";
                } else {
                    echo "failure";
                }
            }
        default:
            // Handle unknown action or display an error
            break;
    }
}
