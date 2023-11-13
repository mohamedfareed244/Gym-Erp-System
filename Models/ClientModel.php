<?php

session_start();

include_once "../includes/dbh.inc.php";

class Client{
    public $ID;
    public $FirstName;
    public $LastName;
    public $Age;
    public $Gender;
    public $Height;
    public $Weight;
    public $Email;
    public $Password;
    public $memberships;


    public function addClient($client)
    {
        global $conn;

        $Fname=$client->FirstName;
        $Lname=$client->LastName;
        $Age=$client->Age;
        $Gender=$client->Gender;
        $Height=$client->Height;
        $Weight=$client->Weight;
        $Email=$client->Email;
        $Password=$client->Password;

        $sql = "INSERT INTO client (FirstName, LastName, Age, Gender, Weight, Height, Email, Password) 
                VALUES ('$Fname', '$Lname', '$Age', '$Gender', '$Weight', '$Height', '$Email', '$Password')";
        return mysqli_query($conn, $sql);    
    }

    public function checkExistingEmail($email) {
        global $conn;

        $Email = "SELECT * FROM client WHERE Email = '$email'";
        $result = mysqli_query($conn, $Email);
        return mysqli_num_rows($result) > 0;
    }

    public function checkifClientExists($email,$password)
    {
        global $conn;

        $mysql = "select * from client where Email = '$email' and Password = '$password'";
        return mysqli_query($conn, $mysql);
    }

    public function checkifEmailExists($email)
    {
        global $conn;

        $mysql = "select * from client where Email = '$email'";
        return mysqli_query($conn, $mysql);

    }



}

?>