<?php

$password = 'mutasem';
echo password_hash($password, PASSWORD_DEFAULT);
$hash = '$2y$10$3VAt1MyAu8wWZRMqclfcSuwWgYcEG18xFzmefhS2lASoQZwzcI1X.';
echo password_verify($password, $hash) ? ' verified': ' dont know you';