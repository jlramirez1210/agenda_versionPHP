<?php
  session_start();
  require('lib.php');
  $obj = new ConectorBD();
  $response['msg'] = $obj->initConexion('agenda');
  if($response['msg']=='OK'){
    $id_usuario = $_SESSION['id_usuario'];
    $sql = $obj->ejecutarQuery("SELECT * FROM tb_evento WHERE id_usuario='$id_usuario'");
    if($sql->num_rows > 0){
      while($row = $sql->fetch_assoc()){
          $response['count'] = $sql->num_rows;
          $response[]['eventos'] = $row;
      }
    }
  }else{
    $response['msg'] = "Error";
  }
  echo json_encode($response);
  $obj->cerrarConexion();
?>
