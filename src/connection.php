<?php



$host = "localhost"; // 127.0.0.1
$user = "root";
$pass = "root";
$dase = "CRUD3";
$port = "3306";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);


try {
    $conn = new PDO("mysql:dbname=$dase;host=$host", $user, $pass, $options);
} catch (PDOException $exception) {
    die($exception->getMessage());
}


