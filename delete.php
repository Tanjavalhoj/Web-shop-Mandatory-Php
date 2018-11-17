<?php
require_once 'administrator.php';

$conn = connect();
$id = $_GET['id'];
$DelSql = "DELETE FROM products WHERE proId = $id";

$delete = mysqli_query($conn, $DelSql);

if($delete){
    header('location: administratorPage.php');
}else{
    echo "Failed to delete";
}