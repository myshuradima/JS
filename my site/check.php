<?php
 $username=filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
 $email=filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
 $password=filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);
 $password1=filter_var(trim($_POST['psw-repeat']), FILTER_SANITIZE_STRING);

 $password=md5($password."hdgreffg3443");

 $mysql = new mysqli('localhost','root','','users-bd');
 $mysql->query("INSERT INTO `users` (`username`, `password`, `e-mail`) VALUES('$username', '$password', '$email') ");
 $mysql->close();
 header('Location:/my%20site/registration.html');
 ?>
