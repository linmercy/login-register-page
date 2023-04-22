<?php
$hostName = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'login&register'
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if(!$conn){
    die('Connection failed:');
}else{
    $stmt = $conn->prepare("insert into registration(username, email, password) values(?, ?, ?)");
}