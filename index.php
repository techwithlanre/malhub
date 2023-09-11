<?php
require 'inc/init.php';

$page_name = $_GET['view'];
if (strlen($page_name) == 0) dd('no page found');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="inc/w3.css">
    <link rel="stylesheet" href="inc/styles.css">
    <title><?= ucfirst($page_name) ?></title>
</head>
<body class="">
<?php require 'inc/header.php'; ?>
<div class="w3-container">
    <?php require $page_name . '.php'; ?>
</div>


</body>
</html>