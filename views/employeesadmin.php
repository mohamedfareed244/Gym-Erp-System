<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--css/icons/boostrap/jquery/fonts/images start-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!--css/icons/boostrap/jquery/fonts/images start-->

  <title>Admin Dashboard</title>
</head>

<body>
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

            include_once "../Models/employeeModel.php";

            $allEmployees = Employee::getAllEmployees();

            foreach ($allEmployees as $employee) {
              echo "<tr>";
              echo "<td>" . $employee->ID . "</td>";
              echo "<td>" . $employee->Name . "</td>";
              echo "<td>" . $employee->PhoneNumber . "</td>";
              echo "<td>" . $employee->Email . "</td>";
              echo "<td>" . $employee->Salary . "</td>";
              echo "<td>" . $employee->Address . "</td>";
              echo "<td>" . $employee->JobTitle . "</td>";
              echo "<td>" . $employee->Name . "</td>";
              echo "<td><button class=\"btn\">Edit</button><button class=\"btn btn-delete\">Delete</button></td>";
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
        <form class="row" method="post">
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
            <?php include_once "../Models/hrmodel.php";  
            $result =getjobtitles();
            foreach ($result as $title){
              
              echo "<option value='".$title["Id"]."'> ".$title["Name"]."</option>";
            }
            
            ?>
            
            
          </select>
          <div class="col-lg-4 col-sm-12">
            <label for="name">Salary: </label>
          </div>
          <input type="number" name="salary" min="1000">
          <div class="col-lg-4 col-sm-12">
            <label for="name">Image : </label>
          </div>
          <input type="file" name="photo" id="imgfile">

          <div class="col-lg-12 col-sm-12">
            <label for="name">Address: </label>
          </div>
          <input type="text" id="emp-addr" name="address" style="margin-bottom:20px">
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
          <?php

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if all required fields are set
            if (
              isset($_POST['name']) &&
              isset($_POST['phoneNumber']) &&
              isset($_POST['email']) &&
              isset($_POST['jobTitle']) &&
              isset($_POST['salary']) &&
              isset($_POST['address'])
            ) {
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

              $newEmployee = new Employee();
              $newEmployee->Name = $name;
              $newEmployee->PhoneNumber = $phoneNumber;
              $newEmployee->Email = $email;
              $newEmployee->JobTitle = $jobTitle;
              $newEmployee->Salary = $salary;
              $newEmployee->Address = $address;

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
            echo "<p>Invalid request method</p>";
          }
          ?>
        </form>


      </div>
    </div>
  </div>
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
  </script>
</body>

</html>