<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package | Admin </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addpackage.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
.coaches-title {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 27px;
    text-transform: uppercase;
    padding-top: 20px;
    color: rgb(36, 34, 34);
    /* padding-left: 40px; */
    padding-bottom: 30px;
}

.visits-container {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.visits-title {
    font-size: 18px;
    margin-bottom: 10px;
}

.radio-buttons {
    display: flex;
}

.hidden {
    display: none;
}
span[id$="-error"] {
        color: red;
        font-size: 16px;
    }
</style>

<body>
    
    <script src="../public/js/addPackage.js"></script>
    <?php require("partials/adminsidebar.php") ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="coaches-title">Add Package: </h4>
                </div>
                <hr>
                <form methos="post" class="row" action="../Controllers/PackageController" onsubmit="return validateForm()">
                <input type="hidden" name="action" value="addPackage">
                    <div class="visits-container">
                        <div class="visits-title">Visits:</div>
                        <div class="radio-buttons">
                            <input type="radio" id="limited" name="visits" value="limited" class="radio-btn"
                                onclick="showLimitField()">
                            <label for="limited" id="limited">Limited</label>

                            <input type="radio" id="unlimited" name="visits" value="unlimited" class="radio-btn"
                                onclick="hideLimitField()">
                            <label for="unlimited" id="unlimited">Unlimited</label>
                        </div>
                        <span id="isLimited-error"></span>

                        <div id="limitField" class="hidden">
                            <label for="limitDays">Limit (Days):</label>
                            <input type="text" id="limitDays" name="limitDays">
                        </div>
                        <span id="limit-error"></span>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <label for="name">Freeze Limit (Days) : </label>
                    </div>
                    <input type="number" name="freezelimit" id="freezelimit">
                    <span id="freezeLimit-error"></span>
                    <div class="col-lg-4 col-md-12">
                        <label for="name">Number of Months : </label>
                    </div>
                    <input type="text" name="months" id="months">
                    <span id="months-error"></span>
                    <div class="col-lg-4 col-md-12">
                        <label for="phone">Number of Invitations : </label>
                    </div>
                    <input type="text" name="invitation" id="invitation">
                    <span id="invitations-error"></span>
                    <div class="col-lg-4 col-md-12">
                        <label for="email">Number of Inbody : </label>
                    </div>
                    <input type="text" name="inbody" id="inbody">
                    <span id="inbody-error"></span>
                    <div class="col-lg-4 col-md-12">
                        <label for="nationalid">Number of PT sessions : </label>
                    </div>
                    <input type="text" name="ptsession" id="ptsession">
                    <span id="ptsession-error"></span>
                    <div class="col-lg-4 col-md-12">
                        <label for="nationalid">Price : </label>
                    </div>
                    <input type="number" name="price" id="price">
                    <span id="price-error"></span>
                    <div class="col-lg-9 col-md-12">
                        <input type="submit" value="Add Package" id="add-btn">
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>