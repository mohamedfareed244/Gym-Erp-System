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
    <script src="../public/js/classes.js?v=<?php echo time();?>"></script>
</head>

<style>
.admin-classes-css {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 27px;
    text-transform: uppercase;
    padding-top: 20px;
    color: rgb(36, 34, 34);
    padding-left: 40px;
    padding-bottom: 30px;
}
.hidden {
    display: none;
}
span[id$="-err"],#success {
        color: red;
        font-size: 16px;
    }
</style>

<body>
    <?php 
    session_start();
    require("partials/adminsidebar.php");
     ?>
         <script src="../public/js/addClass.js"></script>
    <div id="add-body">
        <table class="table">
            <thead>
                <tr>
                    <td class="col"> ID </td>
                    <td class="col"> Name </td>
                    <td class="col"> Coach </td>
                    <td class="col"> Coach's Phone Number</td>

                    <td>Days</td>
                    <td>Action </td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> 1</td>
                    <td>yoga class</td>
                    <td>mohamed</td>
                    <td>0123456789</td>

                    <td>Saturday, Sunday, Monday</td>
                    <td><button id="add-btn">View Clients</button> <button id="add-btn"
                            style="background-color:red; color:white;">Delete</button></td>
                </tr>
                <tr>
                    <td> 1
                    </td>
                    <td>yoga class</td>
                    <td>Mohamed</td>
                    <td>0123456789</td>

                    <td>Saturday, Sunday, Monday</td>
                    <td><button id="add-btn">View Clients</button> <button id="add-btn"
                            style="background-color:red; color:white;">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <hr>
        <h2 class="admin-classes-css">Create New Class : </h2>
        <form method="post" autocomplete="off" action="../Controllers/ClassController.php"  onsubmit="return validateForm()">
        <input type="hidden" name="action" value="addClass">
        <label for="coaches"> Select The Coach : </label>
        <select name="coaches" id="select-coaches" onchange="getclasses()">
            <option value="">Select Coach </option>

        <?php
        include_once "../Models/EmployeeModel.php";
 
        $employee = new Employee();
        $employeesData = $employee->GetAllCoaches();

        foreach ($employeesData['Coaches'] as $coach) {
        echo "<option value='" . $coach["ID"] . "'>" . $coach["Name"] . " </option>";
        }

        foreach ($employeesData['FitnessManagers'] as $fitnessManager) {
        echo "<option value='" . $fitnessManager["ID"] . "'>" . $fitnessManager["Name"] . " </option>";
        }
        ?>

        </select>


        <span id="coach-err"><?php echo isset($_SESSION["coachErr"]) ? $_SESSION["coachErr"] : ''; ?></span>
        <br>
        <hr>
        <h3 class="admin-classes-css">Selected Coach Classes : </h3>
        <table class="table">
            <thead>
                <tr>
                    <td>id</td>
                    <td>title</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Days</td>
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>yoga class</td>
                <td>8:00 pm </td>
                <td>9:30 pm</td>
                <td>saturday,sunday,monday</td>
            </tbody>
        </table>
        <br>
        <h3 class="admin-classes-css">Class Details : </h3>
            <div class="conatiner">
                <div class="row">
                    <div class="col-4">
                        <label for="title">Title : </label>
                        <input type="text" name="title" id="title">
                    </div>
                    <br>
                    <span id="title-err"><?php echo isset($_SESSION["titleErr"]) ? $_SESSION["titleErr"] : ''; ?></span>
                    <br>
                    <div class="col-4">
                        <label for="from">From : </label>
                        <input type="time" name="from" id="from">
                    </div>
                    <br>
                    <span id="from-err"><?php echo isset($_SESSION["fromErr"]) ? $_SESSION["fromErr"] : ''; ?></span>
                    <br>
                    <div class="col-4">
                        <label for="to">To : </label>
                        <input type="time" name="to" id="to">
                    </div>
                    <br>
                    <span id="to-err"><?php echo isset($_SESSION["toErr"]) ? $_SESSION["toErr"] : ''; ?></span>
                    <br>
                </div>
                <br>
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
                        <span id="isFree-err"><?php echo isset($_SESSION["isFreeErr"]) ? $_SESSION["isFreeErr"] : ''; ?></span>
                        <br>
                        <div id="priceField" class="hidden">
                            <label for="class-price">Price:</label>
                            <input type="number" id="classPrice" name="class-price">
                        </div>
                        <span id="price-err"><?php echo isset($_SESSION["priceErr"]) ? $_SESSION["priceErr"] : ''; ?></span>
                </div>
                <br>
                <h5>Choose Day/s:</h5>
                <div class="col-m-8">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Saturday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Saturday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Sunday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Sunday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Monday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Monday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Tuesday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Tuesday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Wednesday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Wednesday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Thursday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Thursday</label>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="days[]" value="Friday">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Thursday</label>
                    </div>
                    <br>

                </div>
                <span id="days-err"><?php echo isset($_SESSION["daysErr"]) ? $_SESSION["daysErr"] : ''; ?></span>
                <span id="success"><?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?></span>
                <br>
                <div class="col-m-4">
                    <button id="add-btn">Add Class </button>
                </div>
                <br>
            </div>
        </form>

    </div>
<?php
// Unset specific error messages
unset(
    $_SESSION["titleErr"],
    $_SESSION["fromErr"],
    $_SESSION["toErr"],
    $_SESSION["daysErr"],
    $_SESSION["coachErr"],
    $_SESSION["isFreeErr"],
    $_SESSION["priceErr"],
    $_SESSION["success"]
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
    </script>

</body>

</html>