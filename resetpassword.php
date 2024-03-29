<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <link href= "css\main.css" rel = "stylesheet" type = "text/css">
    <link href= "css\login.css" rel = "stylesheet" type = "text/css">
    <head>
    <title>Reset Password</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png"/>
    </head>
    <body>
        <body style="background-color:#2F2FA2;"></body>
  
          <div class="main">
      
            <br><br>
              <a href="http://landlordtracker.co.uk" class="sign" align="center"><span style="color:#242582">....</span>Landlord<span style="color:#F64C72">Tracker</p></span></a>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
              <div class="form-gap"></div>
             <div class="container">
               <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                         <div class="panel panel-default">
                           <div class="panel-body">
                             <div class="text-center">
                    
                               <h2 class="text-center">Reset Password</h2>
                              <br>
                               <div class="panel-body">
                 
                 
                                   <div class="form-group">
                                     <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                      <?php

if (isset($_GET["newpwd"])) {
  if ($_GET["newpwd"] == "empty") {
    ?><script>alert('Please fill in all fields.');</script><?php
  } else if ($_GET["newpwd"] == "notsame") {
    ?><script>alert('Passwords do not match. Please try again.');</script><?php
  } else if ($_GET["newpwd"] == "passwordlength") {
    ?><script>alert('Password too short. Password needs to be at least 6 characters long.');</script><?php
  } else if ($_GET["newpwd"] == "notnumeric") {
    ?><script>alert('Please include both letters and numbers in your password.');</script><?php
  }
} 

                                      $selector = $_GET['selector'];
                                      $validator = $_GET['validator'];
                                      //$_SESSION["selector"] = $selector;
                                      //$_SESSION["validator"] = $validator;

                                      if (empty($selector) || empty($validator)) {
                                        echo "Your request could not be validated.";
                                      } else {
                                          ?>
                                        <form action="includes/resetpassword.inc.php" method="post">
                                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                        <input type="password" class="newpass" name="pwd" placeholder="Enter New Password">
                                        <input type="password" class="newpass" name="pwd-repeat" placeholder="Repeat New Password">
                                        <button type="submit" name="reset-password-submit" id="reset-request-submit">Reset</button>
                                        </form>
                                          <?php
                                        }
                                      

                                      ?>


                                      
                                     </div>
                                   </div>
                                   <div class="form-group">

                                   </div>
                                
                 
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
               </div>
             </div>



            </div>

        </body>
        </html>