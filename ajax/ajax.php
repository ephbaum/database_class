<?php
  
  require_once($_SERVER['DOCUMENT_ROOT']."/classes/CRUD.php");
  
  $crud = new CRUD();
  
  $post = $_POST;
  $get = $_GET;
  
  if (!empty($get)) error_log(print_R($get, true));
  if (!empty($post)) error_log(print_R($post, true));
  
  if (!empty($post['insert'])) {

    $response = $crud->create($post['insert']);

    error_log(print_R($response));
    error_log(json_encode($response));
    return json_encode($response);
  }
  
?>