<?php
$id=$_POST['page_id'];
$path=$_POST['what_to_do'];

$mysql = new mysqli('localhost','root','','users-bd');
if($path==0){
  $mysql->query("UPDATE `comments` SET `checked` = '1' WHERE `id` = '$id'");
}
if($path==1){
  $mysql->query("DELETE FROM `comments` WHERE `id` = '$id'");
}
if($path==2){
  //$mysql->query("UPDATE `users` SET `ban` = '1' WHERE `id` = '$id'");
  $result = $mysql->query("SELECT * FROM `comments` WHERE `id` = '$id'");
  $user = $result->fetch_assoc();
  $username = $user['name'];
  echo $username;
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
  $mysql->query("UPDATE `users`  SET `ban` = '1' WHERE `username` = '$username'");
  $mysql->query("UPDATE `users`  SET `ban-date` = '$date' WHERE `username` = '$username'");
  $mysql->query("DELETE FROM `comments` WHERE `id` = '$id'");
}
$mysql->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?>
