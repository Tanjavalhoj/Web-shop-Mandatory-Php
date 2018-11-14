<?php
require_once('productHandler.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Basket</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

<div class="container">
    <div style="clear:both"></div>
    <br/>
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>$ <?php echo $values["item_price"]; ?></td>
                        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td><a href="basket.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                        class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
</div>
</body>
</html>