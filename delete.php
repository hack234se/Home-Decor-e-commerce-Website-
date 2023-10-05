<?php 
include 'functions.php';
deleteOrder($_GET['order_id']);
header("location:view_cart.php");
  ?>
