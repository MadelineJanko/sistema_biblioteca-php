<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LIBROS</title>
    <link rel="stylesheet" href="../css/adm1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
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

    <div class="content1">
        <div class="informacion1">
            <p></p>&nbsp
        <h1>LISTA DE LIBROS</h1><br/>
      <div class="reportes" style="display:flex">
      <form action="pdf_listalibros.php">
        <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger">GENERAR REPORTE PDF</button>
    </form>
        </div><br/>
        <h2>Buscador por Titulo, Autor o Género:</h2>
        <form action="libros.php" method="POST" autocomplete="off">
          <input type="text" name="buscar">
          <input type="submit" value="Buscar">
        </form><br/>

      <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th colspan=9 style="text-align:center"><a href="register_libro.php" style="font-size:18px" class="badge badge-primary">REGISTRAR NUEVO LIBRO</a></th>
            </tr>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">TITULO</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">IDIOMA</th>
            <th scope="col">AUTOR</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">DISPONIBLE</th>
            <th scope="col">OPERACION</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'buscar_libro.php';

          while($row = mysqli_fetch_array($sql_query)) {
          ?>
          <tr>
            
            <td><?= $row['id']?></td>
            <td><?= $row['titulo']?></td>
            <td style="text-align:center"><img height="120" width="120" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
            <td><?= $row['idioma']?></td>
            <td><?= $row['autor']?></td>
            <td><?= $row['genero']?></td>
            <td><?= $row['n_orden']?></td>
            <td><?= $row['n_actual']?></td>
            <td style="text-align:center">
            <a href=<?php echo 'modificar_libro.php?id='.$row['id']; ?> style="font-size:15px" class="badge badge-warning">Editar</a><p></p>&nbsp
              <a href=<?php echo 'eliminar_libro.php?id='.$row['id']; ?> style="font-size:15px" class="badge badge-danger">Eliminar</a>
            </td>
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