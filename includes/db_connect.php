<?php

$host = "localhost";
$db_name = "UserStas";
$username = "root";
$password = "270590";
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
