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

$sql = "SELECT contractor_one FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorOne = $row['contractor_one'];
$sql = "SELECT contractor_two FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorTwo = $row['contractor_two'];
$sql = "SELECT contractor_three FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorThree = $row['contractor_three'];
$sql = "SELECT contractor_four FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorFour = $row['contractor_four'];
$sql = "SELECT contractor_five FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorFive = $row['contractor_five'];
$sql = "SELECT contractor_six FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorSix = $row['contractor_six'];
$sql = "SELECT contractor_seven FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorSeven = $row['contractor_seven'];
$sql = "SELECT contractor_eight FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorEight = $row['contractor_eight'];
$sql = "SELECT contractor_nine FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorNine = $row['contractor_nine'];
$sql = "SELECT contractor_ten FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorTen = $row['contractor_ten'];
$sql = "SELECT contractor_eleven FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorEleven = $row['contractor_eleven'];
$sql = "SELECT contractor_twelve FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorTwelve = $row['contractor_twelve'];
$sql = "SELECT contractor_thirteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorThirteen = $row['contractor_thirteen'];
$sql = "SELECT contractor_fourteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorFourteen = $row['contractor_fourteen'];
$sql = "SELECT contractor_fifteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorFifteen = $row['contractor_fifteen'];
$sql = "SELECT contractor_sixteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorSixteen = $row['contractor_sixteen'];
$sql = "SELECT contractor_seventeen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorSeventeen = $row['contractor_seventeen'];
$sql = "SELECT contractor_eighteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorEighteen = $row['contractor_eighteen'];
$sql = "SELECT contractor_nineteen FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorNineteen = $row['contractor_nineteen'];
$sql = "SELECT contractor_twenty FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$contractorTwenty = $row['contractor_twenty'];

if ($contractorOne == 0 || $contractorOne == NULL) {
    $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
    contractor_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $contractorIdOne = $row['contractor_id'];
        
    $sql = "UPDATE customer_details SET contractor_one = ? WHERE id = '" . $_SESSION['userId'] . "';";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $contractorIdOne);
        mysqli_stmt_execute($stmt);
    } 
    } else if (($contractorTwo == 0 || $contractorTwo == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL)) {
        $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
        contractor_id DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $contractorIdTwo = $row['contractor_id'];
            
        $sql = "UPDATE customer_details SET contractor_two = ? WHERE id = '" . $_SESSION['userId'] . "';";
        
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "i", $contractorIdTwo);
            mysqli_stmt_execute($stmt);
        } 
        } else if (($contractorThree == 0 || $contractorThree == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
        ($contractorTwo !== 0 || $contractorTwo !== NULL)) {
            $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
            contractor_id DESC LIMIT 1;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $contractorIdThree = $row['contractor_id'];
                
            $sql = "UPDATE customer_details SET contractor_three = ? WHERE id = '" . $_SESSION['userId'] . "';";
            
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_bind_param($stmt, "i", $contractorIdThree);
                mysqli_stmt_execute($stmt);
            } 
            } else if (($contractorFour == 0 || $contractorFour == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
            ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL)) {
                $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                contractor_id DESC LIMIT 1;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $contractorIdFour = $row['contractor_id'];
                    
                $sql = "UPDATE customer_details SET contractor_four = ? WHERE id = '" . $_SESSION['userId'] . "';";
                
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $contractorIdFour);
                    mysqli_stmt_execute($stmt);
                } 
                } else if (($contractorFive == 0 || $contractorFive == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                && ($contractorFour !== 0 || $contractorFour !== NULL)) {
                    $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                    contractor_id DESC LIMIT 1;";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $contractorIdFive = $row['contractor_id'];
                        
                    $sql = "UPDATE customer_details SET contractor_five = ? WHERE id = '" . $_SESSION['userId'] . "';";
                    
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $contractorIdFive);
                        mysqli_stmt_execute($stmt);
                    } 
                    } else if (($contractorSix == 0 || $contractorSix == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                    ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                    && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL)) {
                        $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                        contractor_id DESC LIMIT 1;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $contractorIdSix = $row['contractor_id'];
                            
                        $sql = "UPDATE customer_details SET contractor_six = ? WHERE id = '" . $_SESSION['userId'] . "';";
                        
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed";
                        } else {
                            mysqli_stmt_bind_param($stmt, "i", $contractorIdSix);
                            mysqli_stmt_execute($stmt);
                        } 
                        } else if (($contractorSeven == 0 || $contractorSeven == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                        ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                        && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                        && ($contractorSix !== 0 || $contractorSix !== NULL)) {
                            $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                            contractor_id DESC LIMIT 1;";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            $contractorIdSeven = $row['contractor_id'];
                                
                            $sql = "UPDATE customer_details SET contractor_seven = ? WHERE id = '" . $_SESSION['userId'] . "';";
                            
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "SQL statement failed";
                            } else {
                                mysqli_stmt_bind_param($stmt, "i", $contractorIdSeven);
                                mysqli_stmt_execute($stmt);
                            } 
                            } else if (($contractorEight == 0 || $contractorEight == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                            ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                            && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                            && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL)) {
                                $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                contractor_id DESC LIMIT 1;";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                $contractorIdEight = $row['contractor_id'];
                                    
                                $sql = "UPDATE customer_details SET contractor_eight = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "SQL statement failed";
                                } else {
                                    mysqli_stmt_bind_param($stmt, "i", $contractorIdEight);
                                    mysqli_stmt_execute($stmt);
                                } 
                                } else if (($contractorNine == 0 || $contractorNine == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                && ($contractorEight !== 0 || $contractorEight !== NULL)) {
                                    $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                    contractor_id DESC LIMIT 1;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    $contractorIdNine = $row['contractor_id'];
                                        
                                    $sql = "UPDATE customer_details SET contractor_nine = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                    
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed";
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "i", $contractorIdNine);
                                        mysqli_stmt_execute($stmt);
                                    } 
                                    } else if (($contractorTen == 0 || $contractorTen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                    ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                    && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                    && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                    && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL)) {
                                        $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                        contractor_id DESC LIMIT 1;";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        $contractorIdTen = $row['contractor_id'];
                                            
                                        $sql = "UPDATE customer_details SET contractor_ten = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                        
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            echo "SQL statement failed";
                                        } else {
                                            mysqli_stmt_bind_param($stmt, "i", $contractorIdTen);
                                            mysqli_stmt_execute($stmt);
                                        } 
                                        } else if (($contractorEleven == 0 || $contractorEleven == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                        ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                        && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                        && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                        && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                        && ($contractorTen !== 0 || $contractorTen !== NULL)) {
                                            $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                            contractor_id DESC LIMIT 1;";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $contractorIdEleven = $row['contractor_id'];
                                                
                                            $sql = "UPDATE customer_details SET contractor_eleven = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                            
                                            $stmt = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                echo "SQL statement failed";
                                            } else {
                                                mysqli_stmt_bind_param($stmt, "i", $contractorIdEleven);
                                                mysqli_stmt_execute($stmt);
                                            } 
                                            } else if (($contractorTwelve == 0 || $contractorTwelve == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                            ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                            && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                            && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                            && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                            && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL)) {
                                                $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                contractor_id DESC LIMIT 1;";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_fetch_array($result);
                                                $contractorIdTwelve = $row['contractor_id'];
                                                    
                                                $sql = "UPDATE customer_details SET contractor_twelve = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                
                                                $stmt = mysqli_stmt_init($conn);
                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                    echo "SQL statement failed";
                                                } else {
                                                    mysqli_stmt_bind_param($stmt, "i", $contractorIdTwelve);
                                                    mysqli_stmt_execute($stmt);
                                                } 
                                                } else if (($contractorThirteen == 0 || $contractorThirteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                && ($contractorTwelve !== 0 || $contractorTwelve !== NULL)) {
                                                    $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                    contractor_id DESC LIMIT 1;";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_array($result);
                                                    $contractorIdThirteen = $row['contractor_id'];
                                                        
                                                    $sql = "UPDATE customer_details SET contractor_thirteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                    
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                        echo "SQL statement failed";
                                                    } else {
                                                        mysqli_stmt_bind_param($stmt, "i", $contractorIdThirteen);
                                                        mysqli_stmt_execute($stmt);
                                                    } 
                                                    } else if (($contractorFourteen == 0 || $contractorFourteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                    ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                    && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                    && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                    && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                    && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                    && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL)) {
                                                        $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                        contractor_id DESC LIMIT 1;";
                                                        $result = mysqli_query($conn, $sql);
                                                        $row = mysqli_fetch_array($result);
                                                        $contractorIdFourteen = $row['contractor_id'];
                                                            
                                                        $sql = "UPDATE customer_details SET contractor_fourteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                        
                                                        $stmt = mysqli_stmt_init($conn);
                                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                            echo "SQL statement failed";
                                                        } else {
                                                            mysqli_stmt_bind_param($stmt, "i", $contractorIdFourteen);
                                                            mysqli_stmt_execute($stmt);
                                                        } 
                                                        } else if (($contractorFifteen == 0 || $contractorFifteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                        ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                        && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                        && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                        && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                        && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                        && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                        && ($contractorFourteen !== 0 || $contractorFourteen !== NULL)) {
                                                            $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                            contractor_id DESC LIMIT 1;";
                                                            $result = mysqli_query($conn, $sql);
                                                            $row = mysqli_fetch_array($result);
                                                            $contractorIdFifteen = $row['contractor_id'];
                                                                
                                                            $sql = "UPDATE customer_details SET contractor_fifteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                            
                                                            $stmt = mysqli_stmt_init($conn);
                                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                echo "SQL statement failed";
                                                            } else {
                                                                mysqli_stmt_bind_param($stmt, "i", $contractorIdFifteen);
                                                                mysqli_stmt_execute($stmt);
                                                            } 
                                                            } else if (($contractorSixteen == 0 || $contractorSixteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                            ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                            && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                            && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                            && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                            && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                            && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                            && ($contractorFourteen !== 0 || $contractorFourteen !== NULL) && ($contractorFifteen !== 0 || $contractorFifteen !== NULL)) {
                                                                $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                                contractor_id DESC LIMIT 1;";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_array($result);
                                                                $contractorIdSixteen = $row['contractor_id'];
                                                                    
                                                                $sql = "UPDATE customer_details SET contractor_sixteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                                
                                                                $stmt = mysqli_stmt_init($conn);
                                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                    echo "SQL statement failed";
                                                                } else {
                                                                    mysqli_stmt_bind_param($stmt, "i", $contractorIdSixteen);
                                                                    mysqli_stmt_execute($stmt);
                                                                } 
                                                                } else if (($contractorSeventeen == 0 || $contractorSeventeen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                                ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                                && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                                && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                                && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                                && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                                && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                                && ($contractorFourteen !== 0 || $contractorFourteen !== NULL) && ($contractorFifteen !== 0 || $contractorFifteen !== NULL) 
                                                                && ($contractorSixteen !== 0 || $contractorSixteen !== NULL)) {
                                                                    $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                                    contractor_id DESC LIMIT 1;";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    $row = mysqli_fetch_array($result);
                                                                    $contractorIdSeventeen = $row['contractor_id'];
                                                                        
                                                                    $sql = "UPDATE customer_details SET contractor_seventeen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                                    
                                                                    $stmt = mysqli_stmt_init($conn);
                                                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                        echo "SQL statement failed";
                                                                    } else {
                                                                        mysqli_stmt_bind_param($stmt, "i", $contractorIdSixteen);
                                                                        mysqli_stmt_execute($stmt);
                                                                    } 
                                                                    } else if (($contractorEighteen == 0 || $contractorEighteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                                    ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                                    && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                                    && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                                    && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                                    && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                                    && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                                    && ($contractorFourteen !== 0 || $contractorFourteen !== NULL) && ($contractorFifteen !== 0 || $contractorFifteen !== NULL) 
                                                                    && ($contractorSixteen !== 0 || $contractorSixteen !== NULL) && ($contractorSeventeen !== 0 || $contractorSeventeen !== NULL)) {
                                                                        $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                                        contractor_id DESC LIMIT 1;";
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $row = mysqli_fetch_array($result);
                                                                        $contractorIdEighteen = $row['contractor_id'];
                                                                            
                                                                        $sql = "UPDATE customer_details SET contractor_eighteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                                        
                                                                        $stmt = mysqli_stmt_init($conn);
                                                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                            echo "SQL statement failed";
                                                                        } else {
                                                                            mysqli_stmt_bind_param($stmt, "i", $contractorIdEighteen);
                                                                            mysqli_stmt_execute($stmt);
                                                                        } 
                                                                        } else if (($contractorNineteen == 0 || $contractorNineteen == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                                        ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                                        && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                                        && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                                        && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                                        && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                                        && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                                        && ($contractorFourteen !== 0 || $contractorFourteen !== NULL) && ($contractorFifteen !== 0 || $contractorFifteen !== NULL) 
                                                                        && ($contractorSixteen !== 0 || $contractorSixteen !== NULL) && ($contractorSeventeen !== 0 || $contractorSeventeen !== NULL) 
                                                                        && ($contractorEighteen !== 0 || $contractorEighteen !== NULL)) {
                                                                            $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                                            contractor_id DESC LIMIT 1;";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            $row = mysqli_fetch_array($result);
                                                                            $contractorIdNineteen = $row['contractor_id'];
                                                                                
                                                                            $sql = "UPDATE customer_details SET contractor_nineteen = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                                            
                                                                            $stmt = mysqli_stmt_init($conn);
                                                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                echo "SQL statement failed";
                                                                            } else {
                                                                                mysqli_stmt_bind_param($stmt, "i", $contractorIdNineteen);
                                                                                mysqli_stmt_execute($stmt);
                                                                            } 
                                                                            } else if (($contractorTwenty == 0 || $contractorTwenty == NULL) && ($contractorOne !== 0 || $contractorOne !== NULL) && 
                                                                            ($contractorTwo !== 0 || $contractorTwo !== NULL) && ($contractorThree !== 0 || $contractorThree !== NULL) 
                                                                            && ($contractorFour !== 0 || $contractorFour !== NULL) && ($contractorFive !== 0 || $contractorFive !== NULL) 
                                                                            && ($contractorSix !== 0 || $contractorSix !== NULL) && ($contractorSeven !== 0 || $contractorSeven !== NULL) 
                                                                            && ($contractorEight !== 0 || $contractorEight !== NULL) && ($contractorNine !== 0 || $contractorNine !== NULL) 
                                                                            && ($contractorTen !== 0 || $contractorTen !== NULL) && ($contractorEleven !== 0 || $contractorEleven !== NULL) 
                                                                            && ($contractorTwelve !== 0 || $contractorTwelve !== NULL) && ($contractorThirteen !== 0 || $contractorThirteen !== NULL) 
                                                                            && ($contractorFourteen !== 0 || $contractorFourteen !== NULL) && ($contractorFifteen !== 0 || $contractorFifteen !== NULL) 
                                                                            && ($contractorSixteen !== 0 || $contractorSixteen !== NULL) && ($contractorSeventeen !== 0 || $contractorSeventeen !== NULL) 
                                                                            && ($contractorEighteen !== 0 || $contractorEighteen !== NULL) && ($contractorNineteen !== 0 || $contractorNineteen !== NULL)) {
                                                                                $sql = "SELECT contractor_id FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY 
                                                                                contractor_id DESC LIMIT 1;";
                                                                                $result = mysqli_query($conn, $sql);
                                                                                $row = mysqli_fetch_array($result);
                                                                                $contractorIdTwenty = $row['contractor_id'];
                                                                                    
                                                                                $sql = "UPDATE customer_details SET contractor_twenty = ? WHERE id = '" . $_SESSION['userId'] . "';";
                                                                                
                                                                                $stmt = mysqli_stmt_init($conn);
                                                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                    echo "SQL statement failed";
                                                                                } else {
                                                                                    mysqli_stmt_bind_param($stmt, "i", $contractorIdTwenty);
                                                                                    mysqli_stmt_execute($stmt);
                                                                                } 
                                                                                }
    

header("Location: ../dashboard.php");
exit();