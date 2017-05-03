<?php

$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password = password_hash(filter_var($_POST['password'],FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

$conn = new mysqli('localhost', 'root', '', 'school');
        if ($conn->errno) {
                echo $conn->error;
                die();
        }
        
$results = $conn->query("Select * FROM administrators");
$rows = [];

while ($row = $results->fetch_assoc()) {
	$rows []= $row['name'] . $row['role'] . $row['phone'] . $row['email'];
}

for ($i=0,$count=count($rows);$i<$count;$i++){
    //var_dump($rows);
}



?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Show</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
         <!-- <?php include 'header.php'; ?>
          <?php include 'footer.php'; ?> 
         -->
         <header>
             <div class="left-menu-items">
                <img id="logo" width="50"src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
                <a class="left-menu-links" href="../html/owner.html" >School</a>
                <a class="left-menu-links" href="" >Administration</a>
            </div>
            <div class="logged-in-user-info">
                <span>Jon Doe, Manager</span>
               <a href="" >Logout</a>
               <img id="logged-in-user-img" width="50"src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
            </div>
         </header>
         <hr>
    </body>
</html>
