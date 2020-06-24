<?php
session_start();
include_once 'dbh.inc.php';

    $userId = $_SESSION['userId'];

    $contractorName = $_POST['contractor-name'];
    $contractorNo = $_POST['contractor-no'];
    $contractorEmail = $_POST['contractor-email'];
    $contractorJobDesc = $_POST['contractor-job-desc'];
    $contractorRole = $_POST['contractor-role'];

    $sql = "INSERT into contractors (id, contractor_name, contractor_contact_no, contractor_email, contractor_job_desc, 
    contractor_role) VALUES (?, ?, ?, ?, ?, ?);";

$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "isssss", $userId, $contractorName, $contractorNo, $contractorEmail, $contractorJobDesc, $contractorRole);
    // Run parameters inside database
    mysqli_stmt_execute($stmt);
}

header("Location: ../dashboard.php");
exit();