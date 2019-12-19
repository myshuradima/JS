<?php
 $carname=trim($_POST['carname']);
 $linktoimage=trim($_POST['linktoimage']);
 $type=trim($_POST['Type']);
 $carmodel=trim($_POST['Model']);
 $linktopage=$_POST['linktopage'];
 $text=$_POST['textonpage'];
 $id=trim($_POST['id']);
 $firstlink = substr($linktopage, 0, -4) . ".txt";
 echo $firstlink;
 $mysql = new mysqli('localhost','root','','cars-db');
 $mysql->query("UPDATE `cars` SET `name`='$carname', `image`='$linktoimage', `link`='$linktopage', `type`='$type', `model`='$carmodel' WHERE `id` = '$id'");
 $mysql->close();
 $fd = fopen($firstlink, "w");
 fwrite($fd, $text);
 fclose($fd);

 setcookie('waschanged', 0, time()+2);

 header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
