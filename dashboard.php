<?php
    session_start();
    include_once 'includes/dbh.inc.php';

    if ((empty($_SESSION['userId']))) {
        header('Location: http://landlordtracker.co.uk');
        exit;
       }
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
        <h1 class="dashboard-title"><a href="dashboard" 
        id="title-one">Dash</a><a href="dashboard"><span style="color:#F64C72">board</span></a></h1>
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

        $sql = "SELECT COUNT(*) as contractorTotal FROM contractors WHERE id = '" . $_SESSION['userId'] . "';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $amountOfContractors = $row['contractorTotal'];  
        ?>

<div class="row-home">
  <div class="column-home">
    
        <li class="home-menu"><form method="post" action="property">
            
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
        ?></li>

            </div>

            <div class="column-home">

            <li class="home-menu"><form method="post" action="contractor">

<select name="contractors" onchange="this.form.submit();">

        <option value="">Select Contractor</option>
            <option value="1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="1, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 1, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="2, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 2, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="3, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 3, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="4, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 4, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="5, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 5, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="6, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 6, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="7, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 7, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="8, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 8, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
            </li></option>
            <option value="9, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 9, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="10, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 10, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="11, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 11, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="12, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 12, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="13, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 13, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="14, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 14, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="15, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 15, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="16, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 16, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="17, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 17, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="18, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 18, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>
        <option value="19, 1">
            <li class="choose-contractor">
            <?php
                      $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT 19, 1;";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result);
                      echo $row['contractor_name'];  
            ?>
        </li></option>

</select>
</form></li> 

<li class="home-menu"><a href="#" data-target="addcontractor" class="nav-link"><?php
        if ($amountOfContractors < 20) {
            echo "Add New Contractor";
        } 
        ?></a></li>
     
     <li class="home-menu-error">
     <?php
        if ($amountOfContractors > 19) {
            echo "Add New Contractor <br> (You have reached the maximum of 20)";
        } 
        ?></a>

        </div>
        </div>
</div>

<div class="page" id="addcontractor">
            <div class="header">
            <h1 class="dashboard-title"><a href="dashboard" 
        id="title-one">Dash</a><a href="dashboard"><span style="color:#F64C72">board</span></a></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                </div>

                <h3 class="heading">Add New Contractor</h3>
        
                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span> 
                <br><br>
                    <form action="includes/addcontractor.inc.php" method="post" onkeypress="return event.keyCode != 13;">
                    <h1 class="contractor-detail-new">Contractor Name:   <input type="text" 
                        name="contractor-name" placeholder="Enter Name" autocomplete="off"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Contact Number:   <input type="tel"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="contractor-no" placeholder="Enter Number" autocomplete="new-password"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Email:   <input type="email"
                        name="contractor-email" placeholder="Enter Email" autocomplete="new-password"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Job Description:   <input type="text" 
                        name="contractor-job-desc" placeholder="e.g. Plumber" autocomplete="off"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Current Role:   <input type="text" 
                        name="contractor-role" placeholder="e.g. Working on Broken Boiler" autocomplete="off"></h1>

                        <button type="submit" name="add-submit" id="btn-create-two">Create</button>
                                             
                    </form> 
                    </div>

        <div class="page" id="addnewpropertyone">
            <div class="header">
            <h1 class="dashboard-title"><a href="dashboard" 
        id="title-one">Dash</a><a href="dashboard"><span style="color:#F64C72">board</span></a></h1>
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
                        name="address-line-one" placeholder="Address Line One" ><br><input type="text"
                        name="address-line-two" placeholder="Address Line Two (Optional)" ><br><input type="text"
                        name="address-line-three" placeholder="Address Line Three (Optional)" autocomplete="none"><input type="text"
                        name="city-county" placeholder="City/County" autocomplete="none"><br><input type="text"
                        name="post-code" placeholder="Post Code" autocomplete="none"></h1>  
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
                        name="contact-no" placeholder="Enter Number" autocomplete="new-password"></h1>
                    <h1 class="rent-tenant-detail-new">Tenant Email:   <input type="email"
                        name="tenant-email" placeholder="Enter Email" autocomplete="new-password"></h1>

                        <div class="tooltipaddproperty">
                        <a href="#" data-target="addnewpropertytwo" 
                    class="nav-link" id="btn-proceed">Next</a>   
                    <span class="tooltiptextaddproperty">You can edit these details at any time.<br> 
                    You can leave details empty if preferred.</span></div>     
                
                </div>
                </div>
        </div>


        <div class="page" id="addnewpropertytwo">
            <div class="header">
            <h1 class="dashboard-title"><a href="dashboard" 
        id="title-one">Dash</a><a href="dashboard"><span style="color:#F64C72">board</span></a></h1>
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

                    </div>
                  </div>
        </div>



</main> 
<script src="js/app.js"></script>
    </body>
</html>