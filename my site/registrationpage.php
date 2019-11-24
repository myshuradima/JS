<?php function foo(){echo("Hello world");}; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/style2.css">
    <!--<script type="text/javascript" src="registration00.js" defer></script>-->
    <title></title>
  </head>
  <body>
    <body vlink="#FFFFF0" link="#4CAF50" alink="#FF4500">
    <div class="hat">
      <?php session_start(); ?>
      <a  href="lab2.php">Electric cars</a>
      <?php if (isset($_SESSION['logedin'])):?>
        <button onclick="location.href='exit.php'" class="loginbtn" >Logout</button>
        <button onclick="document.getElementById('id02').style.display='block'" class="loginbtn" >My form</button>
      <?php else: ?>
        <button onclick="document.getElementById('id01').style.display='block'" class="loginbtn" >Login</button>
      <?php endif; ?>
      <!-- Button to open the modal login form -->
      <!--<button onclick="document.getElementById('id01').style.display='block'" class="loginbtn" >Login</button>-->
      <!-- The Modal -->
      <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
      class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="login.php" method="post">
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" <?php if(isset($_COOKIE['username2'])){echo  "value=" . $_COOKIE['username2'];} else{echo '';} ?> required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="loginpsw" <?php if(isset($_COOKIE['password2'])){echo  "value=" . $_COOKIE['password2'];} else{echo '';} ?>required>

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
            <button type="button" onclick="document.location='registrationpage.php'" name="button">Registrate</button>
          </div>
        </form>




      </div>
      <div id="id02" class="modal">
        <span onclick="document.getElementById('id02').style.display='none'"
      class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate">
          <div class="container">
            <p>Hello world</p>
          </div>
        </form>
      </div>
<!--Form for registration-->


  <form action="check.php"   id="registrationform"  margin="20px 0" method="post">
    <?php if(isset($_COOKIE['registred'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Users with this name is already exists</div>');
          }
          if(isset($_COOKIE['wronguser'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Wrong username or password</div>');
          }
          if(isset($_COOKIE['exemail'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Users with this email is already exists</div>');
          }
          if(isset($_COOKIE['wasregistred'])){
            echo('<div align="center"  style="font-size:20pt; background-color:green; margin: 8px 2px">You were registred</div>');
          }
          if(isset($_COOKIE['userinvalid'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Wrong symbols in your username' . '</div>');
          }
          if(isset($_COOKIE['emailinvalid'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Very strange email' .'</div>');
          }
          if(isset($_COOKIE['passwordilinvalid'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">You hadnt repeat the password' .'</div>');
          }
    ?>
  <div class="containerreg" action=index.php>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="registrationusername" <?php if(isset($_COOKIE['username1'])){echo  "value=" . $_COOKIE['username1'];} else{echo '';} ?>  required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="registrationemail" <?php if(isset($_COOKIE['email1'])){echo  "value=" . $_COOKIE['email1'];} else{echo '';} ?> required>


    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="registrationpassword" <?php if(isset($_COOKIE['password1'])){echo  "value=" . $_COOKIE['password1'];} else{echo '';} ?> required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="registrationrepeatpassword" <?php if(isset($_COOKIE['reppassword'])){echo  "value=" . $_COOKIE['reppassword'];} else{echo '';} ?> required>

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
