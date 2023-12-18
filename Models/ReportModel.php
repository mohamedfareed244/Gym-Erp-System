<?php

    include_once("Model.php");

class Report extends Model{
    function __construct()
    {
        $this->db = $this->connect();
    }
    function getsoldpackages($start,$end){
        $sql="Select package.Title , package.ID, package.Price ,count(membership.ID) as total  FROM package join membership on membership.PackageID=package.ID where membership.StartDate BETWEEN '$start' AND '$end' 
        GROUP BY membership.PackageID ";
       $result=$this->db->query($sql);
       return $result;
    }
    function gettotalsales($start,$end){
        $sql="Select count(membership.ID) as total ,package.Price FROM package join membership on membership.PackageID=package.ID where membership.StartDate BETWEEN '$start' AND '$end' 
        GROUP BY membership.PackageID ";
        $result=$this->db->query($sql);
        $sum=0;
        foreach($result as $res){
            $sum+=($res["Price"]*$res["total"]);
        }
        return $sum;
    }
    function getsoldpt($start,$end){
        $sql="Select `private training package`.Title , `private training package`.Name, `private training package`.Price ,count(`private training package`.ID) as total  FROM `private training package` join `private training membership`  on `private training package`.ID=`private training membership`.PrivateTrainingPackageID where `private training membership`.date BETWEEN '$start' AND '$end' 
        GROUP BY `private training membership`.PrivateTrainingPackageID ";
       $result=$this->db->query($sql);
       return $result;
    }
    function gettotalsalespt($start,$end){
        $sql="Select count(ptmembership.ID) as total ,ptpackage.Price FROM `private training package` as ptpackage join `private training membership` as ptmembership on ptmembership.PrivateTrainingPackageID=ptpackage.ID where ptmembership.date BETWEEN '$start' AND '$end' 
        GROUP BY ptmembership.PrivateTrainingPackageID ";
        $result=$this->db->query($sql);
        $sum=0;
        foreach($result as $res){
            $sum+=($res["Price"]*$res["total"]);
        }
        return $sum;
    }
}
?>