<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client | Profit</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/alert.css">
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
                    <h4>Update Employee's Information</h4>
                    <?php
                    include_once("../Models/EmployeeModel.php");

                    if (isset($_GET['ID'])) {
                        $employeeID = $_GET['ID'];

                        $Employee = new Employee();
                        $employee = $Employee->getEmployeeByID($employeeID);

                        if (!$employee) {
                            echo "Employee not found";
                            exit;
                        }
                    } else {
                        echo "Employee ID not found";
                        exit;
                    }
                    ?>
                </div>
                <hr>
                <form id="editEmployeeForm">
                <div class='col-lg-4 col-md-12'>
                        <label for='employee_id'>Employee ID: </label>
                    </div>
                    <input type='number' name='employee_id' id='employee_id' value="<?php echo $employee->getID(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Name: </label>
                    </div>
                    <input type="text" name="name" id='name' value="<?php echo $employee->getName(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Phone Number: </label>
                    </div>
                    <input type="text" name="phone" id='phone' value="<?php echo $employee->getPhoneNumber(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="name">Email: </label>
                    </div>
                    <input type="email" id='email' name="email" value="<?php echo $employee->getEmail(); ?>">
                    <div class="col-lg-4 col-sm-12">
                        <label for="jobs">Job Title :</label>
                    </div>
                    <select name="jobTitle" id="jobs">
                        <?php
                        include_once "../Models/EmployeeModel.php";
                        $Employee = new Employee();
                        $result = $Employee->getjobtitles();

                        foreach ($result as $title) {
                            $selected = ($title["Name"] == $employee->getJobTitle()) ? "selected" : "";
                            echo "<option value='" . $title["Id"] . "' $selected> " . $title["Name"] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="col-lg-4 col-sm-12">
                        <label for="salary">Salary:</label>
                    </div>
                    <input type="number" name="salary" id="salary" min="1000" value="<?php echo $employee->getSalary(); ?>">

                    <div class="col-lg-4 col-sm-12">
                        <label for="photo">Image:</label>
                    </div>
                    <input type="file" name="photo" id="imgfile">

                    <div class="col-lg-12 col-sm-12">
                        <label for="address">Address:</label>
                    </div>
                    <input type="text" id="emp-addr" name="address" style="margin-bottom:20px" value="<?php echo $employee->getAddress(); ?>">
                    <br>

                    <div class="col-lg-4 col-sm-12">
                    <button type='submit' id='add-btn' style='margin-top:30px; margin-bottom:20px' onclick='editEmployee()'>Edit Employee</button>
                    </div>
                </form>
                <div class="alert hide"> 
                    <span class="fas fa-check-circle"></span>
                    <span class="msg"></span>
                    <div class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function editEmployee(){
            event.preventDefault();
            var employeeID = $('#employee_id').val();
            var name = $('#name').val();
            var phone = $('#phone').val();
            var gender = $('#gender').val();
            var salary = $('#salary').val();
            var jobTitle = $('#jobs').val();
            var address = $('#emp-addr').val();
            var email = $('#email').val();

        var employee = {
            emp_id: employeeID,
            name: name,
            phone: phone,
            jobTitle: jobTitle,
            address: address,
            salary: salary,
            email: email
        };
                $.ajax({
                    type: "POST",
                    url: "../Controllers/EmployeeController.php",
                    data: {
                        action: "editEmployeeAdmin",
                        employeeInfo: employee,
                    }, 
                    success: function (responseData) {
                        
                            $('.alert').addClass("show");
                            $('.alert').removeClass("hide");
                            $('.alert').addClass("showAlert");
                            $('.msg').text("Updated successfully");
                            setTimeout(function () {
                                $('.alert').removeClass("show");
                                $('.alert').addClass("hide");
                            }, 5000);

                            $('.close-btn').click(function () {
                                $('.alert').removeClass("show");
                                $('.alert').addClass("hide");
                            });
                        
                        
                    },
                    error: function () {
                        console.log("Something went wrong");
                            $('.alert').addClass("show");
                            $('.alert').removeClass("hide");
                            $('.alert').addClass("showAlert");
                            $('.msg').text("Error Editing Employee");
                            setTimeout(function () {
                                $('.alert').removeClass("show");
                                $('.alert').addClass("hide");
                            }, 5000);

                            $('.close-btn').click(function () {
                                $('.alert').removeClass("show");
                                $('.alert').addClass("hide");
                            });
                    }
                });
            }
    </script>
</body>

</html>