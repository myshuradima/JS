<?php
$q = $_GET['q'];
$mysql = new mysqli('localhost','root','','users-bd');
$result = $mysql->query("SELECT * FROM `users` WHERE `ban`= '$q'");
if(intval($q)==1){
  while($row = $result->fetch_assoc()){
    echo '<div class style="background-color: #4CAF50; margin: 8px 20px; font-size: 20pt; ">' . "Username:" . $row['username'] . "<br />" . '</div><div style="background-color: #4CAF50;"><form action = "Ban.php" method="post">' .
    '<input type="hidden" name="username" value="'. $row['username'] .'">' . '<input type="hidden" name="what_to_do" value= 0"' .'">' .
    '<button type="submit" style="background-color: blue;"  class="signupbtn">UnBan</button>' . "</form></div></br></br>";
  }
}
else{
  while($row = $result->fetch_assoc()){
    echo '<div class style="background-color: #4CAF50; margin: 8px 20px; font-size: 20pt; ">' . "Username:" . $row['username'] . "<br />" . '</div><div style="background-color: #4CAF50;"><form action = "Ban.php" method="post">' .
    '<input type="hidden" name="username" value="'. $row['username'] .'">' . '<input type="hidden" name="what_to_do" value= 1"' .'">' .
    '<button type="submit" style="background-color: red;"  class="signupbtn">Ban</button>' . "</form></div></br></br>";
  }
}
$mysql->close();
