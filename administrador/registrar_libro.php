<?php
    include("../conexion.php");
    $titulo=$_POST['titulo'];
    $poster=addslashes(file_get_contents($_FILES['poster']['tmp_name']));
    $idioma=$_POST['idioma'];
    $autor=$_POST['autor'];
    $genero=$_POST['genero'];
    $cantidad=$_POST['cantidad'];
    $editorial=$_POST['editorial'];

    $query ="INSERT INTO libro(titulo,imagen,idioma,autor,genero,n_orden,n_actual,id_editorial,id_admin) VALUES('$titulo','$poster','$idioma','$autor','$genero','$cantidad','$cantidad','$editorial',1)";
    $resultado = $conex->query($query);

    if($resultado){
        header("Location: libros.php");
    }
    else{
        echo "no se inserto";
    }
?>