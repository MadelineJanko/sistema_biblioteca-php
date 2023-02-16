<?php 

include("../conexion.php");

$id=$_GET['id'];
$consulta="SELECT * FROM libro WHERE id='$id'";
$resultado = mysqli_query($conex,$consulta);

$row=mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
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

    <div class="content3">
        <div class="informacion1">
            <p></p>&nbsp
            <h1>MODIFICAR EL LIBRO</h1><br/>
            <div class="imag" style="display:flex">
            <form action="editar_libro.php" method="POST" enctype="multipart/form-data">
            <div class="contenedor3">
            <div class="fila">
                    <label>ID</label>
                    <input type="text" REQUIRED name="id" autocomplete="off" readonly value="<?php echo $row['id']?>"/><br/>
                </div>
                <div class="fila">
                    <label>TITULO:</label>
                    <input type="text" REQUIRED name="titulo" autocomplete="off" value="<?php echo $row['titulo']?>"/><br/>
                </div>
                <div class="fila">
                    <label>VUELVA A ELEGIR LA IMAGEN DE REFERENCIA:</label>
                    <input type="file" name="poster" accept="image/*"/><br/>
                </div>
                <div class="fila">
                    <label>IDIOMA</label>
                    <input type="text" REQUIRED name="idioma" autocomplete="off" value="<?php echo $row['idioma']?>"/><br/>
                </div>
                <div class="fila">
                    <label>AUTOR</label>
                    <input type="text" REQUIRED name="autor" onkeypress="return valnombre(event)" autocomplete="off" value="<?php echo $row['autor']?>"/><br/>
                </div>
                <div class="fila">
                    <label>GENERO</label>
                    <input type="text" REQUIRED name="genero" autocomplete="off" value="<?php echo $row['genero']?>"/><br/>
                </div>
                <div class="fila">
                    <label>CANTIDAD</label>
                    <input type="int" REQUIRED name="cantidad" onkeypress="return numeros(event)" autocomplete="off" value="<?php echo $row['n_orden']?>"/><br/>
                </div>
                <div class="fila">
                    <label>DISPONIBLE</label>
                    <input type="int" REQUIRED name="disponible" onkeypress="return numeros(event)" autocomplete="off" value="<?php echo $row['n_actual']?>"/><br/>
                </div>
                    <input type="submit" value="Guardar">
            </div>
        </form>
        <img height="300px" width="300px" style="margin-left:-210px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/><br/>
        </div>
    </div>
    </div>
</body>
<script src="../main.js"></script>
</html>