<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--Navigation bar-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">The Cloud</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="productHandler.php">Products</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="basket.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket</a></li>
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login or Sign Up</a></li>
        </ul>
    </div>
</nav>

<!--The content of the page-->
<div class="container">
    <h3>Welcome to Tanja's Webshop - The Cloud</h3>
    <p>Here you can shop a lot of items. Come, take a look of what I can offer.</p>
</div>

<?php

?>

</body>
</html>