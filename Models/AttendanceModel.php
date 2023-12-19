<?php

require_once("Model.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Attendance extends Model
{
    private $ID;
    private $EmployeeId;
    private $Day;
    private $Status;

    function __construct()
    {
        $this->db = $this->connect();
    }
    // Setters and Getters
    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getEmployeeId()
    {
        return $this->EmployeeId;
    }

    public function setEmployeeId($EmployeeId)
    {
        $this->EmployeeId = $EmployeeId;
    }

    public function getDay()
    {
        return $this->Day;
    }

    public function setDay($Day)
    {
        $this->Day = $Day;
    }

    public function getStatus()
    {
        return $this->Status;
    }

    public function setStatus($Status)
    {
        $this->Status = $Status;
    }


    public function getattendance($date)
    {
        $sql = "SELECT attendance.* ,e.Name,e.PhoneNumber,e.Email,e.JobTitle,e.ID from attendance join employee e on EmployeeId=e.ID where Day ='$date' ";
        $result = $this->db->query($sql);

        if ($result->num_rows <= 0) {
            Attendance::addnewdate($date);
            return Attendance::getattendance($date);
            exit();
        } else {
            return $result;
        }
    }
    public function attendanceforemp($id, $status, $date)
    {
        $sql = "UPDATE attendance SET Status=$status where EmployeeId=$id and Day='$date'";
        return $this->db->query($sql);
    }
    public function addnewdate($date)
    {
        $Employee = new Employee();
        $employees = $Employee->getAllEmployees();
        foreach ($employees as $emp) {
            $ID = $emp->getID();
            $sql = "insert into attendance (EmployeeId,Day,Status) values ($ID,'$date',0)";
            $this->db->query($sql);
        }
        return;
    }
    public function countdays($id){
        date_default_timezone_set('Africa/Cairo');
       
       $date = new DateTime();

$x=date('d')-1;
$interval = new DateInterval('P'.$x.'D'); 
$date->sub($interval);
$currdate=date('Y-m-d');
// Get the updated date
$updatedDate = $date->format('Y-m-d');

$sql ="select count(ID) as num from attendance where ID =$id and Day between '$updatedDate' and '$currdate' and status =1";
$result=$this->db->query($sql);
foreach($result as $res){
    return $res["num"];
}
    }
    
}

