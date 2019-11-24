<?php
  session_start();
  $name = $_POST['user'];
  $pageid = $_POST['page_id'];
  $text = $_POST['Comentline'];
  $date = date("c");
  $mysql = new mysqli('localhost','root','','users-bd');
  $mysql->query("INSERT INTO `comments` (`page_id`, `name`, `date`, `text`) VALUES('$pageid','$name', '$date', '$text') ");
  $mysql->close();
  echo $pageid;
  echo $name;
  echo $text;
  echo $date;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
