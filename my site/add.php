<?php
 $carname=trim($_POST['carname']);
 $linktoimage=trim($_POST['linktoimage']);
 $type="All" . trim($_POST['Type']);
 $carmodel="All" . trim($_POST['Model']);
 $linktopage=trim($_POST['linktopage']);
 //$mypassword=md5($password."hdgreffg3443");
  $mysql = new mysqli('localhost','root','','cars-db');
 //$mysql = new mysqli('localhost','root','','users-bd');
   $mysql->query("INSERT INTO `cars` (`name`, `image`, `link`, `type`, `model`) VALUES('$carname', '$linktoimage', '$linktopage', '$type', '$carmodel') ");
   $mysql->close();
   setcookie('wasadded', 0, time()+2);

   header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
