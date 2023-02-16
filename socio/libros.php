<?php 

include("../conexion.php");

$id=$_GET['id'];
$consulta="SELECT * FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conex,$consulta);

$row=mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCIO</title>
    
    <link rel="stylesheet" href="../css/socio.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="sidebar">
        <center>
            <img src="../img/logobaul.png" class="profile_image" alt="">
            <h2 style="font-size: 23px;"><?php echo $row['nombre']?></h2><br/>
            <h3 style="font-size: 23px;"> BIENVENIDO SOCI@</h3>
        </center>
        <a href=<?php echo 'datos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono5.png" width="30" height="30" alt=""></i><span>Datos</span></a>
        <a href=<?php echo 'libros.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Catálogo de Lbros</span></a>
        <a href=<?php echo 'prestamos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content1">
    <div class="informacion1">
        <p></p>&nbsp
        <h1>CATÁLOGO DE LIBROS</h1><br/>
        <div id="libro">
            <?php
                include("listarlibros.php");
            ?>
        </div>
        </div>
    </div>
</body>
</html>