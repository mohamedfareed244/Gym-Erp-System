<?php

session_start();

include_once "../includes/dbh.inc.php";

class Client{
    public $ID;
    public $FirstName;
    public $LastName;
    public $Age;
    public $Gender;
    public $Phone;
    public $Height;
    public $Weight;
    public $Email;
    public $Password;


    public static function addClient($client)
    {
        global $conn;

        $Fname=$client->FirstName;
        $Lname=$client->LastName;
        $Age=$client->Age;
        $Gender=$client->Gender;
        $Phone=$client->Phone;
        $Height=$client->Height;
        $Weight=$client->Weight;
        $Email=$client->Email;
        $Password=$client->Password;
        $Phone=$client->Phone;
        $sql = "INSERT INTO client (FirstName, LastName, Age, Gender, Weight, Height, Email, Password,Phone) 
                VALUES ('$Fname', '$Lname', '$Age', '$Gender', '$Weight', '$Height', '$Email', '$Password','$Phone')";
         
        return mysqli_query($conn, $sql);    
    }
    public static function getid($client){
        global $conn;
        $sql ="SELECT ID FROM client WHERE Email='$client->Email'";
        $result=mysqli_query($conn,$sql);
       
return $result;
    }

    public static function checkExistingEmail($email) {
        global $conn;

        $Email = "SELECT * FROM client WHERE Email = '$email'";
       
        $result = mysqli_query($conn, $Email);
        return mysqli_num_rows($result) > 0;
    }
    public static function checkExistingPhone($phone) {
        global $conn;

        $Email = "SELECT * FROM client WHERE Phone = '$phone'";
        $result = mysqli_query($conn, $Email);
        return mysqli_num_rows($result) > 0;
    }

    public function checkIfClientExists($email)
    {
        global $conn;
        $mysql = "SELECT * FROM client WHERE Email = '$email'";
        return mysqli_query($conn, $mysql);
    }
public static function getclientbyphone($phone){
    global $conn;
        $mysql = "SELECT * FROM client WHERE Phone = '$phone'";
        return mysqli_query($conn, $mysql);
}

    public function updateClient($client)
    {
        global $conn;
    
        $Fname = $client->FirstName;
        $Lname = $client->LastName;
        $Email = $client->Email;
        $Password = $client->Password;
    
        $user_id = $_SESSION['ID'];
                // Check if a new password is provided
        if (!empty($Password)) {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE client SET FirstName='$Fname', LastName='$Lname', Email='$Email', Password='$hashedPassword'
                    WHERE ID = $user_id";
                    return $conn->query($sql);
        } else {
            // Update with the new password
            $sql = "UPDATE client SET FirstName='$Fname', LastName='$Lname', Email='$Email'
                    WHERE ID = $user_id";
                    return $conn->query($sql);
        }

    }

    public function deleteClient()
    {
        global $conn;

        $sql="DELETE from client where ID =" . $_SESSION['ID'];

        return mysqli_query($conn,$sql);

    }
    

}

?>