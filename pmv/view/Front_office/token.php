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
if (isset($_GET['token']) && $_GET['token'] != '') {
    $stmt = $pdo->prepare('SELECT email_user FROM user WHERE token= ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();
    if ($email) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset password</title>
            <!-- Bootstrap CSS link (replace with your own Bootstrap version if needed) -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <style>
                body {
                    background-color: #333333;
                    /* Black background */
                    color: #f0ad4e;

                    /* White text */

                }

                .card {
                    background-color: #2c2c2c;
                    /* Dark gray card background */
                    color: #ffffff;
                    /* White text in card */

                }

                label {
                    color: #f0ad4e;
                    /* Yellow label text */
                }

                .btn-primary {
                    background-color: #f0ad4e;
                    /* Yellow button background */
                    border-color: #f0ad4e;
                    /* Yellow button border */
                }

                .input-primary:hover {
                    background-color: #eea236;
                    /* Darker yellow on hover */
                    border-color: #eea236;
                }

                input.form-control {
                    background-color: #2c2c2c;
                    /* Dark gray input background */
                    color: #ffffff;
                    /* White text in input */
                    border-color: #f0ad4e;
                    /* Yellow border for input */

                }

                input.form-control:focus {
                    background-color: #333333;
                    /* Darker gray on focus */
                    color: #ffffff;
                    border-color: #eea236;

                    /* Darker yellow on focus */
                }
            </style>
        </head>

        <body>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-7 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h2>Reset password</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <label for="newPassword">New Password :</label>
                    <input type="text" name="newPassword">
                    <input type="submit" value="confirm">
                </form>
        </body>

        </html>
    <?php
    }
}
if (isset($_POST['newPassword'])) {
    // Assuming the password is already hashed before storing
    $hashedPassword = $_POST['newPassword'];

    $sql = "UPDATE user SET mdp_user = ?, token = NULL WHERE email_user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hashedPassword, $email]);

    echo "Password changed successfully!";
}