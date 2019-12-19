<?php
$q = $_GET['q'];
$k=0;
$mysql = new mysqli('localhost','root','','cars-db');

$result = $mysql->query("SELECT * FROM `cars`");

while($row = $result->fetch_assoc()){
  //print_r($row);
  if(stristr($row['name'], $q)){
    echo "<div class=car>";
    echo '<img src="' . $row['image']  . '" width="290px" height="150px" >';
    echo '<a href="' . $row['link']. '">';
    echo '<p align="center">' . $row['name'] .'</p></a></div><br>';
    $k++;
  }
}
if($k==0){
  echo "No such cars";
  echo strtolower($row['name']);
  echo strtolower($q);
}
$mysql->close();
?>
