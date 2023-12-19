<?php

require_once("Model.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Staff extends Users
{
    private $Name;
    private $Salary;
    private $JobTitle;
    private $Address;
    private $Img;

    public function __construct() {
        parent::__construct();
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getSalary()
    {
        return $this->Salary;
    }

    public function setSalary($Salary)
    {
        $this->Salary = $Salary;
    }

    public function getJobTitle()
    {
        return $this->JobTitle;
    }

    public function setJobTitle($JobTitle)
    {
        $this->JobTitle = $JobTitle;
    }

    public function getAddress()
    {
        return $this->Address;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function getImg()
    {
        return $this->Img;
    }

    public function setImg($Img)
    {
        $this->Img = $Img;
    }
}
?>