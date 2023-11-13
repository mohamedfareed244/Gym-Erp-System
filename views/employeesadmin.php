<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../public/CSS/admindesign.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images start-->

    <title>Admin Dashboard</title>
</head>

<style>
 .coaches-title{
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size: 27px;
  text-transform: uppercase;
  padding-top: 20px;
  color: rgb(36, 34, 34);
  /* padding-left: 40px; */
  padding-bottom: 30px;
  }


  </style>

<body>
    <?php include("partials/adminsidebar.php") ?>
    <div class="coaches-container">
        <h1 class="coaches-title">Employees:</h1>
        <div class="coaches-main-content">
            <table class="coaches-table">
                <thead>
                    <tr>
                        <th>Name:</th>
                        <th>Phone Number:</th>
                        <th>Email:</th>
                        <th>Salary:</th>
                        <th>Address:</th>
                        <th>Job Title:</th>
                        <th>Added By:</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Karim Ayman</td>
                        <td>011111111</td>
                        <td>example@gmail.com</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
                        <td>HR</td>
                        <td>Mohamed</td>
                        <td>
                            <button class="btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Karim Ayman</td>
                        <td>011111111</td>
                        <td>example@gmail.com</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
                        <td>HR</td>
                        <td>Mohamed</td>
                        <td>
                            <button class="btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Karim Ayman</td>
                        <td>011111111</td>
                        <td>example@gmail.com</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
                        <td>HR</td>
                        <td>Mohamed</td>
                        <td>
                            <button class="btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        <br>


        <div class="col-12">
            <h4 class="coaches-title">Add Employee </h4>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <label for="name">Name: </label>
            </div>
            <input type="text">
            <div class="col-lg-4 col-sm-12">
                <label for="name">Phone Number: </label>
            </div>
            <input type="text">
            <div class="col-lg-4 col-sm-12">
                <label for="name">Email: </label>
            </div>
            <input type="email">
            <div class="col-lg-4 col-sm-12">
                <label for="jobs">Job Title :</label>
            </div>
            <select name="jobs" id="jobs">
                <option value="">Select job</option>
                <option value="salesperson"> Sales Person</option>
                <option value="fitnessmanager"> Fitness Manager </option>
                <option value="hr">HR</option>
            </select>
            <div class="col-lg-4 col-sm-12">
                <label for="name">Salary: </label>
            </div>
            <input type="number">
            <div class="col-lg-4 col-sm-12">
                <label for="name">Image : </label>
            </div>
            <input type="file" name="photo" id="imgfile">
           
            <div class="col-lg-12 col-sm-12">
                <label for="name">Address: </label>
            </div>
            <textarea type="text" id="emp-addr" style="margin-bottom:20px"></textarea>
            
            
            <br>
            <hr>
            <h2 class="coaches-title">New Employee's Authorities: </h2>
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
<hr>
<div class="col-lg-4 col-sm-12">
                <input type="submit" value="Add Employee" id="add-btn">
            </div>
            <br>
            <br>
        </div>


    </div>

</body>