<?php
global $conn;
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'matrimony';
$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
