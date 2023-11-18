<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Package | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h4>Add Private Training Session:</h2>
                <hr>
                <div class="pt row">
                    <form  method="post" action="../Models/ptPackageModel.php" class="pt row">
                        <div class="col-lg-4 col-md-12">
                            <label for="package-name">Package Name : </label>
                        </div>
                        <input type="text" name="package-name" id="session-">
                        
                     
                        <div class="col-lg-4 col-md-12">
                            <label for="session-amount">Number of Sessions: </label>
                        </div>
                        
                        <input type="text" name="package-name" id="session-">
                        
                     
                        <div class="col-lg-4 col-md-12">
                            <label for="session-amount">Minimum Package Months: </label>
                        </div>
                       
                        <input type="text" name="session-duration" id="session-duration">
           
                        <div class="col-lg-4 col-md-12">
                            <label for="package-price">Package Price : </label>
                        </div>
                        <input type="text" name="session-coach" id="session-">
                        <br>
                        <br>
                        <div class="col-lg-9 col-md-12">
                            <br>
                            <input type="submit" value="Add PT Package" id="add-btn">
                        </div>
                        <br>
                        <br>
                    </form>

                </div>
        </div>
    </div>
</body>

</html>