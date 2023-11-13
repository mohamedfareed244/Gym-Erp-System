<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addemployee.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <div class="col-12">
                <h4>Add Employee </h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <label for="name">Name: </label>
                </div>
                <input type="text">
                <div class="col-lg-4 col-sm-12">
                    <label for="number">Phone Number: </label>
                </div>
                <input type="text">
                <div class="col-lg-4 col-sm-12">
                    <label for="email">Email: </label>
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
                <div class="col-lg-12 col-sm-12">
                    <label for="name">Address: </label>
                </div>
                <textarea type="text" id="emp-addr"></textarea>
                <div class="col-lg-4 col-sm-12">
                    <input type="submit" value="Add Employee" id="add-btn">
                </div>

            </div>
        </div>
    </div>
</body>

</html>