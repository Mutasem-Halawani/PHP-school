<?php

//session_start();

//include_once 'classes/DB.php';


$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

include 'api.php';

   
   if (check_login($username, $password)){
    header("Location: main.php");
}
else{ // uname or pwd error
    header("Location: ../index.php");
}