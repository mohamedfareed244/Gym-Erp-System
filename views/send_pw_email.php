<?php
require '../includes/Exception.php';
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ConfirmationMailer
{
    static function generateRandomPassword()
    {
        $length = 10;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }

    public static function sendConfirmationEmail($toEmail, $randomPassword)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'profitgym256@gmail.com';
            $mail->Password = 'jseurqznpnbnpcrn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('profitgym256@gmail.com', 'Profit Gym');
            $mail->addAddress($toEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Set Up Your Account';
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            // background-color: #f4f4f4;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #ffffff;
                            border: 1px solid #dddddd;
                            border-radius: 5px;
                        }
                        h2 {
                            color: #333333;
                        }
                        p {
                            color: #666666;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h2>Finish Setting Up Your Account</h2>
                        <p>Your account has been successfully created. Here are your account details:</p>
                        <ul>
                            <li>Email: $toEmail</li>
                            <li>Randomly Generated Password: $randomPassword</li>
                        </ul>
                        <p>Thank you for joining us!</p>
                    </div>
                </body>
                </html>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function sendNewPtPackageNotification($toEmail, $packageName)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'profitgym256@gmail.com';
            $mail->Password = 'jseurqznpnbnpcrn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('profitgym256@gmail.com', 'Profit Gym');
            $mail->addAddress($toEmail);

            $mail->isHTML(true);
            $mail->Subject = 'New Private Training Package Added';
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #ffffff;
                            border: 1px solid #dddddd;
                            border-radius: 5px;
                        }
                        h2 {
                            color: #333333;
                        }
                        p {
                            color: #666666;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h2>New Private Training Package Added</h2>
                        <p>We're excited to announce that a new private training package, '$packageName', has been added to our offerings.</p>
                        <p>Check it out and elevate your fitness journey with Profit Gym!</p>
                    </div>
                </body>
                </html>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
