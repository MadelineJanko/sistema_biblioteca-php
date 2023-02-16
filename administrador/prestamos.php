<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRÉSTAMOS</title>
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
        <h1>LISTA DE PRÉSTAMOS</h1><br/>
        <div class="reportes" style="display:flex">
      <form action="pdf_diario.php">
        <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger">GENERAR REPORTE DIARIO PDF</button>
    </form><p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp
    <form action="pdf_mes.php" method="POST" autocomplete="off">
        <select style="font-size: 15px;" name="buscar">
            <option value="">ELIGE EL MES</option>
            <option value="01">ENERO</option>
            <option value="02">FEBRERO</option>
            <option value="03">MARZO</option>
            <option value="04">ABRI</option>
            <option value="05">MAYO</option>
            <option value="06">JUNIO</option>
            <option value="07">JULIO</option>
            <option value="08">AGOSTO</option>
            <option value="09">SEPTIEMBRE</option>
            <option value="10">OCTUBRE</option>
            <option value="11">NOVIEMBRE</option>
            <option value="12">DICIEMBRE</option>                
        </select>
          
          <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger" > GENERAR REPORTE MENSUAL PDF</button>
        </form><br/>
        </div><br/>
        <h2>Buscador por Notas:</h2>
        <form action="prestamos.php" method="POST" onkeypress="return valnombre(event)" autocomplete="off">
          <input type="text" name="buscar">
          <input type="submit" value="Buscar">
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
          include 'buscar_prestamo.php';

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
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/28e24ab6cf.js" crossorigin="anonymous"></script>
</html>