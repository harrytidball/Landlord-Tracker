<?php

session_start();

// If login submit button is pressed it triggers this statement
if (isset($_POST['login-submit'])) {

// Retrieves from database
require 'dbh.inc.php';

$mailuid = $_POST['mailuid'];  
$password = $_POST['pwd']; 

if (empty($mailuid) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
} else {
    $sql = "SELECT * FROM customer_details WHERE user_email=?;"; // The question mark is a prepared statement which prevents
    // (cont.) SQL injection
    $stmt = mysqli_stmt_init($conn);
    // Check if user logged in correctly
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        // Pass in parameters into database that the users provided
        mysqli_stmt_bind_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Hashes the password to verify if it is correct, returns boolean
            $pwdCheck = password_verify($password, $row['user_password']);
            if ($pwdCheck == false) {
                header("Location: ../login.php?error=wrongpwd");
                exit(); 
            } else if ($verified == 2) {
                echo "This account has not yet been verified. Please check your email for a verification link.";
            } else if ($pwdCheck == true) {
                session_start();
                $_SESSION['userId'] = $row['id'];
                header("Location: ../dashboard.php");
                exit(); 

            } else {
            header("Location: ../login.php?error=wrongpwd");
            exit(); 
        }
    }
}

}
}