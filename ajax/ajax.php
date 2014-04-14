<?php
  
  require_once($_SERVER['DOCUMENT_ROOT']."/classes/CRUD.php");
  
  $crud = new CRUD();
  
  $post = $_POST;
  $get = $_GET;
    
  if (!empty($post['insert'])) {
    $response = $crud->create($post['insert']);

    echo json_encode($response);
  }
  
  if (!empty($get['read'])) {
    $response = $crud->read();
    
    echo json_encode($response);
  }
  
?>