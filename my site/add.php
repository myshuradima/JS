<?php
 $carname=trim($_POST['carname']);
 $linktoimage=trim($_POST['linktoimage']);
 $type=trim($_POST['Type']);
 $carmodel=trim($_POST['Model']);
 $linktopage=trim($_POST['linktopage']);
 $text=$_POST['textonpage'];
 $linktopagevalid=preg_match("/^[A-Za-z0-9]+$/", $linktopage);
 if(!$linktopagevalid){
   setcookie('carname', $carname, time()+2);
   setcookie('linktoimage', $linktoimage, time()+5);
   setcookie('type', $type, time()+5);
   setcookie('carmodel', $carmodel, time()+5);
   setcookie('linktopage', $linktopage, time()+5);
   setcookie('textonpage', $text, time()+5);
   setcookie('photosonpage', $photos, time()+5);
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit();
 }
 $firstlink = $linktopage . ".txt";
 $secondlink = $linktopage . ".php";
 $mysql = new mysqli('localhost','root','','cars-db');
 $result1 = $mysql->query("SELECT * FROM `cars` WHERE `link` = '$firstlink'");
 $carlinks = $result1->fetch_assoc();
 if($carlinks!=0){
   setcookie('linkerror', 0, time()+2);
   setcookie('carname', $carname, time()+2);
   setcookie('linktoimage', $linktoimage, time()+5);
   setcookie('type', $type, time()+5);
   setcookie('carmodel', $carmodel, time()+5);
   setcookie('linktopage', $linktopage, time()+5);
   setcookie('textonpage', $text, time()+5);
   setcookie('photosonpage', $photos, time()+5);
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit();
 }
 $mysql->close();
 $mysql = new mysqli('localhost','root','','cars-db');
 $mysql->query("INSERT INTO `cars` (`name`, `image`, `link`, `type`, `model`) VALUES('$carname', '$linktoimage', '$secondlink', '$type', '$carmodel') ");
 $mysql->close();
 $mysql = new mysqli('localhost','root','','cars-db');
 $result=$mysql->query("SELECT * FROM `cars` WHERE `name` = '$carname' ");
 $row=$result->fetch_assoc();
 $id=$row['id'];
 $mysql->close();
 $fd = fopen($firstlink, "w");
 fwrite($fd, $text);
 fclose($fd);

 $fd1 = fopen($secondlink, "w");
 $fd2 = fopen("template.txt" , "r");
 fclose($fd1);
 $fd1 = fopen($secondlink, "a");
 fwrite($fd1, '<?php $'. 'waytotext="'.$firstlink.'";?>');
 fwrite($fd1, '<?php $'. 'page_id="'.$id.'";?>');
 fwrite($fd1, '<?php $'. 'carname="'.$carname.'";?>');
 while(!feof($fd2)){
   $line=fgets($fd2);
   fwrite($fd1, $line);
 }
 fclose($fd1);
 fclose($fd2);

 setcookie('wasadded', 0, time()+2);

 header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
