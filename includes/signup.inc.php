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
        exit();
    }
    else if (!preg_match('~[0-9]+~', $password)) {
        header("Location: ../signup.php?error=notnumeric");
        exit();
    }
    else if (ctype_digit($password) == true) {
        header("Location: ../signup.php?error=notnumeric");
        exit();
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
                    session_start();
                    $_SESSION['email2'] = $email;
                    $_SESSION['vkey2'] = $vkey;
                    header("Location: ../verificationsent.php?signup=success");
                    exit();

                } 
            }       
        }
    }
    mysqli_stmt_close($stmt);
    mysql_close($conn);
}
