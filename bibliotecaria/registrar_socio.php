<?php
    include("../conexion.php");
    $rol=$_POST['rol'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $ci=$_POST['ci'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];

    $query ="INSERT INTO usuarios (rol, nombre, apellido, ci, email, pass) VALUES ($rol, '$nombre', '$apellido', $ci, '$email', '$pass')";
    $resultado = $conex->query($query);

    $query ="INSERT INTO socio (direccion,telefono) VALUES ('$direccion',$telefono)";
    $resultado = $conex->query($query);

    if($resultado){
        header("Location: registrar_confirmado.php");
    }
    else{
        echo "no se inserto";
    }
?>