<?php

require_once("Model.php");
require_once("ObserverModel.php");
require_once("UsersModel.php");

// include_once "../includes/dbh.inc.php";
include_once "../views/send_pw_email.php";
//to display error on mac it won't affect the code or make errors . 
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Client extends Users implements Observer
{
    private $FirstName;
    private $LastName;
    private $Age;
    private $Gender;
    private $Height;
    private $Weight;
    public $HasMembership;
    public $HasPtPackage;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }

    public function getFirstName()
    {
        return $this->FirstName;
    }

    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    public function getLastName()
    {
        return $this->LastName;
    }

    public function setAge($Age)
    {
        $this->Age = $Age;
    }

    public function getAge()
    {
        return $this->Age;
    }

    public function setGender($Gender)
    {
        $this->Gender = $Gender;
    }

    public function getGender()
    {
        return $this->Gender;
    }

    public function setHeight($Height)
    {
        $this->Height = $Height;
    }

    public function getHeight()
    {
        return $this->Height;
    }

    public function setWeight($Weight)
    {
        $this->Weight = $Weight;
    }

    public function getWeight()
    {
        return $this->Weight;
    }

    public function checkClient($clientID)
    {
        $sql = "SELECT * FROM client WHERE ID = '$clientID'";
        $result = $this->db->query($sql);
        $found = false;
        if ($result && $result->num_rows > 0) {
            $found = true;
            return $found;
        } else {
            return $found;
        }
    }

    public function getClientByID($clientID)
    {
        $sql = "SELECT * FROM client WHERE ID = '$clientID'";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows > 0) {
            $clientData = $result->fetch_assoc();

            $client = new Client();
            $client->setID($clientData['ID']);
            $client->setFirstName($clientData['FirstName']);
            $client->setLastName($clientData['LastName']);
            $client->setEmail($clientData['Email']);
            $client->setPassword($clientData['Password']);
            $client->setPhoneNumber($clientData['Phone']);
            $client->setAge($clientData['Age']);
            $client->setGender($clientData['Gender']);
            $client->setHeight($clientData['Height']);
            $client->setWeight($clientData['Weight']);

            return $client;
        } else {
            return null;
        }
    }


    public function deleteClientByID($clientID)
    {
        $sql = "DELETE from client where ID =" . $clientID;

        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllClients()
    {
        $sql = " SELECT
            client.ID, client.FirstName, client.LastName, client.Email, client.Password, client.Phone, client.Age, client.Gender, client.Height,
            client.Weight,
            CASE WHEN membership.clientId IS NOT NULL THEN 'Yes' ELSE 'No' END AS HasMembership,
            CASE WHEN ptPackage.clientId IS NOT NULL THEN 'Yes' ELSE 'No' END AS HasPtPackage
        FROM
            client
        LEFT JOIN
            `membership` AS membership ON client.ID = membership.ClientID
        LEFT JOIN
            `private training membership` AS ptPackage ON client.ID = ptPackage.ClientID";

        $result = $this->db->query($sql);
        $clients = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $client = new Client();
                $client->setID($row['ID']);
                $client->setFirstName($row['FirstName']);
                $client->setLastName($row['LastName']);
                $client->setEmail($row['Email']);
                $client->setPassword($row['Password']);
                $client->setPhoneNumber($row['Phone']);
                $client->setAge($row['Age']);
                $client->setGender($row['Gender']);
                $client->setHeight($row['Height']);
                $client->setWeight($row['Weight']);
                $client->HasMembership = $row['HasMembership'];
                $client->HasPtPackage = $row['HasPtPackage'];
                $clients[] = $client;
            }
        }

        return $clients;
    }

    public function addClient($client)
    {
        try {
            $Fname = $client->getFirstName();
            $Lname = $client->getLastName();
            $Age = $client->getAge();
            $Gender = $client->getGender();
            $Phone = $client->getPhoneNumber();
            $Height = $client->getHeight();
            $Weight = $client->getWeight();
            $Email = $client->getEmail();
            $Password = ConfirmationMailer::generateRandomPassword();
            $Phone = $client->getPhoneNumber();
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO client (FirstName, LastName, Age, Gender, Weight, Height, Email, Password,Phone) 
            VALUES ('$Fname', '$Lname', '$Age', '$Gender', '$Weight', '$Height', '$Email', '$hashedPassword','$Phone')";
            ConfirmationMailer::sendConfirmationEmail($Email, $Password);

            return $this->db->query($sql);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function addClientUserSide($client)
    {
        try {
            $Fname = $client->getFirstName();
            $Lname = $client->getLastName();
            $Age = $client->getAge();
            $Gender = $client->getGender();
            $Phone = $client->getPhoneNumber();
            $Height = $client->getHeight();
            $Weight = $client->getWeight();
            $Email = $client->getEmail();
            $Password = $client->getPassword();
            $Phone = $client->getPhoneNumber();

            $sql = "INSERT INTO client (FirstName, LastName, Age, Gender, Weight, Height, Email, Password,Phone) 
            VALUES ('$Fname', '$Lname', '$Age', '$Gender', '$Weight', '$Height', '$Email', '$Password','$Phone')";

            return $this->db->query($sql);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function checkExistingEmail($email)
    {
        $sql = "SELECT * FROM client WHERE Email = '$email'";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }

    public function checkIfClientExists($email)
    {
        $sql = "SELECT * FROM client WHERE Email = '$email'";
        return $this->db->query($sql);
    }

    public function updateClient($client)
    {
        $Fname = $client->getFirstName();
        $Lname = $client->getLastName();
        $Phone = $client->getPhone();
        $Email = $client->getEmail();
        $Password = $client->getPassword();

        $user_id = $_SESSION['ID'];
        // Check if a new password is provided
        if (!empty($Password)) {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE client SET FirstName='$Fname', LastName='$Lname', Phone= '$Phone',Email='$Email', Password='$hashedPassword'
                    WHERE ID = $user_id";
            return $this->db->query($sql);
        } else {
            // Update with the new password
            $sql = "UPDATE client SET FirstName='$Fname', LastName='$Lname', Phone= '$Phone', Email='$Email'
                    WHERE ID = $user_id";
            return $this->db->query($sql);
        }
    }

    public function editClient($client)
    {
        $clientInfo = new Client();
        $clientInfo = $clientInfo->getClientByID($client->getID());

        if (!empty($client->getFirstName())) {
            $clientInfo->setFirstName($client->getFirstName());
        }

        if (!empty($client->getLastName())) {
            $clientInfo->setLastName($client->getLastName());
        }

        if (!empty($client->getPhoneNumber())) {
            $clientInfo->setPhoneNumber($client->getPhoneNumber());
        }

        if (!empty($client->getEmail())) {
            $clientInfo->setEmail($client->getEmail());
        }

        if (!empty($client->getWeight())) {
            $clientInfo->setWeight($client->getWeight());
        }

        if (!empty($client->getHeight())) {
            $clientInfo->setHeight($client->getHeight());
        }
        if (!empty($client->getAge())) {
            $clientInfo->setAge($client->getAge());
        }

        $clientID = $client->getID();
        $Fname = $clientInfo->getFirstName();
        $Lname = $clientInfo->getLastName();
        $Email = $clientInfo->getEmail();
        $Height = $clientInfo->getHeight();
        $Weight = $clientInfo->getWeight();
        $Age = $clientInfo->getAge();
        $Phone = $clientInfo->getPhoneNumber();
        

        $sql = "UPDATE client SET FirstName='$Fname', LastName='$Lname', Phone= '$Phone', Email='$Email' , Age='$Age', Weight='$Weight', Height = '$Height'
                WHERE ID = $clientID";

        $result = $this->db->query($sql);
        if ($result) {
            echo "Query executed successfully";
        }
        return $result;
    }


    public function deleteClient()
    {
        $sql = "DELETE from client where ID =" . $_SESSION['ID'];
        return $this->db->query($sql);
    }

    public function update($message)
    {
        $clients = $this->getAllClients();

        // Loop through each client and send the notification
        foreach ($clients as $client) {
            $toEmail = $client->getEmail();

            // Call your existing function to send the email notification
            $success = ConfirmationMailer::sendNewPtPackageNotification($toEmail, $message);

            if ($success) {
                error_log("Email sent successfully for update ($message) to $toEmail");
            } else {
                error_log("Error sending email for update ($message) to $toEmail");
            }
        }
    }
}
