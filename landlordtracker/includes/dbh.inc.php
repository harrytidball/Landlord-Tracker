<?php

 $dbServerName = "localhost";
 $dbUsername = "root";
 $dbPassword = "Suthampton735!";
 $dbName = "landlord_tracker";
 
 $conn = mysqli_connect($dbServerName, $dbUsername,  $dbPassword,  $dbName);

 if (!$conn) {
     die("Connection Failed: ".mysqli_connect_error());
 }