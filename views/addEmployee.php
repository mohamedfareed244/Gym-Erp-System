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
</head>

<body>
<?php
session_start();
require("partials/adminsidebar.php");
include_once "../Models/EmployeeModel.php";
$Employee = new Employee();
$result = $Employee->getJobTitles();
?>
  <script src="../public/js/addEmployee.js"></script>

<div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Add Employee</h4>
                    <form method="post" onsubmit="return validateForm()" action="../Controllers/EmployeeController.php" enctype="multipart/form-data">
          <input type="hidden" name="action" value="addEmployee">
          <div class="col-lg-4 col-sm-12">
            <label for="name">Name: </label>
          </div>
          <input type="text" name="name">
          <span id="name-error">
            <?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Phone Number: </label>
          </div>
          <input type="text" name="phoneNumber">
          <span id="phoneno-error">
            <?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Email: </label>
          </div>
          <input type="email" name="email">
          <span id="email-error">
            <?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Image: </label>
          </div>
          <input type="file" name="image">
          <span id="email-error">
            <?php echo isset($_SESSION["imgerror"]) ? $_SESSION["imgerror"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="jobs">Job Title :</label>
          </div>
          <select name="jobTitle" id="jobs">
            <option value="">Select job</option>
            <?php
            foreach ($result as $title) {
              echo "<option value='" . $title["Id"] . "'> " . $title["Name"] . "</option>";
            }
            ?>
          </select>
          <span id="jobTitle-error">
            <?php echo isset($_SESSION["jobTitleErr"]) ? $_SESSION["jobTitleErr"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Salary: </label>
          </div>
          <input type="number" name="salary" min="1000">
          <span id="salary-error">
            <?php echo isset($_SESSION["salaryErr"]) ? $_SESSION["salaryErr"] : ''; ?>
          </span>
          <div class="col-lg-12 col-sm-12">
            <label for="name">Address: </label>
          </div>
          <input type="text" name="address">
          <span id="address-error">
            <?php echo isset($_SESSION["addressErr"]) ? $_SESSION["addressErr"] : ''; ?>
          </span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Password: </label>
          </div>
          <input type="password" name="password" style="margin-bottom:20px">
          <span id="password-error">
            <?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ''; ?>
          </span>
          <span id="success">
            <?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?>
          </span>
          <br>
          
          <div class="col-lg-4 col-sm-12">
            <input type="submit" value="Add Employee" id="add-btn">
          </div>
          <br>
          <br>

        </form>
                </div>
            </div>
        
        </div>
</div>
    
</body>

</html>