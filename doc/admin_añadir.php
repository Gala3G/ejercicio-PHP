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
            <li><a href="http://localhost:80/videoclub/doc/admin_clientes.php">Clientes</a></li>
            <li><a href="http://localhost:80/videoclub/doc/admin_peliculas.php">Peliculas</a></li>
            <li><a href="http://localhost:80/videoclub/doc/admin_añadir.php">Añadir</a></li>
            <li><a href="http://localhost:80/videoclub/doc/admin_eliminar.php">Eliminar</a></li>
            <li><a href="http://localhost:80/videoclub/doc/admin_disponibilidad.php">Disponibilidad</a></li>
            <li id="login"><a href="http://localhost:80/videoclub/doc/pp.php">Logout</a></li>
        </ul>

    </div>

    <?php

    include('conexion.php');
    session_start();

    $_SESSION['nombre'];
    $a = $_SESSION['nombre']; ?>


    <?php echo '<h1>Hola ' . $a . '<h1> <br>'; ?>


    <div class="container">
        <h2>Añadir Películas</h2>
        
        
        <?php




        if (!isset($_POST["submit"])) {

        echo ' <form method="post" action="admin_añadir.php"> 
            
        <table> 
        
        <th>Titulo</th><th>Director</th><th>Disponibilidad</th><th>Añadir</th><tr>
        
        <td> <input type="text" name="titulo"> </td>
        <td> <input type="text" name="director"> </td>
        <td> <input type="text" name="dispo"> </td>

        <td> <input type="submit" name="submit" value="Enviar"> </td>

        </form>
        </table> ';

        } else {
            
            
            $titulo = $_POST["titulo"];
            $director = $_POST["director"];
            $dispo = $_POST["dispo"];

            $consulta = "INSERT INTO peliculas (titulo,director,dispo) VALUES ('$titulo','$director','$dispo')";
            $paquete = mysqli_query($conexion, $consulta);

            echo '<br><h3>Película "' . $titulo . '" añadida correctamente</h3> <br>';
            echo '<h3><a href="cliente_alquilar.php">Volver a menu</a></h3>


      </div>';
        }



        echo '</body></html>';

        ?>