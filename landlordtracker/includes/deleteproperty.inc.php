<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['delete-property'])) {

    $property = $_SESSION["property"];
    if ($property == "10") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "9") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "8") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 2, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "7") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 3, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "6") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 4, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "5") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 5, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "4") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 6, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "3") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 7, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "2") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 8, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    } else if ($property == "1") {
        $sql = "SELECT address_id FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 9, 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $propertyPicked = $row['address_id'];
    }



$sql = "DELETE FROM address WHERE address_id = '$propertyPicked';";
if(mysqli_query($conn, $sql)) { 
    echo "Property was deleted successfully."; 
}  


$nullValue = "0";

$sql = "UPDATE customer_details SET property_one = ? WHERE property_one = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}


$sql = "UPDATE customer_details SET property_two = ? WHERE property_two = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}


$sql = "UPDATE customer_details SET property_three = ? WHERE property_three = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}


$sql = "UPDATE customer_details SET property_four = ? WHERE property_four = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}


$sql = "UPDATE customer_details SET property_five = ? WHERE property_five = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

$sql = "UPDATE customer_details SET property_six = ? WHERE property_six = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

$sql = "UPDATE customer_details SET property_seven = ? WHERE property_seven = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

$sql = "UPDATE customer_details SET property_eight = ? WHERE property_eight = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

$sql = "UPDATE customer_details SET property_nine = ? WHERE property_nine = '$propertyPicked';";
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
 echo "SQL statement failed";
} else {
 mysqli_stmt_bind_param($stmt, "i", $nullValue);
 mysqli_stmt_execute($stmt);
}

$sql = "UPDATE customer_details SET property_ten = ? WHERE property_ten = '$propertyPicked';";
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

