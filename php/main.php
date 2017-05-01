<?php
include 'header.php';
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
$html;
for ($i=0,$count=count($rows);$i<$count;$i++){
    var_dump($rows);
}

include 'footer.php';

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Show</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

    </body>
</html>
