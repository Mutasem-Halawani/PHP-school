<?php

//include 'api.php';
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();

//print_r($_SESSION);
header("Location: ../index.php");
