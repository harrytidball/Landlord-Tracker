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
<a href="index.php" class="sign" align="center"><span style="color:#242582">...
</span>Landlord<span style="color:#F64C72">Tracker</a></span>
<br><br><br>


<body style="background-color:#2F2FA2;"></body>

<form class="form-login" action="includes/login.inc.php" method="post">
    <input type="text" class="email-styling" name="mailuid" placeholder="Email Address" autocomplete="off">
    <input type="password" class="password-styling" name="pwd" placeholder="Password">
    <button type="submit" name="login-submit">Log In</button><br><br>
    
    <a href="forgotpassword.php" id="forgot-pwd"><span style="color:#242582">..................</span>
    Forgot Password?</a><br><br>
    <a href="signup.php" id="sign-up-log-in"><span style="color:#242582">...................
    .........</span>Sign Up</a>

    </form>

    <?php
    if (isset($_GET["newpwd"])) {
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<p class="signupsuccess">Your password has been reset.</p>';  
        }
    }

    ?>

    <script>
    <?php
    if (isset($_SESSION['userId'])) {
        header("Location: ../dashboard.php");
        exit;
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            ?>alert('Please fill in all fields.');<?php
        }
        else if ($_GET['error'] == "wrongpwd") {
            ?>alert('Email address or password is incorrect.');<?php
          }
          else if ($_GET['error'] == "notverified") {
            ?>alert('Your account has not yet been verified. Please check your email for a verification link.');<?php
          }
          else if ($_GET['error'] == "invalidemail") {
            ?>alert('Email address or password is incorrect.');<?php
          }
    }
    ?>

    </script>

</main>
</div>