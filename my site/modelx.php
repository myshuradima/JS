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
        <?php $page_id = 1; ?>
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
        <h1>Tesla Model X</h1>
        <p class="textaboutcar"> The Tesla Model X is a mid-size all-electric luxury SUV made by Tesla, Inc.. The vehicle is unique in the concept that it uses falcon wing doors instead of traditional automotive doors. The prototype was unveiled at Tesla's design studios in Hawthorne on February 9, 2012.[11][12] The Model X has an official EPA rated 250–325 mi (402–523 km) range[7][13] and the combined fuel economy equivalent and energy consumption for the AWD P90D was rated at 89 mpg‑e (39 kW⋅h/100 mi).The Model X was developed from the full-sized sedan platform of the Tesla Model S. The Model X has an EPA Size Class as an SUV,[7] and shares ~30% of its content with the Model S, half of the originally planned ~60%, and weighs about 10 percent more, both are being produced at the Tesla Factory in Fremont, California. First deliveries of the Model X began in September 2015.[15] After one full year on the market, the Model X ranked in 2016 seventh among the world's best-selling plug-in cars. Global cumulative sales since inception totaled 106,689 units through September 2018.
        </p>
        <h3>Reception</h3>
        <p class="textaboutcar"> Consumer Reports wrote that the all-wheel-drive Model X 90D largely disappoints, as rear doors are prone to pausing and stopping, the second-row seats that cannot be folded, and the cargo capacity is too limited. Even its panoramic, helicopter-like windshield was disapproved of as it is not tinted enough to offset the brightness of a sunny day. Also, Consumer Reports added that overall "the ride is too firm and choppy for a $110,000 car".
          Car and Driver, despite some criticism of the Model X's falcon wing doors, approved of the panoramic windshield, stating "We were left dumbfounded, like slack-jawed tourists endlessly looking upward. Lose the Falcon Wing doors, Elon; the windshield is the Model X's best gimmick". Overall, it was given a rating of 5/5 stars, stating "There are no other electric SUVs at the moment. And even against fossil-fuel-fed SUVs, the Tesla's effortless performance and efficiency can't be matched."
          Motoring journalist Jeremy Clarkson's made his first review of a Tesla vehicle after 10 years on his TV show The Grand Tour in February 2018; Clarkson gave a positive review of the car that he called "fabulous" that is unlike anything on the road. Lawyers were present during the review presumably because Clarkson's previous scathing review of the original Roadster caused a lawsuit.
        </p>
      </div>
    <div class="Comments">
      <form name=coment action="comment.php" method="post" id="commentform">
        <label for="Comentline" <?php if (!isset($_SESSION['logedin'])) {
          echo 'style="background-color:red; font-size:15pt">You cant coment without sing in';}
          else{echo 'style="background-color:green; font-size:15pt">Comments';}?></label> <br />
        <textarea name="Comentline" rows="8" cols="80" <?php if (!isset($_SESSION['logedin'])) {
          echo "placeholder='Helloworld' disabled";}?>> </textarea> <br />
        <input type="hidden" name="user" value="<?php if (isset($_SESSION['logedin'])){echo $_SESSION['logedin'];} ?>">
        <input type="hidden" name="page_id" value="1">
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
