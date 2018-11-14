<?php
session_start();

unset($_SESSION['user']);

echo '<h1>You are now logged out.</h1>';

echo '<a href="login.html">Login</a>';
