<?php 

include("../conexion.php");
$id=$_POST['id'];
$fecha=$_POST['fecha'];
$libro=$_POST['id_libro'];
$devolucion=$_POST['devolucion'];
$notas=$_POST['notas'];
$deuda=$_POST['deuda'];

$sql="UPDATE prestamo SET fecha='$fecha', fecha_devolucion='$devolucion',notas='$notas', deuda='$deuda' WHERE id='$id'";
$resultado = mysqli_query($conex,$sql);


    if($resultado){
        Header("Location: prestamo.php");
    }
?>