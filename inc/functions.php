<?php

function checkLogin(): void {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php?action=access&result=no_login");
        exit;
    }
}