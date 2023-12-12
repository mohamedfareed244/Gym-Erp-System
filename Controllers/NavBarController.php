<?php
require_once("Controller.php");
include_once "../Models/NavbarModel.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

class NavbarController extends Model{

    function addnavbaritem(){
        $navbarmodel = new navbarModel();

        if (isset($_POST['menu_submit'])) {
            $menu_name = $_POST['menu_name'];
            $menu_icon = $_POST['menu_icon'];

            if($menu_name != '') {
                $navbarmodel->setMenuItemName($menu_name);
                $navbarmodel->setMenuItemIcon($menu_icon);
                $navbarmodel->addNavbarItem();
            }

            echo json_encode(["status" => "success"]);
        }
    }
}
?>
