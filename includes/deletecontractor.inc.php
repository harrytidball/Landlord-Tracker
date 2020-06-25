<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['delete-contractor'])) {

$contractor = $_SESSION["contractors"];

$sql = "SELECT contractor_id FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id 
DESC LIMIT $contractor;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorPicked = $row['contractor_id'];


$sql = "DELETE FROM contractors WHERE contractor_id = '$contractorPicked';";
if(mysqli_query($conn, $sql)) { 
    echo "Contractor was deleted successfully."; 
}  

$nullValue = "0";

$sql = "UPDATE customer_details SET contractor_one = ? WHERE contractor_one = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_two = ? WHERE contractor_two = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_three = ? WHERE contractor_three = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_four = ? WHERE contractor_four = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_five = ? WHERE contractor_five = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_six = ? WHERE contractor_six = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_seven = ? WHERE contractor_seven = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_eight = ? WHERE contractor_eight = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_nine = ? WHERE contractor_nine = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_ten = ? WHERE contractor_ten = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_eleven = ? WHERE contractor_eleven = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_twelve = ? WHERE contractor_twelve = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_thirteen = ? WHERE contractor_thirteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_fourteen = ? WHERE contractor_fourteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_fifteen = ? WHERE contractor_fifteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_sixteen = ? WHERE contractor_sixteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_seventeen = ? WHERE contractor_seventeen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_eighteen = ? WHERE contractor_eighteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_nineteen = ? WHERE contractor_nineteen = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}
$sql = "UPDATE customer_details SET contractor_twenty = ? WHERE contractor_twenty = '$contractorPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

mysqli_close($conn); 

}
session_start();
header("Location: ../dashboard.php");
exit();