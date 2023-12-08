<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check in </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
 #disableBtn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}
</style>


<body>
    <?php require("partials/adminsidebar.php");
    include_once "../Models/MembershipsModel.php";
    include_once "../Models/ClientModel.php";
    $memberships = new Memberships();
    $membership=$memberships->getClientsAndTheirMembership(); 

    $clientModel = new Client();
    $clients = $clientModel -> getAllClients();
    $numberOfClients = count($clients); ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-3 divstat" style="height:40%;">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-circle" style="color:green;margin-top:60px;"></i>
                        </div>
                        <div class="col-9">
                            <h2> <?php echo $numberOfClients; ?></h2>
                            <p><b>Estimated clients in the gym</b> </p>
                        </div>
                    </div>


                </div>
            </div>
            <br>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for Clients..">

            <hr>
            <div id="tablediv">
                <table id="clientsTable" class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">End date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Visits</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($membership as $membership) : ?>
                        <tr id="row_<?php echo $membership['ID'] ?>">
                            <th scope="row"><?php echo $membership['ID'] ?></th>
                            <td><?php echo $membership['FirstName'] . " " . $membership['LastName']; ?></td>
                            <td><?php echo $membership['Title']; ?></td>
                            <td><?php echo $membership['EndDate']; ?></td>
                            <?php if($membership['Freezed'] == '0'){ ?>
                            <td class="bg-info">UnFreezed</td>
                            <?php } else { ?>
                            <td class="bg-info">Freezed</td>
                            <?php } ?>
                            <td><b><?php echo $membership['VisitsCount'] ?></b> from <b><?php echo $membership['VisitsLimit'] ?></b></td>
                            <td>
                            <?php if($membership['Freezed'] == '0'){ ?>
                                <button class="btn btn-success"
                                data-clientid="<?php echo $membership['ID']; ?>"
                                onclick='Checkin(this)'>Check In
                                </button>
                            <?php } else { ?>
                                <button id="disableBtn" class="btn btn-success">Check In</button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("clientsTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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

        function Checkin(button) {
        var clientID = button.getAttribute('data-clientid');
        // Use JavaScript to remove the corresponding row
        var rowId = 'row_' + clientID;
        var row = document.getElementById(rowId);
        if (row) {
            row.parentNode.removeChild(row);
        }

        $.ajax({
            url: '../Controllers/MembershipsController.php',
            type: 'POST',
            data: {
                action: 'checkinClient',
                clientID : clientID
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
    </script>
</body>

</html>