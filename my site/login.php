<?php
  $username=filter_var(trim($_POST['uname']), FILTER_SANITIZE_STRING);
  $password=filter_var(trim($_POST['loginpsw']), FILTER_SANITIZE_STRING);


  $password=md5($password."hdgreffg3443");

  $mysql = new mysqli('localhost','root','','users-bd');
  $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password`='$password'");
  $user = $result->fetch_assoc();
  session_start();
  if($user == 0){
    setcookie('wronguser', 0, time()+1);
    setcookie('username2', $username, time()+5);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  }
  if($user['admin']==1){
    $_SESSION['admin']=True;
  }
  if($user['ban']==1){
    $date1 = $user['ban-date'];
    $date2 = date("Y") . "-" . date("m") . "-" . date("d");
    if(strcasecmp($date1, $date2)<=0){
      $mysql->query("UPDATE `users` SET `ban` = '0' ");
    }
    else {
      setcookie('ban', $user['ban-date'], time()+1);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit();
    }
  }
  //session_start();
  $_SESSION['logedin']=$username;
  $mysql->close();
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
