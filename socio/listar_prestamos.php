<?php
include '../conexion.php';

if(!isset($_POST['buscar'])){
    $_POST['buscar']="";
    $buscar=$_POST['buscar'];
}
$buscar=$_POST['buscar'];
$SQL_READ= "SELECT * FROM prestamo WHERE prestamo.id_socio=".$id." and prestamo.notas LIKE '%" .$buscar."%'";

$sql_query= mysqli_query($conex,$SQL_READ);
?>