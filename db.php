<?php
$host = 'localhost';
$db = 'ecommerce_db';
$user = 'your_pg_user';
$password = 'your_pg_password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>

