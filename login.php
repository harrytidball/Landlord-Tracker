<?php
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <title>Log In</title>
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
    <button type="submit" name="login-submit">Log In</button><br><br>
    
    <a href="forgotpassword.php"><span style="color:#242582">..........................</span>
    Forgot Password?</a><br><br>
    <a href="signup.php"><span style="color:#242582">..........................
    .........</span><span style="color:#FEFFFF">Sign Up</a></span> 
    </form>

    <?php
    if (isset($_GET["newpwd"])) {
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<p class="signupsuccess">Your password has been reset.</p>';  
        }
    }

    ?>

    <?php
    if (isset($_SESSION['userId'])) {
        header("Location: ../dashboard.php");
        exit;
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<p class="log-in-error">Please fill in all fields.</p>';
        }
        else if ($_GET['error'] == "wrongpwd") {
            echo '<p class="log-in-error">Incorrect password.</p>';
          }
    }
    ?>

</main>
</div>