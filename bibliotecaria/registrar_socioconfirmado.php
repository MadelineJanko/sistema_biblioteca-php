<?php
    include("../conexion.php");
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $ci=$_POST['ci'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];

    $sql="UPDATE usuarios SET nombre='$nombre', apellido='$apellido',ci='$ci', email='$email',pass='$pass' WHERE id='$id'";
    $resultado = mysqli_query($conex,$sql);

    $sql="UPDATE socio SET id_usuario='$id' WHERE telefono='$telefono'";
    $resultado = mysqli_query($conex,$sql);

    if($resultado){
        header("Location: l_socios.php");
    }
    else{
        echo "no se inserto";
    }
?>