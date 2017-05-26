<?php

session_start();
//    if(isset($_SESSION["user_id"]) & ($_SESSION["user_id"]==1)){
//    header("location: ../index.php");
//    }
    
include_once 'classes/DB.php';
  function check_login($username,$password){

   $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}

        
    $stmt = $conn->prepare("SELECT email, password FROM administrators WHERE email=?");
    $stmt->bind_param('s',$username);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($email,$returned_password);

    
   if($stmt->num_rows()) {
       while ($stmt->fetch())
       {
           if (password_verify($password, $returned_password)) {
               $_SESSION['name'] = $username;
               $_SESSION['password'] = $password;
               $session_data = [$username, $password];
               echo json_encode($session_data);
               return true;
           }
       }

    }
    else{
    echo "Wrong Username or Password";
    return false;
}

   }

$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

   if (check_login($username, $password)){
       $_SESSION["user_id"] =1;
    header("Location: main.php");
}
else{ // uname or pwd error
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Please make sure your type the correct username & password!');";
    echo "window.location='../index.php'";
    echo "</script>";
}