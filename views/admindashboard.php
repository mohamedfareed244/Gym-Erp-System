<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../public/CSS/admindashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>   
    <?php require("partials/adminsidebar.php"); ?>
    <div id="add-body" class="addbody" style="background-color:white; height:100%; margin-top:-70px;">
        <div id="content" class="content">
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Dashboard</h1>
                    </div>
                </div>

                <ul class="box-info">
                    <?php
                    include_once "../Models/PackageModel.php";
                    include_once "../Models/ClientModel.php";
                    include_once "../Models/employeeModel.php";
                    include_once "../Models/ClassesModel.php";
                    include_once "../Models/membershipsModel.php";

                    $allMemberships = Memberships::getAllMemberships();
                    $numberOfMemberships = count($allMemberships);

                    $clientModel = new Client();
                    $clients = $clientModel -> getAllClients();
                    $numberOfClients = count($clients);

                    $packageModel = new Package();
                    $packages = $packageModel->getAllPackagesforEmployee();
                    $numberOfPackages = count($packages);

                    $allEmployees = Employee::getAllEmployees();
                    $numberOfEmployees = count($allEmployees);

                    $allCoaches = Employee::GetAllCoaches();
                    $numberOfCoaches = count($allCoaches);

                    $allClasses = Classes::getAllClasses();
                    $numberOfClasses = count($allClasses);
                    ?>

                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3><?php echo $numberOfPackages; ?></h3>
                            <p>Packages</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3><?php echo $numberOfClasses; ?></h3>
                            <p>Classes</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3><?php echo $numberOfClients; ?></h3>
                            <p>Clients</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3><?php echo $numberOfEmployees ?></h3>
                            <p>Employees</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3><?php echo $numberOfCoaches ?></h3>
                            <p>Coaches</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3><?php echo $numberOfMemberships ?></h3>
                            <p>Memberships</p>
                        </span>
                    </li>
                </ul>


                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Recent Clients</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>PhoneNumber</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td>
                                        <p><?php echo $client->getID()?></p>
                                    </td>
                                    <td><?php echo $client->getFirstName()?></td>
                                    <td><?php echo $client->getLastName()?></td>
                                    <td><?php echo $client->getEmail()?></td>
                                    <td><?php echo $client->getAge()?></td>
                                    <td><?php echo $client->getGender()?></td>
                                    <td><?php echo $client->getPhone()?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>