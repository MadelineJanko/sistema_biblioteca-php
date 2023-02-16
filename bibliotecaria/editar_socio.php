<?php 

include("../conexion.php");

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $ci=$_POST['ci'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

$sql="UPDATE usuarios SET nombre='$nombre', apellido='$apellido',ci='$ci', email='$email',pass='$pass' WHERE id='$id'";
$resultado = mysqli_query($conex,$sql);

    if($resultado){
        Header("Location: l_socios.php");
    }
?>