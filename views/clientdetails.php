<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details | Profit</title>

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!--css/icons/boostrap/jquery/fonts/images start-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images end-->

</head>

<style>
    #account-details {
        margin-bottom: 10%;
    }
</style>

<body>
    <?php require("partials/adminsidebar.php");
    include_once "../Models/ClientModel.php";
    include_once "../Models/membershipsModel.php";
    include_once "../Models/PackageModel.php";

    $clients = Client::getAllClients();
    $memberships = Memberships::getAllMemberships();
    $packages = new Package();
    $packages = $packages->getAllPackagesforEmployee();
    ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h2 class="table-title">Memberships:</h2>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for names..">

            <div id="tablediv">
                <table id="membershipsTable" class="view-table overflow-auto mh-10">
                    <hr>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Package</th>
                            <th scope="col">Start Date </th>
                            <th scope="col">End Date</th>
                            <th scope="col">Visits </th>
                            <th scope="col">Invitations </th>
                            <th scope="col">Status </th>
                            <th scope="col">Freeze</th>
                            <th scope="col">Private Training Sessions</th>
                            <th scope="col">inbody</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($memberships as $membership) {
                            echo "<tr id='row-" . $membership->ID . "'>";
                            echo "<td>". $membership->ID . "</td>";
                            foreach ($clients as $client) {
                                if ($client->ID == $membership->clientId) {
                                    echo '<td> ' . $client->FirstName . ' ' . $client->LastName . ' </td>';
                                    break;
                                }
                            }
                            foreach ($packages as $package) {
                                if ($package->ID == $membership->packageId) {
                                    echo '<td>'.$package->Name.' </td>';
                                }
                            }
                            echo '<td>02-09-2023</td>';
                            echo '<td>02-09-2023</td>';
                            echo '<td>30</td>';
                            echo '<td class="bg-info">Freezed</td>';
                            echo '<td><button class="btn btn-freeze">Freeze</button></td>';
                            echo '<td>Mohamed fareed</td>';
                            echo '<td>2</td>';
                            echo '<td>1</td>';
                            echo '<td>' . $client->Phone . '</td>';
                            echo "<td><a a href='editclient.php?ID=" . $client->ID . "' class=\"btn\">Edit</a>       ";
                            echo "<button class=\"btn btn-delete\" onclick='deleteClient(" . $client->ID . ")'>Delete</button></td>";
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>

            </div>
            <hr>
            <!-- <h2 class="table-title">Classes: </h2>
            <div id="tablediv">
                <table class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Class Name</th>
                            <th scope="col"> Date </th>
                            <th scope="col">From</th>
                            <th scope="col">To </th>
                            <th scope="col">Status </th>
                            <th scope="col">Class Instructor </th>
                            <th scope="col">Fees </th>
                            <th scope="col">Paid </th>
                            <th scope="col">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Yoga</td>
                            <td>09-09-2023</td>
                            <td>9:00pm</td>
                            <td>11:00pm</td>
                            <td class="bg-success text-white">Attended</td>
                            <td>Mohamed fareed</td>
                            <td>120</td>
                            <td class="bg-danger">Not paid </td>
                            <td>
                                <button class="btn">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <hr>
            <h2 class="table-title">Financials: </h2>
            <div id="tablediv">
                <table class="view-table overflow-auto mh-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Package Name </th>
                                <th scope="col"> Date </th>
                                <th scope="col">Amount </th>
                                <th scope="col">Paid </th>
                                <th scope="col">Remain </th>
                                <th scope="col">Due </th>
                                <th scope="col">Sales </th>
                                <th scope="col">Actions </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2 Months </td>
                                <td>09-09-2023</td>
                                <td>3000</td>
                                <td>2000</td>
                                <td>1000</td>
                                <td>01-10-2023</td>
                                <td>Mohamed fareed </td>
                                <td>
                                    <button class="btn">Edit</button>
                                    <button class="btn btn-delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div> -->
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBar");
        filter = input.value.toUpperCase();
        table = document.getElementById("membershipsTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    
    function deleteClient(clientId) {
      $.ajax({
        type: "POST",
        url: "../Controllers/ClientController.php",
        data: {
          action: "deleteClient",
          clientId: clientId,
        },
        success: function(response) {
          if (response === "success") {
            var tableRow = document.getElementById('row-' + clientId);
            if (tableRow) {
              tableRow.parentNode.removeChild(tableRow);
            } else {
              console.log("Error.");
            }
          } else {
            console.log("Error deleting client.");
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX error: " + status + " - " + error);
        },
      });
    }
</script>

</html>