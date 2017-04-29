<?php
include 'DB.php';
include 'header.php';
$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password = password_hash(filter_var($_POST['password'],FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

switch($subject){
    case "students":
    case "teachers":
    case "courses":
        
        
$conn = new mysqli('localhost', 'root', '', 'school');
        if ($conn->errno) {
                echo $conn->error;
                die();
        }
        
$results = $conn->query("Select * FROM $subject limit 100");
$rows = [];

while ($row = $results->fetch_assoc()) {
	$rows []= $row;
}
$html = '<ul>';
for ($i=0,$count=count($rows);$i<$count;$i++){
        $html .= '<li>';
        $href= '';
         $href  .= '<a href="edit.php?subject=' . $subject . '&';
    foreach($rows[$i] as $key => $value){
        $href  .= $key . '=' . $value . '&';
    }
       $href .= '">';
         foreach($rows[$i] as $key => $value){
        $href  .= $key . ' is ' . $value . ' & ';
    }
       $html .= $href;
        $html .= '</a></li>';
}

$html .= '</ul>';
 echo $html;

break;

default:
    echo $subject . " Is Not Defined" . '<br>';
}
include 'footer.php';