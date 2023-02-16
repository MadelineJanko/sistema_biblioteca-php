<?php

$ci=$_POST['ci'];
$pass=$_POST['pass'];

$inc = include("conexion.php");
$consulta = "SELECT * FROM usuarios WHERE ci='$ci' and pass='$pass'";

$resultado = mysqli_query($conex,$consulta);
$row = $resultado->fetch_array();
if ($resultado->num_rows>0)
{  
    if($row['rol']==1)
        { 
            
            header("location:p_admin.php");
            
        }
    else 
       {if($row['rol']==2)
        { 
            
            header("location:p_bibliotecaria.php");
            
        }
        else
        {
            $id= $row['id'];
            header("location:socio/p_socio.php?id=$id");
        }
    } 
}
else
{
    include("login.php");
    echo "";
}


?>