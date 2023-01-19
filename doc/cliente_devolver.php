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
    $a = $_SESSION['nombre']; ?>


    <?php echo '<h1>Hola ' . $a . '<h1> <br>'; ?>

    <div class="container">
        <h2>Devolver Películas</h2>
        <?php

 
        $idUsu = $_SESSION['idcliente'];
        $contador = 0;


        $consulta = "select * from peliculasclientes";
        $paquete = mysqli_query($conexion, $consulta);

        if (!isset($_POST["submit"])) {


            echo '

                <table>

                    <th>ID</th><th>Titulo</th></tr>';


            while ($fila = mysqli_fetch_array($paquete)) {


                if ($idUsu == $fila['fidcliente'] and $fila['devuelta'] == 'NO') {
                    $contador = 1;
            echo ' <form method="post" action="cliente_devolver.php">             
            <tr>
            <td> <input type="text" name="fidpelicula" value="' . $fila['fidpelicula'] . ' "> </td>
            <td> <input type="text" name="titulo" value="' . $fila['titulo2'] . '"> </td>
            </tr>';
                }
            }
            echo '</table>';

            echo "<br>";
            echo "<br>";

            echo "<td>", "Indica la ID que quieres devolver: <input type='text' name='eleccion'  </td> ";
            echo '<input type="submit" name="submit" value="devolver">';
            echo "</form>";

            echo "<br>";
            echo "<br>";

        } else {


            $ID1 = $_SESSION['idcliente'];

            $ID2 = $_POST["eleccion"];

            $TITULO = $_POST["titulo"];

            $consulta = "UPDATE peliculasclientes SET devuelta='SI' WHERE fidpelicula='$ID2'";
            $paquete = mysqli_query($conexion, $consulta);

            

            $consulta = "select * from peliculas";
            $paquete = mysqli_query($conexion, $consulta);

            while ($fila = mysqli_fetch_array($paquete)) {

                if ($_POST["eleccion"] == $fila["idpelicula"]) {
                    $DISPO = $fila["dispo"];
                    $DISPO = $DISPO + 1;

                }
            }

            $consulta = "UPDATE peliculas SET dispo='$DISPO' WHERE idpelicula = '$ID2'";
            $paquete = mysqli_query($conexion, $consulta);

            echo '<br><h3>Pelicula Devuelta<h3> <br>';
            echo '<a href="pp_cliente.php">Volver a menu</a>
            </div>';

        }

echo '</body></html>';

        ?>