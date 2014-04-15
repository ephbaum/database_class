<?php

  require_once($_SERVER['DOCUMENT_ROOT']."/classes/CRUD.php");

  $crud = new CRUD();

  $post = $_POST;
  $get = $_GET;

  if (!empty($post['create'])) {
    $response = $crud->create($post['create']);
    error_log(json_encode($response));
    echo json_encode($response);
  }

  if (!empty($get['read'])) {
    $response = $crud->read();
    error_log(json_encode($response));
    echo json_encode($response);
  }
  
  if (!empty($post['search'])) {
    $response = $crud->search($post['search']);
    error_log(json_encode($response));
    echo json_encode($response);
  }
  
  if (!empty($post['update'])) {
    $response = $crud->update($post['update'], $post['to']);
    error_log(json_encode($response));
    echo json_encode($response);
  }
  
  if (!empty($post['delete'])) {
    $response = $crud->delete($post['delete']);
    error_log(json_encode($response));
    echo json_encode($response);
  }

  
?>