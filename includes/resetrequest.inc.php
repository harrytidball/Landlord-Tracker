<?php

if (isset($_POST["reset-request-submit"])) {

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "SELECT user_email FROM customer_details WHERE user_email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed.";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck == 0) {
            header("Location: ../forgotpassword.php?error=invalidemail");
            exit();
        }
    }

    $selector = bin2hex(random_bytes(8));
    $token = bin2hex(random_bytes(32));

 
    $url = "www.landlordtracker.co.uk/resetpassword.php?selector=" . $selector . "&validator=" . $token;

    $expires = date("U") + 1800;

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was a deletion error.";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt); 
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an insertion error.";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt); 
    }

mysqli_stmt_close($stmt);
mysqli_close($conn);

$to = $userEmail;
$subject = "Reset your password for Landlord Tracker";
$message = "We received a password reset request. If you did
not make this request, you can ignore this email. This link will be valid for 30 minutes. Here is your password reset link: 
<a href=$url>Reset Password</a>";

$headers = "From: Landlord Tracker <support@landlordtracker.co.uk>\r\n";
$headers .= "Reply-To: support@landlordtracker.co.uk\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $headers);

header("Location: ../forgotpassword.php?reset=success");

} else {
    header("Location ../index.php");
}