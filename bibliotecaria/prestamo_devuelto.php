<?php 

include("../conexion.php");

$id=$_GET['id'];
$consulta="SELECT * FROM prestamo WHERE id='$id'";
$resultado = mysqli_query($conex,$consulta);

$row=mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILIOTECARIA</title>
    <link rel="stylesheet" href="../css/adm1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="sidebar">
        <center>
            <img src="../img/logobaul.png" class="profile_image" alt="">
            <h2>Madeline</h2>
            <h3>BIBLIOTECARIA</h3>
        </center>
        <a href="l_socios.php"><i><img src="../img/iconos/icono1.png" width="30" height="30" alt=""></i><span>Lista de Socios</span></a>
        <a href="lectura.php"><i><img src="../img/iconos/icono5.png" width="30" height="30" alt=""></i><span>Lista de Lectores</span></a>
        <a href="libros.php"><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Lista de Libros</span></a>
        <a href="prestamo.php"><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content">
        <div class="informacion">
            <p></p>&nbsp
            <h1>PRÉSTAMO A DEVOLVER</h1><br/>
            <form action="devuelto_prestamo.php" method="POST" enctype="multipart/form-data">
            <div class="contenedor3">
            <div class="fila">
                    <label>ID</label>
                    <input type="text" REQUIRED name="id" autocomplete="off" readonly value="<?php echo $row['id']?>"/><br/>
                </div>
                <div class="fila">
                    <label>FECHA DE PRÉSTAMO:</label>
                    <input type="date" REQUIRED name="fecha" readonly autocomplete="off" value="<?php echo $row['fecha']?>"/><br/>
                </div>
                <div class="fila">
                    <label>ID DEL LIBRO:</label>
                    <input type="int" REQUIRED name="id_libro" readonly autocomplete="off" value="<?php echo $row['id_libro']?>"/><br/>
                </div>
                <div class="fila">
                    <label>LIBRO:</label>
                    <input type="text" REQUIRED name="libro" readonly value="<?php
                if(isset($row['id_libro']))
                {
                    $dato_final="";
                    $inc = require_once("../conexion.php");
                    $consulta = "SELECT titulo FROM libro where libro.id=".$row['id_libro'];
                    $result = mysqli_query($conex,$consulta);
                    while($filas = $result->fetch_array()) {
                        $dato_final=$filas[0];
                    } 
                    echo $dato_final;
                }
            ?>"/><br/>
                </div>
                <div class="fila">
                    <label>NOMBRES:</label>
                    <input type="text" REQUIRED name="nombre" readonly value="<?php
                    if(isset($row['id_socio']))
                {
                    $dato_final="";
                    $inc = require_once("../conexion.php");
                    $consulta = "SELECT usuarios.nombre FROM socio,usuarios where socio.id=".$row['id_socio']." and usuarios.id=socio.id_usuario";
                    $result = mysqli_query($conex,$consulta);
                    while($filas = $result->fetch_array()) {
                        $dato_final=$filas[0];
                    } 
                    echo $dato_final;
                }?>"/><br/>
                </div>
                <div class="fila">
                    <label>APELLIDOS:</label>
                    <input type="text" REQUIRED name="apellido" readonly autocomplete="off" value="<?php  
                    if(isset($row['id_socio']))
                {
                    $dato_final="";
                    $inc = require_once("../conexion.php");
                    $consulta = "SELECT usuarios.apellido FROM socio,usuarios where socio.id=".$row['id_socio']." and usuarios.id=socio.id_usuario";
                    $result = mysqli_query($conex,$consulta);
                    while($filas = $result->fetch_array()) {
                        $dato_final=$filas[0];
                    } 
                    echo $dato_final;
                }?>"/><br/>
                </div>
                <div class="fila">
                    <label>FECHA DE DEVOLUCIÓN:</label>
                    <input type="date" REQUIRED name="devolucion" autocomplete="off" value="<?php echo $row['fecha_devolucion']?>"/><br/>
                </div>
                <div class="fila">
                    <label>NOTAS</label>
                    <input type="text" REQUIRED name="notas" autocomplete="off" value="<?php echo $row['notas']?>"/><br/>
                </div>
                <div class="fila">
                    <label>DEUDA</label>
                    <input type="int" REQUIRED name="deuda" onkeypress="return numeros(event)" autocomplete="off" value="<?php echo $row['deuda']?>"/><br/>
                </div>
                    <input type="submit" value="Guardar">
            </div>
        </form>
    
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/1460d28d58.js" crossorigin="anonymous"></script>
</html>