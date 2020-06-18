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
            <a href="loggedout.html" class="sign" align="center"><span style="color:#242582">....</span>Landlord<span style="color:#F64C72">Tracker</p></a></span>
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
                           
                               <div class="panel-body">
                 
                                 <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                 
                                   <div class="form-group">
                                     <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                       <form action="includes/resetrequest.inc.php" method="post">
                                       <input name="email" placeholder="Email Address" class="form-control"  type="email">
                                       <button type="submit" name="reset-request-submit" id="reset-request-submit">Reset Password</button>
                                      </form>
                                    <?php
                                    if (isset($_GET["reset"])) {
                                      if ($_GET["reset"] == "success") {
                                        echo '<p class="signupsuccess">Please check your email for a reset link.</p>';
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