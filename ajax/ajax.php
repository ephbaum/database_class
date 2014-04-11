<?php
  
  require_once('../includes/utilities.php');
  
  $post = $_POST;
  $get = $_GET;
  
  if (!empty($get)) array2table($get);
  if (!empty($post)) array2table($post);
  
?>