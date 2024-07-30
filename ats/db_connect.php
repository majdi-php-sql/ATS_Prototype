<?php
// db_connect.php

$host = 'localhost'; // I defined the database host.
$dbname = 'ats'; // I specified the name of the database.
$username = 'root'; // I set the database username.
$password = 'M48frzjS8M6GJ-B8'; // I set the database password.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // I created a new PDO instance to connect to the database.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // I set the PDO error mode to exception to handle errors effectively.
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage()); // I handled connection errors by displaying a message.
}
?>
