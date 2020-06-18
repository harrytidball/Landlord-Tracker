<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    // The input that we want
    $email = $_POST['mail'];    
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // Checks for empty fields
    if (empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }
    // Checks to ensure email is valid
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }
    else if (strlen($password) < 6) {
        header("Location: ../signup.php?error=passwordlength");
    }
    // Checks that both passwords match
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck");
        exit();
    } else {
        $sql = "SELECT user_email FROM customer_details WHERE user_email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=emailinuse");
                exit();
            }
            // Adds user to database
            else {
                $vkey = crypt(time() .$email);
                $insert = $sql = "INSERT INTO customer_details (user_email, user_password, vkey) VALUES (?, ?, ?)"; 
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    // Hashes password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $vkey);
                    mysqli_stmt_execute($stmt);
                    // mysqli_stmt_store_result($stmt);  don't need this statement as we're inserting into DB not fetching
                    header("Location: ../signup.php?signup=success");
                    exit();
                    
                    if ($insert) {
                        $to = $email;
                        $subject = "Email Verification";
                        $message = "Please click this link to verify your account: 
                            <a href='http://localhost/verify.php?vkey=$vkey'>Register Account</a>";
                        $headers = "From: help@landlordtracker.co.uk";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        mail($to, $subject, $message, $headers);

                        header("Location: ../verificationsent.php?signup=success");
                    } 
                } 
            }       
        }
    }
    mysqli_stmt_close($stmt);
    mysql_close($conn);
}
else {
    header("Location: ../signup.php?signup=success");
    exit();
}