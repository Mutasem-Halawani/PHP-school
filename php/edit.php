<?php


$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$name = filter_var($_GET['name'],FILTER_SANITIZE_STRING);
$phone = filter_var($_GET['phone'],FILTER_SANITIZE_NUMBER_INT);
$address = filter_var($_GET['address'],FILTER_SANITIZE_STRING);
    
?>
<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Edit Input</title>
</head>
<body>
    <form action="oop_classes.php" method="GET">
        <input type = "text" value=" <?php echo $id; ?>" >
        <input type = "text" value=" <?php echo $name; ?> ">
        <input type = "text" value=" <?php echo $phone; ?>" >
        <input type = "text" value=" <?php echo $address; ?>" >
        <input type="submit" value="Edit">
    </form>
</body>
</html>



