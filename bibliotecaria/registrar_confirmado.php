<?php 

include("../conexion.php");

$consulta="SELECT * FROM usuarios WHERE id=(SELECT MAX(id) FROM usuarios)";
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
            <h1>CONFIRME EL REGISTRO</h1><br/>
        <form action="registrar_socioconfirmado.php" method="POST" enctype="multipart/form-data">
            <div class="contenedorlibro">
                <div class="fila">
                    <label>ID</label>
                    <input type="text" REQUIRED name="id" autocomplete="off" readonly value="<?php echo $row['id']?>"/><br/>
                </div>
                <div class="fila">
                    <label>NOMBRES</label>
                    <input type="text" REQUIRED name="nombre" readonly onkeypress="return valnombre(event)" autocomplete="off" value="<?php echo $row['nombre']?>"/><br/>
                </div>
                <div class="fila">
                    <label>APELLIDOS</label>
                    <input type="text" REQUIRED name="apellido" readonly onkeypress="return valnombre(event)" autocomplete="off" value="<?php echo $row['apellido']?>"/><br/>
                </div>
                <div class="fila">
                    <label>C.I.</label>
                    <input type="number" REQUIRED name="ci" readonly onkeypress="return numeros(event)" autocomplete="off" value="<?php echo $row['ci']?>"/><br/>
                </div>
                <div class="fila">
                    <label>EMAIL</label>
                    <input type="text" REQUIRED name="email" readonly autocomplete="off" value="<?php echo $row['email']?>"/><br/>
                </div>
                <div class="fila">
                    <label>PASSWORD</label>
                    <input type="int" REQUIRED name="pass" readonly autocomplete="off" value="<?php echo $row['pass']?>"/><br/>
                </div>
                <div class="fila">
                    <label>DIRECCIÓN</label>
                    <input type="text" REQUIRED name="direccion" readonly autocomplete="off" value="<?php 
                    if(isset($row['id']))
                {
                    $dato_final="";
                    $inc = require_once("../conexion.php");
                    $consulta = "SELECT direccion FROM socio where socio.id=(SELECT MAX(id) FROM socio)";
                    $result = mysqli_query($conex,$consulta);
                    while($filas = $result->fetch_array()) {
                        $dato_final=$filas[0];
                    } 
                    echo $dato_final;
                }?>"/><br/>
                </div>
                <div class="fila">
                    <label>TELÉFONO</label>
                    <input type="int" REQUIRED name="telefono" readonly autocomplete="off" value="<?php
                    if(isset($row['id']))
                    {
                        $dato_final="";
                        $inc = require_once("../conexion.php");
                        $consulta = "SELECT telefono FROM socio where socio.id=(SELECT MAX(id) FROM socio)";
                        $result = mysqli_query($conex,$consulta);
                        while($filas = $result->fetch_array()) {
                            $dato_final=$filas[0];
                        } 
                        echo $dato_final;
                    }
                    ?>"/><br/>
                </div>
                    <input type="submit" value="Confirmar">
            </div>
        </form>
        
      
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/1460d28d58.js" crossorigin="anonymous"></script>
</html>