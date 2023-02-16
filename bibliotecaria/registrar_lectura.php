<?php
    include("../conexion.php");
    $libro=$_POST['libro'];
    $ci=$_POST['ci'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $fecha=$_POST['fecha'];

    $query ="INSERT INTO lectura(id_libro,fecha,ci,nombre,apellido,devuelto) VALUES('$libro','$fecha','$ci','$nombre','$apellido','no')";
    $resultado = $conex->query($query);

    $sql="UPDATE libro SET n_actual=n_actual-1 WHERE id='$libro'";
    $resultado = mysqli_query($conex,$sql);

    if($resultado){
        header("Location: lectura.php");
    }
    else{
        echo "no se inserto";
    }
?>