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
        <h2>Eliminar Películas</h2>


        <?php


        $consulta = "select * from peliculas";
        $paquete = mysqli_query($conexion, $consulta);

        if (!isset($_POST["submit"])) {

            
            
        echo '<table> 
        
        <th>ID</th><th>Titulo</th><th>Disponibilidad</th><tr>';

        while ($fila = mysqli_fetch_array($paquete)) {
                echo ' <form method="post" action="admin_eliminar.php"> 
                <tr>
                <td>' . $fila['idpelicula'] . '</td>
                <td>' . $fila['titulo'] . '</td>
                <td>' . $fila['dispo'] .'</td>
                <tr>';


        }
            echo '
                </table>';

            echo "<br>";
            echo "<br>";

            echo "<td>", "Indica la ID que quieres eliminar: <input type='text' name='eleccion'  </td> ";
            echo '<input type="submit" name="submit" value="Eliminar">';
            echo "</form>";

            echo "<br>";
            echo "<br>";
        
        } else {

            $ID = $_POST["eleccion"];
            
            $consulta = "DELETE FROM peliculas WHERE idpelicula='$ID' ";
            $datos = mysqli_query($conexion, $consulta);

            echo '<br><h3>Película eliminada correctamente</h3> <br>';
            echo '<h3><a href="admin_eliminar.php">Volver a menu</a></h3>


      </div>';
        }



        echo '</body></html>';

        ?>