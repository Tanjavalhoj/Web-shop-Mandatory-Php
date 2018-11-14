<?php
session_start();
require_once ('dbHandler.php');

   /* $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (email,firstname,lastname,phone,address,passwrd) VALUES ($email,$firstname,$lastname,$phone,$address,$password)";
    $result = mysqli_query($sql);*/


    //Variables
    $email = "";
    $password = "";
    $firstname = "";
    $lastname = "";
    $phone = "";
    $address = "";

    //Error Messages
    $emailErr = "";
    $passwordErr = "";
    $firstnameErr = "";
    $lastnameErr = "";
    $phoneErr = "";
    $addressErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["$email"]);
        $password = test_input($_POST["$password"]);
        $firstname = test_input($_POST["$firstname"]);
        $lastname = test_input($_POST["$lastname"]);
        $phone = test_input($_POST["$phone"]);
        $address = test_input($_POST["$address"]);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
            $firstnameErr = "Name is required";
        } if (!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"])){
                $firstnameErr = "Only letters and white space allowed";
            } else {
            $firstname = test_input($_POST["firstname"]);
        }
    }

        /*if (!preg_match("/^[0-9a-zæøåA-ZÆØÅ]{8,30}+$/",$password)) {
            echo "Only letters and numbers, your password must be between 8 and 30 characters";
        }

        if (!preg_match("/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/",$email)){
            echo "Please enter a valid e-mail address like somebody@example.com";
        }

        if (!preg_match("/^[0-9]{8}+$/",$phone)){
            echo "Please enter your phone number in the format xxxxxxxx, only 8 characters";
        }

        if (!preg_match("/^([\A-ZÆØÅa-zæøå\s]+)[ ]+([0-9\,])+[ ]+([0-9{4}]+)[ ]+([\A-ZÆØÅa-zæøå]+)+([^ ])$/",$address)){
            echo "";
        }

    }*/





//$regexEmail = "/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/";
//$regexPhone = "/^[0-9]{8}+$/";
//$regexAddress = "/^([\A-ZÆØÅa-zæøå\s]+)[ ]+([0-9\,])+[ ]+([0-9{4}]+)[ ]+([\A-ZÆØÅa-zæøå]+)+([^ ])$/";
//$regexPassword = "/^[0-9a-zæøåA-ZÆØÅ]{8,30}+$/";

?>