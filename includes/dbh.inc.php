<?php

 $dbServerName = "localhost";
 $dbUsername = "landlord_harrytidball";
 $dbPassword = "Suthampton735!";
 $dbName = "landlord_tracker";
 
 $conn = mysqli_connect($dbServerName, $dbUsername,  $dbPassword,  $dbName);

 if (!$conn) {
     die("Connection Failed: ".mysqli_connect_error());
 }