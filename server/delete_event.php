<?php
  require('lib.php');
  $obj = new ConectorBD();
  $response['msg'] = $obj->initConexion('agenda');
  if($response['msg']=='OK'){
    $id = $_POST['id'];
    $obj->ejecutarQuery("DELETE FROM tb_evento WHERE id='$id'");
  }
  echo json_encode($response);
  $obj->cerrarConexion();
?>
