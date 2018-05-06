<?php
  require('lib.php');
  $obj = new ConectorBD();
  $response['msg'] = $obj->initConexion('agenda');
  if($response['msg']=='OK'){
    $id = $_POST['id'];
    $fecha_inicio = $_POST['start_date'];
    $hora_inicio = $_POST['start_hour'];
    $obj->ejecutarQuery("UPDATE tb_evento SET fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio' WHERE id='$id'");
  }
  echo json_encode($response);
  $obj->cerrarConexion();
  ?>
