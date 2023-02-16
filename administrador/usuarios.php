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
        
        <a href="prestamos.php"><i><img src="../img/iconos/icono4.png" width="30" height="30" alt=""></i><span>Préstamos</span></a>
        <a href="../login.php"><i><img src="../img/iconos/icono2.png" width="30" height="30" alt=""></i><span>Cerrar Sesión</span></a>
    </div>

    <div class="content">
        <div class="informacion">
            <p></p>&nbsp
        <h1>LISTA DE USUARIOS</h1><br/>
      <div class="reportes" style="display:flex">
      <form action="pdf_listausuario.php">
        <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger">GENERAR REPORTE PDF</button>
    </form><p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp
        </div><br/>
        <h2>Buscador por Nombre o Apellido:</h2>
        <form action="usuarios.php" method="POST" onkeypress="return valnombre(event)" autocomplete="off">
          <input type="text" name="buscar">
          <input type="submit" value="Buscar">
        </form><br/>

      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ROL</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">C.I.</th>
            <th scope="col">EMAIL</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'buscar_usuario.php';

          while($row = mysqli_fetch_array($sql_query)) {
          ?>
          <tr>
            
            <td><?= $row['id']?></td>
            <td><?= $row['rol']?></td>
            <td><?= $row['nombre']?></td>
            <td><?= $row['apellido']?></td>
            <td><?= $row['ci']?></td>
            <td><?= $row['email']?></td>
          </tr>
          
          <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/28e24ab6cf.js" crossorigin="anonymous"></script>
</html>