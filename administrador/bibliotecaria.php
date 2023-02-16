<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    <link rel="stylesheet" href="../css/adm1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="sidebar">
        <center>
            <img src="../img/logobaul.png" class="profile_image" alt="">
            <h2>Leonardo</h2>
            <h3>ADMINISTRADOR</h3>
        </center>
        <a href="usuarios.php"><i><img src="../img/iconos/icono1.png" width="30" height="30" alt=""></i><span>Lista de Usuarios</span></a>
        <a href="libros.php" ><i><img src="../img/iconos/icono5.png" width="30" height="30" alt=""></i><span>Lista de libros</span></a>
        <a href="bibliotecaria.php"><i><img src="../img/iconos/icono3.png" width="30" height="30" alt=""></i><span>Datos de Bibliotecaria</span></a>
        <a href="prestamos.php"><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content">
        <div class="informacion">
            <p></p>&nbsp
        <h1>DATOS DE LA BIBLIOTECARIA</h1><br/>
      <div class="reportes" style="display:flex">

        </div><br/>


      <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th colspan=7 style="text-align:center"><a href="register_usuario.php" style="font-size:18px" class="badge badge-primary">REGISTRAR NUEVO USUARIO</a></th>
            </tr>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ROL</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">C.I.</th>
            <th scope="col">EMAIL</th>
          </tr>
        </thead>
        <?php
        include 'buscar_usuario.php';
          $inc = require_once("../conexion.php");
          $consulta = "SELECT * FROM usuarios WHERE usuarios.rol=2";
          $result = mysqli_query($conex,$consulta);
          while($filas = $result->fetch_array()) {
          ?>
          <tr>
            
            <td><?php echo $filas['id']?></td>
            <td><?php echo $filas['rol']?></td>
            <td><?php echo $filas['nombre']?></td>
            <td><?php echo $filas['apellido']?></td>
            <td><?php echo $filas['ci']?></td>
            <td><?php echo $filas['email']?></td>
            <td>
              <a href=<?php echo './editar_user.php?id='.$filas['id']; ?>>Editar</a>
              <a href=<?php echo './eliminar_user.php?id='.$filas['id']; ?>>Eliminar</a>
            </td>
          </tr>
          <?php } ?>
        
      </table>
    </div>
    </div>
</body>
<script src="../main.js"></script>
</html>