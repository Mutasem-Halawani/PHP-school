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

switch($class_name){
    case 'admin':
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
        $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $role= filter_var($_POST['role'],FILTER_SANITIZE_NUMBER_INT);
        $new_obj = new Administrator($id, $name, $phone, $email, $image, $password, $role_id);
        break;
    
         case 'student':
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $image = filter_var($_POST['image'], FILTER_SANITIZE_EMAIL);
        $course = filter_var($_POST['course'], FILTER_SANITIZE_STRING);
        $student = new Student($id, $name, $phone, $email, $image, $course);
        break;
    
    case 'course':
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $image = filter_var($_POST['image'], FILTER_SANITIZE_EMAIL);
        $course = new Course($id, $name, $description, $image);
        break;
    
    default:
        break;
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
