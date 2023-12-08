<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Memberships | Admin</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../public/CSS/memberships.css">
</head>

<body>

    <?php
    session_start();
    require("partials/adminsidebar.php");
    include_once "../Models/ClientModel.php";
    include_once "../Models/ptPackageModel.php";
    include_once "../Models/CoachModel.php";

    // Get client information
    if (isset($_GET['ID'])) {
        $clientID = $_GET['ID'];
        $Client = new Client();
        $client = $Client->getClientByID($clientID);
        if (!$client) {
            echo "Client not found";
            exit;
        }
    } else {
        echo "Client ID not found";
        exit;
    }

    $ptPackages = new ptPackages();
    $packages = $ptPackages->getActivePtPackagesForClient($clientID);
    $Coach = new Coach();
    $employeesData = $Coach->GetAllCoaches();
    ?>

    <div class="container py-5" style="padding-left:70px">
        <h2 class="coaches-title">Choose a Private Training Package for
            <?php echo $Client->getFirstName() . ' ' . $Client->getLastName(); ?> :
        </h2>

        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            <?php foreach ($packages as $package) { ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo $package->getName(); ?>
                        </h4>
                        <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>
                            <?php echo $package->getNumOfSessions() . " Sessions"; ?>
                        </h6>
                        <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>
                            <?php echo $package->getMinPackageMonths() . " Months" ?>
                        </h6>
                        <h5 class="card-text" id="price">
                            <?php echo "for L.E " . $package->getPrice() ?>
                        </h5>
                        <h5 class="card-text" id="Coaches">
                            <select name="CoachName" class="form-select" id="coach<?php echo $package->getID(); ?>">
                                <option value="">Choose a Coach</option>
                                <?php
                                    foreach ($employeesData as $coach) {
                                        echo "<option value=" . $coach["CoachID"] . "> " . $coach["Name"] . "</option>";
                                    }
                                    ?>
                            </select>
                            <span class="text-danger" id="coaches-error<?php echo $package->getID(); ?>"></span>
                        </h5>
                        <br>
                        <div class="d-flex justify-content-around">
                            <button class="btn btn-success"
                                onclick="addPtPackage(<?php echo $package->getID() ?>, <?php echo $clientID; ?>)">
                                Add Package
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script>
    function addPtPackage(packageId, clientId) {
        const coachID = document.getElementById('coach' + packageId).value;
        const coachError = $('#coaches-error' + packageId);

        if (coachID === '') {
            coachError.text('Choose a Coach').fadeIn().delay(3000).fadeOut();
            return;
        } else {
            coachError.text('');
            $.ajax({
                type: "POST",
                url: "../Controllers/ptPackagesController.php",
                data: {
                    action: "addPtPackageForClient",
                    membershipclientId: clientId,
                    ptPackageId: packageId,
                    coachID: coachID
                },
                success: function(response) {
                    console.log(response);
                    if (response === "success") {
                        window.location.href = 'allclients.php';
                    } else {
                        var errorPopup = document.createElement('div');
                        errorPopup.innerHTML = 'An error has occurred';
                        errorPopup.className = 'error-popup';
                        document.body.appendChild(errorPopup);

                        // Trigger fade-out after a delay (e.g., 3 seconds)
                        setTimeout(function() {
                            errorPopup.classList.add('fade-out');
                            setTimeout(function() {
                                document.body.removeChild(errorPopup);
                            }, 1000);
                        }, 3000);
                    }
                }
            });
        }
    }
    </script>
</body>

</html>