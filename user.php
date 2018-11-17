<?php
session_start();
require_once 'menu.php';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
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
    <h2>Hello <?php if (!empty($user)){ echo $user['firstname'] . " " . $user['lastname']; } else{ echo " Guest";}    ?> </h2>

</div>

</body>
</html>
