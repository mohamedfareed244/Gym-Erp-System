<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client | Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("partials/adminsidebar.php");
   
    ?>
    <div id="add-body" class="addbody">
        <div class="container">
        <h2 class="table-title">Membership Requests: </h2>
            <div id="tablediv">
                <table class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Package Title</th>
                            <th scope="col">Months</th>
                            <th scope="col">StartDate</th>
                            <th scope="col">EndDate</th>
                            <th scope="col">Price </th>
                            <th scope="col">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 5 </td>
                            <td>Sara Ahmed</td>
                            <td>2 Months</td>
                            <td>2</td>
                            <td>2023-11-25</td>
                            <td>2024-01-25</td>
                            <td>900</td>
                            <td>
                                <button class="btn">Accept</button>
                                <button class="btn btn-delete">Decline</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <h2 class="table-title">Class Requests: </h2>
            <div id="tablediv">
                <table class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Class Name</th>
                            <th scope="col"> Day </th>
                            <th scope="col">From</th>
                            <th scope="col">To </th>
                            <th scope="col">Class Instructor </th>
                            <th scope="col">Fees </th>
                            <th scope="col">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 5 </td>
                            <td>Sara Ahmed</td>
                            <td>Yoga</td>
                            <td>Sunday</td>
                            <td>9:00pm</td>
                            <td>11:00pm</td>
                            <td>Mohamed fareed</td>
                            <td>120</td>
                            <td>
                                <button class="btn">Accept</button>
                                <button class="btn btn-delete">Decline</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>