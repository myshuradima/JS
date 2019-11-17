<?php
  $username=filter_var(trim($_POST['uname']), FILTER_SANITIZE_STRING);
  $password=filter_var(trim($_POST['loginpsw']), FILTER_SANITIZE_STRING);


  $password=md5($password."hdgreffg3443");

  $mysql = new mysqli('localhost','root','','users-bd');
  $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password`='$password'");
  $user = $result->fetch_assoc();
  if(count($user) == 0){
    echo "No such users";
    exit();
  }
  session_start();
  $_SESSION['logedin']=$username;

  $mysql->close();
  header('Location:/my%20site/registrationpage.php');
 ?>
