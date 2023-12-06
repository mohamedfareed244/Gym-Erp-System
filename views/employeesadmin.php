<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--css/icons/boostrap/jquery/fonts/images start-->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> <!--css/icons/boostrap/jquery/fonts/images start-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!--css/icons/boostrap/jquery/fonts/images end-->

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
            include_once "../Models/EmployeeModel.php";
            $Employee = new Employee();
            $result = $Employee->getjobtitles();

            $allEmployees = $Employee->getAllEmployees();

            foreach ($allEmployees as $employee) {
              echo "<tr id='row-" . $employee->getID() . "'>";
              echo "<td>" . $employee->getID() . "</td>";
              echo "<td>" . $employee->getName() . "</td>";
              echo "<td>" . $employee->getPhoneNumber() . "</td>";
              echo "<td>" . $employee->getEmail() . "</td>";
              echo "<td>" . $employee->getSalary() . "</td>";
              echo "<td>" . $employee->getAddress() . "</td>";
              echo "<td>" . $employee->getJobTitle() . "</td>";
              echo "<td>" . $employee->getName() . "</td>";
              echo "<td><a a href='editemployee.php?ID=" . $employee->getID() . "' class=\"btn\">Edit</a>         ";
              echo "<button class=\"btn btn-delete\" onclick='showDeleteModal()'>Delete</button></td>";
              ?>
                <div class="modal" id="deleteModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="hideDeleteModal()">&times;</span>
                                        <div>
                                        <label >Are you sure you want to delete this employee?</label>
                                        </div>
                                        <button class="btn btn-delete"
                                            onclick='deleteEmployee(<?php echo $employee->getID() ?>)' style="background-color:red">Delete</button>
                                    </div>
                              </div>
                  </div>
                <?php
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      
    </div>
  </div>

  <script>
    
    function showDeleteModal() {
        $('#deleteModal').fadeIn();

    }
    function hideDeleteModal() {
        $('#deleteModal').fadeOut();
    }
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
        success: function (response) {
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
        error: function (xhr, status, error) {
          console.error("AJAX error: " + status + " - " + error);
        },
      });
      hideDeleteModal();
    }
  </script>

</body>

</html>