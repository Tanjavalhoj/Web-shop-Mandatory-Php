<?php
session_start();
require_once ('dbHandler.php');

$user = $_SESSION['user'];

if ($user['isAdmin'] !== '1') {
    header('location: noAccess.php');
    }

$conn = connect();

//Create
if(isset($_POST) & !empty($_POST)){
    $image = $_POST['proImage'];
    $name = $_POST['proName'];
    $price = $_POST['proPrice'];
    $type = $_POST['typeId'];

    $CreateSql = "INSERT INTO products (typeId, proName, proPrice, proImage) VALUES ( $type,'$name', $price,'$image')";

    $create = mysqli_query($conn, $CreateSql);

    if($create){
        $smsg = "Successfully inserted data, Insert New data.";
    }else{
        $fmsg = "Data not inserted, please try again later.";
    }
}

//Read
$ReadSql = "SELECT * FROM products";
$read = mysqli_query($conn, $ReadSql);

