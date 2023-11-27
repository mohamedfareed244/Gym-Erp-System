<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require("./partials/adminsidebar.php");

    ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Update Client's Information </h4>
                </div>
                <hr>
                <?php
                include_once("../Models/ClientModel.php");

                if (isset($_GET['ID'])) {
                    $clientID = $_GET['ID'];
                    $client = new CLient();
                    $Client = $client->getClientByID($clientID);

                    if (!$Client) {
                        echo "Client not found";
                        exit;
                    }
                } else {
                    echo "Client ID not found";
                    exit;
                }
                ?>
                <form method='POST'>
                    <input type='hidden' name='type' value='form2'>
                    <div class='col-lg-4 col-md-12'>
                        <label for='client_id'>Client ID: </label>
                    </div>
                    <input type='number' name='client_id' id='client_id' value="<?php echo $Client->getID(); ?>">
                    <div class='col-lg-4 col-md-12'>
                        <label for='fname'>First Name: </label>
                    </div>
                    <input type='text' name='fname' id='fname' value="<?php echo $Client->getFirstName(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='lname'>Last Name: </label>
                    </div>
                    <input type='text' name='lname' id='lname' value="<?php echo $Client->getLastName(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='age'>Age: </label>
                    </div>
                    <input type='text' name='age' id='age' value="<?php echo $Client->getAge(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='phone'>Phone: </label>
                    </div>
                    <input type='text' name='phone' id='phone' value="<?php echo $Client->getPhone(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='gender'>Gender: </label>
                    </div>
                    <input type='text' name='gender' id='gender' value="<?php echo $Client->getGender(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='weight'>Weight: </label>
                    </div>
                    <input type='number' name='weight' id='weight' value="<?php echo $Client->getWeight(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='height'>Height: </label>
                    </div>
                    <input type='number' name='height' id='height' value="<?php echo $Client->getHeight(); ?>">

                    <div class='col-lg-4 col-md-12'>
                        <label for='email'>Email: </label>
                    </div>
                    <input type='email' name='email' id='email' value="<?php echo $Client->getEmail(); ?>">
                    <br>
                    <div class='col-lg-9 col-md-12'>
                        <input type='submit' value='Edit' id='add-btn' style='margin-top:30px; margin-bottom:20px'>
                    </div>
                </form>";
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ($_POST['type'] === 'form2') {
                        $client_id = (int) $_POST['client_id'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $age = (int) $_POST['age'];
                        $gender = $_POST['gender'];
                        $weight = (float) $_POST['weight'];
                        $height = (int) $_POST['height'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];

                        $sql = "UPDATE client
                SET FirstName = '$fname', LastName = '$lname', Age = $age, Gender = '$gender', 
                    Weight = $weight, Height = $height, Email = '$email', Phone = '$phone'
                WHERE ID = $client_id ";

                        if ($conn->query($sql) === true) {
                            echo "Client information updated successfully.";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    }
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>