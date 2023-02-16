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

    <div class="content1">
    <div class="informacion">
            <p></p>&nbsp
        <h1>REGISTRAR PRÉSTAMO</h1><br/>
        <form action="prestamo_confirmado.php" method="POST" enctype="multipart/form-data">
            <div class="contenedorlibro">
                <div class="fila">
                    <label>ID</label>
                    <input type="text" REQUIRED name="id" autocomplete="off" readonly value="<?php echo $row['id']?>"/><br/>
                </div>
                <div class="fila">
                    <label>NOMBRES</label>
                    <input type="text" REQUIRED name="nombre" readonly autocomplete="off" value="<?php echo $row['nombre']?>"/><br/>
                </div>
                <div class="fila">
                    <label>APELLIDOS</label>
                    <input type="text" REQUIRED name="apellido" readonly autocomplete="off" value="<?php echo $row['apellido']?>"/><br/>
                </div>
                <div class="fila">
                    <label>FECHA DE PRÉSTAMO</label>
                    <input type="date" REQUIRED name="fecha"  autocomplete="off" value=""/><br/>
                </div>
                <?php 

                include("../conexion.php");
                 $resultado = mysqli_query($conex,"select id,titulo from libro");
    ?>
                <div class="fila">
                    <table>
                        <tr>
                            <th style="color:white">TITULO DEL LIBRO</th>
                        </tr>
                        <td>
                            <select name="libro">
                                <?php
                                while ($fila=$resultado->fetch_assoc()):
                                $id=$fila['id'];
                                $nombre=$fila['titulo'];
                                echo "<option value=$id>$nombre</option>";
                                endwhile;
                                ?>
                            </select>
                        </td>
                    </table>
                </div><br/>
                
                    <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/1460d28d58.js" crossorigin="anonymous"></script>
</html>