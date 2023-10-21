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

<body>
    <?php include("../partials/adminsidebar.php") ?>
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
            <h4>Add Employee </h4>
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
            <div class="col-lg-12 col-sm-12">
                <label for="name">Address: </label>
            </div>
            <textarea type="text" id="emp-addr"></textarea>
            <div class="col-lg-4 col-sm-12">
                <input type="submit" value="Add Employee" id="add-btn">
            </div>

        </div>


    </div>

</body>