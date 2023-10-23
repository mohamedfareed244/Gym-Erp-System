<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../public/CSS/admindesign.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images start-->

    <title>Admin Dashboard</title>
</head>

<body>
    <?php include("../partials/adminsidebar.php") ?>
    <div class="coaches-container">
        <h1 class="coaches-title">Coaches:</h1>
        <div class="coaches-main-content">
            <table class="coaches-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Karim Ayman</td>
                        <td>example@gmail.com</td>
                        <td>Body Attack</td>
                        <td>011111111</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
                        <td>
                            <button class="btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr>

                        <td>Mervat Mohammed</td>
                        <td>example@gmail.com</td>
                        <td>Yoga</td>
                        <td>011111111</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
                        <td>
                            <button class="btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr>

                        <td>Hannah Ahmed</td>
                        <td>example@gmail.com</td>
                        <td>Pilates</td>
                        <td>011111111</td>
                        <td>50000</td>
                        <td>New Cairo City</td>
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
        <h3 class="col-12" >Add Coach:</h3>
        <hr>
        <div class="coaches row">
            <form action="" class="row">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-name"> Name: </label>
                </div>
                <input type="text" name="coach-name" id="coach-name">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-email"> Email: </label>
                </div>
                <input type="email" name="coach-email" id="coach-email">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-class">Class: </label>
                </div>
                <input type="text" name="coach-class" id="coach-class">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-phone">Phone Number: </label>
                </div>
                <input type="text" name="coach-phone" id="coach-phone">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-phone">title: </label>
                </div>
                <select name="" id="">
                    <option value="">fitness manager</option>
                    <option value="">coach</option>
                </select>
                <div class="col-lg-4 col-md-12">
                    <label for="coach-salary">Salary: </label>
                </div>
                <input type="number" name="coach-salary" id="coach-salary">
                <div class="col-lg-4 col-md-12">
                    <label for="coach-address">Address: </label>
                </div>
                <input type="text" name="coach-address" id="coach-address">
                <div class="col-lg-9 col-md-12">
                    <input type="submit" value="Add coach" id="add-btn" style="margin-top:30px; margin-bottom:20px">
                </div>
            </form>

        </div>

    </div>

</body>