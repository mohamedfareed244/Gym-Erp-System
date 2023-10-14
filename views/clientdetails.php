<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("../partials/adminsidebar.php")?>
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
            <h2>Memberships</h2>
            <div id="tablediv">
                <table class="table overflow-auto mh-10">
                    <thead>
                        <tr>
                            <th scope="col">Package Name</th>
                            <th scope="col">Start Date </th>
                            <th scope="col">End Date</th>
                            <th scope="col">Visits </th>
                            <th scope="col">Status </th>
                            <th scope="col">Freezes </th>
                            <th scope="col">Action </th>
                            <th scope="col">Sales</th>
                            <th scope="col">pt</th>
                            <th scope="col">inbody</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">2 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-info">freezed</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">6 Months offer</th>
                            <td>02-09-2023</td>
                            <td>02-09-2023</td>
                            <td>30</td>
                            <td class="bg-danger">expired</td>
                            <td>2 Weeks</td>
                            <td><button>Freeze</button></td>
                            <td>Mohamed fareed</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>

                    </tbody>
                </table>

      </div>
      <hr>
      <h2>Classes </h2>
      <div id="tablediv">
      <table class="table overflow-auto mh-10">
        <thead>
        <tr>
      <th scope="col">class name</th>
      <th scope="col"> Date </th>
      <th scope="col">from</th>
      <th scope="col">to </th>
      <th scope="col">Status </th>
      <th scope="col">coach name  </th>
      <th scope="col">fees </th>
      <th scope="col">paid </th>
    </tr>
        </thead>
        <tbody>
            <tr>
            <td>yoga</td>
            <td>09-09-2023</td>
            <td>9:00pm</td>
            <td>11:00pm</td>
            <td class="bg-success text-white">attended</td>
            <td>Mohamed fareed</td>
            <td>120</td>
            <td class="bg-danger">not paid </td>
            </tr>
            
        </tbody>
</table>
      </div>
      
        </div>
    </div>
</body>

</html>