<?php
$username=$_POST['username'];
$path=$_POST['what_to_do'];
$mysql = new mysqli('localhost','root','','users-bd');
if($path==1){
  $mysql->query("UPDATE `users` SET `admin` = '1' WHERE `username` = '$username'");
}
if($path==0){
  $mysql->query("UPDATE `users` SET `admin` = '0' WHERE `username` = '$username'");
}

$mysql->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
