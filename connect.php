<?php
$host = "localhost";
$user = "id22385888_tokboki";
$pass = "Tomoki123!";
$dbname = "id22385888_ebony";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>