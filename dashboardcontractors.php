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
    <h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
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

    
<br><br><br>
        <p class="expense-types">Contractor Name: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_name FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_name'];  
        ?></span></p>
        <br>
        <p class="expense-types">Contact Number: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_contact_no FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_contact_no'];  
        ?></span></p>
        <br>
        <p class="expense-types">Email: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_email FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_email'];  
        ?></span></p>
        <br>
<p class="expense-types">Job Description: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_job_desc FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_job_desc'];  
        ?></span></p>
        <br>
        <p class="expense-types">Current Role: <span style="color:#F64C72"><?php
$sql = "SELECT contractor_role FROM contractors WHERE id =  '" . $_SESSION['userId'] . "' ORDER BY contractor_id DESC LIMIT $contractorChosen;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['contractor_role'];  
        ?></span></p>

</div>



<div class="page" id="deletecontractor">

<div class="header">
<h1 class="dashboard-title">Dash<span style="color:#F64C72">board</span></h1>
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