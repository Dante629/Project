<?php

$host = "localhost";
$db_name = "job";
$username = "root";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 

catch(PDOException $exception){
    echo "Ошибка соединения: " . $exception->getMessage();
}
?>