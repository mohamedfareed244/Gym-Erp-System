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
$data=array('data'=>$word,'sum'=>$obj->gettotalsales($start,$end));
$jsonData = json_encode($data);


header('Content-Type: application/json');
    echo $jsonData;
}
?>