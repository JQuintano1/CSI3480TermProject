<?php

$dsn = "mysql:host=localhost;dbname=loginaccounts";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successful connection";
} catch (PDOException $e) {
    echo "Connection failed: " .$e->getMessage();
}
