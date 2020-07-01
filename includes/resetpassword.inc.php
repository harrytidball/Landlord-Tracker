<?php

if (isset($_POST["reset-password-submit"])) {

    require 'dbh.inc.php';
 
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../forgotpassword.php?newpwd=empty");
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../forgotpassword.php?newpwd=pwdnotsame");
        exit();
    } else if (strlen($password) < 6) {
        header("Location: ../forgotpassword.php?newpwd=passwordlength");
        exit();
    } else if (!preg_match('~[0-9]+~', $password)) {
        header("Location: ../forgotpassword.php?newpwd=notnumeric");
        exit();
    } else if (ctype_digit($password) == true) {
        header("Location: ../forgotpassword.php?newpwd=notnumeric");
        exit();
    } else {
    
    $currentDate = date("U");

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../forgotpassword.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt); 
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        header("Location: ../forgotpassword.php?error=resubmit");
        exit();
    } else {
        
        
    }

    /*$sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../forgotpassword.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt); 
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        header("Location: ../forgotpassword.php?error=resubmit");
        exit();
    } else {
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
    
        if ($tokenCheck === false) {
            header("Location: ../forgotpassword.php?error=resubmit");
            exit();
        } else if ($tokenCheck === true) {
            $tokenEmail = $row['pwdResetEmail'];
            $sql = "SELECT * FROM customer_details WHERE user_email=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../forgotpassword.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)) {
                    header("Location: ../forgotpassword.php?error=sqlerror");
                    exit();
                } else { 
                    $sql = "UPDATE customer_details SET user_password=? WHERE user_email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../forgotpassword.php?error=sqlerror");
                        exit();
                    } else {
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        */
                        
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../forgotpassword.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
        mysqli_stmt_execute($stmt); 
        session_start();
        header("Location: ../login.php?newpwd=passwordupdated");
        exit(); 
    }
                   //}
                //}
            //}
        //}
    //}
}
}
} else {
    header("Location: ../index.php");
}