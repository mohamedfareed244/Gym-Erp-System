<?php
require_once("Controller.php");
require_once "../Models/NavbarModel.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

class NavbarController extends Controller {

    function addnavbaritem($name, $icon) {
        $navbarmodel = new navbarModel();

        if (isset($_POST['menu_submit'])) {
            $menu_name = $_POST['menu_name'];
            $menu_icon = $_POST['menu_icon'];


            if ($menu_name != '') {
                $navbarmodel->setMenuItemName($menu_name);
                $navbarmodel->setMenuItemIcon($menu_icon);

                
                if ($navbarmodel->addNavbarItem($name, $icon)) {
                    echo '<script> window.location = "addMenu.php"; </script>';
                } else {
                    echo '<div id="message-container" style="color: red;">Error adding menu item.</div>';
                }
                
            } else {
                echo '<script> alert("Menu name cannot be empty."); window.location = "addMenu.php"; </script>';
                exit; // Stop execution after redirection
            }
        }
    }
}
?>
