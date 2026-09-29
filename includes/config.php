<?php

$servername = "localhost:3306";
$username = "BEROEPS_admin";
$password = "IkWilNaarHuis123!";
$dbname = "103427_BEROEPS2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



?>
