<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details | Profit</title>

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../public/CSS/alert.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
    include_once "../Models/MembershipsModel.php";
    $Client = new Client;
    $clients = $Client->getAllClients();
    $Memberships = new Memberships();
    ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h2 class="table-title">All Clients:</h2>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for names.."
                style="width:100%;">

            <div id="tablediv">
                <table id="membershipsTable" class="view-table overflow-auto mh-10">
                    <hr>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Weight </th>
                            <th scope="col">Height </th>
                            <th scope="col">Phone</th>
                            <th scope="col">Membership</th>
                            <th scope="col">PT Package</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($clients as $client) {
                            echo "<tr id='row-" . $client->getID() . "'>";
                            echo '<td> ' . $client->getID() . ' </td>';
                            echo '<td> ' . $client->getFirstName() . ' ' . $client->getLastName() . ' </td>';
                            echo '<td> ' . $client->getEmail() . '</td>';
                            echo '<td> ' . $client->getAge() . '</td>';
                            echo '<td> ' . $client->getGender() . '</td>';
                            echo '<td> ' . $client->getWeight() . '</td>';
                            echo '<td> ' . $client->getHeight() . '</td>';
                            echo '<td> ' . $client->getPhoneNumber() . '</td>';
                            if ($client->HasMembership == 'Yes' && $client->HasPtPackage == 'No') {
                                echo '<td><button class="btn" disabled>Add</button></td>';
                                echo '<td><a href="addCLientPtPackage.php?ID=' . $client->getID() . '" class="btn btn-freeze">Add</a></td>';
                            } else if ($client->HasPtPackage == 'Yes' && $client->HasMembership == 'Yes') {
                                echo '<td><button class="btn" disabled>Add</button></td>';
                                echo '<td><button class="btn btn-freeze" disabled>Add</button></td>';
                            } else {
                                echo '<td><a href="addclientmembership.php?ID=' . $client->getID() . '" class="btn">Add</a></td>';
                                echo '<td><button class="btn btn-freeze" disabled>Add</button></td>';
                            }

                            echo "<td><a href='editclient.php?ID=" . $client->getID() . "' class=\"btn\">Edit</a>       ";
                            echo "<button class=\"btn btn-delete\" onclick='showDeleteModal(" . $client->getID() . ")'>Delete</button></td>"; ?>
                                 <div class="modal" id="deleteModal-<?php echo $client->getID(); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <span class="close-btn" onclick="hideDeleteModal(<?php echo $client->getID() ?>)">&times;</span>
                                            <div>
                                                <label>Are you sure you want to delete this client?</label>
                                            </div>
                                            <button class="btn btn-delete"
                                                onclick='deleteClient(<?php echo $client->getID() ?>)'
                                                style="background-color:red">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>

            </div>
            <hr>
        </div>
    </div>

</body>
<script>
 function showDeleteModal(clientId) {
            $('#deleteModal-' + clientId).fadeIn();
        }

        function hideDeleteModal(clientId) {
            $('#deleteModal-' + clientId).fadeOut();
        }


function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    table = document.getElementById("membershipsTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        // td = tr[i].getElementsByTagName("td")[7]; search based on phone numbers
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
                var tableRow = document.getElementById('row-' + clientId);
                if (tableRow) {
                    tableRow.parentNode.removeChild(tableRow);
                } else {
                    console.log("Error."+ response);
                }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error: " + status + " - " + error);
        },
    });
    hideDeleteModal(clientId);
}
</script>

</html>