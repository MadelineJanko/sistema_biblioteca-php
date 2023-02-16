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
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
<div class="sidebar">
        <center>
            <img src="../img/logobaul.png" class="profile_image" alt="">
            <h2><?php echo $row['nombre']?></h2><br/>
            <h3> BIENVENIDO SOCI@</h3>
        </center>
        <a href=<?php echo 'datos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono5.png" width="30" height="30" alt=""></i><span>Datos</span></a>
        <a href=<?php echo 'libros.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Catálogo de Libros</span></a>
        <a href=<?php echo 'prestamos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content2">

    </div>
</body>
</html>