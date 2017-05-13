<?php


session_start();


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
         <link rel="icon" href="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
   <?php include 'header.php'; ?>
         <main>
             <div class="courses-list">
                 <h3 class="list-header">Courses</h3>
                 <button id="add-course-btn" class="add-btn">+</button>
                 <hr>
                 <ul>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="course-name">math</p>
                             <p class="course-description">this is an obligatory course</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="course-name">math</p>
                             <p class="course-description">this is an obligatory course</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="course-name">math</p>
                             <p class="course-description">this is an obligatory course</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="course-name">math</p>
                             <p class="course-description">this is an obligatory course</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="course-name">math</p>
                             <p class="course-description">this is an obligatory course</p>
                         </li>
                     </a>
                 </ul>
             </div>
             <div class="students-list">
                 <h3 class="list-header">Students</h3>
                 <button id="add-student-btn" class="add-btn">+</button>
                 <hr>
                 <ul>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="student-name">tom</p>
                             <p class="student-email">tom@gmail.com</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="student-name">tom</p>
                             <p class="student-email">tom@gmail.com</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="student-name">tom</p>
                             <p class="student-email">tom@gmail.com</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="student-name">tom</p>
                             <p class="student-email">tom@gmail.com</p>
                         </li>
                     </a>
                     <a href="">
                         <li class="list-item">
                             <img width="50" src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif" alt="" class="small-icon">
                             <p class="student-name">tom</p>
                             <p class="student-email">tom@gmail.com</p>
                         </li>
                     </a>
                 </ul>
             </div>
             <div class="main-container"></div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>