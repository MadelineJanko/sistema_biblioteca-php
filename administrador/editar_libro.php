<?php 

include("../conexion.php");
$id=$_POST['id'];
$titulo=$_POST['titulo'];
$poster=addslashes(file_get_contents($_FILES['poster']['tmp_name']));
$idioma=$_POST['idioma'];
$autor=$_POST['autor'];
$genero=$_POST['genero'];
$cantidad=$_POST['cantidad'];
$disponible=$_POST['disponible'];

$sql="UPDATE libro SET titulo='$titulo', imagen='$poster',idioma='$idioma', autor='$autor',genero='$genero', n_orden='$cantidad', n_actual='$disponible',id_admin=1 WHERE id='$id'";
$resultado = mysqli_query($conex,$sql);

    if($resultado){
        Header("Location: libros.php");
    }
?>