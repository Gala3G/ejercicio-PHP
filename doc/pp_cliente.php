<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoClub</title>

    <link rel="icon" type="image/x-icon" href="src/favicon.ico"><!-- icono pestaña favicon-->


    <style>
        <?php include 'prueba.css'; ?>
    </style>

</head>

<body>


    <div class="navbar">
        <img src="src/logoPag.png" width="50px" id="logo">

        <ul>
            <li><a href="http://localhost:80/videoclub/doc/cliente_alquilar.php">Alquilar</a></li>
            <li><a href="http://localhost:80/videoclub/doc/cliente_devolver.php">Devolver</a></li>
            <li><a href="http://localhost:80/videoclub/doc/cliente_listado.php">Listado</a></li>
            <li id="login"><a href="http://localhost:80/videoclub/doc/pp.php">Logout</a></li>
        </ul>

    </div>

    <?php

    include("conexion.php");
    session_start();

    $_SESSION['nombre'];
    $_SESSION['idcliente'];
    $a = $_SESSION['nombre'];
    echo '<h1>Hola ' . $a . '<h1> <br>';  ?>

    <div class="container">
        <h2>Pagina Principal</h2>
    
        <?php
        echo '<div class="cinePP"><img src="src/cinePP.jpg"></div>
        </div>
  

</body>

</html>';
    ?>