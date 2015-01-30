<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli('oniddb.cws.oregonstate.edu', 'phommata-db', 'Lm0QgLxFUbJHtq2D', 'phommata-db');

$result = $conn->query("SELECT title, description, release_year FROM film");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"title":"'  . $rs["title"] . '",';
    $outp .= '"description":"'   . $rs["description"]        . '",';
    $outp .= '"release_year":"'. $rs["release_year"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>