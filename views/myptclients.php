<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images start-->

    <title>Admin Dashboard</title>

</head>

<body>
    <?php session_start();
    include("./partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">

        <div class="container">
            <h1 class="view-title">PT Clients:</h1>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for Client names..">
            <div id="tablediv">
                <table id="ptMembershipsTable" class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">PT Package Name</th>
                            <th scope="col">PT Package Number of Sessions</th>
                            <th scope="col">Sessions Count</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "../Models/CoachesModel.php";

                        $Coach = new Coach();
                        $ptMembershipsData = $Coach->getptMembershipsForCoach($_SESSION['ID']);

                        foreach ($ptMembershipsData as $pt) {
                            echo "<tr>
                               <td>" . $pt["ID"] . "</td>
                               <td>" . $pt["clientFirstName"] . " " . $pt["clientLastName"] . "</td>
                               <td>" . $pt["ptPackageName"] . "</td>
                               <td>" . $pt["NumOfSessions"] . "</td>
                               <td>" . $pt["SessionsCount"] . "</td>
                               <td>" . $pt["Price"] . "</td>
                               </td>
                           </tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>



        </div>
    </div>

    <script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBar");
        filter = input.value.toUpperCase();
        table = document.getElementById("ptMembershipsTable");
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
  </script>

</body>

</html>