<?php
require("../Models/ReportModel.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){

    $input_data = json_decode(file_get_contents('php://input'), true);
    $start = $input_data['start'];
    $end =$input_data['end'];
$obj=new Report();
$result=$obj->getsoldpackages($start,$end);
$word="";
foreach($result as $res){
   
$word.="<tr>
<td>";
$word.=$res["ID"];
$word.="
</td>
    <th scope='row'>";

   $word.=$res["Title"];
   $word.="</th>
    <td>EGP";
    $word.= $res["Price"];
    
    $word.="</td>
    <td>";
    $word.= $res["total"];
    $word.="
    </td>
</tr>";
}
$word2="";
$result2=$obj->getsoldpt($start,$end);
// foreach($result as $res){
   
//     $word2.="<tr>
//     <td>";
//     $word2.=$res["ID"];
//     $word2.="
//     </td>
//         <th scope='row'>";
    
//        $word2.=$res["Name"];
//        $word2.="</th>
//         <td>EGP";
//         $word2.= $res["Price"];
        
//         $word2.="</td>
//         <td>";
//         $word2.= $res["total"];
//         $word2.="
//         </td>
//     </tr>";
//     }
// ,'sum_pt'=>$obj->gettotalsalespt($start,$end),'pt'=>$word2
$data=array('packages'=>$word,'sum_packages'=>$obj->gettotalsales($start,$end));
$jsonData = json_encode($data);


header('Content-Type: application/json');
    echo $jsonData;
}
?>