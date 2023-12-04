<?php
session_start();

if (!isset($_SESSION['ID'])) {
    // Redirect the user to the login page or any other appropriate action
    header("Location: login.php");
    exit();
}
?>