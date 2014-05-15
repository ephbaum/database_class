<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/classes/CRUD.php");

  $crud = new CRUD();

  $post = $_POST;
  $get = $_GET;

  if (!empty($post['create'])) {
    $response = $crud->create($post['create']);
    echo json_encode($response);
  }

  if (!empty($get['read'])) {
    $response = $crud->read();
    echo json_encode($response);
  }

  if (!empty($post['search'])) {
    $response = $crud->search($post['search']);
    echo json_encode($response);
  }

  if (!empty($post['update'])) {
    $response = $crud->update($post['update'], $post['to']);
    echo json_encode($response);
  }

  if (!empty($post['delete'])) {
    $response = $crud->delete($post['delete']);
    echo json_encode($response);
  }

  if (!empty($post['delete_all']) && $post['delete_all'] === 'true') {
    $response = $crud->delete_all();
    echo json_encode($response);
  }

  $db = new Db();

?>