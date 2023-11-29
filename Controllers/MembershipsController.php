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

        // Fetch initial freeze info to check remaining freeze attempts
        $pck = new Package();
        $initialFreezeInfo = $pck->getPackageFreezeLimit($_SESSION['PackageID']);
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
    public function unfreezeClientMembership()
    {
        $ClientID = $_SESSION["ID"];

        $result = Memberships::unfreezeMembership($ClientID);

        if ($result) {
            $_SESSION['unfreezeSuccess'][$ClientID] = "Membership unfrozen successfully.";
        } else {
            $_SESSION['unfreezeFail'][$ClientID] = "Failed to unfreeze membership.";
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
        case "deleteMembership":
            if (isset($_POST["membershipID"])) {
                $membershipID = $_POST["membershipID"];
                $result = Memberships::deleteMembership($membershipID);
                if ($result) {
                    echo "success";
                } else {
                    echo "failure";
                }
            }
            break;
        case "freezeMembership":
            $controller->freezeMembership();
            break;
            case "unfreezeClientMembership":
                $controller->unfreezeClientMembership();
                break;
        case "freezeClientMembership":
            if (isset($_POST["membershipID"]) && isset($_POST["selectedDate"])) {

                $membershipID = $_POST["membershipID"];
                $selectedDate = $_POST["selectedDate"];
                $result = Memberships::freezeMembership($membershipID, $selectedDate);
                if ($result) {
                    echo "success";
                } else {
                    echo "failure";
                }
            }
            break;
        case "acceptMembership":
            $membershipID = $_POST['membershipID'];

            $membership = new Memberships();
            $result = $membership->acceptMembership($membershipID);

            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
            break;
            case "unfreezeClientMembership":
                if (isset($_POST["membershipID"])) {
                    $membershipID = $_POST["membershipID"];
                    $result = Memberships::unFreezeMembership($membershipID);
                    if ($result) {
                        echo "success";
                    } else {
                        echo "failure";
                    }
                }
                break;
            case "checkinClient":
                if (isset($_POST["clientID"])) {
                    $clientID = $_POST["clientID"];
                    $result = Memberships::checkinClient($clientID);
                    if ($result) {
                        echo "success";
                    } else {
                        echo "failure";
                    }
                }
                break;
            default:
                 break;
    }
}
?>