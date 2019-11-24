<?php
  session_start();
  unset($_SESSION['logedin']);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
