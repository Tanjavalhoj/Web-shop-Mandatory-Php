<?php
    require_once 'dbHandler.php';
    require_once 'administrator.php';
    //display_menu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
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
            <li><a href="basketPage.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket</a></li>
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login or Sign Up</a></li>
        </ul>
    </div>
</nav>
<!--The content of the page-->
<div class="container">
    <!--Add to Menu list-->
    <div class="form-wrapper">
        <h3>Add item to menu</h3>
        <form action="" method="post">
            <input type="text" name="product_name" placeholder="Name of product"><br>
            <input type="number" name="product_price" placeholder="Price of product"><br>
            <input type="text" name="product_image" placeholder="Image of Product"><br>
            <select name="type_id">
                <option value="">Select type of product</option>
            </select><br>
            <input type="submit" name="submit" value="Add the product">
        </form>

    </div>

    <!--Delete from Menu list-->
    <div class="form-wrapper">
        <h3>Delete item from menu:</h3>
        <form action="" method="post">
            <select name="typeId">
                <option value="Select something"></option>
            </select><br>
            <input type="submit" name="submit" value="Delete item">
        </form>
    </div>


</div>



</body>
</html>