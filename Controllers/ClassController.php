<?php

include_once "../Models/ClassesModel.php";

session_start();

class ClassController{

    public function assignCoachtoClass()
    {
        $classErr = $fromErr = $toErr = $daysErr = $coachErr = $success = $isFreeErr = $priceErr = $attendantsErr = "";

        $isValid = true;
        
        // Validate the "Title" field
        if (empty($_POST["classes"])) {
            $classErr = "Class is required";
            $isValid = false;
        } 
        
        // Validate the "From" field
        if (empty($_POST["from"])) {
            $fromErr = "From is required";
            $isValid = false;
        } 
        
        // Validate the "To" field
        if (empty($_POST["to"])) {
            $toErr = "To is required";
            $isValid = false;
        } 
        
        // Validate the "Days" field
        if (empty($_POST["days"]) || count($_POST["days"]) === 0) {
            $daysErr = "At least one day must be selected";
            $isValid = false;
        } 
        if (empty($_POST['coaches'])) {
            $coachErr="Please select a coach";
            $isValid = false;
        }

        if (empty($_POST["price"])) {
            $isFreeErr= "Free field is required";
            $isValid = false;
        }
        
        if ($_POST["price"] == "NotFree" && empty($_POST["class-price"])) {
            $priceErr = "Class Price is required";
            $isValid = false;
        }


        if ($_POST["price"] == "NotFree"){
        if (!is_numeric($_POST["class-price"]) || $_POST["class-price"] <= 0) {
            $priceErr = "Price must be a positive number";
            $isValid = false;
        }
        }

        if (!is_numeric($_POST["attendants"]) || $_POST["attendants"] <= 0) {
            $daysErr = "Attendants must be positive number";
            $isValid = false;
        } 


    
        if($isValid){
        $classID = isset($_POST['classes']) ? htmlspecialchars($_POST['classes']) : '';
        $from = htmlspecialchars($_POST["from"]);
        $to = htmlspecialchars($_POST["to"]);
        $days = $_POST["days"];
        $coachID = isset($_POST['coaches']) ? htmlspecialchars($_POST['coaches']) : '';
        $isFree=htmlspecialchars($_POST["price"]);
        $price = htmlspecialchars($_POST["class-price"]);
        $attendants=htmlspecialchars($_POST["attendants"]);


        $class = new Classes();

        $newclass = new Classes();

        $newclass->ClassID=$classID;
        $newclass->Date=$days;
        $newclass->StartTime=$from;
        $newclass->EndTime=$to;
        $newclass->isFree=$isFree;

        if($isFree="NotFree"){
        $newclass->Price=$price;
        }

        $newclass->CoachID=$coachID;
        $newclass->NumOfAttendants=$attendants;

        $result=$class->assignClass($newclass);

        if($result && $result1)
        {
            $success = "Class assigned to coach successfully";
            $_SESSION["success"] = $success;
            header("Location: ../views/admin-classes.php");
            exit();
        }

        }
        $_SESSION["classErr"] = $classErr;
        $_SESSION["fromErr"] = $fromErr;
        $_SESSION["toErr"] = $toErr;
        $_SESSION["daysErr"] = $daysErr;
        $_SESSION["coachErr"] = $coachErr;
        $_SESSION["isFreeErr"]=$isFreeErr;
        $_SESSION["priceErr"]=$priceErr;
        $_SEESION["attendantsErr"]=$attendantsErr;
        $_SESSION["success"] = $success;
        header("Location: ../views/admin-classes.php");
        exit();



    }

    public function addClass()
{
    $nameErr = $descrErr = $imgErr = $daysErr = "";
    $isValid = true; // Initialize $isValid

    // Validate the "Name" field
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    }

    // Validate the "Description" field
    if (empty($_POST["descr"])) {
        $descrErr = "Description is required";
        $isValid = false;
    }

    // Validate the "Image" field
    if (empty($_FILES["image"]["name"])) {
        $imgErr = "Image is required";
        $isValid = false;
    }

    // Validate the "Days" field
    if (empty($_POST["days"]) || count($_POST["days"]) === 0) {
        $daysErr = "At least one day must be selected";
         $isValid = false;
    } 

    if ($isValid) {
        $name = htmlspecialchars($_POST["name"]);
        $descr = htmlspecialchars($_POST["descr"]);
        $days = $_POST["days"];

        // Call the function to handle image upload and insertion into the database
        $result = $this->handleImageUpload($name, $descr,$days);

        if ($result) {
            // Image uploaded and inserted successfully
            $_SESSION["success"] = "Class added successfully";
            header("Location: ../views/admin-classes.php");
            exit();
        } else {
            // Handle the case where image upload or insertion fails
            $_SESSION["imgErr"] = "Failed to upload image or insert into the database";
            header("Location: ../views/admin-classes.php");
            exit();
        }
    } else {
        // Validation failed, redirect back to the form with error messages
        $_SESSION["nameErr"] = $nameErr;
        $_SESSION["descrErr"] = $descrErr;
        $_SESSION["imgErr"] = $imgErr;
        $_SESSION["daysErr"] =$daysErr;
        header("Location: ../views/admin-classes.php");
        exit();
    }
}
        
public function handleImageUpload($name, $descr,$days)
{
    global $conn;

    $imgErr = "";
    $isValid = true;

    $uploadDir = "../public/Images/"; // Set your desired upload directory
    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Check if the file already exists
        if (file_exists($uploadFile)) {
            $imgErr = "File already exists.";
            $isValid = false;
        } else {
            // Check if the file type is allowed (you can customize this list)
            if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif") {
                // Move the uploaded file to the desired directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                    // File uploaded successfully
                    // Insert the image information into the database
                    $imagePath = "public/Images/" . basename($_FILES["image"]["name"]);
                    $result = Classes::addClass($name, $descr, $imagePath,$days);

                    if ($result) {
                        return true;
                    } else {
                        // Delete the uploaded file if insertion into the database fails
                        unlink($uploadFile);
                        return false;
                    }
                } else {
                    $imgErr = "Failed to upload image.";
                    $isValid = false;
                }
            } else {
                $imgErr = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                $isValid = false;
            }
        }
    } else {
        $imgErr = "File is not an image.";
        $isValid = false;
    }

    // Set the error message and return false if any validation fails
    $_SESSION["imgErr"] = $imgErr;
    return false;
}

public function reserveClass()
{
    $price = floatval(htmlspecialchars($_POST["price"]));
    $CoachID = htmlspecialchars($_POST["coachid"]);
    $AssignedClassID = htmlspecialchars($_POST["assignedclassid"]);
    $ClientID = $_SESSION["ID"];

    if ($price == "0") {
        $class = new Classes();

        $result = $class->ReservationFreeClass($CoachID, $AssignedClassID, $ClientID);

        if ($result['inserted']) {
            $_SESSION["successFree"][$AssignedClassID] = "Class reserved successfully.";
            header("Location: ../views/classbooking.php");
            exit();
        }
        else if($result['alreadyExists']){
            $_SESSION["alreadyExistsFree"][$AssignedClassID] = "You already booked this class.";
            header("Location: ../views/classbooking.php");
            exit();
        }
        else{
        $_SESSION["failToReserveFree"][$AssignedClassID] = "Class reservation failed.";
        header("Location: ../views/classbooking.php");
        exit();
        }
    } else {
        $class = new Classes();

        $result = $class->ReservationNotFreeClass($CoachID, $AssignedClassID, $ClientID);
        if ($result['inserted']) {
            $_SESSION["successNotFree"][$AssignedClassID] = "Class Request made. Please Visit Gym For Payment as places are limited.";
            header("Location: ../views/classbooking.php");
            exit();
        }
        else if($result['alreadyExists']){
            $_SESSION["alreadyExistsNotFree"][$AssignedClassID] = "You already booked this class.";
            header("Location: ../views/classbooking.php");
            exit();
        }
        else{
        $_SESSION["failToReserveNotFree"][$AssignedClassID] = "Class reservation failed.";
        header("Location: ../views/classbooking.php");
        exit();
        }
    }
}

}

    




$controller = new ClassController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addClass":
            $controller->addClass();
            break;
         case "assignCoachtoClass":
            $controller->assignCoachtoClass();
            break;
        case "reserveClass":
            $controller->reserveClass();
            break;
        case "deleteClass":
            $classID = $_POST['classID'];
            $coachID = $_POST['coachID'];
            $date = $_POST['date'];

            $class=new Classes();
            $result=$class->deleteClass($classID,$coachID,$date);
            
            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
            break;
        case "acceptClass":
            $reservedClassID = $_POST['reservedClassID'];
    
            $class=new Classes();
            $result=$class->acceptClass($reservedClassID);
                
            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
            break;
        default:
            break;
    }
}
?>