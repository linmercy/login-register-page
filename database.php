<?php
   //database connection
   $hostName = 'localhost';
   $dbUser = 'root';
   $dbPassword = '';
   $dbName = 'login&register';

   $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

   if(!$conn){
       die('Connection failed: ');
   }
   
   
