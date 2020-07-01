<!DOCTYPE html>
<html>
    <link href= "css\main.css" rel = "stylesheet" type = "text/css">
    <link href= "css\login.css" rel = "stylesheet" type = "text/css">
    <head>
    <title>Forgot Password</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png"/>
    </head>
    <body>
        <body style="background-color:#2F2FA2;"></body>
  
          <div class="main">
            <br><br>
            <a href="index.php" class="sign" align="center"><span style="color:#242582">....</span>Landlord<span style="color:#F64C72">Tracker</p></a></span>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
              <div class="form-gap"></div>
             <div class="container">
               <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                         <div class="panel panel-default">
                           <div class="panel-body">
                             <div class="text-center">
                               <h3><i class="fa fa-lock fa-4x"></i></h3>
                               <h2 class="text-center">Forgot Password</h2>
                              <?php
                               $token = random_bytes(32);
                              echo bin2hex($token);
                              echo "...";
                              $selector = bin2hex(random_bytes(8));
                              echo $selector;

                               ?>
                               <div class="panel-body">
                 
                                   <div class="form-group">
                                     <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                       <form action="includes/resetrequest.inc.php" method="post">
                                       <input type="email" name="email" placeholder="Email Address" class="form-control">
                                       <button type="submit" name="reset-request-submit" id="reset-request-submit">Reset Password</button>
                                      </form>
                                      <br>
                                    <?php
                                    if (isset($_GET["reset"])) {
                                      if ($_GET["reset"] == "success") {
                                        echo '<p class="signupsuccess">Please check your email for a reset link.</p>';
                                      }
                                    } else if (isset($_GET["newpwd"])) {
                                      if ($_GET["newpwd"] == "empty") {
                                        ?><script>alert('Please fill in all fields.');</script><?php
                                      } else if ($_GET["newpwd"] == "notsame") {
                                        ?><script>alert('Passwords do not match. Please try again.');</script><?php
                                      } else if ($_GET["newpwd"] == "passwordlength") {
                                        ?><script>alert('Password too short. Password needs to be at least 6 characters long.');</script><?php
                                      } else if ($_GET["newpwd"] == "notnumeric") {
                                        ?><script>alert('Please include both letters and numbers in your password.');</script><?php
                                      }
                                    } else if (isset($_GET["error"])) {
                                      if ($_GET["error"] == "sqlerror") {
                                        ?><script>alert('SQL error.');</script><?php
                                      } else if ($_GET["error"] == "resubmit") {
                                        ?><script>alert('There was an error, please request a new verification link.');</script><?php
                                    }
                                  }
                                    ?>

                                     </div>
                                   </div>
                                   <div class="form-group">
                                     
                      
                                   </div>
                                   
                                   <input type="hidden" class="hide" name="token" id="token" value=""> 
                            
                 
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