<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All classes| Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../public/js/classes.js?v=<?php echo time(); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>


<body>
    <?php
    session_start();
    require("partials/adminsidebar.php");
    ?>

    <script src="../public/js/addClass.js"></script>
    <?php 
    include_once "../Models/ClassesModel.php";
    include_once "../Models/AssignedClassModel.php";
    include_once "../Models/ReservedClassModel.php";

    $assignedclass = new AssignedClass();
    $results = $assignedclass->getallCoachesandClasses();
    ?>
    <div id="add-body">
        <div class="container">
            <h2 class="table-title">Classes:</h2>
            <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for class names..">

            <table class="table" id="classesTable">
                <thead>
                    <tr>
                        <td class="col"> ID </td>
                        <td class="col"> Name </td>
                        <td class="col"> Coach </td>
                        <td class="col"> Coach's Phone Number</td>

                        <td>Days</td>
                        <td>Action </td>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) : ?>
                        <tr id="row_<?php echo $result['ClassID']; ?>">
                            <td> <?php echo $result['ClassID'] ?> </td>
                            <td> <?php echo $result['ClassName'] ?> </td>
                            <td> <?php echo $result['CoachName'] ?></td>
                            <td> <?php echo $result['PhoneNumber'] ?> </td>
                            <td> <?php echo $result['Date'] ?> </td>

                            <td><button id="add-btn" action="viewClients">View Clients</button>
                                <button id="add-btn" style="background-color:red; color:white;" data-classid="<?php echo $result['ClassID']; ?>" data-coachid="<?php echo $result['CoachID']; ?>" data-date="<?php echo $result['Date']; ?>" onclick='deleteClass(this)'>Delete</button>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
                    </div>
                    </div>
    <script>


        function deleteClass(button) {
            // Extract ClassID, CoachID, and Date from the data attributes
            var classID = button.getAttribute('data-classid');
            var coachID = button.getAttribute('data-coachid');
            var date = button.getAttribute('data-date');

            // Use JavaScript to remove the corresponding row
            var rowId = 'row_' + classID;
            var row = document.getElementById(rowId);
            if (row) {
                row.parentNode.removeChild(row);
            }

            // Use AJAX to send a request to your controller to delete the record from the backend
            $.ajax({
                url: '../Controllers/ClassController.php', // Update the path to your controller
                type: 'POST',
                data: {
                    action: 'deleteClass',
                    classID: classID,
                    coachID: coachID,
                    date: date
                },
                success: function(response) {
                    // Handle the response from the controller if needed
                    console.log(response);
                },
                error: function(error) {
                    // Handle errors if any
                    console.error(error);
                }
            });
        }


        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("classesTable");
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
    </script>

</body>

</html>