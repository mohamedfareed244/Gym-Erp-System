<?php

include_once "../Models/PackageModel.php";


class PackageController{

    function addPackage()
    {
        

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