<?php
  require('lib.php');
  $obj = new ConectorBD();
  $response['msg'] = $obj->initConexion('agenda');
  if($response['msg']=='OK'){
    session_start();
    $data['id_usuario'] = $_SESSION['id_usuario'];
    $data['titulo'] = $_POST['titulo'];
    $data['fecha_inicio'] = $_POST['start_date'];
    if(!empty($_POST['start_hour']))
      $data['hora_inicio'] = $_POST['start_hour'];
    if(!empty($_POST['end_date']))
      $data['fecha_final'] = $_POST['end_date'];
    if(!empty($_POST['end_hour']))
      $data['hora_final'] = $_POST['end_hour'];
    if($_POST['allDay']=='true'){
      $data['completo'] = '1';
    }else{
      $data['completo'] = '0';
    }
    $obj->insertData('tb_evento', $data);
  }else{
    $response['msg'] = "Error";
  }
  echo json_encode($response);
  $obj->cerrarConexion();
 ?>
