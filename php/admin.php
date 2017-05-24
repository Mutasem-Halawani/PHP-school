<?php


session_start();

include 'classes/Administrator.php';



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
                 <a href="admin.php?action=add&class_name=admin">+</a>
                 <hr>
                 
                 <?php $admins = Administrator::print_all(); ?>
             </div>
             <div class="main-container"><?php if (isset($_GET['action']) && (($_GET['action']) === "add") && ($_GET['class_name']) === "admin" ){
              $html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" required></label>
                <label for="email">Email<input name="email" type="email" required></label>
                <label for="phone">Phone<input name="phone" type="tel" required></label>
                <label for="phone">Password<input name="password" type="password" required></label>
                <label for="role" required>Role
                    <select name="role_id">
                        <option value="1">admin</option>
                        <option value="2">Sales</option>
                    </select>
                </label>
                <label for="image">Choose image<input type="file" name="image" value=""></label>
                 <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="class_name" value="admin">
                 <input type="submit" value="add">
            </form>';
                 echo $html;     
             }
             //---------------------------------------------------------------------------------------------------------------------------
             else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "admin" ){
              $html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" value="'. $_GET['name'] .'" required></label>
                <label for="phone">Phone<input name="phone" type="tel" value="'. $_GET['phone'].'"required></label>
                <label for="email">Email<input name="email" type="text" value="'. $_GET['email'].'" required></label>
                <label for="role" required>Role
                    <select name="role_id">
                        <option value="1">admin</option>
                        <option value="2">Sales</option>
                    </select>
                </label>
                <img src="'.'../uploads/admin/'. $_GET['image'] .'"' .'width="50px"'.'>
                <label for="image"><input name="image" type="file" value="'. $_GET['image'].'"></label>
                <input name="password" type="hidden" value=""></label>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="class_name" value="admin">
                <input type="hidden" name="id" value="'.$_GET['id']. '">
                <input type="hidden" name="role_id" value="'.$_GET['role_id']. '">
                 <input type="submit" name="edit" value="edit">
                 <input type="submit" name="delete" value="delete">
            </form>';
                   
//                echo $admin;
                 echo $html;     
             }
             
?>
             
             </div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>

