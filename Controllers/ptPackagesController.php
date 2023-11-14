<?php


include_once "../Models/ptPackageModel.php";

// session_start();


class ptPackController
{

    function AddptPackages()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isValid = true;
            $nameErr = $monthsErr = $invitationsErr = $inbodyErr = $ptSessionsErr = "";

            $name = $_POST["name"];
            $months = $_POST["months"];
            $invitations = $_POST["invitations"];
            $inbody = $_POST["inbody"];
            $ptSessions = $_POST["ptsess"];

            if (empty($name)) {
                $nameErr = "Package Name is required";
                $isValid = false;
            }

            if (empty($months)) {
                $monthsErr = "Number of Months is required";
                $isValid = false;
            } elseif (!is_numeric($months) || $months <= 0) {
                $monthsErr = "Invalid number of months";
                $isValid = false;
            }

            if (empty($invitations)) {
                $invitationsErr = "Number of Invitations is required";
                $isValid = false;
            } elseif (!is_numeric($invitations) || $invitations < 0) {
                $invitationsErr = "Invalid number of invitations";
                $isValid = false;
            }

            if (empty($inbody)) {
                $inbodyErr = "Number of Inbody is required";
                $isValid = false;
            } elseif (!is_numeric($inbody) || $inbody < 0) {
                $inbodyErr = "Invalid number of inbody";
                $isValid = false;
            }

            if (empty($ptSessions)) {
                $ptSessionsErr = "Number of PT Sessions is required";
                $isValid = false;
            } elseif (!is_numeric($ptSessions) || $ptSessions < 0) {
                $ptSessionsErr = "Invalid number of PT sessions";
                $isValid = false;
            }

            if ($isValid) {
                $ptPackages = new ptPackages();

                $updatedptpack = new ptPackages();
           //incomplete

            } else {
                $_SESSION["nameErr"] = $nameErr;
                $_SESSION["monthsErr"] = $monthsErr;
                $_SESSION["invitationsErr"] = $invitationsErr;
                $_SESSION["inbodyErr"] = $inbodyErr;
                $_SESSION["ptSessionsErr"] = $ptSessionsErr;

                header("Location: ../views/addPackageadmin.php");
                exit();
            }
        }
    }
}
?>
