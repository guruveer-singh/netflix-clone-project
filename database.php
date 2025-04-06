<?php
$host = "localhost";
$dbname = "netflix_clone";
$username = "root";
$password = "";

try {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    if ($mysqli->connect_errno) {
        throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
    
} catch(Exception $e) {
    die("Connection error: " . $e->getMessage());
}
?>
