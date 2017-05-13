<?php

session_start();

include_once 'classes/DB.php';
//include 'login.php';
//include 'classes/Person.php';
//include 'classes/Administator.php';
//include 'classes/Course.php';
//include 'classes/Student.php';


    function check_login($username,$password){

   $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}

//        $result = DB::get_instance()->get_connection()->query("SELECT * FROM administrators");
//        var_dump($result);
       
//        $rows = [];
//		while ($row = $result->fetch_assoc()) {
//			$rows []= $row;
//		}
        
    $stmt = $conn->prepare("SELECT email, password FROM administrators WHERE email=?");
    $stmt->bind_param('s',$username);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($email,$returned_password);
//    $stmt->bind_result($id,$name, $phone, $email, $image, $returned_password, $role_id);
//    
//    echo $email . $returned_password;
    
    
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
