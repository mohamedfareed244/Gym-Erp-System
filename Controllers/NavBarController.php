<?php
require_once("Controller.php");
require_once "../Models/NavbarModel.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

class NavbarController extends Controller {

    function addnavbaritem($name, $icon) {
        $navbarmodel = new navbarModel();

        $navbarmodel->setMenuItemName($name);
        $navbarmodel->setMenuItemIcon($icon);

        if ($navbarmodel->addNavbarItem($name, $icon)) {
            echo '<script> window.location = "addMenu.php"; </script>';
        } else {
            echo '<div id="message-container" style="color: red;">Error adding menu item.</div>';
        }
    }
}

$model = new navbarModel();
$controller = new NavbarController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addNavbarItem":
            $name = isset($_POST["menu_name"]) ? $_POST["menu_name"] : "";
            $icon = isset($_POST["menu_icon"]) ? $_POST["menu_icon"] : "";
            
            $controller->addnavbaritem($name, $icon);
            break;
        default:
            break;
    }
}
?>
