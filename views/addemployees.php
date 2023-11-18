<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("./partials/adminsidebar.php");
    include_once("../Models/employeeModel.php");
    ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Add Employee</h4>
                    <hr>
                    <form method="POST" id="AddEmployeeForm" method="post">
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Name: </label>
                        </div>
                        <input type="text" name="name">
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Phone Number: </label>
                        </div>
                        <input type="text" name="phoneNumber">
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Email: </label>
                        </div>
                        <input type="email" name="email">
                        <div class="col-lg-4 col-sm-12">
                            <label for="jobs">Job Title :</label>
                        </div>
                        <select name="jobTitle" id="jobs">
                            <option value="">Select job</option>
                            <?php
                            include_once "../Models/hrmodel.php";
                            $result = getjobtitles();
                            foreach ($result as $title) {

                                echo "<option value='" . $title["Id"] . "'> " . $title["Name"] . "</option>";
                            }

                            ?>

                        </select>
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Salary: </label>
                        </div>
                        <input type="number" name="salary" min="1000">

                        <div class="col-lg-12 col-sm-12">
                            <label for="name">Address: </label>
                        </div>
                        <input type="text" name="address">
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Password: </label>
                        </div>
                        <input type="password" name="password" style="margin-bottom:20px">
                        <br>
                        <div class="col-lg-4 col-sm-12">
                            <input type="submit" value="Add Employee" class="addEmp" id="add-btn">
                        </div>
                        <br>
                        <br>
                        <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (
                                isset($_POST['name']) &&
                                isset($_POST['phoneNumber']) &&
                                isset($_POST['email']) &&
                                isset($_POST['jobTitle']) &&
                                isset($_POST['salary']) &&
                                isset($_POST['address']) &&
                                isset($_POST['password'])
                            ) {
                                $name = htmlspecialchars($_POST['name']);
                                $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                                $jobTitle = htmlspecialchars($_POST['jobTitle']);
                                $salary = floatval($_POST['salary']);
                                $address = htmlspecialchars($_POST['address']);
                                if (isset($_POST['password']) && !empty($_POST['password'])) {
                                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                } else {
                                    $password = null;
                                }

                                if (!$email) {
                                    echo "<p>Invalid email address</p>";
                                    exit();
                                }

                                $newEmployee = new Employee();
                                $newEmployee->Name = $name;
                                $newEmployee->PhoneNumber = $phoneNumber;
                                $newEmployee->Email = $email;
                                $newEmployee->JobTitle = $jobTitle;
                                $newEmployee->Salary = $salary;
                                $newEmployee->Address = $address;
                                $newEmployee->Password = $password;

                                $result = $newEmployee->addEmployee($newEmployee);

                                if ($result) {
                                    echo "<p>Employee added successfully!</p>";
                                } else {

                                    echo "<p>Error adding employee</p>";
                                }
                            } else {
                                echo "<p>All fields are required!</p>";
                            }
                        } else {
                        }
                        ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>