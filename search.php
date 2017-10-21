<?php
/**
 * Created by PhpStorm.
 * User: Jerahmeel Valtieri C
 * Date: 21-Oct-17
 * Time: 4:20 PM
 */

$mysqli = new mysqli("47.74.176.6", "root", "foobar123!", "GodsEye");

// check connection
if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = 'SELECT name FROM location';

if(isset($_POST['query'])){
    // Add validation and sanitization on $_POST['query'] here

    // Now set the WHERE clause with LIKE query
    $query .= ' WHERE name LIKE "%' . $_POST['query'] . '%"';
}

$return = array();

if($result = $mysqli->query($query)){
    // fetch object array
    console.log($query);
    while($obj = $result->fetch_object()) {
        $return[] = $obj->title;
    }

    // free result set
    $result->close();
}

// close connection
$mysqli->close();

$json = json_encode($return);
print_r($json);
exit();
?>