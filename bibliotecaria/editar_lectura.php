<?php 
include("../conexion.php");
$id=$_POST['id'];
$libro=$_POST['id_libro'];
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$devuelto=$_POST['devuelto'];

$sql="UPDATE lectura SET ci='$ci',nombre='$nombre', apellido='$apellido',devuelto='$devuelto' WHERE id='$id'";
$resultado = mysqli_query($conex,$sql);



$sql="UPDATE libro SET n_actual=n_actual+1 WHERE id='$libro'";
    $resultado = mysqli_query($conex,$sql);

    if($resultado){
        Header("Location: lectura.php");
    }
?>