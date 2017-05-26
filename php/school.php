<?php

 session_start();
if(!$_SESSION['name']) {header("Location: ../index.php");}

include_once 'classes/Administrator.php';
include_once 'classes/Course.php';
include_once 'classes/Student.php';


?>
<!doctype html>

    <head>
        <title>School</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
         <?php include 'header.php'; ?>
         <main>
             <div class="courses-list">
                 <h3 class="list-header">Courses</h3>
                 <!--<button id="add-course-btn" class="add-btn">+</button>-->
                 <a href="school.php?action=add&class_name=course">+</a>
                 <hr>
                 <?php
                 $courses = Course::print_all();
                ?>
             </div>
             <div class="students-list">
                 <h3 class="list-header">Students</h3>
                 <a href="school.php?action=add&class_name=student">+</a>
                 <hr>
                 <?php  
                 $students = Student::print_all();?>
             </div>
             <div class="main-container">
                 <?php if (isset($_GET['action']) && (($_GET['action']) === "add")&& ($_GET['class_name']) ==="course" ){
                 include '../forms/addCourse.php';
             }
             
             else if (isset($_GET['action']) && (($_GET['action']) === "add")&&  ($_GET['class_name']) ==="student" ){
                 include '../forms/addStudent.php';
             }
               else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "course" ){
                 include '../forms/editCourse.php';
             }
                else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "student" ){
                 include '../forms/editStudent.php';
             }
?>
             </div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>
