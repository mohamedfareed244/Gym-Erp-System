<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Training sessions | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h2 class="coaches-title">Private Training Sessions</h2>
            <br>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for names..">
            <div id="tablediv">
                <table id="ptSessions" class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Client Name </th>
                            <th scope="col">Session Date </th>
                            <th scope="col">Duration</th>
                            <th scope="col">Time </th>
                            <th scope="col">Payment </th>
                            <th scope="col">Coach Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mohamed fareed</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Mohamed fareed</td>
                            <td><button class="btn"> Edit</button></th>
                                <button class="btn btn-delete"> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ahmed Hassan</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Ahmed Hassan</td>

                            <td><button class="btn"> Edit</button></th>
                                <button class="btn btn-delete"> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Shorouk Ahmed</td>
                            <td>02-10-2023</td>
                            <td>2 hr</td>
                            <td>5:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Shorouk Ahmed</td>

                            <td><button class="btn"> Edit</button></th>
                                <button class="btn btn-delete"> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Shorouk Ahmed</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Shorouk Ahmed</td>
                            <td><button class="btn"> Edit</button></th>
                                <button class="btn btn-delete"> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("ptSessions");
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