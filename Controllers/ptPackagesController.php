<?php

require_once("Controller.php");
include_once "../Models/ptPackageModel.php";
include_once "../Models/ptMembershipsModel.php";

session_start();

class ptPackController extends Controller
{

    function AddptPackages()
    {
        $packageNameErr = $minMonthsErr = $sessionsErr = $packagePriceErr = $success = "";

        $isValid = true;

        if (empty($_POST["package-name"])) {
            $packageNameErr = "PT Package Name is required";
            $isValid = false;
        }

        if (empty($_POST["package-min-months"])) {
            $minMonthsErr = "Minimum Membership Months is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["package-min-months"]) || $_POST["package-min-months"] <= 0) {
            $minMonthsErr = "Minimum Membership Months must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["package-sessions"])) {
            $sessionsErr = "Number of Sessions is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["package-sessions"]) || $_POST["package-sessions"] <= 0) {
            $sessionsErr = "Number of Sessions must be a positive number";
            $isValid = false;
        }

        if (empty($_POST["session-price"])) {
            $packagePriceErr = "PT Package Price is required";
            $isValid = false;
        } elseif (!is_numeric($_POST["session-price"]) || $_POST["session-price"] <= 0) {
            $packagePriceErr = "PT Package Price must be a positive number";
            $isValid = false;
        }

        $name = htmlspecialchars($_POST["package-name"]);
        $months = htmlspecialchars($_POST["package-min-months"]);
        $sessions = htmlspecialchars($_POST["package-sessions"]);
        $price = htmlspecialchars($_POST["session-price"]);

        if ($isValid) {
            $ptpackage = new ptPackages();

            $newptpackage = new ptPackages();

            $newptpackage->setName($name);
            $newptpackage->setNumOfSessions($sessions);
            $newptpackage->setMinPackageMonths($months);
            $newptpackage->setPrice($price);

            $result = $ptpackage->addptPacks($newptpackage);

            if ($result) {
                $success = "PT Package added successfully";
                $_SESSION["success"] = $success;
                header("Location: ../views/addPTpackage.php?AddedSuccessfully");
                exit();
            }
        }

        // If the pt package addition was unsuccessful, redirect back to the form with error messages
        $_SESSION["packageNameErr"] = $packageNameErr;
        $_SESSION["minMonthsErr"] = $minMonthsErr;
        $_SESSION["sessionsErr"] = $sessionsErr;
        $_SESSION["packagePriceErr"] = $packagePriceErr;
        header("Location: ../views/addPTpackage.php?fail");
        exit();
    }

    public function activatePtPackage()
    {
        if (isset($_POST["package_id"])) {
            $ptpackageId = $_POST["package_id"];

            $ptpackage = new ptPackages();

            $result = $ptpackage->activatePtPackage($ptpackageId);

            if ($result) {
                $success = "PT Package activated successfully";
                $_SESSION["success"] = $success;
                header("Location: ../views/viewPTpackage.php?ActivatedSuccessfully->ID=$ptpackageId");
            } else {
                $fail = "PT Package failed to activate";
                $_SESSION["fail"] = $fail;
                header("Location: ../views/viewPTpackage.php?fail");
            }
        }
        exit();
    }

    public function deactivatePtPackage()
    {
        if (isset($_POST["package_id"])) {
            $ptpackageId = $_POST["package_id"];

            $ptpackage = new ptPackages();

            $result = $ptpackage->deactivatePtPackage($ptpackageId);

            if ($result) {
                $success = "PT Package deactivated successfully";
                $_SESSION["success"] = $success;
                header("Location: ../views/viewPTpackage.php?DeactivatedSuccessfully->ID=$ptpackageId");
            } else {
                $fail = "PT Package failed to deactivate";
                $_SESSION["fail"] = $fail;
                header("Location: ../views/viewPTpackage.php?fail");
            }
        }
        exit();
    }
    public function addPtPackageForClient()
    {
        if (isset($_POST["membershipclientId"]) && isset($_POST["ptPackageId"]) && isset($_POST["coachID"])) {
            $clientId = $_POST["membershipclientId"];
            $ptPackageId = $_POST["ptPackageId"];
            $coachID = $_POST["coachID"];

            $ptPackages = new ptMemberships();
            $result = $ptPackages->addPtMembership($clientId, $ptPackageId, $coachID);
            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
        }
    }
}




$model = new ptPackages();
$controller = new ptPackController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addPtPackage":
            $controller->AddptPackages();
            break;
        case "activatePtPackage":
            $controller->activatePtPackage();
            break;
        case "deactivatePtPackage":
            $controller->deactivatePtPackage();
            break;
        case "addPtPackageForClient":
            $controller->addPtPackageForClient();
        default:
            break;
    }
}
?>
