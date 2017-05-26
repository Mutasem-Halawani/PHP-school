<?php

session_start();
if(!$_SESSION['name']) {header("Location: ../index.php");}

$password = 'avi';
echo password_hash($password, PASSWORD_DEFAULT);
$hash = '$2y$10$Qvfgu6Weav8YVWG9njANue6XCmTTtDj1azupQg3dowqikG1fFbozK';
echo password_verify($password, $hash) ? ' verified': ' dont know you';