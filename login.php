<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>INICIAR SESIÓN</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    
<header>
        <nav class='navegacion'>
            <section class="contlogo">
                <div class='header'>
                <img src="img/logobaul.png" alt="" id='logo'>
                <h1>BIBLIOTECA "EL BAÚL DEL LIBRO"</h1>
                 <img src="img/logo1.png" alt="" id='logo1'>
                </div>
                <nav class='menu_nav' id='menu'>
                    <a href="index.php">VOLVER A LA PÁGINA DE INICIO</a>
                </nav>
            </section>
        </nav>
        </header>&nbsp
        <p></p>&nbsp<p></p>&nbsp<p></p>&nbsp

        <div class="container">
            <img style="border-radius: 40px;" src="img/login.jpg" width="630" height="430" alt="">
            
        <form class="form" method="post" style="border-radius: 40px;" action="validacion.php">
        <img class="profile" src="img/login1.jpg" width="118" height="118" alt="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ingrese su CI</label>
                <input type="number" class="form-control" id="exampleInputEmail1" onkeypress="return numeros(event)"  name="ci" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Guardar Sesion</label>
            </div>
            <button type="submit" class="btn btn-dark" name="aceptar" value="aceptar">Iniciar Sesion</button>
        </form>
    </div>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
</body>
</html>