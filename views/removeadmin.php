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
    <style>
    #account-details{
         margin-bottom:10%;
    }
    .container{
        text-align:left;
    }
    </style>
</head>

<body>
    <?php include("../partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container" style="margin-left:-4%;">
        <section id="account-details">
        <h3 class="col-12"  style="margin-left:3%;">Search for Admin: </h3>
        <hr>
        </section>
            <form action="" class="row">
                <div id="search-client" class="col-5">
                    <label for="search">Admin's ID: </label>
                    <input type="text" name="search">
                </div>
                <div id="search-client" class="col-5">
                    <label for="search1">Admin's Phone Number: </label>
                    <input type="text" name="search1">

                </div>
                <div id="search-client" class="col-2">
                    <input type="submit" value="Search" id="add-btn">
                </div>

            </form>
            <br>
            <hr>


            <div class="coaches-containers">
                <div class="coaches-main-content">
                    <table class="coaches-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>National ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Karim Ayman</td>
                                <td>example@gmail.com</td>
                                <td>011111111</td>
                                <td>12345678975432</td>
                                <td>
                                    <button class="btn btn-delete" style="width:100px;">Remove</button>
                                </td>
                            </tr>
                            <tr>

                                <td>Mervat Mohammed</td>
                                <td>example@gmail.com</td>
                                <td>011111111</td>
                                <td>12345678975432</td>
                                <td>
                                    <button class="btn btn-delete" style="width:100px;">Remove</button>
                                </td>
                            </tr>
                            <tr>

                                <td>Hannah Ahmed</td>
                                <td>example@gmail.com</td>
                                <td>011111111</td>
                                <td>12345678975432</td>
                                <td>
                                    <button class="btn btn-delete" style="width:100px;">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>

</html>