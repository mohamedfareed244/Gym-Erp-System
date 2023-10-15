<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("../partials/adminsidebar.php") ?>
    <div id="add-body">
        <div class="container">
            <form action="" class="row">
                <div class="col-5">
                    <label for="search">client id : </label>
                    <input type="text" name="search">


                </div>
                <div class="col-5">
                    <label for="search1">client phone : </label>
                    <input type="text" name="search1">

                </div>
                <div class="col-2">
                    <input type="submit" value="Search" id="add-btn">
                </div>

            </form>
            <br>
            <hr>
            <h2>Private Training Sessions</h2>
            <div id="tablediv">
                <table class="table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Client Phone</th>
                            <th scope="col">Session Date </th>
                            <th scope="col">Duration</th>
                            <th scope="col">Time </th>
                            <th scope="col">Payment </th>
                            <th scope="col">Coach Name </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">12345</th>
                            <th>Amira Hamdy</th>
                            <td>011111111</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Mohamed fareed</td>
                        </tr>
                        <tr>
                            <th scope="row">12345</th>
                            <th>Nadine Mounir</th>
                            <td>011111111</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Ahmed Hassan</td>
                        </tr>
                        <tr>
                            <th scope="row">12345</th>
                            <th>Ahmed Sherif</th>
                            <td>011111111</td>
                            <td>02-10-2023</td>
                            <td>2 hr</td>
                            <td>5:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Shorouk Ahmed</td>
                        </tr>
                        <tr>
                            <th scope="row">12345</th>
                            <th>Eslam Sameh</th>
                            <td>011111111</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Shorouk Ahmed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4>Add a Private Training Session</h2>
                <div class="row">
                    <form action="" class="row">
                        <div class="col-lg-4 col-md-12">
                            <label for="name">Client Name : </label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <label for="name">Client Phone : </label>
                            <input type="text" name="name" id="name">
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-4 col-md-12">
                            <label for="name">Session Date: </label>
                            <input type="date" name="name" id="name">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <label for="name">Duration : </label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <label for="name"> Time : </label>
                            <input type="time" name="name" id="name">
                        </div>
                        <br>
                        <br>

                        <div class="col-lg-4 col-md-12">
                            <label for="name"> Height : </label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <label for="payment">Choose Payment Details:</label>
                            <select name="payment">
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <label for="name">Coach Name : </label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <input type="submit" value="Add Pt Session" id="add-btn">
                        </div>
                    </form>

                </div>
        </div>
    </div>
</body>

</html>