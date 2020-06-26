<?php
session_start();
include_once 'dbh.inc.php';

$contractorName = $_POST['contractor-name'];
$contractorNo = $_POST['contractor-no'];
$contractorEmail = $_POST['contractor-email'];
$contractorJobDesc = $_POST['contractor-job-desc'];
$contractorRole = $_POST['contractor-role'];

$contractor = $_SESSION["contractors"];

$sql = "SELECT contractor_id FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id 
DESC LIMIT $contractor;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorPicked = $row['contractor_id'];

if (isset($contractorName) && trim($contractorName) !== '') {
    $sql = "UPDATE contractors SET contractor_name = ? WHERE contractor_id = '$contractorPicked';";
   $stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $contractorName);
    mysqli_stmt_execute($stmt);
}
    }
    
if (isset($contractorNo) && trim($contractorNo) !== '') {
    $sql = "UPDATE contractors SET contractor_contact_no = ? WHERE contractor_id = '$contractorPicked';";
   $stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $contractorNo);
    mysqli_stmt_execute($stmt);
}
    }
    
if (isset($contractorEmail) && trim($contractorEmail) !== '') {
    $sql = "UPDATE contractors SET contractor_email = ? WHERE contractor_id = '$contractorPicked';";
   $stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $contractorEmail);
    mysqli_stmt_execute($stmt);
}
    }

    if (isset($contractorJobDesc) && trim($contractorJobDesc) !== '') {
        $sql = "UPDATE contractors SET contractor_job_desc = ? WHERE contractor_id = '$contractorPicked';";
       $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $contractorJobDesc);
        mysqli_stmt_execute($stmt);
    }
        }
        
if (isset($contractorRole) && trim($contractorRole) !== '') {
    $sql = "UPDATE contractors SET contractor_role = ? WHERE contractor_id = '$contractorPicked';";
   $stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $contractorRole);
    mysqli_stmt_execute($stmt);
}
    }
    session_start();
    header("Location: ../dashboard.php");
    exit();
?>