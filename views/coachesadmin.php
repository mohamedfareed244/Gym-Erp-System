<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../public/CSS/admindesign.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images start-->

    <title>Admin Dashboard</title>
</head>

<body>
    <?php include("../partials/adminsidebar.php") ?>
    <div class="container">
        <h1 class="coaches-title">Coaches</h1>
        <table id="coaches-table" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-title="ID">1</td>
                    <td data-title="Name">Sandy Mohammed</td>
                    <td data-title="Class">Body Pump</td>
                </tr>
                <tr>
                    <td data-title="ID">2</td>
                    <td data-title="Name">Kenzy Khaled</td>
                    <td data-title="Class">Yoga</td>
                </tr>
                <tr>
                    <td data-title="ID">3</td>
                    <td data-title="Name">Carmen Ahmed</td>
                    <td data-title="Class">Aerobics</td>
                </tr>
                <tr>
                    <td data-title="ID">4</td>
                    <td data-title="Name">Ziad Sherif</td>
                    <td data-title="Class">Core</td>
                </tr>
                <tr>
                    <td data-title="ID">5</td>
                    <td data-title="Name">Saad Omar</td>
                    <td data-title="Class">Body Attack</td>
                </tr>
            </tbody>
        </table>
        <div class="modify-coaches">
            <button class="modify-coaches-btn" id="add-coach"> Add Coach</button>
            <button class="modify-coaches-btn" id="edit-coach"> Edit Coach</button>
            <button class="modify-coaches-btn" id="delete-coach"> Delete Coach</button>
        </div>
    </div>
    </div>
</body>