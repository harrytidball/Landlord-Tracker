<?php
session_start(); 
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <title>Verification Sent</title>
    <link href= "css\main.css" rel = "stylesheet" type = "text/css">
    <link href= "css\login.css" rel = "stylesheet" type = "text/css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.png"/>
</head>
<body>

<div class="main"><br><br>
<a href="index.php" class="sign" align="center"><span style="color:#242582">...
</span>Landlord<span style="color:#F64C72">Tracker</a></span>
<br><br><br>

<?php

if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "success") {
                $email = $_SESSION['email2'];
                $vkey = $_SESSION['vkey2'];

                    $to = $email;
                  $from = "support@landlordtracker.co.uk";
                  $subject = "Email Verification";
                  $message = "Please click this link to verify your account: 
                      <a href='http://landlordtracker.co.uk/verify.php?vkey=$vkey'>Register Account</a>";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                  mail($to, $subject, $message, $headers);

                }
            }
?>

<body style="background-color:#2F2FA2;"></body>

<h2 id="link-sent">Verification link sent.<br> Please check your email.</h2>


</main>
</div>