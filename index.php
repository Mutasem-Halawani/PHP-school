<?php

session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School</title>
        <link rel="icon" href="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        
        <img id="logo" width="50px"src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif"/>
        <hr>
         <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
        <form action="php/login.php" method="post">
            <label for="username">Username
                <input type="text" name="username" placeholder="Please insert the username" size="25" required>
            </label>
       
            <label for="password">Password
                <input type="password" name="password" placeholder="Please insert the password" size="25" required>
            </label>
                <input type="submit" value="Login">
        </form>
       
       <?php include 'php/footer.php'; ?>
    </body>
</html>
