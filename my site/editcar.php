<?php
  $id =  $_GET['id'];
  $mysql = new mysqli('localhost','root','','cars-db');
  $result = $mysql->query("SELECT * FROM `cars` WHERE `id` = '$id'");
  $car = $result->fetch_assoc();
  $linktotext = substr($car['link'],0,-4) . ".txt";
?>
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
        <?php else: header('Location: ' . 'lab2.php');?>
          <button onclick="document.getElementById('id01').style.display='block'" class="loginbtn" >Login</button>
        <?php endif; ?>
        <?php if (isset($_SESSION['admin'])):?>
          <button onclick="document.getElementById('id03').style.display='block'" class="loginbtn" >My admin</button>
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
              <p>Your username is <?php echo $_SESSION['logedin'] ?></p>
            </div>
          </form>

        </div>

        <div id="id03" class="modal">
          <span onclick="document.getElementById('id03').style.display='none'"
        class="close" title="Close Modal">&times;</span>

          <!-- Modal Content -->
            <div class="container">
              <button onclick="document.location='checkcoments.php'" class="signupbtn" >New comments</button></br>
              <button onclick="document.location='banedusers.php'" class="signupbtn" >Baned users</button></br>
              <button onclick="document.location='newadmin.php'" class="signupbtn" >New admin</button></br>
              <button onclick="document.location='addcar.php'" class="signupbtn" >New car</button></br>
            </div>

        </div>


      </div>
<!--Form for registration-->


  <form action="edit.php"   id="registrationform"  margin="20px 0" method="post">
    <?php
          if(isset($_COOKIE['wronguser'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Wrong username or password</div>');
          }
          if(isset($_COOKIE['exemail'])){
            echo('<div align="center"  style="font-size:20pt; background-color:red; margin: 8px 2px">Users with this email is already exists</div>');
          }
          if(isset($_COOKIE['waschanged'])){
            echo('<div align="center"  style="font-size:20pt; background-color:green; margin: 8px 2px">Car was changed</div>');
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
    <h1>Add car</h1>
    <p>Fill the form below</p>
    <hr>

    <label for="carname"><b>Car name</b></label>
    <input type="text" placeholder="Enter car name" name="carname"  id="registrationusername" <?php echo  'value="' . $car['name'] . '"'; ?> required>

    <label for="linktoimage"><b>link to image</b></label>
    <input type="text" placeholder="Enter link to main image" name="linktoimage" id="registrationemail" <?php echo  "value=" . $car['image']; ?> required>

    <input type="hidden" placeholder="Input the name of the page wihtout any dots" name="linktopage" id="registrationrepeatpassword" <?php echo  "value=" . $car['link']; ?> required>

    <input type="hidden" placeholder="Input the name of the page wihtout any dots" name="id" id="registrationrepeatpassword" <?php echo  "value=" . $car['id']; ?>  required>


    <label for="ct">Car type:</label>
    <select id="ct" class="Select-Type" name="Type" onchange="filter()">
      <option <?php if($car['type']=="Hatchback"){echo "selected";} ?> value="Hatchback" >Hatchback</option>
      <option <?php if($car['type']=="Sedan"){echo "selected";} ?> value="Sedan">Sedan</option>
      <option <?php if($car['type']=="MPV"){echo "selected";} ?> value="MPV">MPV</option>
      <option <?php if($car['type']=="SUV"){echo "selected";} ?> value="SUV">SUV</option>
      <option <?php if($car['type']=="Crossover"){echo "selected";} ?> value="Crossover">Crossover</option>
      <option <?php if($car['type']=="Coupe"){echo "selected";} ?> value="Coupe">Coupe</option>
      <option <?php if($car['type']=="Convertible"){echo "selected";} ?> value="Convertible">Convertible</option>
    </select>
    <label for="cm">Car model:</label>
    <select id="cm" class="Select-Model" name="Model" onchange="filter()">
      <option <?php if($car['model']=="Tesla"){echo "selected";} ?> value="Tesla">Tesla</option>
      <option <?php if($car['model']=="BMW"){echo "selected";} ?> value="BMW">BMW</option>
      <option <?php if($car['model']=="Audi"){echo "selected";} ?> value="Audi">Audi</option>
      <option <?php if($car['model']=="Nissan"){echo "selected";} ?> value="Nissan">Nissan</option>
      <option <?php if($car['model']=="Jaguar"){echo "selected";} ?> value="Jaguar">Jaguar</option>
      <option <?php if($car['model']=="Mercedes"){echo "selected";} ?> value="Mercedes">Mercedes</option>
    </select></br>

    <br><label for="textonpage"><b>Text on the page</b></label></br>
    <textarea style="width:100%" rows="25" cols="50" placeholder="Text that will be on page" name="textonpage" id="textonpage"  required><?php echo file_get_contents($linktotext); ?></textarea>


    <!--Button for sending data to server-->
    <div class="clearfix">
      <!--<button type="button" class="cancelbtn">Cancel</button>-->
      <button type="submit" class="signupbtn" id="registrationcheck">Edit</button>
    </div>
  </div>
</form>
  </body>
</html>
