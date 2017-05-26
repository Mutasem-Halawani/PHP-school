<?php

session_start();
if(!$_SESSION['name']) {header("Location: ../index.php");}

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
                 <a href="admin.php?action=add&class_name=admin">+</a>
                 <hr>
                 
                 <?php $admins = Administrator::print_all(); ?>
             </div>
             <div class="main-container"><?php if (isset($_GET['action']) && (($_GET['action']) === "add") && ($_GET['class_name']) === "admin" ){
                 include '../forms/addAdmin.php';
             }
             //---------------------------------------------------------------------------------------------------------------------------
             else if (isset($_GET['action']) &&(($_GET['action']) === "edit") && ($_GET['class_name']) === "admin" ){
                 include '../forms/editAdmin.php';
             }
?>
             
             </div>
         </main>
          <?php include 'footer.php'; ?> 
    </body>
</html>

