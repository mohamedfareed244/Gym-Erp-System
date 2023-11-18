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
    <?php require("partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
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
                    $packageModel = new Package();

                    $packages = $packageModel->getAllPackagesforEmployee();
                    $numberOfPackages = count($packages);

                    
                    $clientModel = new Client();

                    $clients = $clientModel->getAllClients();
                    $numberOfClients = count($clients);

                    $allEmployees = Employee::getAllEmployees();
                    $numberOfEmployees = count($allEmployees);
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
                            <h3>20</h3>
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
                            <h3>70</h3>
                            <p>Coaches</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <h3>$2543</h3>
                            <p>Revenue</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <h3>$25400</h3>
                            <p>Total Costs</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <h3>88%</h3>
                            <p>Work Load</p>
                        </span>
                    </li>
                </ul>


                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Recent Requests</h3>
                            <i class='bx bx-search'></i>
                            <i class='bx bx-filter'></i>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Date Order</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="../public/Images/coach1.png">
                                        <p>Laila Nabil</p>
                                    </td>
                                    <td>01-10-2023</td>
                                    <td><span class="status completed">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../public/Images/coach2.png">
                                        <p>Jana Hani</p>
                                    </td>
                                    <td>01-10-2023</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../public/Images/coach1.png">
                                        <p>Malak Helmy</p>
                                    </td>
                                    <td>01-10-2023</td>
                                    <td><span class="status process">Process</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../public/Images/coach2.png">
                                        <p>Fatimah </p>
                                    </td>
                                    <td>01-10-2023</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../public/Images/coach1.png">
                                        <p>Mohamed Fareed</p>
                                    </td>
                                    <td>01-10-2023</td>
                                    <td><span class="status completed">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="todo">
                        <div class="head">
                            <h3>Todos</h3>
                            <i class='bx bx-plus'></i>
                            <i class='bx bx-filter'></i>
                        </div>
                        <ul class="todo-list">
                            <li class="completed">
                                <p>Todo List</p>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </li>
                            <li class="completed">
                                <p>Todo List</p>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </li>
                            <li class="not-completed">
                                <p>Todo List</p>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </li>
                            <li class="completed">
                                <p>Todo List</p>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </li>
                            <li class="not-completed">
                                <p>Todo List</p>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>