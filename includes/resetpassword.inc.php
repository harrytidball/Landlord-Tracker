<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['reset-password-submit'])) {
 
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../resetpassword.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=empty");
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../resetpassword.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=pwdnotsame");
        exit();
    } else if (strlen($password) < 6) {
        header("Location: ../resetpassword.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=passwordlength");
        exit();
    } else if (!preg_match('~[0-9]+~', $password)) {
        header("Location: ../resetpassword.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=notnumeric");
        exit();
    } else if (ctype_digit($password) == true) {
        header("Location: ../resetpassword.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=notnumeric");
        exit();
    } else {

    $currentDate = date("U");

    $sql = "SELECT pwdResetToken FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck == 0) {
            header("Location: ../forgotpassword.php?error=resubmit");
            exit();
        }
    }

    $sql = "SELECT pwdResetToken FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt); 
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $token = $row['pwdResetToken'];
        }
    }

    $sql = "SELECT pwdResetEmail FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);     
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $tokenEmail = $row['pwdResetEmail'];
        }
    }
    
    //$tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($validator, $token);
    if ($tokenCheck === false) {
       header("Location: ../forgotpassword.php?error=invalidemail");
        exit();
    } else if ($tokenCheck === true) {
        $sql = "UPDATE customer_details SET user_password=? WHERE user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL error.";
        } else {
            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
            mysqli_stmt_execute($stmt);

            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL error.";
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt); 
                session_start();
                header("Location: ../login.php?success=passwordupdated");
                exit(); 
            }
            
        }
    }
}
    mysqli_stmt_close($stmt);
    mysql_close($conn);
}
