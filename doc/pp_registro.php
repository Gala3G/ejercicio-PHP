<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoClub</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="icon" type="image/x-icon" href="src/favicon.ico"><!-- icono pestaña favicon-->
    <style>
        <?php include 'prueba.css'; ?>
    </style>
</head>

<body>
    <div class="navbar">
        <img src="src/logoPag.png" width="50px" id="logo">

        <ul>
            <li><a href="http://localhost:80/videoclub/doc/pp_login.php">LOGIN</a></li>

        </ul>
    </div>

    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("conexion.php");
    session_start();


    if (!isset($_POST["submit"])) {


        echo ' <form method="post" action="pp_registro.php">
        <div class="mx-auto w-25 pt-4">
            <h2>DARSE DE ALTA</h2>
            <label for="text" class="form-label"></label>
            <input type="text" class="form-control" id="text" placeholder="Nombre" name="nombre">
        </div>
        <div class="mx-auto w-25">
            <label for="pwd" class="form-label"></label>
            <input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="pswd">
        </div>
        <div class="mx-auto w-25 pt-4">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
        <div class="mx-auto w-25 pt-4">
            <a href="http://localhost:80/videoclub/doc/pp.php">Volver al Menu Principal</a></li>
        </div>


    </form>';

    } else {

        $N = $_POST["nombre"];
        $P = $_POST["pswd"];

        $consulta = "INSERT INTO clientes (cod, nombre, pswd) VALUES ('1','$N','$P')";
        $paquete = mysqli_query($conexion, $consulta);

        
        echo ' 

            <br><h3>Alta correcta <h3> <br>
            <a href="pp_login.php">Introduce tus datos en Login para acceder</a>
      </div>';
    }

    echo '</body></html>';

    ?>