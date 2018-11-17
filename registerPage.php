<?php
require_once 'register.php';
require_once 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

<!--The content of the page-->
<div class="container">
    <h2>Register here</h2>
    <form action="register.php" <?php // htmlspecialchars($_SERVER['register.php']); ?> method="post">

        <label>First name</label>
        <br>
        <input type="text" name="firstname">
        <span class="error">*<?php echo $firstnameErr; ?></span>
        <br><br>

        <label>Last name</label>
        <br>
        <input name="lastname" required pattern="/^[a-zA-Z ]*$/">
        <br>
        <label>Phone number</label>
        <br>
        <input name="phone" required pattern="/^[0-9]{8}+$/">
        <br>
        <label>Address</label>
        <br>
        <input name="address" required pattern="/^([\A-ZÆØÅa-zæøå\s]+)[ ]+([0-9\,])+[ ]+([0-9{4}]+)[ ]+([\A-ZÆØÅa-zæøå]+)+([^ ])$/">
        <br>
        <label>Email</label>
        <br>
        <input name="email" required pattern="/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/">
        <br>
        <label>Password</label>
        <br>
        <input name="password" required pattern="/^[0-9a-zæøåA-ZÆØÅ]{8,30}+$/">
        <br>
        <br>

        <input type="submit" value="register" />

    </form>
</div>

</body>
</html>