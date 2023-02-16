<?php
    include("../conexion.php");
    $id=$_POST['id'];
    $libro=$_POST['libro'];
    $socio=$_POST['id'];
    $fecha=$_POST['fecha'];
    

    $query ="INSERT INTO prestamo(fecha,id_libro,id_socio,notas,deuda) VALUES('$fecha','$libro','$socio','sin devolver','50')";
    $resultado = $conex->query($query);

    $sql="UPDATE libro SET n_actual=n_actual-1 WHERE id='$libro'";
    $resultado = mysqli_query($conex,$sql);

    if($resultado){
        header("Location: prestamo.php");
    }
    else{
        echo "no se inserto";
    }
?>