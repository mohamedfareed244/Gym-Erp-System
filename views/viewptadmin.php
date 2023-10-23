<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Training sessions | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <?php require("../partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h2 class="coaches-title">Private Training Sessions</h2>
            <br>
            <div id="tablediv">
                <table class="table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Coach Name </th>
                            <th scope="col">Session Date </th>
                            <th scope="col">Duration</th>
                            <th scope="col">Time </th>
                            <th scope="col">Payment </th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mohamed fareed</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Mohamed fareed</td>
                            <th><button class="btn btn-primary"> Edit</button></th>
                            <th><button class="btn btn-primary"> Delete</button></th>
                        </tr>
                        <tr>
                            <td>Ahmed Hassan</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Ahmed Hassan</td>
                            <th><button class="btn btn-primary"> Edit</button></th>
                            <th><button class="btn btn-primary"> Delete</button></th>
                        </tr>
                        <tr>
                            <td>Shorouk Ahmed</td>
                            <td>02-10-2023</td>
                            <td>2 hr</td>
                            <td>5:00pm</td>
                            <td class="bg-info">Free</td>
                            <td>Shorouk Ahmed</td>
                            <th><button class="btn btn-primary"> Edit</button></th>
                            <th><button class="btn btn-primary"> Delete</button></th>
                        </tr>
                        <tr>
                            <td>Shorouk Ahmed</td>
                            <td>02-09-2023</td>
                            <td>1.5 hr</td>
                            <td>3:00pm</td>
                            <td class="bg-danger">Paid</td>
                            <td>Shorouk Ahmed</td>
                            <th><button class="btn btn-primary"> Edit</button></th>
                            <th><button class="btn btn-primary"> Delete</button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>
</body>

</html>