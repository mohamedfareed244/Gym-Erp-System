<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Reports | Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/salesreport.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    <?php require("partials/adminsidebar.php") ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <h4>Sales Report </h4>
                </div>

   
    <div class="date-container-sales">
        <label class="date-label-sales">From:</label>
        <input type="date" class="date-input" id="startdate">
    </div>

    <div class="date-container-sales">
        <label class="date-label-sales">To:</label>
        <input type="date" class="date-input" id="enddate">
    </div>



       </div>
        </div>
        <div class="center-button-container">

        <button class="generate-report-button" onclick="generateReport()">Generate Report</button>



        

    </div>
    </div>
    <div id="report-container" class="report-container"></div>

            <div id="tablediv">
                <table class="table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Package ID</th>
                            <th scope="col">Package Name </th>
                            <th scope="col">Sales</th>
                            <th scope="col">No .  </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>#1923P</td>
                            <th scope="row">2 Months offer</th>
                            <td>EGP 60000</td>
                            <td>30</td>
                          
                        </tr>
                        <tr>
                        <td>#1923P</td>
                            <th scope="row">2 Months offer</th>
                            <td>EGP 60000</td>
                            <td>30</td>
                        </tr>
                        <tr>
                        <td>#1923P</td>
                            <th scope="row">2 Months offer</th>
                            <td>EGP 60000</td>
                            <td>30</td>
                        </tr>
                        <tr>
                        <td>#1923P</td>
                            <th scope="row">2 Months offer</th>
                            <td>EGP 60000</td>
                            <td>30</td>
                        </tr>
                        <tr>
                        <td>#1923P</td>
                            <th scope="row">2 Months offer</th>
                            <td>EGP 60000</td>
                            <td>30</td>
                        </tr>
</table>
<div>
</body>

<script src="../public/js/generatereports.js?v=<?php echo time();?>"></script>


</html>