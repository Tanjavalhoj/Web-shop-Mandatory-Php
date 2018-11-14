<?php
session_start();
require_once ('dbHandler.php');


$email = $_POST['email'];
$password = $_POST['password'];

$conn = connect();
$sql = "SELECT * FROM users WHERE email = '$email' AND passwrd = '$password'";
$statement = mysqli_query($conn,$sql);
$user = $statement->fetch_assoc();

if ($user) {
    $_SESSION['user'] = $user;
    header('location: /labs/Mandatory/Mandatory_1/index.php');

    die;
} else {
    echo "username and/or password was wrong";
}

?>