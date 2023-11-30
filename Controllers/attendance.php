<?php 
if($_SERVER["REQUEST_METHOD"]==="POST"){
    include_once "../Models/employeeModel.php";
//     $employees=$_POST["arr"];
//     foreach ($employees as $emp ){
//         $str="h".$emp;
//        if(isset($_POST[$str])){
//         Employee::attendanceforemp($emp,1,$_POST["date"]);
//        }else{
//         Employee::attendanceforemp($emp,0,$_POST["date"]);
//        }
// }
//  $x=json_encode($_POST["h1"]);
    echo json_encode(["status" => $_POST["h1"].checked]);

// Employee::attendanceforemp()
}
?>