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
              <a href="index.php" class="sign" align="center"><span style="color:#242582">....</span>Landlord<span style="color:#F64C72">Tracker</p></span></a>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
              <div class="form-gap"></div>
             <div class="container">
               <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                         <div class="panel panel-default">
                           <div class="panel-body">
                             <div class="text-center">
                               <h3><i class="fa fa-lock fa-4x"></i></h3>
                               <h2 class="text-center">Reset Password</h2>
                           
                               <div class="panel-body">
                 
                                 <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                 
                                   <div class="form-group">
                                     <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                      <?php

                                      $selector = $_GET["selector"];
                                      $validator = $_GET["validator"];

                                      if (empty($selector) || empty($validator)) {
                                        echo "Your request could not be validated.";
                                      } else {
                                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                                          ?>
                                        <form action="includes/resetpassword.inc.php" method="post">
                                        <input name="selector" type="hidden" value="<?php echo $selector; ?>">
                                        <input name="validator" type="hidden" value="<?php echo $selector; ?>">
                                        <input type="password" class="newpass" name="pwd" placeholder="Enter New Password">
                                        <input type="password" class="newpass" name="pwd-repeat" placeholder="Repeat New Password">
                                        <button type="submit" class="reset-new" name="reset-password-submit">Reset</button>
                                        </form>
                                          <?php
                                        }
                                      }
                                      ?>

                                      
                                     </div>
                                   </div>
                                   <div class="form-group">

                                   </div>
                                   
                                   <input type="hidden" class="hide" name="token" id="token" value=""> 
                                 </form>
                 
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