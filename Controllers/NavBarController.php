<?php
require_once("Controller.php");
require_once "../Models/NavbarModel.php";

class MenuController extends Controller
{
    private $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel(new DBh());
    }

    public function displayMenu()
    {
        $topLevelMenu = $this->menuModel->getMenuItems();
        return $topLevelMenu;
    }

    public function displaySubMenu($parentId)
    {
        $subMenu = $this->menuModel->getMenuItemsByParentId($parentId);
        return $subMenu;
    }
}

$controller = new MenuController();

if (isset($_GET['parent_id'])) {
    $parentId = $_GET['parent_id'];
    $menuItems = $controller->displaySubMenu($parentId);
} else {
    $menuItems = $controller->displayMenu();
}

include("partials/header.php");
?>
