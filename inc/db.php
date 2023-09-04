<?php
$serverName = "localhost";
$username = "malhib_admin";
$password = "ClickJug1!.";
$dbName = "malhub";

$conn = new mysqli($serverName,$username,$password,$dbName);

if (!$conn) {
    die($conn->error);
}