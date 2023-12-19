<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="body">

    <style>
    .coaches-title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 27px;
        text-transform: uppercase;
        padding-top: 20px;
        color: rgb(36, 34, 34);
        /* padding-left: 40px; */
        padding-bottom: 30px;
    }
    </style>

    <body>
    <div id="viewclients">
<i class="fa fa-close"  style="font-size:30px" id="close"></i>
<table class="table">
<thead>
    <tr>
        <td class="col"> CLient Id  </td>
        <td class="col"> CLient Name</td>
        <td class="col"> CLient Phone </td>
        <td class="col"> Attend</td>
    </tr>
</thead>
<tbody id="clienttable">
    <tr>
    <td class="col"> 2</td>
    <td class="col"> Mohamed Fareed </td>
    <td class="col"> 01210847059 </td>
    <td class="col"> <input type="checkbox" name="" id=""> </td>
    </tr>
</tbody>
</table>
</div>
        <?php require("partials/adminsidebar.php") ?>
        <div id="add-body">
            <h2 class="coaches-title"> My Upcoming Classes : </h2>
            <table class="table">
                <!-- Assume that the coach id =4 till the sessions work  -->
                <?php
    include_once "../Models/CoachesModel.php";
    include_once "../Models/ReservedClassModel.php";
    $Coach = new Coach();
 $result=$Coach->getClassesForCoach($_SESSION["ID"]);
 if(mysqli_num_rows($result)<=0){
    echo "<h2> There Are no Available Classes </h2>";
    exit();
 }
    ?>
                <thead>
                    <tr>
                        <td class="col"> ID </td>
                        <td class="col"> Title </td>
                        <td class="col"> From </td>
                        <td class="col"> To </td>
                        <td class="col"> Day </td>
                        <td class="col"> Date </td>
                        <td class="col"> Clients </td>
                        <td class="col"> Action </td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
    
   

foreach($result as $res){
    $timestamp = strtotime($res["Date"]);
    $ReservedClasses = new ReservedClass();
    $a=$ReservedClasses->getclassnum($res["ID"]);
    $num;
    foreach($a as $b){
        $num=$b["num"];
    }
echo "<tr><td>".$res["ID"]."</td>
<td>".$res["Name"]."</td>
<td>".$res["StartTime"]." </td>
<td>
    ".$res["EndTime"]."
</td>
<td>".date('l', $timestamp)."</td>
<td>".$res["Date"]."</td>
<td>".$num."</td>
<td ><button id ='add-btn' onclick ='show(".$res["ID"].")'>
View Clients
</button></td> </tr>";
}
    ?>

                </tbody>
            </table>

        </div>
    </body>
    <script language='javascript'>
    function show(x) {
        fetch(`../Models/AssignedClassModel.php?x=${x}`)
            .then(response => {
                // Check if the response status is OK (status code 200)
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                // Parse the response as text
                return response.text();
            })
            .then(htmlContent => {


                // Update your view with the received HTML content
                document.getElementById("clienttable").innerHTML = htmlContent;
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
        document.getElementById("viewclients").style.display = "block";


    }
    document.getElementById("close").addEventListener('click', function() {
        document.getElementById("viewclients").style.display = "none";
    });
    </script>

</html>