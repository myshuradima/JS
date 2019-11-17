<?php
  session_start();
  unset($_SESSION['logedin']);
  header('Location:/my%20site/registrationpage.php');
 ?>
