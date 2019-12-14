<?php
$q = $_GET['q'];
$p = $_GET['p'];

$mysql = new mysqli('localhost','root','','cars-db');
if($p=="All"){
  $result = $mysql->query("SELECT * FROM `cars` WHERE `type`= '$q'");
}
else{
  if($q=="All"){
    $result = $mysql->query("SELECT * FROM `cars` WHERE `model` = '$p'");
  }
  else{
    $result = $mysql->query("SELECT * FROM `cars` WHERE `type`= '$q' AND `model` = '$p'");
  }
}
if($p=="All" && $q=="All"){
  $result = $mysql->query("SELECT * FROM `cars`");
}

while($row = $result->fetch_assoc()){
  //print_r($row);

  echo "<div class=car>";
  echo '<img src="' . $row['image']  . '" width="290px" height="150px" >';
  echo '<a href="' . $row['link']. '">';
  echo '<p align="center">' . $row['name'] .'</p></a></div><br>';
}
$mysql->close();
?>
