<?php


session_start();

include_once 'classes/Administrator.php';



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
                 <h3 class="list-header">Admins</h3>
                 <!--<button id="add-course-btn" class="add-btn">+</button>-->
                 <a href="admin.php?add=admin">+</a>
                 <hr>
                 
                 <?php $admins = Administrator::print_all(); ?>
             </div>
             <div class="main-container"><?php if (isset($_GET['add']) && ($_GET['add']) ==="admin" ){
              $html ='';
                      $html.= '<form action="api.php" method="POST">
                <label for="name">Name<input name="name" type="text" required></label>
                <label for="email">Email<input name="email" type="text" required></label>
                <label for="phone">Phone<input name="phone" type="phone" required></label>
                <label for="">Choose image<input type="text" ></label>
                <label for="password">Password<input name="password" type="password" required></label>
                <label for="role" required>Role
                    <select name="role">
                        <option value="admin">admin</option>
                        <option value="sales">Sales</option>
                    </select>
                </label>
                 <input type="submit" value="send">
            </form>';
                 echo $html;     
             }
             
?></div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>