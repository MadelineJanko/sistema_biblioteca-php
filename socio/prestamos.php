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
        <a href=<?php echo 'libros.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Catálogo</span></a>
        <a href=<?php echo 'prestamos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content1">
    <div class="informacion1">
        <p></p>&nbsp
        <h1>TUS PRÉSTAMOS</h1><br/>
        
        </form><br/>

      <table class="table table-bordered table-sm table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">FECHA PRESTAMO</th>
            <th scope="col">LIBRO</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">FECHA DEVOLUCION</th>
            <th scope="col">NOTAS</th>
            <th scope="col">DEUDA</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'listar_prestamos.php';

          while($row = mysqli_fetch_array($sql_query)) {
          ?>
          <tr>
            
            <td><?= $row['id']?></td>
            <td><?= $row['fecha']?></td>
            <td><?php
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
            ?></td>
            <td><?php
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
                }
            ?></td>
            <td>
            <?php
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
                }
            ?>
            </td>
            <td><?= $row['fecha_devolucion']?></td>
            <td><?= $row['notas']?></td>
            <td><?= $row['deuda']?></td>
            
          </tr>
          
          <?php } ?>
        </tbody>
      </table>
        </div>
    </div>
</body>
</html>