<?php
session_start(); 
include_once 'includes/dbh.inc.php';
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
<a href="http://landlordtracker.co.uk" class="sign" align="center"><span style="color:#242582">...
</span>Landlord<span style="color:#F64C72">Tracker</a></span>
<br><br><br>


<body style="background-color:#2F2FA2;"></body>

<form class="form-login" action="includes/login.inc.php" method="post">
    <input type="text" class="email-styling" name="mailuid" placeholder="Email Address" autocomplete="off">
    <input type="password" class="password-styling" name="pwd" placeholder="Password">
    <button type="submit" name="login-submit">Log In</button>
<h2 id="verified-confirmed"><?php 

$vkey = $_SESSION['vkey2'];
$verified = "1";

    if (isset($_GET['vkey'])) {
        if ($_GET['vkey'] == $vkey) {

        $sql = "UPDATE customer_details SET verified = '$verified' WHERE vkey = '$vkey';";

        if (mysqli_query($conn, $sql)) {
            echo "Thank you for verifying your account. You can now log in.";
          } else {
            echo "This account is invalid or has already been verified.";
          }
          
          mysqli_close($conn);
}
    }

?></h2>

</form>

</main>
</div>
</html>