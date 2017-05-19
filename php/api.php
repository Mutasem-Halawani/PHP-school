<?php

session_start();

//include_once 'classes/DB.php';
//include 'login.php';
//include_once 'classes/Person.php';
include 'classes/Administrator.php';
//include_once 'classes/Course.php';
//include_once 'classes/Student.php';

$name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
$phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
$password= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$role= filter_var($_POST['role'],FILTER_SANITIZE_NUMBER_INT);

$Administrator = new Administrator($id, $name, $phone, $email, $image, $password, $role_id);
$Administrator->save();
            header("Location: Admin.php");
         