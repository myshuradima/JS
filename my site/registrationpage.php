<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/style2.css">
    <script src="JS/login.js" defer></script>
    <script src="JS/registration.js" defer></script>
    <title></title>
  </head>
  <body>
    <body vlink="#FFFFF0" link="#4CAF50" alink="#FF4500">
    <div class="hat">
      <?php session_start(); ?>
      <a  href="lab2.html">Electric cars</a>
      <?php if (isset($_SESSION['logedin'])):
        echo $_SESSION['logedin'];?>
        <button onclick="location.href='exit.php'" class="loginbtn" >Logout</button>
      <?php endif; ?>
      <!-- Button to open the modal login form -->
      <button onclick="document.getElementById('id01').style.display='block'" class="loginbtn" >Login</button>
      <!-- The Modal -->
      <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
      class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="login.php" method="post">
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="loginpsw" required>

            <button type="submit">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot password?</span>
          </div>
          <div class="container">
            <button type="button" onclick="document.location='registrationpage.html'" name="button">Registrate</button>
          </div>
        </form>


      </div>
<!--Form for registration-->
  <form action="check.php"  margin="20px 0" method="post">
  <div class="containerreg" action=index.php>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="registrationusername"  required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="registrationemail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="registrationpassword" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="registrationrepeatpassword" required>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    <!--Button for sending data to server-->
    <div class="clearfix">
      <!--<button type="button" class="cancelbtn">Cancel</button>-->
      <button type="submit" class="signupbtn" id="registrationcheck">Sign Up</button>
    </div>
  </div>
</form>
  </body>
</html>
