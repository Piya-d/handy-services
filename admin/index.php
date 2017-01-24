<?php
session_start();

if(!isset($_SESSION['user_name'])) {

	header("location: login.php");
}
else {

?>
 <?php 
  include "header.php"; 
  ?>
   <?php 
  include "home.php"; 
  ?>
   <?php 
  include "footer.php"; 
  ?>
  <?php }  ?>