<?php
session_start();
require_once ('dbHandler.php');

$user = $_SESSION['user'];

if ($user['isAdmin'] !== '1') {
    header('location: /labs/Mandatory/Mandatory_1/noAccess.php');
}

