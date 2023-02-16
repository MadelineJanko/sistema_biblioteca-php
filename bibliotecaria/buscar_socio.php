<?php
include '../conexion.php';
if(!isset($_POST['buscar'])){
    $_POST['buscar']="";
    $buscar=$_POST['buscar'];
}
$buscar=$_POST['buscar'];
$SQL_READ= "SELECT * FROM usuarios WHERE usuarios.rol=3 and usuarios.nombre LIKE '%" .$buscar."%'";

$sql_query= mysqli_query($conex,$SQL_READ);
?>