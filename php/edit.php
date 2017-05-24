<?php

session_start();

//include 'login.php';
include 'classes/DB.php';
include 'classes/Person.php';
include 'classes/Administrator.php';
include 'classes/Course.php';
include 'classes/Student.php';


$action = $_POST['action'];
$class_name = $_POST['class_name'];
//$target_dir = "../uploads/$class_name/$class_name-";
////        echo $class_name;
////        echo $target_dir;
////        echo '<br>';
////print_r($_FILES["image"]["name"]);
//
////echo $_POST['text'];
//$image = $target_dir . basename($_FILES["image"]["name"]);
//$uploadOk = 1;
//$imageFileType = pathinfo($image,PATHINFO_EXTENSION);
//// Check if image file is an actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
//// Check if file already exists
//if (file_exists($image)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
//        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}

echo$class_name;
if ($class_name==="admin"){
    
    $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
        $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
//        $password= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $password= filter_var("hi",FILTER_SANITIZE_STRING);
//        $role_id= filter_var($_POST['role'],FILTER_SANITIZE_NUMBER_INT);
        $role_id= filter_var("1",FILTER_SANITIZE_NUMBER_INT);
//        $new_obj = new Administrator( $name, $phone, $email, $image, $password, $role_id);
}

else if($class_name==="student"){
      $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//        $image = filter_var($_POST['image'], FILTER_SANITIZE_EMAIL);
        $course = filter_var($_POST['course'], FILTER_SANITIZE_STRING);
//        $student = new Student($id, $name, $phone, $email, $course);
}

else if($class_name==="course"){
    $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
//        $text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);
//        $image = $_FILES['image']['name'];
//        $course = new Course($id, $name, $description, $image);
//    $input = filter_var($_POST, FILTER_SANITIZE_STRING);
//    echo "$input";
//    $input->edit();
}
//switch($class_name){
//    case 'admin':
//        
//        break;
//    
//         case 'student':
//      
//        break;
//    
//    case 'course':
//        
//        break;
//    
//    default:
//        break;
//}


//  switch ($action) {
//      case 'edit':
//     $new_obj->edit();
//       break;
//      
//       case 'add':
//           $new_obj->save();
//           break;
//       
//       case 'delete':
//           $new_obj->delete();
//          break;
//
//        default:
//            $form = '';
//            break;
//    }
