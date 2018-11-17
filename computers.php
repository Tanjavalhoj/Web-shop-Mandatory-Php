<?php
require_once'productHandler.php';
require_once 'menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Computers</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<!--Navigation bar-->
<div class="container">
    <nav class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php echo show_menu() ?>
        </ul>
    </nav>
</div>

<br />
<div class="container">
    <br />
    <br />
    <br /><br />
    <?php
    $query = "SELECT * FROM products WHERE typeId = 3 ORDER BY proId ASC";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-4">
                <form method="post" action="basket.php?action=add&id=<?php echo $row["proId"]; ?>">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                        <img src="images/<?php echo $row["proImage"]; ?>" class="img-responsive" /><br />

                        <h4 class="text-info"><?php echo $row["proName"]; ?></h4>

                        <h4 class="text-danger">$ <?php echo $row["proPrice"]; ?></h4>

                        <input type="text" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["proName"]; ?>" />

                        <input type="hidden" name="hidden_price" value="<?php echo $row["proPrice"]; ?>" />

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
    <div style="clear:both"></div>
    <br />

</div>
</div>
<br />
</body>
</html>