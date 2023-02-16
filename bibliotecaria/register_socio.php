<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILIOTECARIA</title>
    <link rel="stylesheet" href="../css/adm1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
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
        <h1>REGISTRAR NUEVO SOCIO</h1><br/>
        <form action="registrar_socio.php" method="POST" enctype="multipart/form-data">
            <div class="contenedor">
                <div class="fila">
                    <label>TIPO DE USUARIO:</label>
                    <input type="text" REQUIRED name="rol" readonly autocomplete="off" value="3"/><br/>
                </div>
                <div class="fila">
                    <label>NOMBRES</label>
                    <input type="text" REQUIRED name="nombre" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>APELLIDOS</label>
                    <input type="text" REQUIRED name="apellido" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>C.I.</label>
                    <input type="number" REQUIRED name="ci" onkeypress="return numeros(event)" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>EMAIL</label>
                    <input type="text" REQUIRED name="email" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>PASSWORD</label>
                    <input type="int" REQUIRED name="pass" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>DIRECCIÓN</label>
                    <input type="text" REQUIRED name="direccion" autocomplete="off" value=""/><br/>
                </div>
                <div class="fila">
                    <label>TELÉFONO</label>
                    <input type="int" REQUIRED name="telefono" onkeypress="return numeros(event)" autocomplete="off" value=""/><br/>
                </div>
                    <input type="submit" value="Guardar">
            </div>
        </form>
        
      
    </div>
    </div>
</body>
<script src="../main.js"></script>
<script src="https://kit.fontawesome.com/1460d28d58.js" crossorigin="anonymous"></script>
</html>