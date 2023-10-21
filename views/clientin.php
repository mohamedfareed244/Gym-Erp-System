<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check in </title>
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
<div id="add-body" class="addbody">
    <div class="container">
    <div class="row" >
       <div class="col-3 divstat" style="height:40%;" >
        <div class="row" style=" position:relative; bottom:40px;">
            <div class="col-3">
            <i class="fa fa-circle" style="color:green;margin-top:60px;"></i>
            </div>
            <div class="col-9"><h2> 130/200</h2>
        <p><b>Estimated clients in the gym</b>  </p>
        </div>
        </div>


       </div>
        </div>
        <br>
        <br>

    <form action="" class="row">
                <div  class="col-5">
                    <label for="search">Client ID: </label>
                   

                </div>
                <input type="text" name="search">

                <div  class="col-5">
                    <label for="search1">Client's Phone: </label>
                    

                </div>
                <input type="text" name="search1">
                <div class="col-2">
                    <input type="submit" value="Search" id="add-btn">
                </div>

            </form>
            <br>
            <hr>
            <div id="tablediv">
            <table class="table overflow-auto mh-10">
                <thead>
                <tr>
                             <th scope="col">ID</th>
                            <th scope="col">client Name</th>
                            <th scope="col">package Name</th>
                            <th scope="col">end date</th>
                            <th scope="col">status</th>
                            <th scope="col">visits</th>
                            <th scope="col">Action</th>

                        </tr>
                </thead>
                <tbody>
                <tr>
                            <th scope="row">1</th>
                            <td>Mohamed Fareed</td>
                            <td>2 Months</td>
                            <td>30-09-2023</td>
                            <td class="bg-info">Freezed</td>
                            <td><b>20</b> from <b>30</b></td>
                            <td><button class="btn btn-success">check in </button></td>
                        </tr>
                </tbody>
</table>
            </div>
      
    </div>
</div>
</body>
</html>