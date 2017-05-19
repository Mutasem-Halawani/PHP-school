<?php

session_start();

//include 'api.php';
//
//include_once 'classes/DB.php';
include_once 'classes/Person.php';
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
                 <!--<button id="add-student-btn" class="add-btn">+</button>-->
                 <a href="school.php?action=add&class_name=student">+</a>
                 <hr>
                 <?php  
                 $students = Student::print_all();?>
             </div>
             <div class="main-container">
                 <?php if (isset($_GET['action']) && (($_GET['action']) === "add")&& ($_GET['class_name']) ==="course" ){
              $html ='';
                      $html.= '  <form action="api.php" method="POST">
                <label for="name">Name<input name="name" type="text"></label>
                <label for="description">Description<input name="description" type="text"></label>
                <label for="">Choose image<input type="text"></label>
                <input type=hidden name="action" value="add">
                <input type=hidden name="class_name" value="course">
                 <input type="submit" value="send">
            </form>';
                 echo $html;     
             }
             
             else if (isset($_GET['action']) && (($_GET['action']) === "add")&&  ($_GET['class_name']) ==="student" ){
                    $html ='';
                      $html.= '    <form action="api.php" method="POST">
                <label for="name">Name<input name="name" type="text"></label>
                <label for="email">Email<input name="email" type="text"></label>
                <label for="phone">Phone<input name="phone" type="tel"></label>
                <label for="">Choose image<input type="text"></label>
                <label for="course">Course
                    <select name="course">
                        <option value="english">English</option>
                        <option value="math">Math</option>
                        <option value="history">History</option>
                        <option value="biology">Biology</option>
                    </select>
                </label>
                <input type=hidden name="action" value="add">
                <input type=hidden name="class_name" value="student">
                <input type="submit" value="send">
            </form>';
                 echo $html;    
                 
             }
             
               else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "course" ){
              $html ='';
                      $html.= '<form action="api.php" method="POST">
                <label for="name">Name<input name="name" type="text" value="name" required></label>
                <label for="name">Description<input name="description" type="text" value="description" required></label>
                <label for="">Choose image<input type="text" ></label>
                <input type=hidden name="action" value="add">
                <input type=hidden name="class_name" value="admin">
                 <input type="submit" value="edit">
            </form>';
                 echo $html;     
             }
             
                else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "student" ){
              $html ='';
                      $html.= '<form action="api.php" method="POST">
                <label for="name">Name<input name="name" type="text" value="name" required></label>
                <label for="email">Email<input name="email" type="text" value="email" required></label>
                <label for="phone">Phone<input name="phone" type="phone" value="phone" required></label>
                <label for="">Choose image<input type="text" ></label>
                <label for="password">Password<input name="password" type="password" required></label>
                <label for="role" required>Role
                    <select name="role">
                        <option value="admin">admin</option>
                        <option value="sales">Sales</option>
                    </select>
                </label>
                <input type=hidden name="action" value="add">
                <input type=hidden name="class_name" value="admin">
                 <input type="submit" value="edit">
            </form>';
                 echo $html;     
             }
             
?>
             </div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>
