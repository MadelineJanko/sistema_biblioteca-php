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
        <h1>LISTA DE LECTORES</h1><br/>
        <div class="reportes" style="display:flex">
        <form action="pdf_diariolectura.php">
        <i style="color: red;" class="fas fa-file-pdf"></i>
        <button type="submit" class="btn btn-danger">GENERAR REPORTE DIARIO PDF</button>
    </form><p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp<p></p>&nbsp
    <form action="pdf_meslectura.php" method="POST" autocomplete="off">
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
        <h2>Buscador por Nombre o Apellido:</h2>
        <form action="lectura.php" method="POST" onkeypress="return valnombre(event)" autocomplete="off">
          <input type="text" name="buscar">
          <input type="submit" value="Buscar">
        </form><br/>

      <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th colspan=7 style="text-align:center"><a href="register_lectura.php" style="font-size:18px" class="badge badge-primary">REGISTRAR NUEVO LECTOR</a></th>
            </tr>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">LIBRO</th>
            <th scope="col">FECHA</th>
            <th scope="col">C.I.</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">¿DEVUELTO?</th>
            <th scope="col">OPERACIONES</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'buscar_lector.php';

          while($row = mysqli_fetch_array($sql_query)) {
          ?>
          <tr>
            
            <td><?= $row['id']?></td>
            <td>
            <?php
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
            ?>
            </td>
            <td><?= $row['fecha']?></td>
            <td><?= $row['ci']?></td>
            <td><?= $row['nombre']?></td>
            <td><?= $row['apellido']?></td>
            <td><?= $row['devuelto']?></td>
            <td style="text-align:center">  
              <a href=<?php if($row['devuelto']=='no') echo 'modificar_lectura.php?id='.$row['id']; else echo 'no.php'?> style="font-size:15px" class="badge badge-warning">Devolución</a>
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