<?php
session_start();
include_once 'dbh.inc.php';

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

    if (isset($originalDeposit) && trim($originalDeposit) !== '') {
    $sql = "UPDATE address SET deposit = ? WHERE address_id = '$propertyPicked';";
   $stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "d", $originalDeposit);
    mysqli_stmt_execute($stmt);
}
    }

    if (isset($purchaseDate) && trim($purchaseDate) !== '') {
        $sql = "UPDATE address SET date_of_purchase = ? WHERE address_id = '$propertyPicked';";
       $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $purchaseDate);
        mysqli_stmt_execute($stmt);
    }
        }

    if (isset($originalValue) && trim($originalValue) !== '') {
        $sql = "UPDATE address SET original_value = ? WHERE address_id = '$propertyPicked';";
    
       $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "d", $originalValue);
        mysqli_stmt_execute($stmt);
    }
        }

        if (isset($currentValue) && trim($currentValue) !== '') {
            $sql = "UPDATE address SET current_value = ? WHERE address_id = '$propertyPicked';";
        
           $stmt = mysqli_stmt_init($conn);
        // Prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "d", $currentValue);
            mysqli_stmt_execute($stmt);
        }
            }

            if (isset($lineOne) && trim($lineOne) !== '') {
                $sql = "UPDATE address SET address_line_one = ? WHERE address_id = '$propertyPicked';";
            
               $stmt = mysqli_stmt_init($conn);
            // Prepare the prepared statement
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_bind_param($stmt, "s", $lineOne);
                mysqli_stmt_execute($stmt);
            }
                }

                if (isset($lineTwo) && trim($lineTwo) !== '') {
                    $sql = "UPDATE address SET address_line_two = ? WHERE address_id = '$propertyPicked';";
                
                   $stmt = mysqli_stmt_init($conn);
                // Prepare the prepared statement
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $lineTwo);
                    mysqli_stmt_execute($stmt);
                }
                    }

                    if (isset($lineThree) && trim($lineThree) !== '') {
                        $sql = "UPDATE address SET address_line_three = ? WHERE address_id = '$propertyPicked';";
                    
                       $stmt = mysqli_stmt_init($conn);
                    // Prepare the prepared statement
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $lineThree);
                        mysqli_stmt_execute($stmt);
                    }
                        }

                        if (isset($cityCounty) && trim($cityCounty) !== '') {
                            $sql = "UPDATE address SET city_county = ? WHERE address_id = '$propertyPicked';";
                        
                           $stmt = mysqli_stmt_init($conn);
                        // Prepare the prepared statement
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed";
                        } else {
                            mysqli_stmt_bind_param($stmt, "s", $cityCounty);
                            mysqli_stmt_execute($stmt);
                        }
                            }

                            if (isset($postCode) && trim($postCode) !== '') {
                                $sql = "UPDATE address SET post_code = ? WHERE address_id = '$propertyPicked';";
                            
                               $stmt = mysqli_stmt_init($conn);
                            // Prepare the prepared statement
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "SQL statement failed";
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $postCode);
                                mysqli_stmt_execute($stmt);
                            }
                                }

                                if (isset($rentAmount) && trim($rentAmount) !== '') {
                                    $sql = "UPDATE address SET rent_amount = ? WHERE address_id = '$propertyPicked';";
                                
                                   $stmt = mysqli_stmt_init($conn);
                                // Prepare the prepared statement
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "SQL statement failed";
                                } else {
                                    mysqli_stmt_bind_param($stmt, "d", $rentAmount);
                                    mysqli_stmt_execute($stmt);
                                }
                                    }

                                    if (isset($paymentsMissed) && trim($paymentsMissed) !== '') {
                                        $sql = "UPDATE address SET number_of_payments_missed = ? WHERE address_id = '$propertyPicked';";
                                    
                                       $stmt = mysqli_stmt_init($conn);
                                    // Prepare the prepared statement
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed";
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "i", $paymentsMissed);
                                        mysqli_stmt_execute($stmt);
                                    }
                                        }

                                        if (isset($rentDate) && trim($rentDate) !== '') {
                                            $sql = "UPDATE address SET rent_due_date = ? WHERE address_id = '$propertyPicked';";
                                        
                                           $stmt = mysqli_stmt_init($conn);
                                        // Prepare the prepared statement
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            echo "SQL statement failed";
                                        } else {
                                            mysqli_stmt_bind_param($stmt, "i", $rentDate);
                                            mysqli_stmt_execute($stmt);
                                        }
                                            }

                                            if (isset($tenantName) && trim($tenantName) !== '') {
                                                $sql = "UPDATE address SET tenant_name = ? WHERE address_id = '$propertyPicked';";
                                            
                                               $stmt = mysqli_stmt_init($conn);
                                            // Prepare the prepared statement
                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                echo "SQL statement failed";
                                            } else {
                                                mysqli_stmt_bind_param($stmt, "s", $tenantName);
                                                mysqli_stmt_execute($stmt);
                                            }
                                                }

                                                if (isset($contactNo) && trim($contactNo) !== '') {
                                                    $sql = "UPDATE address SET tenant_contact_number = ? WHERE address_id = '$propertyPicked';";
                                                
                                                   $stmt = mysqli_stmt_init($conn);
                                                // Prepare the prepared statement
                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                    echo "SQL statement failed";
                                                } else {
                                                    mysqli_stmt_bind_param($stmt, "s", $contactNo);
                                                    mysqli_stmt_execute($stmt);
                                                }
                                                    }

                                                    if (isset($tenantEmail) && trim($tenantEmail) !== '') {
                                                        $sql = "UPDATE address SET tenant_email = ? WHERE address_id = '$propertyPicked';";
                                                    
                                                       $stmt = mysqli_stmt_init($conn);
                                                    // Prepare the prepared statement
                                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                        echo "SQL statement failed";
                                                    } else {
                                                        mysqli_stmt_bind_param($stmt, "s", $tenantEmail);
                                                        mysqli_stmt_execute($stmt);
                                                    }
                                                        }

                                                        if (isset($mortgagePayment) && trim($mortgagePayment) !== '') {
                                                            $sql = "UPDATE address SET mortgage_payment = ? WHERE address_id = '$propertyPicked';";
                                                        
                                                           $stmt = mysqli_stmt_init($conn);
                                                        // Prepare the prepared statement
                                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                            echo "SQL statement failed";
                                                        } else {
                                                            mysqli_stmt_bind_param($stmt, "d", $mortgagePayment);
                                                            mysqli_stmt_execute($stmt);
                                                        }
                                                            }

                                                            if (isset($agencyMonthly) && trim($agencyMonthly) !== '') {
                                                                $sql = "UPDATE address SET agency_fees_monthly = ? WHERE address_id = '$propertyPicked';";
                                                            
                                                               $stmt = mysqli_stmt_init($conn);
                                                            // Prepare the prepared statement
                                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                echo "SQL statement failed";
                                                            } else {
                                                                mysqli_stmt_bind_param($stmt, "d", $agencyMonthly);
                                                                mysqli_stmt_execute($stmt);
                                                            }
                                                                }

                                                                if (isset($billsMonthly) && trim($billsMonthly) !== '') {
                                                                    $sql = "UPDATE address SET household_bills = ? WHERE address_id = '$propertyPicked';";
                                                                
                                                                   $stmt = mysqli_stmt_init($conn);
                                                                // Prepare the prepared statement
                                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                    echo "SQL statement failed";
                                                                } else {
                                                                    mysqli_stmt_bind_param($stmt, "d", $billsMonthly);
                                                                    mysqli_stmt_execute($stmt);
                                                                }
                                                                    }

                                                                    if (isset($landlordInsurance) && trim($landlordInsurance) !== '') {
                                                                        $sql = "UPDATE address SET landlord_insurance = ? WHERE address_id = '$propertyPicked';";
                                                                    
                                                                       $stmt = mysqli_stmt_init($conn);
                                                                    // Prepare the prepared statement
                                                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                        echo "SQL statement failed";
                                                                    } else {
                                                                        mysqli_stmt_bind_param($stmt, "d", $landlordInsurance);
                                                                        mysqli_stmt_execute($stmt);
                                                                    }
                                                                        }

                                                                        if (isset($agencyUpfront) && trim($agencyUpfront) !== '') {
                                                                            $sql = "UPDATE address SET agency_fees = ? WHERE address_id = '$propertyPicked';";
                                                                        
                                                                           $stmt = mysqli_stmt_init($conn);
                                                                        // Prepare the prepared statement
                                                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                            echo "SQL statement failed";
                                                                        } else {
                                                                            mysqli_stmt_bind_param($stmt, "d", $agencyUpfront);
                                                                            mysqli_stmt_execute($stmt);
                                                                        }
                                                                            }

                                                                            if (isset($stampDuty) && trim($stampDuty) !== '') {
                                                                                $sql = "UPDATE address SET stamp_duty = ? WHERE address_id = '$propertyPicked';";
                                                                            
                                                                               $stmt = mysqli_stmt_init($conn);
                                                                            // Prepare the prepared statement
                                                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                echo "SQL statement failed";
                                                                            } else {
                                                                                mysqli_stmt_bind_param($stmt, "d", $stampDuty);
                                                                                mysqli_stmt_execute($stmt);
                                                                            }
                                                                                }

                                                                                if (isset($solicitorsFees) && trim($solicitorsFees) !== '') {
                                                                                    $sql = "UPDATE address SET solicitors_fees = ? WHERE address_id = '$propertyPicked';";
                                                                                
                                                                                   $stmt = mysqli_stmt_init($conn);
                                                                                // Prepare the prepared statement
                                                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                    echo "SQL statement failed";
                                                                                } else {
                                                                                    mysqli_stmt_bind_param($stmt, "d", $solicitorsFees);
                                                                                    mysqli_stmt_execute($stmt);
                                                                                }
                                                                                    }

                                                                                    if (isset($repairs) && trim($repairs) !== '') {
                                                                                        $sql = "UPDATE address SET repairs = ? WHERE address_id = '$propertyPicked';";
                                                                                    
                                                                                       $stmt = mysqli_stmt_init($conn);
                                                                                    // Prepare the prepared statement
                                                                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                        echo "SQL statement failed";
                                                                                    } else {
                                                                                        mysqli_stmt_bind_param($stmt, "d", $repairs);
                                                                                        mysqli_stmt_execute($stmt);
                                                                                    }
                                                                                        }

                                                                                        if (isset($misc) && trim($misc) !== '') {
                                                                                            $sql = "UPDATE address SET misc = ? WHERE address_id = '$propertyPicked';";
                                                                                        
                                                                                           $stmt = mysqli_stmt_init($conn);
                                                                                        // Prepare the prepared statement
                                                                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                            echo "SQL statement failed";
                                                                                        } else {
                                                                                            mysqli_stmt_bind_param($stmt, "d", $misc);
                                                                                            mysqli_stmt_execute($stmt);
                                                                                        }
                                                                                            }   
                                                                                            session_start();
                                                                                            header("Location: ../dashboard");
                                                                                            exit();
?>