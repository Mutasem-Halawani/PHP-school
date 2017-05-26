<?php

session_start();

include 'classes/DB.php';
include 'classes/Person.php';
include 'classes/Administrator.php';
include 'classes/Course.php';
include 'classes/Student.php';


$action = $_POST['action'];
$class_name = $_POST['class_name'];
$target_dir = "../uploads/$class_name/";


$new_obj = null;
$tmp_name = $_FILES["image"]["tmp_name"];
$image = basename($_FILES["image"]["name"]);
$poster_name = $target_dir . $image;
$uploadOk = 1;
$imageFileType = pathinfo($poster_name,PATHINFO_EXTENSION);
// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if(isset($_POST["delete"])){
    $action = "delete"; 
 }
 

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $poster_name)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

print_r($_POST);
if ($class_name==="admin"){
    
    $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $phone= filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password= password_hash(filter_var($_POST['password'],FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
        $role_id= filter_var($_POST['role_id'],FILTER_SANITIZE_NUMBER_INT);
        $new_obj = new Administrator($id, $name, $phone, $email,$image, $password, $role_id);
        
}

else if($class_name==="student"){
      $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
       $course_id = filter_var($_POST['course_id'], FILTER_SANITIZE_STRING);
        $new_obj = new Student($id, $name, $phone, $email, $image, $course_id);
}

else if($class_name==="course"){
    $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $new_obj = new Course($id, $name, $description, $image);
        
}


  switch ($action) {
      case 'edit':
     $new_obj->edit();
       break;
      
       case 'add':
           $new_obj->save();
           break;
       
       case 'delete':
           $new_obj->delete();
          break;

        default:
            $form = '';
            break;
    }
