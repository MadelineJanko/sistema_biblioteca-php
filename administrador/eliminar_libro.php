<?php 

include("../conexion.php");

$id=$_GET['id'];
$sql="DELETE FROM libro WHERE id='$id'";
$query=mysqli_query($conex,$sql);

    if($query)
    {
        Header("Location:libros.php");
    }

?>