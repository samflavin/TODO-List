<?php 

$db = new Mysqli;

$db->connect("localhost", "root", "root", "crud2");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if(!$db){
    echo "Success!";
}


$sql = "SELECT * FROM tasks";
$result = $db->query($sql);



?>