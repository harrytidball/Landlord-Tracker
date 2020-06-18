<?php
    session_start();
    include_once 'includes/dbh.inc.php';
    $propertyChosen = $_POST['properties'];

    if ($propertyChosen == "1") {
        $_SESSION["property"] = "5";
    } else if ($propertyChosen == "1, 1") {
        $_SESSION["property"] = "4";
    } else if ($propertyChosen == "2, 1") {
        $_SESSION["property"] = "3";
    } else if ($propertyChosen == "3, 1") {
        $_SESSION["property"] = "2";
    } else if ($propertyChosen == "4, 1") {
        $_SESSION["property"] = "1";
    }

    $years = 0;
    $months = 0;

?>

<!DOCTYPE html>
<html>
<link href= "css\main.css" rel = "stylesheet">
<link href= "css\dashboard.css" rel = "stylesheet">
    <head>
        <title>Landlord Tracker | Dashboard</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.png">

        </head>
    <body>
        <body style="margin: 0px 0px 0px 0px;">

        <main>
        <div class="page active" id="home">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                <div class="property-name">
                <?php
                  $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo $row['address_line_one'];
                ?>
                </div>
                

             
        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>

                </div>
        
                <span style="font-size: 25px;"><a href="dashboard.php" id="go-back-link">Go Back</a></span>    

                <h3 class="heading"><a href="#" data-target="deleteproperty" class="nav-link">Delete Property</a></h3>
  
                <li class="property-menu"><a href="#" data-target="expenses" class="nav-link">Expenses</a></li>
                <li class="property-menu"><a href="#" data-target="renttenantdetails" class="nav-link">Rent and Tenant Details</a></li>
                <li class="property-menu"><a href="#" data-target="profitloss" class="nav-link">Profit/Loss</a></li>
                <li class="property-menu"><a href="#" data-target="propertydetails" class="nav-link">Property Details</a></li>
                <li class="property-menu"><a href="#" data-target="updatedetails" class="nav-link">Update Details</a></li>

                
        </div>

        <div class="page" id="deleteproperty">
        <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                <div class="property-name">
                <?php

$sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['address_line_one'];  

                ?>

                </div>
               
                <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>
                </div>
                <?php
                $property = $_SESSION["property"];
                   if ($property == "1") {
                    $sql = "SELECT property_one FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $propertyPicked = $row['property_one'];
                } else if ($property == "2") {
                    $sql = "SELECT property_two FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $propertyPicked = $row['property_two'];
                } else if ($property == "3") {
                    $sql = "SELECT property_three FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $propertyPicked = $row['property_three'];
                } else if ($property == "4") {
                    $sql = "SELECT property_four FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $propertyPicked = $row['property_four'];
                } else if ($property == "5") {
                    $sql = "SELECT property_five FROM customer_details WHERE id = '" . $_SESSION['userId'] . "';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $propertyPicked = $row['property_five'];
                }
                ?>
        
      
        
                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>  
                    <br><br><br>
                    <h3 class="delete-warning">Are you sure you wish to delete the following property?</h3>

                    <h3 class="delete-warning-address"><?php
                             $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                             $result = mysqli_query($conn, $sql);
                             $resultCheck = mysqli_num_rows($result);   
     
                             if ($resultCheck > 0) {
                             while ($row = mysqli_fetch_assoc($result)) {
                             echo $row['address_line_one']; 
                             if ($row['address_line_two'] !== "") {
                             echo ", ";
                             echo $row['address_line_two'];
                             }
                             if ($row['address_line_three'] !== "") {
                             echo ", ";
                             echo $row['address_line_three'];
                             }
                             if ($row['city_county'] !== "") {
                             echo ", ";
                             echo $row['city_county'];
                             }
                             if ($row['post_code'] !== "") {
                             echo ", ";
                             echo $row['post_code'];
                             }
                             }
                             }
            ?></h3>
            <br>
            <h3 class="delete-warning"><form action="includes/deleteproperty.inc.php" method="post">
        <button type="submit" name="delete-property" id="delete-link">Yes</button>
        </form>
        <br><br>
<a href="#" data-target="home" class="nav-link">No</a></h3>
        </div>

        <div class="page" id="updatedetails">
        <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                <div class="property-name">
                <?php

$sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['address_line_one'];  

                ?>
                </div>
                </div>

                <h3 class="heading">Update Details</h3>
        
                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>     

                    <div class="row-add-property">
                    <div class="column-add-property">

                    <br><br>
                    <form action="includes/updatedetails.inc.php" method="post" onkeypress="return event.keyCode != 13;">
                    <h1 class="property-detail-new">Property Deposit: £ <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="original-deposit" placeholder="<?php
                        $sql = "SELECT deposit FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row['deposit'];  
            ?>" autocomplete="off"></h1>
                        <h1 class="property-detail-new">Date of Purchase:   <input type="date"
                        name="purchase-date" placeholder="dd/mm/yyyy" autocomplete="off"></h1>
                        <h1 class="property-detail-new">Property Value When Purchased: £   <input type="number" 
                    onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="original-value" placeholder="<?php
              $sql = "SELECT original_value FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo $row['original_value'];  
                        ?>" autocomplete="off"></h1>
                    <h1 class="property-detail-new">Current Property Value: £   <input type="number" 
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="current-value" placeholder="<?php
                               $sql = "SELECT current_value FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                               $result = mysqli_query($conn, $sql);
                               $row = mysqli_fetch_array($result);
                               echo $row['current_value'];  
                        ?>" autocomplete="off"></h1>
                    <h1 class="property-detail-new">Address:<br><input type="text"
                        name="address-line-one" placeholder="<?php           
            $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo $row['address_line_one'];  
                        ?>" autocomplete="off"><br><input type="text"
                        name="address-line-two" placeholder="<?php
                                                               $sql = "SELECT address_line_two FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                                               $result = mysqli_query($conn, $sql);    
                                                               $row = mysqli_fetch_array($result);                                                      
                                                             
                                                                        if ($row['address_line_two'] !== "") {
                                                                        echo $row['address_line_two'];
                                                                        } else {
                                                                            echo "Address Line Two (Optional)";
                                                                        }

                                                                
                        ?>" autocomplete="off"><br><input type="text"
                        name="address-line-three" placeholder="<?php
                                                    $sql = "SELECT address_line_three FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                                    $result = mysqli_query($conn, $sql);    
                                                    $row = mysqli_fetch_array($result);
                                                                     
                                                             if ($row['address_line_three'] !== "") {
                                                             echo $row['address_line_three'];
                                                             } else {
                                                                 echo "Address Line Three (Optional)";
                                                             }
                        ?>" autocomplete="off"><input type="text"
                        name="city-county" placeholder="<?php
              $sql = "SELECT city_county FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              if ($row['city_county'] !== "") {
              echo $row['city_county'];  
              } else {
                  echo "City/County";
              }
                        ?>" autocomplete="off"><br><input type="text"
                        name="post-code" placeholder="<?php
            $sql = "SELECT post_code FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            if ($row['post_code'] !== "") {
            echo $row['post_code'];
            } else {
                echo "Post Code";
            }
                ?>" autocomplete="off"></h1>  
                </div>
                    <div class="column-add-property">
                        <br><br>
                    <h1 class="rent-tenant-detail-new">Rent Amount: £   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="rent-amount" placeholder="<?php
                       $sql = "SELECT rent_amount FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                       $result = mysqli_query($conn, $sql);
                       $row = mysqli_fetch_array($result);
                       echo $row['rent_amount'];  
                        
                        ?>" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Number of Payments Missed By Tenant:   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="no-payments-missed" placeholder="<?php
            $sql = "SELECT number_of_payments_missed FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo $row['number_of_payments_missed'];  
                        ?>" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Rent Due Date:   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="rent-date" placeholder="<?php
                $sql = "SELECT rent_due_date FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $rentDueDate = $row['rent_due_date']; 

                if ($rentDueDate == 0) {
                    echo "e.g. 28";
                    } else {
                        echo $rentDueDate;
                    }
                        ?>" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Name:   <input type="text"
                        name="tenant-name" placeholder="<?php
                      $sql = "SELECT tenant_name FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      if ($row['tenant_name'] !== "") {
                        echo $row['tenant_name'];
                        } else {
                            echo "Enter Name";
                        }  
                        ?>" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Contact Number:   <input type="tel"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="contact-no" placeholder="<?php
                               $sql = "SELECT tenant_contact_number FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                               $result = mysqli_query($conn, $sql);
                               $row = mysqli_fetch_array($result);
                               if ($row['tenant_contact_number'] !== "") {
                                echo $row['tenant_contact_number'];
                                } else {
                                    echo "Enter Number";
                                }
                        ?>" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Email:   <input type="email"
                        name="tenant-email" placeholder="<?php
                  $sql = "SELECT tenant_email FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  if ($row['tenant_email'] !== "") {
                    echo $row['tenant_email'];
                    } else {
                        echo "Enter Email";
                    }
                        ?>" autocomplete="off"></h1>

                        <a href="#" data-target="updatedetailstwo" 
                    class="nav-link" id="update-btn-proceed">Next</a>        
                
                </div>
                </div>

            </div>

            <div class="page" id="updatedetailstwo">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                <div class="property-name">
                <?php

$sql = "SELECT address_line_one FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['address_line_one'];  
                ?>
                </div>
                </div>
        
                <h3 class="heading">Update Details</h3>

                <span style="font-size: 25px;"><a href="#" data-target="updatedetails" 
                    class="nav-link" id="go-back-link">Go Back</a></span>    
        
                <div class="row">
                    <form id="update-property-form-two">
                    <div class="column"><span style="font-weight: 350">Monthly Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Mortgage Payment: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="mgte-payment" placeholder="<?php
                                   $sql = "SELECT mortgage_payment FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                   $result = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_array($result);
                                   echo $row['mortgage_payment'];  
                            ?>"></p>
                        <p class="expense-types-new">Agency Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="agency-monthly" placeholder="<?php
                                   $sql = "SELECT agency_fees_monthly FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                   $result = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_array($result);
                                   echo $row['agency_fees_monthly'];  
                            ?>"></p>
                        <p class="expense-types-new">Household Bills: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="bills-monthly" placeholder="<?php
                                        $sql = "SELECT household_bills FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['household_bills'];  
                            ?>"></p>
                        <p class="expense-types-new">Landlord Insurance: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="landlord-monthly" placeholder="<?php
                                      $sql = "SELECT landlord_insurance FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                      $result = mysqli_query($conn, $sql);
                                      $row = mysqli_fetch_array($result);
                                      echo $row['landlord_insurance'];  
                            ?>"></p>
                                   <span class="tooltiptextadd">Any costs incurred on a monthly basis. Agency fees refers to
                            any fees incurred from the property being managed by an agency. Household bills include
                            any bills that the tenant does not pay.</span></div>
                    </div>
                    <div class="column"><span style="font-weight: 350">Upfront Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Agency Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="agency-upfront" placeholder="<?php
                                           $sql = "SELECT agency_fees FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                           $result = mysqli_query($conn, $sql);
                                           $row = mysqli_fetch_array($result);
                                           echo $row['agency_fees'];   
                            ?>"></p>
                        <p class="expense-types-new">Stamp Duty: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="stampduty-upfront" placeholder="<?php
                                              $sql = "SELECT stamp_duty FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                              $result = mysqli_query($conn, $sql);
                                              $row = mysqli_fetch_array($result);
                                              echo $row['stamp_duty'];  
                            ?>"></p>
                        <p class="expense-types-new">Solicitor's Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="solicitors-upfront" placeholder="<?php
                                             $sql = "SELECT solicitors_fees FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                             $result = mysqli_query($conn, $sql);
                                             $row = mysqli_fetch_array($result);
                                             echo $row['solicitors_fees'];  
                            ?>"></p>
                                  <span class="tooltiptextadd">Costs incurred when the property was purchased. Agency fees refer
                                to the cost of having an agency find a tenant.
                            </span></div>
                    </div>
                    <div class="column"><span style="font-weight: 350">Other Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Repairs: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="repairs-other" placeholder="<?php
                                                                   $sql = "SELECT repairs FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                                                   $result = mysqli_query($conn, $sql);
                                                                   $row = mysqli_fetch_array($result);
                                                                   echo $row['repairs'];  
                            ?>"></p>
                        <p class="expense-types-new">Miscellaneous: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="misc-other" placeholder="<?php
                                                                   $sql = "SELECT misc FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                                                   $result = mysqli_query($conn, $sql);
                                                                   $row = mysqli_fetch_array($result);
                                                                   echo $row['misc'];  
                            ?>"></p>
                              <span class="tooltiptextadd">Includes any repair costs that accumulate during ownership of the property.
                                Any other costs not listed can be included in miscellaneous.
                            </span></div>

                            <button type="submit" name="submit" id="btn-update">Update</button>

                    </form>
                     
                    </form> 

                    </div>
                  </div>
            </div>



        <div class="page" id="expenses">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                
        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>
               <div class="property-name">
                <?php

$sql = "SELECT address_line_one FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['address_line_one'];  
                ?>
                </div>
                </div>
                
                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>     
                
                <h3 class="heading">Expenses</h3>
        
                <div class="row">
                    <div class="column"><span style="font-weight: 350">Monthly Costs</span>
                        <p class="expense-types">Mortgage Payment: <span style="color:#F64C72">£<?php
                $sql = "SELECT mortgage_payment FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo $row['mortgage_payment'];  
                    ?></span></p>
                        <p class="expense-types">Agency Fees: <span style="color:#F64C72">£<?php
                   $sql = "SELECT agency_fees_monthly FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                   $result = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_array($result);
                   echo $row['agency_fees_monthly'];  
                        ?></span></p>
                        <p class="expense-types">Household Bills: <span style="color:#F64C72">£<?php
                $sql = "SELECT household_bills FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo $row['household_bills'];  
                        ?></span></p>
                        <p class="expense-types">Landlord Insurance: <span style="color:#F64C72">£<?php
     $sql = "SELECT landlord_insurance FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
     echo $row['landlord_insurance'];  
                        ?></span></p>
                        <p class="expense-types"><span style="color:#F64C72"><span style="font-weight: 350">Total: £<?php
                             $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                             $result = mysqli_query($conn, $sql);
                             $resultCheck = mysqli_num_rows($result);
         
                             if ($resultCheck > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                    $mortgagePayment = $row['mortgage_payment'];
                                    $rentAmount = $row['rent_amount'];
                                    $agencyMonthly = $row['agency_fees_monthly'];
                                     $householdBills = $row['household_bills'];
                                     $landlordInsurance = $row['landlord_insurance'];
                            echo number_format($mortgagePayment + $agencyMonthly + $householdBills + $landlordInsurance);
                                 }
                                }
                                 
                    ?></span></span></p>
                    </div>
                    <div class="column"><span style="font-weight: 350">Upfront Costs</span>
                        <p class="expense-types">Agency Fees: <span style="color:#F64C72">£<?php
      $sql = "SELECT agency_fees FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      echo $row['agency_fees']; 
                        ?></span></p>
                        <p class="expense-types">Stamp Duty: <span style="color:#F64C72">£<?php
         $sql = "SELECT stamp_duty FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($result);
         echo $row['stamp_duty']; 
                        ?></span></p>
                        <p class="expense-types">Solicitor's Fees: <span style="color:#F64C72">£<?php
     $sql = "SELECT solicitors_fees FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
     echo $row['solicitors_fees']; 
                        ?></span></p>
                        <p class="expense-types"><span style="color:#F64C72"><span style="font-weight: 350">Total: £<?php
                                $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
            
                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $agencyUpfront = $row['agency_fees'];
                                        $stampDuty = $row['stamp_duty'];
                                        $solicitorsFees = $row['solicitors_fees'];
                                        echo number_format($agencyUpfront + $stampDuty + $solicitorsFees);
                                    }
                                }
                                      ?>
                    </div>
                    <div class="column"><span style="font-weight: 350">Other Costs</span>
                        <p class="expense-types">Repairs: <span style="color:#F64C72">£<?php
          $sql = "SELECT repairs FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);
          echo $row['repairs']; 
                        ?></span></p>
                        <p class="expense-types">Miscellaneous: <span style="color:#F64C72">£<?php
                       $sql = "SELECT misc FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                       $result = mysqli_query($conn, $sql);
                       $row = mysqli_fetch_array($result);
                       echo $row['misc']; 
                        ?></span></p>
                        <p class="expense-types"><span style="color:#F64C72"><span style="font-weight: 350">Total: £<?php
                                   $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                   $result = mysqli_query($conn, $sql);
                                   $resultCheck = mysqli_num_rows($result);
               
                                   if ($resultCheck > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                           $repairs = $row['repairs'];
                                           $misc = $row['misc'];
                                           echo number_format($repairs + $misc);
                                       }
                                    }
                                      ?>
                    </div>
                  </div>
        </div>

        <div class="page" id="renttenantdetails">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                
        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>

        <div class="property-name">
                <?php
     
     $sql = "SELECT address_line_one FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
     echo $row['address_line_one'];  
                ?>
                </div>
                </div>
                
              <a href="#" data-target="home" class="nav-link" id="go-back-link">Go Back</a> 
                
                <h3 class="heading">Rent and Tenant Details</h3>

                <h1 class="rent-tenant-detail">Rent Amount: <span style="color:#F64C72">£<?php
                         $sql = "SELECT rent_amount FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_array($result);
                         echo $row['rent_amount']; 
                        ?></span></h1>
                <h1 class="rent-tenant-detail">Number of Payments Missed By Tenant: <span style="color:#F64C72"><?php
                         $sql = "SELECT number_of_payments_missed FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_array($result);
                         echo $row['number_of_payments_missed']; 
                ?></span></h1>
                               <h1 class="rent-tenant-detail">Tenant Arrears: <span style="color:#F64C72">£<?php
               $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
               $result = mysqli_query($conn, $sql);
               $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $paymentsMissed = $row['number_of_payments_missed'];

                    echo number_format($rentAmount * $paymentsMissed);
                    }
                    }
                
        
            ?></span></h1>
                <h1 class="rent-tenant-detail">Rent Due Date: <span style="color:#F64C72"><?php
                                      $sql = "SELECT rent_due_date FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                      $result = mysqli_query($conn, $sql);
                                      $row = mysqli_fetch_array($result);
                                      if ($rentDueDate !== '0') {
                                      echo $rentDueDate; 
                                      }
                           if ($rentDueDate == 1 || $rentDueDate == 21 || $rentDueDate == 31) {
                               echo "st";
                           } else if ($rentDueDate == 2 || $rentDueDate == 22) {
                                echo "nd"; 
                           } else if ($rentDueDate == 3 || $rentDueDate == 23) {
                                echo "rd";
                           } else if ($rentDueDate == 4 || $rentDueDate == 5 || $rentDueDate == 6 || 
                           $rentDueDate == 7 || $rentDueDate == 8 || $rentDueDate == 9 || $rentDueDate == 10 || 
                           $rentDueDate == 11 || $rentDueDate == 12 || $rentDueDate == 13 || $rentDueDate == 14 || 
                           $rentDueDate == 15 || $rentDueDate == 16 || $rentDueDate == 17 || $rentDueDate == 18 || 
                           $rentDueDate == 19 || $rentDueDate == 20 || $rentDueDate == 24 || $rentDueDate == 25 || 
                           $rentDueDate == 26 || $rentDueDate == 27 || $rentDueDate == 28 || $rentDueDate == 29 || 
                           $rentDueDate == 30) {
                               echo "th";
                           }
                        
                       
            ?></span></h1>
                <h1 class="rent-tenant-detail">Tenant Name: <span style="color:#F64C72"><?php
                                 $sql = "SELECT tenant_name FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                 $result = mysqli_query($conn, $sql);
                                 $row = mysqli_fetch_array($result);
                                 echo $row['tenant_name']; 
            ?></span></h1>
                <h1 class="rent-tenant-detail">Contact Number: <span style="color:#F64C72"><?php
                          $sql = "SELECT tenant_contact_number FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_array($result);
                          echo $row['tenant_contact_number']; 
            ?></span></h1>
                <h1 class="rent-tenant-detail">Email: <span style="color:#F64C72"><?php
                             $sql = "SELECT tenant_email FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_array($result);
                             echo $row['tenant_email']; 
           ?></span></h1>
        </div>

        <div class="page" id="propertydetails">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                
        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>

                <div class="property-name">
                <?php
                    $sql = "SELECT address_line_one FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['address_line_one']; 
                ?>
                </div>

                </div>

                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>     
                
                    <h3 class="heading">Property Details</h3>

        
                <h1 class="property-detail">Original Property Value: <span style="color:#F64C72">£<?php
                      $sql = "SELECT original_value FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['original_value']; 
            ?></span></h1>
                <h1 class="property-detail">Current Property Value: <span style="color:#F64C72">£<?php
                     $sql = "SELECT current_value FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_fetch_array($result);
                     echo $row['current_value']; 
            ?></span></h1>
                <h1 class="property-detail">Original Deposit: <span style="color:#F64C72">£<?php
                      $sql = "SELECT deposit FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      $deposit = $row['deposit']; 
                      echo $deposit;
            ?></span></h1>
                <h1 class="property-detail">Date of Purchase: <span style="color:#F64C72"><?php
                               $sql = "SELECT date_of_purchase FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                               $result = mysqli_query($conn, $sql);
                               $row = mysqli_fetch_array($result);

                               if ($row['date_of_purchase'] !== "0000-00-00") {
                                $dateString = (string) $row['date_of_purchase'];
                                $newDate = date("d/m/Y", strtotime($dateString));
                                echo $newDate;
                               }
                                                           
            ?></span></h1>
                       <h1 class="property-detail">Time Since Purchase: <span style="color:#F64C72"><?php
                                 $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                                 $result = mysqli_query($conn, $sql);
                                 $resultCheck = mysqli_num_rows($result);
         
                                 if ($resultCheck > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                  $dateString = (string) $row['date_of_purchase'];
                                  if ($dateString !== "0000-00-00") {
                                  $time1 = strtotime($dateString);
                                  $time2 = strtotime(date("Y/m/d"));
                                    
                        

                                  $diff = abs($time2-$time1);

                                  $years = floor($diff / (365*60*60*24));  

                                  $months = floor(($diff - $years * 365*60*60*24) 
                                / (30*60*60*24)); 

                                $days = floor(($diff - $years * 365*60*60*24 -  
                                 $months*30*60*60*24)/ (60*60*24));

                                if ($years == 1) {
                                    echo $years, " Year, ";
                                }
                                else if ($years > 1) {
                                    echo $years, " Years, ";
                                }
                                if ($months == 1) {
                                    echo $months, " Month, ";
                                }
                                else if ($months > 1) {
                                    echo $months, " Months, ";
                                }
                                if ($days == 1) {
                                    echo $days, " Day";
                                }
                                else if ($days > 1) {
                                    echo $days, " Days";
                                }
                            }
                                
                                 }
                                 }
                       ?></span></h1>
                <h1 class="property-detail">Address: <span style="color:#F64C72"><?php
                             $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                             $result = mysqli_query($conn, $sql);
                             $resultCheck = mysqli_num_rows($result);   
     
                             if ($resultCheck > 0) {
                             while ($row = mysqli_fetch_assoc($result)) {
                             echo $row['address_line_one']; 
                             if ($row['address_line_two'] !== "") {
                             echo ", ";
                             echo $row['address_line_two'];
                             }
                             if ($row['address_line_three'] !== "") {
                             echo ", ";
                             echo $row['address_line_three'];
                             }
                             if ($row['city_county'] !== "") {
                             echo ", ";
                             echo $row['city_county'];
                             }
                             if ($row['post_code'] !== "") {
                             echo ", ";
                             echo $row['post_code'];
                             }
                             }
                             }
            ?></span></h1>
        </div>

        <div class="page" id="profitloss">
        <div class="header">
            <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
            <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
            
        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>

        <div class="property-name">
                <?php
                $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['address_line_one']; 

                    }
                }
                ?>
                </div>
            </div>
            
            <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>    

            <h3 class="heading">Profit/Loss</h3>


            <div class="row-3">
            <div class="column-3">
                <br><br><br><br>
                <div class="tooltip">
            <h1 class="profit-loss-detail">Monthly Net Profit: <span style="color:#F64C72">£<?php
                    $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
         
                 
                   $monthlyNet = $rentAmount - $mortgagePayment - $agencyMonthly - $householdBills - $landlordInsurance;
                   echo number_format($monthlyNet);
                        } 
                    }
       
           ?></span></h1>
            <span class="tooltiptext">The net profit once monthly expenses are deducted.</span></div>

            <div class="tooltip">
          <h1 class="profit-loss-detail">Return on Investment: <span style="color:#F64C72"><?php
                $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $yearsToMonths = 0;
                        if ($years > 0) {
                            $yearsToMonths = $years * 12;
                        }
                        if ($months > 0) {
                            $repairsProRata = ((12 / $months + $yearsToMonths) * $repairs);
                        } else if ($yearsToMonths > 0) {
                            $repairsProRata = ((12 / $yearsToMonths) * $repairs);
                        } else {
                            $repairsProRata = $repairs;
                        }
                        if ($months > 0) {
                            $miscProRata = ((12 / $months + $yearsToMonths) * $misc);
                        } else if ($yearsToMonths > 0) {
                            $miscProRata = ((12 / $yearsToMonths) * $misc);
                        } else {
                            $miscProRata = $misc;
                        }

                        $yearlyRent = $rentAmount * (12 - $paymentsMissed);
                        $yearlyCosts = (($mortgagePayment + $agencyMonthly + $householdBills + $landlordInsurance) * 12)
                        + $repairsProRata + $miscProRata;
                        $yearlyProfit = $yearlyRent - $yearlyCosts;
                        $cashInvested = $deposit + $agencyUpfront + $stampDuty + $solicitorsFees;

                        if ($yearlyProfit > 0 && $cashInvested > 0) {
                        $ROI = ($yearlyProfit / $cashInvested) * 100;
                        echo (int)$ROI;
                        } 

                    }
                }

            ?>%</span></h1>
             <span class="tooltiptext">The yearly ROI of the property. This takes into account all upfront expenses e.g. stamp duty
             and any other additional repair costs.</span></div>
             <div class="tooltip">
            <h1 class="profit-loss-detail">Property Value Increase: <span style="color:#F64C72"><?php
                $sql = "SELECT * FROM address WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT $propertyChosen;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $currentValue = $row['current_value'];
                        $originalValue = $row['original_value'];

                        if ($originalValue > 0 && $currentValue > 0) {
                        $percentageIncrease = ((($currentValue / $originalValue) * 100) - 100);
                        
                   
                        if ($percentageIncrease > 0) {
                            echo "+" . (int) $percentageIncrease;
                        } else {
                            echo (int) $percentageIncrease;
                        }
                    }
                }
            }

        
            ?>%</span></h1>
               <span class="tooltiptext">The increase or decrease in value since ownership began. Remember to keep 
               updating the current value to receive an accurate figure.</span></div>
 
            </div>
            <div class="column-3">
            <div class="tooltip">
                <br><br><br>       <br>

            <h1 class="projected-detail">Projected Net Profit: </h1>
            <h1 class="projected-detail">1 Year: <span style="color:#F64C72">£<?php
            echo number_format(($monthlyNet * 12) - $repairsProRata - $miscProRata);
            ?></span></h1>
            <h1 class="projected-detail">5 Years: <span style="color:#F64C72">£<?php
            echo number_format((($monthlyNet * 12) - $repairsProRata - $miscProRata) * 5);
            ?></span></h1>
            <h1 class="projected-detail">10 Years: <span style="color:#F64C72">£<?php
            echo number_format((($monthlyNet * 12) - $repairsProRata - $miscProRata) * 10);
            ?></span></h1>
            <h1 class="projected-detail">25 Years: <span style="color:#F64C72">£<?php
            echo number_format((($monthlyNet * 12) - $repairsProRata - $miscProRata) * 25);
            ?></span></h1>
             <span class="tooltiptext">The anticipated net profit based on the current monthly profit and previous
             repair/miscellaneous costs.</span></div>
            </div>
        </div>

        </main> 
<script src="js/app.js"></script>
    </body>
</html>