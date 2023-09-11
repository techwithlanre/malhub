<?php
session_start();
require 'vendor/autoload.php';
require 'inc/db.php';

if (isset($_POST['email'])) {
    $error = [];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (strlen($email) < 5) { // length of the email
        $error[] = 'Your email can not be less than 5 characters.';
    }

    //sara@rachael.com
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Enter an actual email';
    }

    if (strlen($password) < 8) {
        $error[] = 'Your password should not be less than 8 characters';
    }

    if (count($error) == 0) {
        $query = $db->prepare("SELECT id, name, phone, email, gender, created_at FROM `users` WHERE email = ? AND password = ? ");
        $result = $query->execute([$email, $password]);
        $userCount = $query->rowCount();
        if ($userCount > 0) {
            $user = $query->fetch();
            $_SESSION['user'] = $user;
            header("Location: index.php?view=dashboard");
            exit;
        }
    } else {
        $_SESSION['errors'] = $error;
        header("Location: login.php");
        exit;
    }
}



function validateActualEmail($email) {
    $split = explode('@', $email);
    $domain = 'https://' . $split[1];
    $header = get_headers($domain);
    $header =
    $key = $header[0];
    $code = explode(' ', $key);

    dd($code[1]);
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="inc/w3.css">
        <link rel="stylesheet" href="inc/styles.css">
    </head>
    <body>
        <div style="max-width: 500px; margin: 0 auto; margin-top: 100px;">

            <?php if (isset($_SESSION['errors'])) { ?>
                <div class='w3-panel w3-red' style="border-radius: 10px;">
                    <h3>Danger!</h3>
                    <?php foreach ($_SESSION['errors'] as $error) {  ?>
                        <p><?php echo $error ?></p>
                    <?php } ?>
                </div>
            <?php } ?>

            <div style="margin-bottom: 20px; background: #1a75ff; color: white; padding: 5px; border-radius: 10px;">
                <h3>Login</h3>
            </div>
            <div style="border: 1px solid gray; padding: 10px; border-radius: 10px;">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" class="w3-container" method="post">
                    <label>Email</label>
                    <input class="w3-input" type="text" name="email">

                    <label>Password</label>
                    <input class="w3-input" type="password" name="password">

                    <input class="w3-btn w3-blue" type="submit" style="margin-top: 20px; border-radius: 7px;">
                </form>
            </div>
        </div>
    </body>
</html>
