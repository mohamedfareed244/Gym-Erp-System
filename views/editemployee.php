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
    ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Update Employee's Information</h4>
                    <?php
                    include_once("../Models/EmployeeModel.php");

                    if (isset($_GET['ID'])) {
                        $employeeID = $_GET['ID'];

                        $Employee = new Employee();
                        $employee = $Employee->getEmployeeByID($employeeID);

                        if (!$employee) {
                            echo "Employee not found";
                            exit;
                        }
                    } else {
                        echo "Employee ID not found";
                        exit;
                    }
                    ?>
                </div>
                <hr>
                <form method="POST" method="post">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Name: </label>
                    </div>
                    <input type="text" name="name" value="<?php echo $employee->getName(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Phone Number: </label>
                    </div>
                    <input type="text" name="phoneNumber" value="<?php echo $employee->getPhoneNumber(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Email: </label>
                    </div>
                    <input type="email" name="email" value="<?php echo $employee->getEmail(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="jobs">Job Title :</label>
                    </div>
                    <select name="jobTitle" id="jobs">
                        <?php
                        include_once "../Models/EmployeeModel.php";
                        $Employee = new Employee();
                        $result = $Employee->getjobtitles();

                        foreach ($result as $title) {
                            $selected = ($title["Name"] == $employee->getJobTitle()) ? "selected" : "";
                            echo "<option value='" . $title["Id"] . "' $selected> " . $title["Name"] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="col-lg-4 col-sm-12">
                        <label for="salary">Salary:</label>
                    </div>
                    <input type="number" name="salary" min="1000" value="<?php echo $employee->getSalary(); ?>">
                    <!-- Other form fields -->

                    <div class="col-lg-4 col-sm-12">
                        <label for="photo">Image:</label>
                    </div>
                    <input type="file" name="photo" id="imgfile">
                    <!-- Other form fields -->

                    <div class="col-lg-12 col-sm-12">
                        <label for="address">Address:</label>
                    </div>
                    <input type="text" id="emp-addr" name="address" style="margin-bottom:20px" value="<?php echo $employee->getAddress(); ?>">
                    <br>

                    <div class="col-lg-4 col-sm-12">
                        <input type="submit" value="Update Employee" id="add-btn">
                    </div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (
                            isset($_POST['name']) &&
                            isset($_POST['phoneNumber']) &&
                            isset($_POST['email']) &&
                            isset($_POST['jobTitle']) &&
                            isset($_POST['salary']) &&
                            isset($_POST['address'])
                        ) {
                            $employeeID = $_GET['ID'];

                            $name = htmlspecialchars($_POST['name']);
                            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                            $jobTitle = htmlspecialchars($_POST['jobTitle']);
                            $salary = floatval($_POST['salary']);
                            $address = htmlspecialchars($_POST['address']);



                            if (!$email) {
                                echo "<p>Invalid email address</p>";
                                exit();
                            }
                            $employee->setName($name);
                            $employee->setEmail($email);
                            $employee->setSalary($salary);
                            $employee->setJobTitle($jobTitle);
                            $employee->setAddress($address);
                            $employee->setPhoneNumber($phoneNumber);

                            $result = $Employee->updateEmployee($employee);

                            if ($result) {
                                echo "<p>Employee information updated successfully!</p>";
                            } else {
                                echo "<p>Error updating employee information</p>";
                            }
                        } else {
                            echo "<p>All fields are required!</p>";
                        }
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>