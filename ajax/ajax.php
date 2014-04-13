<?php
  
  $post = $_POST;
  $get = $_GET;
  
  if (!empty($get)) error_log(print_R($get, true));
  if (!empty($post)) error_log(print_R($post, true));
  
  if (!empty($post['insert'])) error_log(print_R($post['insert'], true))
  
?>