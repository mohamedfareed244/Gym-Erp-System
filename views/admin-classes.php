<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All classes| Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../public/js/classes.js?v=<?php echo time();?>"></script>
</head>

<style>
    .admin-classes-css{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size: 27px;
  text-transform: uppercase;
  padding-top: 20px;
  color: rgb(36, 34, 34);
  padding-left: 40px;
  padding-bottom: 30px;
    }



</style>
<body>
<?php require("partials/adminsidebar.php") ?>
<div id="add-body">
    <table class="table">
        <thead>
            <tr>
                <td class="col"> ID </td>
                <td class="col"> Name </td>
                <td class="col"> Coach </td>
                <td class="col"> Coach's Phone Number</td>
                
                <td>Days</td>
      <td>Action </td>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1</td>
                <td>yoga class</td>
                <td>mohamed</td>
                <td>0123456789</td>
                
                <td>Saturday, Sunday, Monday</td>
               <td><button id ="add-btn">View Clients</button> <button id ="add-btn" style="background-color:red; color:white;">Delete</button></td>
            </tr>
            <tr>
                <td> 1
                </td>
                <td>yoga class</td>
                <td>Mohamed</td>
                <td>0123456789</td>
            
                <td>Saturday, Sunday, Monday</td>
                <td><button id ="add-btn">View Clients</button> <button id ="add-btn" style="background-color:red; color:white;">Delete</button></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <hr>
    <h2 class="admin-classes-css">Create New Class : </h2>
    <label for="coaches"> Select The Coach : </label>
    <select name="coaches" id="select-coaches" onchange="getclasses()">
        <option value="">Select Coach </option>
        
        <?php
include_once "../Models/EmployeeModel.php";

$employee = new Employee();
$employeesData = $employee->GetAllCoaches();

foreach ($employeesData['Coaches'] as $coach) {
    echo "<option value='" . $coach["ID"] . "'>" . $coach["Name"] . " (Coach)</option>";
}

foreach ($employeesData['FitnessManagers'] as $fitnessManager) {
    echo "<option value='" . $fitnessManager["ID"] . "'>" . $fitnessManager["Name"] . " (Fitness Manager)</option>";
}
?>
        
    </select>
    <br>
    <hr>
    <h3 class="admin-classes-css">Selected Coach Classes : </h3>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>From</td>
                <td>To</td>
<td>Days</td>
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td>yoga class</td>
            <td>8:00 pm </td>
            <td>9:30 pm</td>
            <td>saturday,sunday,monday</td>
        </tbody>
    </table>
    <br>
    <h3 class="admin-classes-css">Class Details : </h3>
    <div class="conatiner">
        <div class="row">
            <div class="col-4">
                <label for="title">Title : </label>
                <input type="text" name="title" id="">
            </div>
            <div class="col-4">
                <label for="title">From : </label>
                <input type="text" name="title" id="">
            </div>
            <div class="col-4">
                <label for="title">To : </label>
                <input type="text" name="title" id="">
            </div>
        </div>
        <br>
       
        <div class="col-m-8">
        <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Saturday</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Sunday</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Monday</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Tuesday</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Wednesday</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Thursday</label>
</div>

        </div>
        <div class="col-m-4">
            <button id="add-btn">Add Class </button>
        </div>
       <br>
    </div>
    
  
</div>

</body>
</html>