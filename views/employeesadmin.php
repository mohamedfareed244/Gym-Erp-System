<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--css/icons/boostrap/jquery/fonts/images start-->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!--css/icons/boostrap/jquery/fonts/images start-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Admin Dashboard</title>
</head>
<style>
  span[id$="-error"],
  #success {
    color: red;
    font-size: 16px;
  }
</style>

<body>
  <?php session_start(); ?>
  <script src="../public/js/addEmployee.js"></script>
  <?php include("partials/adminsidebar.php") ?>
  <div id="add-body" class="addbody">
    <div class="container">
      <h1 class="table-title">Employees:</h1>
      <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for names..">
      <div id="tablediv">
        <table id="employeesTable" class="view-table overflow-auto mh-10">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Salary</th>
              <th>Address</th>
              <th>Job Title</th>
              <th>Added By</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once "../Models/hrmodel.php";
            $result = getjobtitles();

            include_once "../Models/employeeModel.php";

            $allEmployees = Employee::getAllEmployees();

            foreach ($allEmployees as $employee) {
              echo "<tr id='row-" . $employee->ID . "'>";
              echo "<td>" . $employee->ID . "</td>";
              echo "<td>" . $employee->Name . "</td>";
              echo "<td>" . $employee->PhoneNumber . "</td>";
              echo "<td>" . $employee->Email . "</td>";
              echo "<td>" . $employee->Salary . "</td>";
              echo "<td>" . $employee->Address . "</td>";

              echo "<td>" . $employee->JobTitle . "</td>";
              echo "<td>" . $employee->Name . "</td>";
              echo "<td><a a href='editemployee.php?ID=" . $employee->ID . "' class=\"btn\">Edit</a>";
              echo "<button class=\"btn btn-delete\" onclick='deleteEmployee(" . $employee->ID . ")'>Delete</button></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <br>
      <br>

      <h4 class="coaches-title">Add Employee </h4>
      <hr>
      <div class="row">
        <form class="row" method="post" onsubmit="return validateForm()" action="../Controllers/EmployeeController.php">
          <input type="hidden" name="action" value="addEmployee">
          <div class="col-lg-4 col-sm-12">
            <label for="name">Name: </label>
          </div>
          <input type="text" name="name">
          <span id="name-error"><?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : ''; ?></span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Phone Number: </label>
          </div>
          <input type="text" name="phoneNumber">
          <span id="phoneno-error"><?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?></span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Email: </label>
          </div>
          <input type="email" name="email">
          <span id="email-error"><?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?></span>
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
          <span id="jobTitle-error"><?php echo isset($_SESSION["jobTitleErr"]) ? $_SESSION["jobTitleErr"] : ''; ?></span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Salary: </label>
          </div>
          <input type="number" name="salary" min="1000">
          <span id="salary-error"><?php echo isset($_SESSION["salaryErr"]) ? $_SESSION["salaryErr"] : ''; ?></span>
          <div class="col-lg-12 col-sm-12">
            <label for="name">Address: </label>
          </div>
          <input type="text" name="address">
          <span id="address-error"><?php echo isset($_SESSION["addressErr"]) ? $_SESSION["addressErr"] : ''; ?></span>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Password: </label>
          </div>
          <input type="password" name="password" style="margin-bottom:20px">
          <span id="password-error"><?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ''; ?></span>
          <span id="success"><?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?></span>
          <br>
          <!-- <hr>
          <h2 class="coaches-title">New Employee's Authorities: </h2>
          <hr>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Add client</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Edit Client</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"> View Client</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">client check in </label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">View Employees </label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Employees Attendance</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Add Admin</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Remove Admin</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">View Sales Report</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">View Packages</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Add packages</label>

          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">View Private Sessions</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Reserve Private Sessions</label>
          </div>
          <br>
          <hr> -->
          <div class="col-lg-4 col-sm-12">
            <input type="submit" value="Add Employee" id="add-btn">
          </div>
          <br>
          <br>

        </form>


      </div>
    </div>
  </div>
  <?php
  // Unset all error session variables
  unset($_SESSION["nameErr"]);
  unset($_SESSION["phonenoErr"]);
  unset($_SESSION["emailErr"]);
  unset($_SESSION["jobTitleErr"]);
  unset($_SESSION["salaryErr"]);
  unset($_SESSION["addressErr"]);
  unset($_SESSION["passwordErr"]);
  unset($_SESSION["success"]);
  ?>
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchBar");
      filter = input.value.toUpperCase();
      table = document.getElementById("employeesTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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

    function deleteEmployee(employeeId) {
      $.ajax({
        type: "POST",
        url: "../Controllers/EmployeeController.php",
        data: {
          action: "deleteEmployee",
          employeeId: employeeId,
        },
        success: function(response) {
          if (response === "success") {
            var tableRow = document.getElementById('row-' + employeeId);
            if (tableRow) {
              tableRow.parentNode.removeChild(tableRow);
            } else {
              console.log("Error: Row not found in the DOM.");
            }
          } else {
            console.log("Error deleting employee.");
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX error: " + status + " - " + error);
        },
      });
    }
  </script>

</body>

</html>