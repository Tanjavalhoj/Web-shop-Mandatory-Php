<?php
require_once 'dbHandler.php';
require_once 'menu.php';

$fnameErr = $lnameErr = $phoneErr = $addressErr = $emailErr = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

/*    $regexEmail = "/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/";
    $regexPhone = "/^[0-9]{8}+$/";
    $regexAddress = "/^([\A-ZÆØÅa-zæøå\s]+)[ ]+([0-9\,])+[ ]+([0-9{4}]+)[ ]+([\A-ZÆØÅa-zæøå]+)+([^ ])$/";
    $regexPassword = "/^[0-9a-zæøåA-ZÆØÅ]{8,30}+$/";*/

    if (empty($_POST["fname"])) {
        $nameErr = "Firstname is required";
    } if (!preg_match("/^[a-zæøåA-ZÆØÅ ]*$/",$_POST["fname"])) {
            $nameErr = "Only letters and white space allowed";
        } else {
        $firstname = $_POST["fname"];
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Lastname is required";
    } if (!preg_match("/^[a-zæøåA-ZÆØÅ ]*$/",$_POST["lname"])) {
            $lnameErr = "Only letters and white space allowed";
        } else {
        $lastname = $_POST["lname"];
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } if (!preg_match("/^[0-9]{8}+$/",$phone = $_POST["phone"])) {
            $phoneErr = "Only numbers and must be 8 characters";
        } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Lastname is required";
    } if (!preg_match("/^([\A-ZÆØÅa-zæøå\s]+)[ ]+([0-9\,])+[ ]+([0-9{4}]+)[ ]+([\A-ZÆØÅa-zæøå]+)+([^ ])$/",$_POST["address"])) {
            $addressErr = "ex: exampleroad 4, 1000 exampelcity";
        } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } if (!preg_match("/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/",$_POST["email"])) {
            $emailErr = "Only Numbers, letters, special signs as:-_. (must contain a @)";
        } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } if (!preg_match("/^[0-9a-zæøåA-ZÆØÅ]{8,30}+$/",$_POST['password'])) {
            $passErr = "Only letters and numbers, must be between 8 and 30 characters.";
        } else {
        $password = $_POST["password"];
    }

    $conn = connect();
    $query = "INSERT INTO users (email,firstname,lastname,address,phone,passwrd) VALUES ('$email', '$firstname', '$lastname', '$address',$phone,'$password')";
    var_dump($query);
    $newUser = mysqli_query($conn, $query);
    var_dump($newUser);

    if($newUser){
        header('location: loginPage.php');
    }else{
        $fmsg = "Failed to update data.";
    }
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="styles.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style> .error{
            color: red;
        }
    </style>
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

<br><br>

<div class="container">
	<div class="row">

        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form-horizontal col-md-6 col-md-offset-3">

		<legend>Register here</legend>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Firstname</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input1" />
                    <span class="error">* <?php echo $fnameErr;?></span>
			    </div>
			</div>


			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Lastname</label>
			    <div class="col-sm-10">
			      <input type="text" name="lname"  class="form-control" id="input1"/>
                    <span class="error">* <?php echo $lnameErr;?></span>
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="text" name="phone"  class="form-control" id="input1"/>
                    <span class="error">* <?php echo $phoneErr;?></span>
			    </div>
			</div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" name="address"  class="form-control" id="input1"/>
                    <span class="error">* <?php echo $addressErr;?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email"  class="form-control" id="input1"/>
                    <span class="error">* <?php echo $emailErr;?></span>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password"  class="form-control" id="input1"/>
                    <span class="error">* <?php echo $passErr;?></span>
                </div>
            </div>

			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>

	</div>
</div>
</body>
</html>
