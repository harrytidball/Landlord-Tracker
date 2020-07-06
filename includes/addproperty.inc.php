<?php
session_start();
include_once 'dbh.inc.php';

    $userId = $_SESSION['userId'];

    $originalDeposit = $_POST['original-deposit'];    
    $purchaseDate = $_POST['purchase-date'];
    $originalValue = $_POST['original-value'];
    $currentValue = $_POST['current-value'];

    $lineOne = $_POST['address-line-one'];
    $lineTwo = $_POST['address-line-two'];
    $lineThree = $_POST['address-line-three'];
    $cityCounty = $_POST['city-county'];
    $postCode = $_POST['post-code'];
    $rentAmount = $_POST['rent-amount'];
    $paymentsMissed = $_POST['no-payments-missed'];
    $rentDate = $_POST['rent-date'];
    $tenantName = $_POST['tenant-name'];
    $contactNo = $_POST['contact-no'];
    $tenantEmail = $_POST['tenant-email'];

    $mortgagePayment = $_POST['mgte-payment'];
    $agencyMonthly = $_POST['agency-monthly'];
    $billsMonthly = $_POST['bills-monthly'];
    $landlordInsurance = $_POST['landlord-monthly'];

    $agencyUpfront = $_POST['agency-upfront'];
    $stampDuty = $_POST['stampduty-upfront'];
    $solicitorsFees = $_POST['solicitors-upfront'];

    $repairs = $_POST['repairs-other'];
    $misc = $_POST['misc-other'];
   

$sql = "INSERT INTO address (id, deposit, date_of_purchase, original_value, current_value, address_line_one, address_line_two, 
address_line_three, city_county, post_code, rent_amount, number_of_payments_missed, rent_due_date, tenant_name,
tenant_contact_number, tenant_email, mortgage_payment, agency_fees_monthly, household_bills, landlord_insurance,
agency_fees, stamp_duty, solicitors_fees, repairs, misc) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "idsddsssssdiisssddddddddd", $userId, $originalDeposit, $purchaseDate, $originalValue, $currentValue, 
    $lineOne, $lineTwo, $lineThree, $cityCounty, $postCode, $rentAmount, $paymentsMissed, $rentDate, $tenantName, $contactNo, 
    $tenantEmail, $mortgagePayment, $agencyMonthly, $billsMonthly, $landlordInsurance, $agencyUpfront, $stampDuty, $solicitorsFees, 
    $repairs, $misc);
    // Run parameters inside database
    mysqli_stmt_execute($stmt);
}

$sql = "SELECT property_one FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyOne = $row['property_one'];
$sql = "SELECT property_two FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyTwo = $row['property_two'];
$sql = "SELECT property_three FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyThree = $row['property_three'];
$sql = "SELECT property_four FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyFour = $row['property_four'];
$sql = "SELECT property_five FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyFive = $row['property_five'];
$sql = "SELECT property_six FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertySix = $row['property_six'];
$sql = "SELECT property_seven FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertySeven = $row['property_seven'];
$sql = "SELECT property_eight FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyEight = $row['property_eight'];
$sql = "SELECT property_nine FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyNine = $row['property_nine'];
$sql = "SELECT property_ten FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$propertyTen = $row['property_ten'];

    if ($propertyOne == 0 || $propertyOne == NULL) {
// Retrieving the address ID for the user's first created property
$sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$addressIdOne = $row['address_id'];
    
$sql = "UPDATE customer_details SET property_one = ? WHERE id = '" . $_SESSION['userId'] . "';";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "i", $addressIdOne);
    mysqli_stmt_execute($stmt);
} 
} else if (($propertyTwo == 0 || $propertyTwo == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdTwo = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_two = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdTwo);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyThree == 0 || $propertyThree == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdThree = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_three = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdThree);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyFour == 0 || $propertyFour == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdFour = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_four = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdFour);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyFive == 0 || $propertyFive == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdFive = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_five = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdFive);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertySix == 0 || $propertySix == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL) && ($propertyFive !== 0 || $propertyFive !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdSix = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_six = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdSix);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertySeven == 0 || $propertySeven == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL) && ($propertyFive !== 0 || $propertyFive !== NULL) && 
($propertySix !== 0 || $propertySix !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdSeven = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_seven = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdSeven);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyEight == 0 || $propertyEight == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL) && ($propertyFive !== 0 || $propertyFive !== NULL) && 
($propertySix !== 0 || $propertySix !== NULL) && ($propertySeven !== 0 || $propertySeven !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdEight = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_eight = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdEight);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyNine == 0 || $propertyNine == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL) && ($propertyFive !== 0 || $propertyFive !== NULL) && 
($propertySix !== 0 || $propertySix !== NULL) && ($propertySeven !== 0 || $propertySeven !== NULL) 
&& ($propertyEight !== 0 || $propertyEight !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdNine = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_nine = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdNine);
        mysqli_stmt_execute($stmt);
    } 
} else if (($propertyTen == 0 || $propertyTen == NULL) && ($propertyOne !== 0 || $propertyOne !== NULL) && 
($propertyTwo !== 0 || $propertyTwo !== NULL) && ($propertyThree !== 0 || $propertyThree !== NULL)
&& ($propertyFour !== 0 || $propertyFour !== NULL) && ($propertyFive !== 0 || $propertyFive !== NULL) && 
($propertySix !== 0 || $propertySix !== NULL) && ($propertySeven !== 0 || $propertySeven !== NULL) 
&& ($propertyEight !== 0 || $propertyEight !== NULL) && ($propertyNine !== 0 || $propertyNine !== NULL)) {
    $sql = "SELECT address_id FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $addressIdTen = $row['address_id'];
        
        $sql = "UPDATE customer_details SET property_ten = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $addressIdTen);
        mysqli_stmt_execute($stmt);
    } 
} 


header("Location: ../dashboard");
exit();