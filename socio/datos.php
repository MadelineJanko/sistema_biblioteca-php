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
        <a href=<?php echo 'libros.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Catálogo de Libros</span></a>
        <a href=<?php echo 'prestamos.php?id='.$row['id']; ?>><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content1">
        <div class="informacion1">
        <p></p>&nbsp
        <h1>DATOS PERSONALES</h1><br/>
        <div class="datos">
        <form action="registrar_socioconfirmado.php" method="POST" enctype="multipart/form-data">
            <div class="contenedordato">
                <div class="fila">
                    <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ID</label>
                    <input type="text" REQUIRED name="id" size="2" autocomplete="off" readonly value="<?php echo $row['id']?>"/><br/><br/>
                    <label>&nbsp NOMBRES</label>
                    <input type="text" REQUIRED name="nombre" readonly size="4"  autocomplete="off" value="<?php echo $row['nombre']?>"/><br/><br/>
                    <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp C.I.</label>
                    <input type="number" REQUIRED name="ci" size="8" readonly  autocomplete="off" value="<?php echo $row['ci']?>"/><br/><br/>
                    <label>DIRECCIÓN</label>
                    <input type="text" REQUIRED name="direccion" size="14" readonly autocomplete="off" value="<?php
                    if(isset($row['id']))
                    {
                        $dato_final="";
                        $inc = require_once("../conexion.php");
                        $consulta = "SELECT direccion FROM socio where socio.id_usuario=".$row['id'];
                        $result = mysqli_query($conex,$consulta);
                        while($filas = $result->fetch_array()) {
                            $dato_final=$filas[0];
                        } 
                        echo $dato_final;
                    }
                    ?>"/><br/><br/>
                </div>
                <div class="fila1">
                     <label></label><br/>&nbsp
                    <p></p>&nbsp 
                    <label>APELLIDOS</label>
                    <input type="text" REQUIRED name="apellido" size="14" readonly autocomplete="off" value="<?php echo $row['apellido']?>"/><br/><br/>
                    <label>&nbsp &nbsp &nbsp &nbsp &nbsp EMAIL</label>
                    <input type="text" REQUIRED name="email" size="16" readonly autocomplete="off" value="<?php echo $row['email']?>"/><br/><br/>
                    <label>&nbsp &nbsp TELÉFONO</label>
                    <input type="int" REQUIRED name="telefono" size="12" readonly autocomplete="off" value="<?php
                    if(isset($row['id']))
                    {
                        $dato_final="";
                        $inc = require_once("../conexion.php");
                        $consulta = "SELECT telefono FROM socio where socio.id_usuario=".$row['id'];
                        $result = mysqli_query($conex,$consulta);
                        while($filas = $result->fetch_array()) {
                            $dato_final=$filas[0];
                        } 
                        echo $dato_final;
                    }
                    ?>"/><br/><br/>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/28e24ab6cf.js" crossorigin="anonymous"></script>
</html>