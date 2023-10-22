<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client | Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("../partials/adminsidebar.php") ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <h4>Sales Report </h4>
                </div>
                <hr>
                <!DOCTYPE html>
<html>
<head>
    <style>
        .date-container {
            display: flex;
        }

        .date-input {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            font-size: 16px;
        }

        .date-label {
            font-size: 16px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="date-container">
        <label class="date-label">From:</label>
        <input type="date" class="date-input">
    </div>

    <div class="date-container">
        <label class="date-label">To:</label>
        <input type="date" class="date-input">
    </div>
</body>
</html>

                <form action="" class="row">
                    <div class="col-lg-4 col-md-12">
                        <label for="name">Name : </label>
                    </div>
                    <input type="text" name="name" id="name">
                    <div class="col-lg-4 col-md-12">
                        <label for="phone">phone : </label>
                    </div>
                    <input type="text" name="phone" id="phone">
                    <div class="col-lg-4 col-md-12">
                        <label for="email">Email : </label>
                    </div>
                    <input type="email" name="email" id="email">
                    <div class="col-lg-4 col-md-12">
                        <label for="nationalid">National id : </label>
                    </div>
                    <input type="text" name="nationalid" id="nationalid">
                    <div class="col-lg-4 col-md-12">
                        <label for="age">Age : </label>
                    </div>
                    <input type="number" name="age" id="age">
                    <div class="col-lg-4 col-md-12">
                        <label for="weight"> Weight : </label>
                    </div>
                    <input type="number" name="weight" id="weight">
                    <div class="col-lg-4 col-md-12">
                        <label for="height"> Height : </label>
                    </div>
                    <input type="number" name="height" id="height">
                    <div class="col-lg-4 col-md-12">
                        <label for="address"> Address : </label>
                    </div>
                    <textarea name="address" id="" cols="80" rows="1"></textarea>
                    <div class="col-lg-9 col-md-12">
                        <input type="submit" value="Add client" id="add-btn">

                    </div>

                </form>


                <div class="col-12">
                    <span>New Client id : <b>12345</b></span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>