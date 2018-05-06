<?php
  require('lib.php');
  $obj = new ConectorBD();
  $response['msg'] = $obj->initConexion('agenda');
  if($response['msg']=='OK'){
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    $sql = $obj->ejecutarQuery("SELECT id, clave FROM tb_usuario WHERE correo='$user'");
    if($sql->num_rows > 0){
      $row = $sql->fetch_assoc();
      if(password_verify($pwd, $row['clave'])){
        session_start();
        $_SESSION['id_usuario'] = $row['id'];
        $response['acceso'] = "concedido";
        $response['motivo'] = "Bienvenido";
      }else{
        $response['motivo'] = "La contraseña es incorrecta";
        $response['acceso'] = "rechazado";
      }
    }else{
      $response['motivo'] = "El correo es incorrecto";
      $response['acceso'] = "rechazado";
    }
  }
  echo json_encode($response);
  $obj->cerrarConexion();
 ?>
