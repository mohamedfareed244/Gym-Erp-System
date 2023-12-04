<?php
require_once 'sessionusercheck.php';
session_destroy();
header("Location:index.php");
?>