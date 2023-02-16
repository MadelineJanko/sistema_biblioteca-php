<?php
include '../conexion.php';
if(!isset($_POST['buscar'])){
    $_POST['buscar']="";
    $buscar=$_POST['buscar'];
}
$buscar=$_POST['buscar'];
$SQL_READ= "SELECT * FROM lectura WHERE nombre LIKE '%" .$buscar."%' or apellido LIKE '%" .$buscar."%'";

$sql_query= mysqli_query($conex,$SQL_READ);
?>