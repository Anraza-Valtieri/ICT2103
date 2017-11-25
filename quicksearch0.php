<?php
/**
 * Created by PhpStorm.
 * User: Jerahmeel Valtieri C
 * Date: 21-Oct-17
 * Time: 4:20 PM
$mysqli = new mysqli("47.74.176.6", "root", "foobar123!", "GodsEye");
 */

$mysqli = new mysqli("47.74.176.6", "root", "foobar123!", "GodsEye");
$sql = "SELECT location_type FROM location_type
			WHERE location_type.location_type LIKE '".$_GET['ltype']."%'
			LIMIT 7";
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
    //$json[] = $row['id'];
    $json[] = $row['location_type'];
}
echo json_encode($json);
?>
