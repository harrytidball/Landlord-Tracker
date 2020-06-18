<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <title>Account Verified</title>
    <link href= "css\main.css" rel = "stylesheet" type = "text/css">
    <link href= "css\login.css" rel = "stylesheet" type = "text/css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.png"/>
</head>
<body>

<div class="main"><br><br>
<a href="loggedout.html" class="sign" align="center"><span style="color:#242582">...
</span>Landlord<span style="color:#F64C72">Tracker</a></span>
<br><br><br>


<body style="background-color:#2F2FA2;"></body>

<form class="form-login" action="includes/login.inc.php" method="post">
    <input type="text" class="email-styling" name="mailuid" placeholder="Email Address" autocomplete="off">
    <input type="password" class="password-styling" name="pwd" placeholder="Password">
    <button type="submit" name="login-submit">Log In</button><br>
<h2 id="link-sent"><?php 

if(isset($_GET['vkey'])) {

    require 'dbh.inc.php';

    $resultSet = $sql = "SELECT verified, vkey FROM customer_details WHERE verified = 0 AND vkey = '$vkey' 
    LIMIT 1;";
    echo "Test";
    if (mysqli_num_rows($resultSet) == 1) {
        $update = $sql = "UPDATE customer_details SET verified = 1 WHERE vkey = '$vkey' LIMIT 1;";
        if ($update) {
            echo "Thank you for verifying your account. You can now log in.";
    } else {
        echo "This account is invalid or has already been verified.";
    }
}
}?></h2>


</main>
</div>