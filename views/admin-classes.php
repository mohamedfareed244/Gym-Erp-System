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
</head>
<body>
<?php require("../partials/adminsidebar.php") ?>
<div id="add-body">
    <table class="table">
        <thead>
            <tr>
                <td class="col"> id </td>
                <td class="col"> name </td>
                <td class="col"> coach </td>
                <td class="col"> coach phone</td>
                <td>clients no </td>
      <td>Action </td>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1</td>
                <td>yoga class</td>
                <td>mohamed</td>
                <td>0123456789</td>
                <td>10</td>
               <td><button id ="add-btn">view clients</button></td>
            </tr>
            <tr>
                <td> 1
                </td>
                <td>yoga class</td>
                <td>Mohamed</td>
                <td>0123456789</td>
                <td>10</td>
                <td><button id ="add-btn">view clients</button></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <hr>
    <h2>create new class : </h2>
    <label for="coaches"> select the coach : </label>
    <select name="coaches" id="">
        <option value="">select coach </option>
        <option value="">Mohamed </option>
        <option value="">Mostafa </option>
    </select>
    <br>
    <hr>
    <h3>selected coach classes : </h3>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>From</td>
                <td>To</td>

            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td>yoga class</td>
            <td>8:00 pm </td>
            <td>9:30 pm</td>
        </tbody>
    </table>
    <br>
    <h3>Class details : </h3>
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
        <div class="col-8">
        <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">saturday</label>
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
    </div>
    <br>
    <br>
</div>
</body>
</html>