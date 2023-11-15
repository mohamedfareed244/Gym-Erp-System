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
</style>

<body>
    <?php require("partials/adminsidebar.php") ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="coaches-title">Add Package: </h4>
                </div>
                <hr>
                <form action="" class="row">
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

                        <div id="limitField" class="hidden">
                            <label for="limitDays">Limit in days:</label>
                            <input type="text" id="limitDays" name="limitDays">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <label for="name">Number of Months : </label>
                    </div>
                    <input type="text" name="invi" id="invi">
                    <div class="col-lg-4 col-md-12">
                        <label for="phone">Number of Invitations : </label>
                    </div>
                    <input type="text" name="inbod" id="inbod">
                    <div class="col-lg-4 col-md-12">
                        <label for="email">Number of Inbody : </label>
                    </div>
                    <input type="email" name="ptsess" id="ptsess">
                    <div class="col-lg-4 col-md-12">
                        <label for="nationalid">Number of PT sessions : </label>
                    </div>
                    <input type="text" name="addpbtn" id="addpbtn">
                    <div class="col-lg-9 col-md-12">
                        <input type="submit" value="Add Package" id="add-btn">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
    function showLimitField() {
        var limitField = document.getElementById("limitField");
        limitField.style.display = "block";

    }

    function hideLimitField() {
        var limitField = document.getElementById("limitField");
        limitField.style.display = "none";
    }
    </script>

</body>

</html>