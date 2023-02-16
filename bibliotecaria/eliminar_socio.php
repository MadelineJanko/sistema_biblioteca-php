<?php 

include("../conexion.php");

$id=$_GET['id'];

$sql="DELETE FROM socio WHERE id_usuario='$id'";
$query=mysqli_query($conex,$sql);

$sql="DELETE FROM usuarios WHERE id='$id'";
$query=mysqli_query($conex,$sql);

    if($query)
    {
        Header("Location:l_socios.php");
    }

?>