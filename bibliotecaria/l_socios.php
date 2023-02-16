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
        <h1>LISTA DE SOCIOS</h1><br/>
      <div class="reportes" style="display:flex">
      <form action="pdf_listasocio.php">
        <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger">GENERAR REPORTE DE SOCIOS PDF</button>
    </form>
        </div><br/>
        <h2>Buscador por Nombre:</h2>
        <form action="l_socios.php" method="POST" onkeypress="return valnombre(event)" autocomplete="off">
          <input type="text" name="buscar">
          <input type="submit" value="Buscar">
        </form><br/>

      <table class="table table-bordered table-sm table-dark">
        <thead>
            <tr>
                <th colspan=8 style="text-align:center"><a href="register_socio.php" style="font-size:18px" class="badge badge-primary">REGISTRAR NUEVO USUARIO</a></th>
            </tr>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">C.I.</th>
            <th scope="col">EMAIL</th>
            <th scope="col">DIRECCIÓN</th>
            <th scope="col">TELÉFONO</th>
            <th scope="col">OPERACIONES</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'buscar_socio.php';

          while($row = mysqli_fetch_array($sql_query)) {
          ?>
          <tr>
            
            <td><?= $row['id']?></td>
            <td><?= $row['nombre']?></td>
            <td><?= $row['apellido']?></td>
            <td><?= $row['ci']?></td>
            <td><?= $row['email']?></td>
            <td>
            <?php
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
            ?>
            </td>
            <td>
            <?php
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
            ?>
            </td>
            <td style="text-align:center">
              <a href=<?php echo 'modificar_socio.php?id='.$row['id']; ?> style="font-size:15px" class="badge badge-warning">Editar</a>
              <a href=<?php echo 'eliminar_socio.php?id='.$row['id']; ?> style="font-size:15px" class="badge badge-danger">Eliminar</a><br/>
              <a href=<?php echo 'pedir_prestamo.php?id='.$row['id']; ?> style="font-size:15px" class="badge badge-primary">Préstamo</a>
            </td>
          </tr>
          
          <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/1460d28d58.js" crossorigin="anonymous"></script>
</html>