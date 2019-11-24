<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/style2.css">
    <title>Tesla Model X</title>
  </head>
  <body>
    <body vlink="#FFFFF0" link="#4CAF50" alink="#FF4500">
      <div class="hat">
        <?php $page_id = 2; ?>
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

      </div>

      <div class="infocar">
        <?php $text = file_get_contents('modelx.txt');
        echo $text;
        ?>
      </div>
    <div class="Comments">
      <form name=coment action="comment.php" method="post" id="commentform">
        <label for="Comentline" <?php if (!isset($_SESSION['logedin'])) {
          echo 'style="background-color:red; font-size:15pt">You cant coment without sing in';}
          else{echo 'style="background-color:green; font-size:15pt">Comments';}?></label> <br />
        <textarea name="Comentline" rows="8" cols="80" <?php if (!isset($_SESSION['logedin'])) {
          echo "placeholder='Helloworld' disabled";}?>> </textarea> <br />
        <input type="hidden" name="user" value="<?php if (isset($_SESSION['logedin'])){echo $_SESSION['logedin'];} ?>">
        <input type="hidden" name="page_id" value="2">
        <button type="submit" value="Send" <?php if (!isset($_SESSION['logedin'])) {
          echo "disabled";}?>>Send</button>
      </form>
      <div class="allcoments">
        <?php $mysql = new mysqli('localhost','root','','users-bd');
        $result = $mysql->query("SELECT * FROM `comments` WHERE `page_id`= '$page_id' ORDER BY `date` DESC");
        while($row = $result->fetch_assoc()){
          //print_r($row);
          echo '<div class style="background-color: #4CAF50; margin: 8px 20px; ">';
          echo"Username:" . $row['name'] . "<br />";
          echo "Date:" . $row['date'] . "<br />";
          echo $row['text'];
          echo "</div>";
        }
        $mysql->close();
         ?>
      </div>
    </div>
  </body>
</html>
