<?php

require_once("Model.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Users extends Model
{
    private $ID;
    private $Email;
    private $Password;
    private $PhoneNumber;

    
    function __construct()
    {
        $this->db = $this->connect();
    }

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;
    }


}
?>