<?php
$q = $_GET['q'];
$mysql = new mysqli('localhost','root','','users-bd');
$result = $mysql->query("SELECT * FROM `users` WHERE `username`= '$q'");
while($row = $result->fetch_assoc()){
    if($row['admin']==0){
      echo '<div class style="background-color: #4CAF50; font-size: 20pt; ">' . "Username:" . $row['username'] . "<br />" . '</div><div style="background-color: #4CAF50;"><form action = "Admin.php" method="post">' .
      '<input type="hidden" name="username" value="'. $row['username'] .'">' . '<input type="hidden" name="what_to_do" value= 1"' .'">' .
      '<button type="submit" style="background-color: red;"  class="signupbtn">Make admin</button>' . "</form></div></br></br>";
    }
    else{
      echo '<div class style="background-color: #4CAF50; font-size: 20pt; ">' . "Username:" . $row['username'] . "<br />" . '</div><div style="background-color: #4CAF50;"><form action = "Admin.php" method="post">' .
      '<input type="hidden" name="username" value="'. $row['username'] .'">' . '<input type="hidden" name="what_to_do" value= 0"' .'">' .
      '<button type="submit" style="background-color: blue;"  class="signupbtn">Make user</button>' . "</form></div></br></br>";
    }
  }
$mysql->close();
