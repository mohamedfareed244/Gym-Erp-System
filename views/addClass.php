<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All classes| Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../public/js/classes.js?v=<?php echo time(); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>


<body>
    <?php
    session_start();
    require("partials/adminsidebar.php");
    include_once "../Models/ClassesModel.php";
    ?>
    <div id="add-body">
        <div class="container">
            <h2 class="admin-classes-css" >Add New Class: </h2>
            <hr>
            <form method="post" autocomplete="off" action="../Controllers/ClassController.php"
                onsubmit="return validateAddForm()" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addClass">
                <div class="conatiner">
                    <div class="row">
                        <div class="col-4">
                            <label for="name">Name : </label>
                            <br>
                            <input type="text" name="name" id="name">
                        </div>
                        <br>
                        <br>
                        <span
                            id="name-err"><?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : ''; ?></span>
                        <br>
                        <div class="col-4">
                            <label for="descr">Description : </label>
                            <br>
                            <input type="text" name="descr" id="descr">
                        </div>
                        <br>
                        <br>
                        <span
                            id="descr-err"><?php echo isset($_SESSION["descrErr"]) ? $_SESSION["descrErr"] : ''; ?></span>
                        <br>
                        <div class="col-4">
                            <div class="file-input-container">
                                <label class="file-input-label" for="image">Image:</label>
                                <input class="custom-file-input" type="file" name="image" id="image">
                            </div>
                        </div>
                        <br>
                        <br>
                        <span
                            id="img-err"><?php echo isset($_SESSION["imageErr"]) ? $_SESSION["imageErr"] : ''; ?></span>
                        <br>
                        <label for="days">Select Day(s):</label>
                        <div class="col-m-8">
                            <?php
                             $Classes = new Classes();
                             $Classes->generateDayCheckboxes($tomorrow, 7);
                            ?>
                            <br>

                        </div>
                        <br>
                        <br>
                        <span
                            id="days-err"><?php echo isset($_SESSION["adddaysErr"]) ? $_SESSION["adddaysErr"] : ''; ?></span>
                        <span id="success"><?php echo isset($_SESSION["addsuccess"]) ? $_SESSION["addsuccess"] : ''; ?></span>
                    </div>
                    <div class="col-m-4">
                        <button id="add-btn">Add Class </button>
                    </div>
                    <br>
                </div>
            </form>
            <?php
            // Unset specific error messages
            unset(
                $_SESSION["nameErr"],
                $_SESSION["descrErr"],
                $_SESSION["imageErr"],
                $_SESSION["addsuccess"]
            );
            ?>

            <br>
            <hr>
            <h2 class="admin-classes-css">Assign Class to Coach: </h2>
            <form method="post" autocomplete="off" action="../Controllers/ClassController.php"
                onsubmit="return validateAssignForm()">
                <input type="hidden" name="action" value="assignCoachtoClass">
                <label for="coaches"> Select Coach : </label>
                <select name="coaches" id="select-coaches">
                <option value=""> </option>

                    <?php
                    include_once "../Models/CoachesModel.php";

                    $coach = new Coach();
                    $employeesData = $coach->GetAllCoaches();

                    foreach ($employeesData as $coach) {
                        echo "<option value='" . $coach["CoachID"] . "'>" . $coach["Name"] . " </option>";
                    }
                    ?>

                </select>


                <span id="coach-err"><?php echo isset($_SESSION["coachErr"]) ? $_SESSION["coachErr"] : ''; ?></span>
                <br>
                <hr>
                <h3 class="admin-classes-css" >Selected Coach Classes : </h3>
                <div id="selectedCoachClasses">
                </div>
                <br>
                <h3 class="admin-classes-css" >Class Details : </h3>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-4">
                            <label for="classes"> Select Class : </label>
                            <br>
                            <?php
                            include_once "../Models/ClassesModel.php";

                            $class = new Classes();
                            $classes = $class->GetAllClasses();

                            echo "<select name='classes' id='select-classes'>";
                            echo "<option value=''></option>";

                            foreach ($classes as $class) {
                                echo "<option value='" . $class["ID"] . "'>" . $class["Name"] . "</option>";
                            }

                            echo "</select>";
                            ?>
                        </div>

                        <br>
                        <br>
                        <span
                            id="class-err"><?php echo isset($_SESSION["classErr"]) ? $_SESSION["classErr"] : ''; ?></span>
                        <br>
                        <div class="col-4">
                            <label for="from">From : </label>
                            <br>
                            <input type="time" name="from" id="from">
                        </div>
                        <br>
                        <span
                            id="from-err"><?php echo isset($_SESSION["fromErr"]) ? $_SESSION["fromErr"] : ''; ?></span>
                        <br>
                        <div class="col-4">
                            <label for="to">To : </label>
                            <br>
                            <input type="time" name="to" id="to">
                        </div>
                        <br>
                        <span id="to-err"><?php echo isset($_SESSION["toErr"]) ? $_SESSION["toErr"] : ''; ?></span>
                        <br>
                        <br>
                    </div>
                    <div class="price-container">
                        <div class="free-title">Free:</div>
                        <div class="radio-buttons">
                            <input type="radio" id="free" name="price" value="Free" class="radio-btn"
                                onclick="hidePriceField()">
                            <label for="limited" id="">Yes</label>

                            <input type="radio" id="" name="price" value="NotFree" class="radio-btn"
                                onclick="showPriceField()">
                            <label for="unlimited" id="unlimited">No</label>
                        </div>
                        <span
                            id="isFree-err"><?php echo isset($_SESSION["isFreeErr"]) ? $_SESSION["isFreeErr"] : ''; ?></span>
                        <br>
                        <div id="priceField" class="hidden">
                            <label for="class-price">Price:</label>
                            <br>
                            <input type="number" id="classPrice" name="class-price" style="width:16.5%;">
                        </div>
                        <span
                            id="price-err"><?php echo isset($_SESSION["priceErr"]) ? $_SESSION["priceErr"] : ''; ?></span>
                        <br>
                        <div class="col-4">
                            <label for="attendants">Number of Attendants: </label>
                            <br>
                            <input type="number" name="attendants" id="attendants">
                        </div>
                        <br>
                        <span
                            id="attendants-err"><?php echo isset($_SESSION["attendantsErr"]) ? $_SESSION["attendantsErr"] : ''; ?></span>
                    </div>
                    <br>
                    <span id="days-err"><?php echo isset($_SESSION["assigndaysErr"]) ? $_SESSION["assigndaysErr"] : ''; ?></span>
                    <span id="success"><?php echo isset($_SESSION["assignsuccess"]) ? $_SESSION["assignsuccess"] : ''; ?></span>
                    <div id="days-container">


                    </div>
                    <div class="col-m-4">
                        <button id="add-btn">Submit </button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <?php
    // Unset specific error messages
    unset(
        $_SESSION["titleErr"],
        $_SESSION["fromErr"],
        $_SESSION["toErr"],
        $_SESSION["assigndaysErr"],
        $_SESSION["coachErr"],
        $_SESSION["isFreeErr"],
        $_SESSION["priceErr"],
        $_SESSION["assignsuccess"]
    );
    ?>
    <script>
    function showPriceField() {
        var priceField = document.getElementById("priceField");
        priceField.style.display = "block";

    }

    function hidePriceField() {
        var limitField = document.getElementById("priceField");
        priceField.style.display = "none";
    }



    $(document).ready(function() {
        // Attach change event to the select element
        $('#select-classes').change(function() {
            // Get the selected class ID
            var classId = $(this).val();

            // Check if a class is selected
            if (classId !== '') {
                // Use AJAX to fetch days for the selected class
                $.ajax({
                    url: 'getClassDays.php', // Update the path to your PHP script
                    type: 'POST',
                    data: {
                        classId: classId
                    },
                    success: function(response) {
                        // Update the days-container with the fetched days
                        $('#days-container').html(response);
                    }
                });
            } else {
                // If no class is selected, clear the days-container
                $('#days-container').html('');
            }
        });
    });


    $(document).ready(function() {
        // Attach change event to the select element
        $('#select-coaches').change(function() {
            // Get the selected class ID
            var coachId = $(this).val();

            // Check if a class is selected
            if (coachId !== '') {
                // Use AJAX to fetch days for the selected class
                $.ajax({
                    url: 'getSelectedCoachClasses.php', // Update the path to your PHP script
                    type: 'POST',
                    data: {
                        coachId: coachId
                    },
                    success: function(response) {
                        // Update the days-container with the fetched days
                        $('#selectedCoachClasses').html(response);
                    }
                });
            } else {
                // If no class is selected, clear the days-container
                $('#selectedCoachClasses').html('');
            }
        });
    });
    </script>

</body>

</html>
</body>