<?php
include '../conexion.php';
if(!isset($_POST['buscar'])){
    $_POST['buscar']="";
    $buscar=$_POST['buscar'];
}
$buscar=$_POST['buscar'];
$SQL_READ= "SELECT * FROM libro WHERE titulo LIKE '%".$buscar."%' OR autor like'%".$buscar."%'OR genero like'%".$buscar."%'";

$sql_query= mysqli_query($conex,$SQL_READ);
?>