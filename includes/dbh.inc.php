<?php

$dataSourceName = "mysql:host=127.0.0.1;dbname=buzzscript";
$dbUsername = "root";
$dbPassword = "";

try {
    $pdo = new PDO($dataSourceName, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection Failed: ". $e->getMessage();
}

