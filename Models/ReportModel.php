<?php

    include_once("Model.php");

// class Report extends Model{
//     function __construct()
//     {
//         $this->db = $this->connect();
//     }
//     function getsoldpackages($start,$end){
//         $sql="Select package.Title , package.ID, package.Price ,count(membership.ID) as total  FROM package join membership on membership.PackageID=package.ID where membership.StartDate BETWEEN '$start' AND '$end' 
//         GROUP BY membership.PackageID ";
//        $result=$this->db->query($sql);
//        return $result;
//     }
// }
?>