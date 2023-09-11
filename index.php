<?php
session_start();
require 'vendor/autoload.php';
require 'inc/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php?action=access&result=no_login");
}

$page_name = $_GET['view'];
if (strlen($page_name) == 0) die('no page found');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="inc/w3.css">
    <link rel="stylesheet" href="inc/styles.css">
    <title>Document</title>
</head>
<body class="">
<?php require 'inc/header.php'; ?>
<div class="w3-container">
    <?php
    require $page_name . '.php';
    ?>
</div>


</body>
</html>