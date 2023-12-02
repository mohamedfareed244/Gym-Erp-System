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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
#myButton:disabled {
    pointer-events: none;
    opacity: 0.5;
}
</style>

<body>
    <?php require("partials/adminsidebar.php");
    
    include_once "../Models/ClassesModel.php";
    include_once "../Models/MembershipsModel.php";
    include_once "../Models/ptMembershipsModel.php";


    $Classes = new Classes();
    $classRequests=$Classes->getClassRequests();
    $Memberships= new Memberships();
    $membershipRequests=$Memberships->getMembershipRequests();
    $ptMemberships = new ptMemberships();
    $ptmembershipsRequests = $ptMemberships->getPtMembershipRequests();
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
                        <?php if (is_array($membershipRequests) && !empty($membershipRequests)) {
                            foreach ($membershipRequests as $membershipRequest): ?>

                        <tr id="row_<?php echo $membershipRequest['membershipID']; ?>">
                            <td><?php echo $membershipRequest['ID'] ?></td>
                            <td><?php echo $membershipRequest['FirstName'] ?></td>
                            <td><?php echo $membershipRequest['Title'] ?></td>
                            <td><?php echo $membershipRequest['NumOfMonths'] ?></td>
                            <td><?php echo $membershipRequest['StartDate'] ?></td>
                            <td><?php echo $membershipRequest['EndDate'] ?></td>
                            <td><?php echo $membershipRequest['Price'] ?></td>
                            <td>
                                <button class="btn"
                                    data-membershipid="<?php echo $membershipRequest['membershipID']; ?>"
                                    onclick='acceptMembership(this)'>Accept
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>

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
                        <?php if (is_array($classRequests) && !empty($classRequests)) {
                            foreach ($classRequests as $classRequest): ?>

                        <tr id="row_<?php echo $classRequest['reservedClassID']; ?>">
                            <td><?php echo $classRequest['ID']?></td>
                            <td><?php echo $classRequest['clientName']?></td>
                            <td><?php echo $classRequest['className']?></td>
                            <td><?php echo $classRequest['Date']?></td>
                            <?php
                            $startTime = new DateTime($classRequest['StartTime']);
                            $endTime = new DateTime($classRequest['EndTime']);
                            
                            // Format the DateTime object as "H:i" (24-hour format)
                            $startformattedDate = $startTime->format("H:i");
                            $endformattedDate = $endTime->format("H:i");
                            ?>
                            <td><?php echo $startformattedDate?></td>
                            <td><?php echo $endformattedDate?></td>
                            <td><?php echo $classRequest['employeeName']?></td>
                            <td><?php echo $classRequest['Price']?></td>
                            <td>
                            <?php if($classRequest['AvailablePlaces'] != 0) { ?>
                                <button class="btn"
                                    data-reservedclassid="<?php echo $classRequest['reservedClassID']; ?>"
                                    data-assignedclassid="<?php echo $classRequest['assignedClassID']; ?>"
                                    onclick='acceptClass(this)'>Accept
                                </button>
                                <?php } else {?>
                                    <button class="btn"
                                    data-reservedclassid="<?php echo $classRequest['reservedClassID']; ?>"
                                    onclick='declineClass(this)'>Decline
                                </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <h2 class="table-title">PT Membership Requests: </h2>
            <div id="tablediv">
                <table class="view-table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Coach Name</th>
                            <th scope="col">PT Package Title</th>
                            <th scope="col">Sessions Count</th>
                            <th scope="col">Number of Sessions</th>
                            <th scope="col">Price </th>
                            <th scope="col">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($ptmembershipsRequests) && !empty($ptmembershipsRequests)) {
                            foreach ($ptmembershipsRequests as $ptmembershipRequest): ?>

                        <tr id="row_<?php echo $ptmembershipRequest['ptMembershipID']; ?>">
                            <td><?php echo $ptmembershipRequest['ClientID'] ?></td>
                            <td><?php echo $ptmembershipRequest['FirstName'] . " " . $ptmembershipRequest['LastName'];  ?></td>
                            <td><?php echo $ptmembershipRequest['employeeName'] ?></td>
                            <td><?php echo $ptmembershipRequest['ptPackageName'] ?></td>
                            <td><?php echo $ptmembershipRequest['SessionsCount'] ?></td>
                            <td><?php echo $ptmembershipRequest['NumOfSessions'] ?></td>
                            <td><?php echo $ptmembershipRequest['Price'] ?></td>
                            <td>
                                <button class="btn"
                                    data-ptmembershipid="<?php echo $ptmembershipRequest['ptMembershipID']; ?>"
                                    onclick='acceptptMembership(this)'>Accept
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function acceptMembership(button) {
        // Extract ClassID, CoachID, and Date from the data attributes
        var membershipID = button.getAttribute('data-membershipid');

        // Use JavaScript to remove the corresponding row
        var rowId = 'row_' + membershipID ;
        var row = document.getElementById(rowId);
        if (row) {
            row.parentNode.removeChild(row);
        }

        // Use AJAX to send a request to your controller to delete the record from the backend
        $.ajax({
            url: '../Controllers/MembershipsController.php', // Update the path to your controller
            type: 'POST',
            data: {
                action: 'acceptMembership',
                membershipID : membershipID
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

    function acceptptMembership(button) {
        // Extract ClassID, CoachID, and Date from the data attributes
        var ptmembershipID = button.getAttribute('data-ptmembershipid');

        // Use JavaScript to remove the corresponding row
        var rowId = 'row_' + ptmembershipID ;
        var row = document.getElementById(rowId);
        if (row) {
            row.parentNode.removeChild(row);
        }

        // Use AJAX to send a request to your controller to delete the record from the backend
        $.ajax({
            url: '../Controllers/ptMembershipsController.php', // Update the path to your controller
            type: 'POST',
            data: {
                action: 'acceptPtMembership',
                ptmembershipID : ptmembershipID
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


    function acceptClass(button) {
        // Extract ClassID, CoachID, and Date from the data attributes
        var reservedClassID = button.getAttribute('data-reservedClassid');
        var assignedClassID = button.getAttribute('data-assignedClassid');

        // Use JavaScript to remove the corresponding row
        var rowId = 'row_' + reservedClassID;
        var row = document.getElementById(rowId);
        if (row) {
            row.parentNode.removeChild(row);
        }

        // Use AJAX to send a request to your controller to delete the record from the backend
        $.ajax({
            url: '../Controllers/ClassController.php', // Update the path to your controller
            type: 'POST',
            data: {
                action: 'acceptClass',
                reservedClassID : reservedClassID,
                assignedClassID : assignedClassID
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
 
    function declineClass(button) {
        // Extract ClassID, CoachID, and Date from the data attributes
        var reservedClassID = button.getAttribute('data-reservedClassid');

        // Use JavaScript to remove the corresponding row
        var rowId = 'row_' + reservedClassID;
        var row = document.getElementById(rowId);
        if (row) {
            row.parentNode.removeChild(row);
        }

        // Use AJAX to send a request to your controller to delete the record from the backend
        $.ajax({
            url: '../Controllers/ClassController.php', // Update the path to your controller
            type: 'POST',
            data: {
                action: 'declineClass',
                reservedClassID : reservedClassID
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

    </script>
</body>

</html>