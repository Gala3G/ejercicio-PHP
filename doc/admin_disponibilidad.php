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

    include("conexion.php");
    session_start();

    $_SESSION['nombre'];
    $a = $_SESSION['nombre']; ?>


    <?php echo '<h1>Hola ' . $a . '<h1> <br>'; ?>


    <div class="container">
        <h2>Listado de Películas Disponibles</h2>
        <?php

        $consulta = "select * from peliculas";
        $paquete = mysqli_query($conexion, $consulta);

        
        $contador = 0;

        echo '
<table>
      
      <th>ID</th><th>Titulo</th><th>Disponibles</th></tr>';
        while (($fila = mysqli_fetch_array($paquete))) {

            if ($fila['dispo'] > 0) {
                $contador++;
               
            }
                echo '<td>' . $fila['idpelicula'] . '</td>';
                echo '<td>' . $fila['titulo'] . '</td>';
                echo '<td>' . $fila['dispo'] . '</td>';
                echo '</tr>';
            
        }
        echo "</table></div>";
        
        echo '<br><h3>Total de películas disponibles ' . $contador . ' <h3> <br>';
        


        ?>