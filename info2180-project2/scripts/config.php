<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';
/* Attempt to connect to MySQL database */
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);





?>
