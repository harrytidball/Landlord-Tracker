<?php
    session_start();
    include_once 'includes/dbh.inc.php';
    $contractorChosen = $_POST['contractors'];

    $_SESSION["contractors"] = $contractorChosen;
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
    <h1 class="dashboard-title"><a href="dashboard.php" 
        id="title-one">Dash</a><a href="dashboard.php"><span style="color:#F64C72">board</span></a></h1>
    <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
    
<form action="includes/logout.inc.php" method="post">
<button type="submit" id="log-out-link">Log Out</button>
</form>
   <div class="property-name">
    <?php
$sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_name'];  
    ?>
    </div>
    </div>
    
    <span style="font-size: 25px;"><a href="dashboard.php" id="go-back-link">Go Back</a></span>      
    
    <h3 class="heading"><a href="#" data-target="deletecontractor" class="nav-link">Delete Contractor</a></h3>

    
<br>
        <p class="contractor-types">Contractor Name: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_name'];  
        ?></span></p>
        
        <p class="contractor-types">Contact Number: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_contact_no FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_contact_no'];  
        ?></span></p>
        
        <p class="contractor-types">Email: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_email FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_email'];  
        ?></span></p>
        
<p class="contractor-types">Job Description: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_job_desc FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_job_desc'];  
        ?></span></p>
        
        <p class="contractor-types">Current Role: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_role FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_role'];  
        ?></span></p>

<p class="contractor-types" id="update-contractor-link"><a href="#" data-target="updatecontractor" class="nav-link">
    Update Contractor</a></p>

</div>

<div class="page" id="updatecontractor">
<div class="header">
<h1 class="dashboard-title"><a href="dashboard.php" 
        id="title-one">Dash</a><a href="dashboard.php"><span style="color:#F64C72">board</span></a></h1>
                <h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>
                <div class="property-name">
                <?php

$sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_name'];  
                ?>
                </div>
                </div>
        
                <h3 class="heading">Update Details</h3>

                <span style="font-size: 25px;"><a href="#" data-target="home" 
                    class="nav-link" id="go-back-link">Go Back</a></span>  
                    <br><br>
                    <form action="includes/updatecontractor.inc.php" method="post" onkeypress="return event.keyCode != 13;">
                    <h1 class="contractor-detail-new">Contractor Name:   <input type="text" 
                        name="contractor-name" placeholder="<?php
                        $sql = "SELECT contractor_name FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row['contractor_name'] == NULL) {
                            echo "Enter Name";
                        } else {
                            echo $row['contractor_name'];
                        }
            ?>" autocomplete="off"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Contact Number:   <input type="tel"
                    onkeydown="javascript: return event.keyCode === 8 ||
                    event.keyCode === 46 || event.keyCode === 9 ? true : !isNaN(Number(event.key))"
                        name="contractor-no" placeholder="<?php
                        $sql = "SELECT contractor_contact_no FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row['contractor_contact_no'] == NULL || $row['contractor_contact_no'] == 0) {
                            echo "Enter Number";
                        } else {
                            echo $row['contractor_contact_no'];
                        } 
            ?>" autocomplete="new-password"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Email:   <input type="email"
                        name="contractor-email" placeholder="<?php
                        $sql = "SELECT contractor_email FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row['contractor_email'] == NULL) {
                            echo "Enter Email";
                        } else {
                            echo $row['contractor_email'];
                        }
            ?>" autocomplete="new-password"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Job Description:   <input type="text" 
                        name="contractor-job-desc" placeholder="<?php
                        $sql = "SELECT contractor_job_desc FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row['contractor_job_desc'] == NULL) {
                            echo "e.g. Plumber";
                        } else {
                            echo $row['contractor_job_desc'];
                        }   
            ?>" autocomplete="off"></h1>
                        <br><br><br><br>
                        <h1 class="contractor-detail-new">Current Role:   <input type="text" 
                        name="contractor-role" placeholder="<?php
                        $sql = "SELECT contractor_role FROM contractors WHERE id = '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row['contractor_role'] == NULL) {
                            echo "e.g. Working on Broken Boiler";
                        } else {
                            echo $row['contractor_role'];
                        }   
            ?>" autocomplete="off"></h1>

                        <button type="submit" name="add-submit" id="update-contractor-btn">Update</button>

</div>

<div class="page" id="deletecontractor">

<div class="header">
<h1 class="dashboard-title"><a href="dashboard.php" 
        id="title-one">Dash</a><a href="dashboard.php"><span style="color:#F64C72">board</span></a></h1>
<h2 class="landlord-tracker-title">Landlord<span style="color:#F64C72">Tracker</span></h2>

<form action="includes/logout.inc.php" method="post">
<button type="submit" id="log-out-link">Log Out</button>
</form>
<div class="property-name">
<?php

$sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_name'];  
?>
</div>
</div>

<span style="font-size: 25px;"><a href="#" data-target="home" 
class="nav-link" id="go-back-link">Go Back</a></span>  

<br><br><br>
                    <h3 class="delete-warning">Are you sure you wish to delete the following contractor?</h3>

                    <h3 class="delete-warning-address"><?php
                             $sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_array($result);
                             echo $row['contractor_name'];  
                             
            ?></h3>
            <br>
            <h3 class="delete-warning"><form action="includes/deletecontractor.inc.php" method="post">
        <button type="submit" name="delete-contractor" id="delete-link">Yes</button>
        </form>
        <br><br>
<a href="#" data-target="home" class="nav-link">No</a></h3>

</div>


</main>
<script src="js/app.js"></script>
    </body>
</html>