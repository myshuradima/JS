<?php
$k = $_GET['k'];

$mysql = new mysqli('localhost','root','','cars-db');
$result = $mysql->query("SELECT * FROM `cars` LIMIT $k");
while($row = $result->fetch_assoc()){
  //print_r($row);
    echo "<div class=car>";
    echo '<img src="' . $row['image']  . '" width="290px" height="150px" >';
    echo '<a href="' . $row['link']. '">';
    echo '<p align="center">' . $row['name'] .'</p></a></div><br>';
}
echo '<button style="bottom:0" onclick="upload()" class="loginbtn" >More</button>';
$mysql->close();
?>
