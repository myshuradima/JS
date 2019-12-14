<?php
 $username=trim($_POST['username']);
 $email=trim($_POST['email']);
 $password=filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);
 $reppassword=filter_var(trim($_POST['psw-repeat']), FILTER_SANITIZE_STRING);

 $validaton =1;

 $passwordvalid=strcmp($password, $reppassword);
if($passwordvalid != 0){
   setcookie('passwordilinvalid', $username, time()+2);
  $validaton=0;
}

 $usernamevalid=preg_match("/^[A-Za-z0-9]+$/", $username);
 if(!$usernamevalid){
   setcookie('userinvalid', $username, time()+2);
   $validaton=0;
 }
 $emailvalid=preg_match("/^\w+@[a-z]{1,5}\.[a-z]{2,3}$/", $email);
 if(!$emailvalid){
   setcookie('emailinvalid', $email, time()+2);
   $validaton=0;
 }
 //$mypassword=md5($password."hdgreffg3443");
if($validaton !=0 ){
  $mysql = new mysqli('localhost','root','','users-bd');
  $result1 = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
  $result2 = $mysql->query("SELECT * FROM `users` WHERE `e-mail` = '$email'");
  $user = $result1->fetch_assoc();
  $mail = $result2->fetch_assoc();
  session_start();
  if($user != 0){
    setcookie('registred', 0, time()+2);
    $validaton=0;
  }
  if($mail != 0){
    setcookie('exemail', 0, time()+2);
    $validaton=0;
  }
}
if($validaton==0){
   setcookie('username1', $username, time()+5);
   setcookie('email1', $email, time()+5);
   setcookie('password1', $password, time()+5);
   setcookie('reppassword', $reppassword, time()+5);
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit();
 }
  $mypassword=md5($password."hdgreffg3443");
 //$mysql = new mysqli('localhost','root','','users-bd');
   $mysql->query("INSERT INTO `users` (`username`, `password`, `e-mail`) VALUES('$username', '$mypassword', '$email') ");
   $_SESSION['logedin']=$username;
   $mysql->close();
   setcookie('wasregistred', 0, time()+2);

   header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
