<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School</title>
        <link rel="icon" href="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <hr>
        <form action="login.php" method="post">
            <label for="username">Username
                <input type="text" name="username" placeholder="Please insert the username" size="25">
            </label>
       
            <label for="password">Password
                <input type="password" name="password" placeholder="Please insert the password" size="25">
            </label>
                <input type="submit" value="Login">
        </form>
       
       <?php include 'footer.php'; ?>
    </body>
</html>
