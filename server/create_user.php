<?php
  require('lib.php');
  $cn = new ConectorBD();
  if($cn->initConexion('agenda') == 'OK'){
    $data['nombre'] = "Jorge Ramirez";
    $data['fecha_nac'] = "1985-10-12";
    $data['correo'] = "jlramirez1210@gmail.com";
    $data['clave'] = password_hash('123', PASSWORD_DEFAULT);
    $cn->insertData('tb_usuario', $data);

    $data['nombre'] = "Lizbeth Guillen";
    $data['fecha_nac'] = "1987-04-25";
    $data['correo'] = "lizbethguillenrf@gmail.com";
    $data['clave'] = password_hash('456', PASSWORD_DEFAULT);
    $cn->insertData('tb_usuario', $data);

    $data['nombre'] = "Usuario";
    $data['fecha_nac'] = "2018-05-05";
    $data['correo'] = "prueba@gmail.com";
    $data['clave'] = password_hash('789', PASSWORD_DEFAULT);
    $cn->insertData('tb_usuario', $data);

    echo "Se ha insertado todos los registros";
  }else{
    echo "Se ha producido un error en la insercion";
  }
?>
