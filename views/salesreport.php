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
    <?php require("../partials/adminsidebar.php") ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <h4>Sales Report </h4>
                </div>

   
    <div class="date-container">
        <label class="date-label">From:</label>
        <input type="date" class="date-input">
    </div>

    <div class="date-container">
        <label class="date-label">To:</label>
        <input type="date" class="date-input">
    </div>



       </div>
        </div>
        <div class="center-button-container">

        <button class="generate-report-button" onclick="generateReport()">Generate Report</button>

    </div>
    </div>
    <div id="report-container" class="report-container"></div>
    <h2 class="table-title">Memberships:</h2>
            <div id="tablediv">
                <table class="table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Package Name</th>
                            <th scope="col">Start Date </th>
                            <th scope="col">End Date</th>
                            <th scope="col">Visits </th>
                            <th scope="col">Status </th>
                            <th scope="col">Freezes </th>
                            <th scope="col">Action </th>
                            <th scope="col">Sales</th>
                            <th scope="col">pt</th>
                            <th scope="col">inbody</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">2 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-info">Freezed</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">Expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">Expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">Expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">Expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
</div>
</div>

</body>

<script src="../public/js/generatereports.js"></script>


</html>