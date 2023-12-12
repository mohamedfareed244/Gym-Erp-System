<?php
require_once("Model.php");

class navbarModel extends Model
{
    private $menu_id;
    private $menu_name;
    private $menu_icon;
    private $menu_status;


    function __construct()
    {
        $this->db = $this->connect();
    }

    public function getID()
    {
        return $this->menu_id;
    }

    public function setID($ID)
    {
        $this->menu_id = $ID;
    }

    public function getMenuItemName()
    {
        return $this->menu_name;
    }

    public function setMenuItemName($itemname)
    {
        $this->menu_name = $itemname;
    }

    public function getMenuItemIcon()
    {
        return $this->menu_icon;
    }

    public function setMenuItemIcon($itemicon)
    {
        $this->menu_icon = $itemicon;
    }

    public function getMenuItemStatus()
    {
        return $this->menu_status;
    }

    public function setMenuItemStatus($itemstatus)
    {
        $this->menu_status = $itemstatus;
    }


    public function addNavbarItem($item)
    {
        try {
            $menu_name = $item->menu_name;
            $menu_icon = $item->menu_icon;

            $sql = "INSERT INTO `menu` (`menu_name`, `menu_icon`) 
            VALUES ('$menu_name', '$menu_icon')";

            $db = new DBh(); 

            $result = $db->query($sql);

            if (!$result) {
                echo "Error: " . $db->getConn()->error;
            } else {
                echo "Record added successfully";
            }

            return $result;

        } catch (Exception $e) {
            echo $e;
        }
    }
}
?>