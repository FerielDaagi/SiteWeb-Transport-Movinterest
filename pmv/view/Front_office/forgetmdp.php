<?php

$host = 'localhost';
$dbname = 'integration';
$username = 'root';
$password = '';

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movinterest</title>
    <style>
        body {
            background-color: #000;
            /* Black background */
            color: #fff;
            /* White text color */
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #ff0;
            /* Yellow text color */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .container {
            background-color: #000;
            /* Black background */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            /* White label text color */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #fff;
            /* White border */
            border-radius: 5px;
            color: #000;
            /* Black text color inside the input */
        }

        button {
            background-color: #ff0;
            /* Yellow button background */
            color: #000;
            /* Black button text color */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ddd;
            /* Lighter yellow on hover */
        }
    </style>
</head>

<body>
    <h2>Mot de passe oublié</h2>
    <form method="post">
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <button type="submit">Send me a token</button>
        </div>
    </form>
</body>

</html>



<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\test\pmv\vendor\autoload.php';
if (isset($_POST['email'])) {
    $token = uniqid();
    $url = "http://localhost/test/pmv/view/Front_office/token.php?token=$token";

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Update with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'daagiferiel92@gmail.com'; // Update with your email
        $mail->Password = 'ihqm unos havh uhln'; // Update with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS (or PHPMailer::ENCRYPTION_SMTPS for SSL)
        $mail->Port = 587; // SMTP port

        // Email details
        $mail->setFrom('daagiferiel92@gmail.com', 'Admin Movinterest'); // Update with your info
        $mail->addAddress($_POST['email'], 'Recipient'); // Assuming email is provided in your form
        $mail->Subject = 'Password Reset Token';
        $mail->isHTML(true);
        $mail->Body = "Hello, Here is your link for password reset: <a href=\"$url\">$url</a>";

        // Send the email
        $mail->send();

        // Update the token in the database
        $sql = "UPDATE user SET token = ? WHERE email_user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token, $_POST['email']]);

        echo 'Email sent successfully with password reset link.';
    } catch (Exception $e) {
        echo 'Error sending email: ', $mail->ErrorInfo;
    }
}
?>