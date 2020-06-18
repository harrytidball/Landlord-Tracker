<!DOCTYPE html>
<html>
    <link href= "css\main.css" rel = "stylesheet">
    <link href= "css\login.css" rel = "stylesheet">
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <title>Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    </head>
    <body>
      <body style="background-color:#2F2FA2;"></body>


        <div class="main"><br><br>
        <a href="loggedout.html" class="sign" align="center"><span style="color:#242582">...
        </span>Landlord<span style="color:#F64C72">Tracker</a></span><br><br><br>
  
            <form class="form-signup" action="includes/signup.inc.php" method="post">
              <input type="text" class="email-styling" name="mail" placeholder="Email" autocomplete="off">
              <input type="password" class="password-styling" name="pwd" placeholder="Password">
              <input type="password" class="password-styling" name="pwd-repeat" placeholder="Repeat Password">
              <button type="submit" name="signup-submit">Sign Up</button>
              </form>

              <?php
              if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                  echo '<p class="sign-up-error">Please fill in all fields.</p>';
                } 
                else if ($_GET['error'] == "invalidmail") {
                    echo '<p class="sign-up-error">Invalid email.</p>';
                  }
                  else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class="sign-up-error">Passwords do not match.</p>';
                } 
                else if ($_GET['error'] == "emailinuse") {
                  echo '<p class="sign-up-error">This email is already in use.</p>';
              
              }
            }
                else if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "success") {
                  echo '<p class="sign-up-error">Sign up successful.</p>';
                }
            }
            ?>
                      
            </div>


        </body>
        </html>