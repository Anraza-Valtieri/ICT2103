<?php
/**
 * Created by PhpStorm.
 * User: Jerahmeel Valtieri C
 * Date: 21-Oct-17
 * Time: 4:20 PM
$mysqli = new mysqli("47.74.176.6", "root", "foobar123!", "GodsEye");
 */

$mysqli = new mysqli("47.74.176.6", "root", "foobar123!", "GodsEye");
$sql = "SELECT location.name FROM location 
			WHERE name LIKE '%".$_GET['query']."%'
			LIMIT 10";
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
    $json[] = $row['name'];
}
echo json_encode($json);
?>