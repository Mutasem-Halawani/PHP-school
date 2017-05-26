<?php

$password = 'mutasem';
echo password_hash($password, PASSWORD_DEFAULT);
$hash = '$2y$10$SmJQBOM5rH0B0srNSPyrk.1USfwizTWOKDzGU1yNK.SMFbnVKXwzC';
echo password_verify($password, $hash) ? ' verified': ' dont know you';