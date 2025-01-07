<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project_ujikom_2025_felix";

$connect = mysqli_connect(hostname: $host, username: $user, password: $pass, database: $dbname);

try {
    $pdo = new PDO(dsn: "mysql:host=$host;dbname=$dbname", username: $user, password: $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}