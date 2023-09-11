<?php
$host = "localhost";
$username = "malhib_admin";
$password = "ClickJug1!.";
$db_name = "malhub";

try {
    $dsn = "mysql:host=$host;dbname=$db_name";
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    echo $exception->getMessage();
}