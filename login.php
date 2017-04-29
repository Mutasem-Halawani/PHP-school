<?php

$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM administratos WHERE email = '$email' "); 

if ($result->num_rows == 0){
    $_SESSION['message'] = "Error with Username";
    header('location: index.php');
}

else{
    $user = $result->fetch_assoc();
    if (password_verify($_POST['password'], $user['password'])){
        
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['active'] = $user['active'];
        
        $_SESSION['logged_in'] = true;
        
        header('location :main.php');
    }
    
    else{
    
    $_SESSION['message'] = "Error with Password";
}
}