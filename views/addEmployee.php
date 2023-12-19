<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Client | Profit </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    div[id$="-error"] {
      color: red;
    }

    #success {
      color: green;
    }
  </style>
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
          <hr>
          <br>
          <form method="post" onsubmit="return validateForm()" action="../Controllers/EmployeeController.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addEmployee">
            <div class="col-lg-4 col-sm-12">
              <label for="name">Name: </label>
            </div>
            <input type="text" name="name">
            <div id="name-error">
              <?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : ''; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label for="name">Phone Number: </label>
            </div>
            <input type="text" name="phoneNumber">
            <div id="phoneno-error">
              <?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label for="name">Email: </label>
            </div>
            <input type="email" name="email">
            <div id="email-error">
              <?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label for="name">Image: </label>
            </div>
            <input type="file" name="image">
            <div id="img-error">
              <?php echo isset($_SESSION["imgerror"]) ? $_SESSION["imgerror"] : ''; ?>
            </div>
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
            <div id="jobTitle-error">
              <?php echo isset($_SESSION["jobTitleErr"]) ? $_SESSION["jobTitleErr"] : ''; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label for="name">Salary: </label>
            </div>
            <input type="number" name="salary" min="1000">
            <div id="salary-error">
              <?php echo isset($_SESSION["salaryErr"]) ? $_SESSION["salaryErr"] : ''; ?>
            </div>
            <div class="col-lg-12 col-sm-12">
              <label for="name">Address: </label>
            </div>
            <input type="text" name="address">
            <div id="address-error">
              <?php echo isset($_SESSION["addressErr"]) ? $_SESSION["addressErr"] : ''; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label for="name">Password: </label>
            </div>
            <input type="password" name="password" style="margin-bottom:20px">
            <div id="password-error">
              <?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ''; ?>
            </div>
            <div id="success">
              <?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?>
            </div>
            <br>

            <div class="col-lg-4 col-sm-12">
              <input type="submit" value="Add Employee" id="add-btn">
            </div>
            <br>
            <br>

          </form>
          <?php
          unset($_SESSION["nameErr"]);
          unset($_SESSION["phonenoErr"]);
          unset($_SESSION["emailErr"]);
          unset($_SESSION["imgerror"]);
          unset($_SESSION["jobTitleErr"]);
          unset($_SESSION["salaryErr"]);
          unset($_SESSION["addressErr"]);
          unset($_SESSION["passwordErr"]);
          unset($_SESSION["success"]);
          ?>
        </div>
      </div>

    </div>
  </div>

</body>

</html>