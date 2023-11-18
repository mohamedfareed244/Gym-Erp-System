<?php

include_once "../Models/ClassesModel.php";

session_start();

class ClassController{

    public function addClass()
    {
        $titleErr = $fromErr = $toErr = $daysErr = $coachErr = $success = $isFreeErr = $priceErr = "";

        $isValid = true;
        
        // Validate the "Title" field
        if (empty($_POST["title"])) {
            $titleErr = "Title is required";
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
        
        if ($_POST["price"] === "NotFree" && empty($_POST["class-price"])) {
            $priceErr = "Class Price is required";
            $isValid = false;
        }


        if ($_POST["price"] === "NotFree"){
        if (!is_numeric($_POST["class-price"]) || $_POST["class-price"] <= 0) {
            $priceErr = "Price must be a positive number";
            $isValid = false;
        }
        }
    
        if($isValid){

        $title = htmlspecialchars($_POST["title"]);
        $from = htmlspecialchars($_POST["from"]);
        $to = htmlspecialchars($_POST["to"]);
        $days = $_POST["days"];
        $coachID = isset($_POST['coaches']) ? htmlspecialchars($_POST['coaches']) : '';
        $isFree=htmlspecialchars($_POST["price"]);
        $price = htmlspecialchars($_POST["class-price"]);

        $class = new Classes();

        $newclass = new Classes();

        $newclass->Name=$title;
        $newclass->Date=$days;
        $newclass->StartTime=$from;
        $newclass->EndTime=$to;
        $newclass->isFree=$isFree;

        if($isFree="NotFree"){
        $newclass->Price=$price;
        }

        $newclass->Coach=$coachID;

        $result=$class->addClass($newclass);

        if($result)
        {
            $success = "Class added successfully";
            $_SESSION["success"] = $success;
            header("Location: ../views/admin-classes.php");
            exit();
        }

        }
        $_SESSION["titleErr"] = $titleErr;
        $_SESSION["fromErr"] = $fromErr;
        $_SESSION["toErr"] = $toErr;
        $_SESSION["daysErr"] = $daysErr;
        $_SESSION["coachErr"] = $coachErr;
        $_SESSION["isFreeErr"]=$isFreeErr;
        $_SESSION["priceErr"]=$priceErr;
        $_SESSION["success"] = $success;
        header("Location: ../views/admin-classes.php");
        exit();


    }

}


$controller = new ClassController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    switch ($action) {
        case "addClass":
            $controller->addClass();
            break;
        default:
            // Handle unknown action or display an error
            break;
    }
}
?>