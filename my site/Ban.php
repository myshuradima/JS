<?php
$username=$_POST['username'];
$path=$_POST['what_to_do'];
$mysql = new mysqli('localhost','root','','users-bd');
if($path==1){
  $mysql->query("UPDATE `users` SET `ban` = '1' WHERE `username` = '$username'");
  $month = date("m");
  $year = date("Y");
  if(intval($month)==12){
    $month = "01";
    $year = intval($year) + 1;
  }
  else {
    if(intval($month)<10){
      $month =  "0" . intval($month) + 1;
    }
    else {
      $month = intval($month) + 1;
    }
  }
  $date = $year . "-" . $month . "-" . date("d");
  $mysql->query("UPDATE `users` SET `ban-date` = '$date' WHERE `username` = '$username'");
}
if($path==0){
  $mysql->query("UPDATE `users` SET `ban` = '0' WHERE `username` = '$username'");
}

$mysql->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
