<?php
 $route = preg_split("[/]",key($_GET));
 $main = $route[0];
 if(function_exists($main)){
   $main();
 }

function lab2()
{
  require('lab2.php');
}
?>
