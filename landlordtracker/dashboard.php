<?php
    session_start();
    include_once 'includes/dbh.inc.php';
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

        <form action="includes/logout.inc.php" method="post">
        <button type="submit" id="log-out-link">Log Out</button>
        </form>

        </div>

        <?php
        $sql = "SELECT COUNT(*) as propertyTotal FROM address WHERE id = '" . $_SESSION['userId'] . "';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $amountOfProperties = $row['propertyTotal'];  
        ?>
    
        <li class="home-menu"><form method="post" action="dashboardtwo.php">
            
            <select name="properties" onchange="this.form.submit();">
            <option value="">Select Property</option>
    
            <option value="1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
            </li></option>
    
            <option value="1, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 1, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
           </li></option>
    
            <option value="2, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 2, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
           </li></option>
    
           <option value="3, 1">
           <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 3, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
           </li></option>
    
            <option value="4, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 4, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

          <option value="5, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 5, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

          <option value="6, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 6, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

          <option value="7, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 7, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

          <option value="8, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 8, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

          <option value="9, 1">
            <li class="choose-property">
            <?php
                      $sql = "SELECT address_line_one FROM address WHERE id = '" . $_SESSION['userId'] . "' ORDER BY address_id DESC LIMIT 9, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['address_line_one'];  
            ?>
          </li></option>

            </select>
            </form></li>
        
        <li class="home-menu"><a href="#" data-target="addnewpropertyone" class="nav-link"><?php
        if ($amountOfProperties < 10) {
            echo "Add New Property";
        } 
        ?></a></li>
     
     <li class="home-menu-error">
     <?php
        if ($amountOfProperties > 9) {
            echo "Add New Property <br> (You have reached the maximum of 10)";
        } 
        ?></a>
        </div>


        <div class="page" id="addnewpropertyone">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                </div>

                <h3 class="heading">Add New Property</h3>
        
                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>            
        
                <div class="row-add-property">
                    <div class="column-add-property">

                    <br><br>
                    <form action="includes/addproperty.inc.php" method="post" onkeypress="return event.keyCode != 13;">
                    <h1 class="property-detail-new">Property Deposit: £   <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="original-deposit" placeholder="Enter Deposit" autocomplete="off"></h1>
                        <h1 class="property-detail-new">Date of Purchase:   <input type="date"
                        name="purchase-date" placeholder="dd/mm/yyyy" autocomplete="off"></h1>
                        <h1 class="property-detail-new">Property Value When Purchased: £   <input type="number" 
                    onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="original-value" placeholder="Enter Value" autocomplete="off"></h1>
                    <h1 class="property-detail-new">Current Property Value: £   <input type="number" 
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="current-value" placeholder="Enter Value" autocomplete="off"></h1>

                    <h1 class="property-detail-new">Address:<br><input type="text"
                        name="address-line-one" placeholder="Address Line One" autocomplete="off"><br><input type="text"
                        name="address-line-two" placeholder="Address Line Two (Optional)" autocomplete="off"><br><input type="text"
                        name="address-line-three" placeholder="Address Line Three (Optional)" autocomplete="off"><input type="text"
                        name="city-county" placeholder="City/County" autocomplete="off"><br><input type="text"
                        name="post-code" placeholder="Post Code" autocomplete="off"></h1>  
                </div>
                    <div class="column-add-property">
                        <br><br>
                    <h1 class="rent-tenant-detail-new">Rent Amount: £   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="rent-amount" placeholder="Enter Rent" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Number of Payments Missed By Tenant:   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="no-payments-missed" placeholder="Enter Value" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Rent Due Date:   <input type="number"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="rent-date" placeholder="e.g. 28" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Name:   <input type="text"
                        name="tenant-name" placeholder="Enter Name" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Contact Number:   <input type="tel"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="contact-no" placeholder="Enter Number" autocomplete="off"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Email:   <input type="email"
                        name="tenant-email" placeholder="Enter Email" autocomplete="off"></h1>

                        <a href="#" data-target="addnewpropertytwo" 
                    class="nav-link" id="btn-proceed">Next</a>        
                
                </div>
                </div>
        </div>

        <div class="page" id="addnewpropertytwo">
            <div class="header">
                <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                </div>
        
                <h3 class="heading">Add New Property</h3>

                <span style="font-size: 25px;"><a href="#" data-target="addnewpropertyone" 
                    class="nav-link" id="go-back-link">Go Back</a></span>    
        
                <div class="row">
                    <form id="add-property-form-two">
                 
          
                    <div class="column"><span style="font-weight: 350">Monthly Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Mortgage Payment: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="mgte-payment" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Agency Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="agency-monthly" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Household Bills: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="bills-monthly" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Landlord Insurance: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="landlord-monthly" placeholder="Enter Value"></p>
                            <span class="tooltiptextadd">Any costs incurred on a monthly basis. Agency fees refers to
                            any fees incurred from the property being managed by an agency. Household bills include
                            any bills that the tenant does not pay.</span></div>
                    </div>
                    <div class="column"><span style="font-weight: 350">Upfront Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Agency Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="agency-upfront" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Stamp Duty: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="stampduty-upfront" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Solicitor's Fees: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="solicitors-upfront" placeholder="Enter Value"></p>
                            <span class="tooltiptextadd">Costs incurred when the property was purchased. Agency fees refer
                                to the cost of having an agency find a tenant.
                            </span></div>
                    </div>
                    <div class="column"><span style="font-weight: 350">Other Costs</span>
                    <div class="tooltipadd">
                        <p class="expense-types-new">Repairs: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="repairs-other" placeholder="Enter Value"></p>
                        <p class="expense-types-new">Miscellaneous: <input type="number"
                        onkeydown="javascript: return event.keyCode === 8 ||
                        event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                            name="misc-other" placeholder="Enter Value"></p>
                            <span class="tooltiptextadd">Includes any repair costs that accumulate during ownership of the property.
                                Any other costs not listed can be included in miscellaneous.
                            </span></div>

                            <button type="submit" name="add-submit" id="btn-create">Create</button>

                    </form>
                     
                    </form> 

                    </div>
                  </div>
        </div>



</main> 
<script src="js/app.js"></script>
    </body>
</html>