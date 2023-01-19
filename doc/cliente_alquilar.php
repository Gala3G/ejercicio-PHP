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
  $ID1 = $_SESSION['idcliente']; ?>

  
  <?php 
  /*PASO 1 - guardo el nombre del usuario de SESSION en variable y la imprimo*/
  echo '<h1>Hola ' . $a . '<h1> <br>';   
  ?>


  <div class="container">
    <h2>Alquiler de Películas</h2>
    <?php

    $consulta = "select * from peliculas";
    $paquete = mysqli_query($conexion, $consulta);

    /*PASO 2 - imprimo las películas disponibles*/
    if (!isset($_POST["submit"])) {

      echo '
        <table>
          <th>ID</th>
          <th>Titulo</th>
          <th>Director</th>
          <th>Disponibles</th>';

      while ($fila = mysqli_fetch_array($paquete)) {

        echo ' <form method="post" action="http://localhost:80/videoclub/doc/cliente_alquilar.php"> ';

        if ($fila['dispo'] > 0) {

          echo '
            <tr>
              <td> <input type="text" name="titulo" value="' . $fila['idpelicula'] . ' "> </td>
              <td> <input type="text" name="titulo" value="' . $fila['titulo'] . '"> </td>
              <td> <input type="text" name="director" value="' . $fila['director'] . '"> </td>
              <td> <input type="text" name="dispo" value="' . $fila['dispo'] . '"> </td>
            </tr>';
        }
      }
      echo '
        </table>';
      echo "<br>";
      echo "<br>";

      /*PASO 3 - pido al usuario que introduzca la ID de la película que quiere alquilar, lo guardo en la variable eleccion*/

      echo "<td>", "Indica la ID que quieres alquilar: <input type='text' name='eleccion' value='' </td> ";
      echo '<input type="submit" name="submit" value="alquilar">';
      echo "</form>";

      echo "<br>";
      echo "<br>";
    } else {


      $ID2 = $_POST["eleccion"]; /*guardo aqui la ID de la pelicula que el usuario quiere alquilar*/ 

      $consulta3 = "select * from peliculas";
      $paquete3 = mysqli_query($conexion, $consulta3);

      while ($fila = mysqli_fetch_array($paquete)) {

        /*PASO 4 - busco la ID a alquilar en la tabla peliculas y guarda la disponibilidad y el titulo en nuevas variables*/

        if ($_POST["eleccion"] == $fila["idpelicula"]) {

          $titulo = $fila["titulo"]; /*guardo el titulo porque lo añado en la tabla pivote (titulo2)*/
          $DISPO = $fila["dispo"]; 

          $DISPO = $DISPO - 1; /*a la dispo encontrada, le resto 1 */ 

        }
      }

      /*PASO 5 - en tabla pivote peliculasclientes añador */
      $consulta = "INSERT INTO peliculasclientes (fidcliente,fidpelicula,titulo2,devuelta) VALUES ('$ID1','$ID2','$titulo','NO')";
      $paquete = mysqli_query($conexion, $consulta);


      $consulta = "UPDATE peliculas SET dispo='$DISPO' WHERE idpelicula = '$ID2'";
      $paquete = mysqli_query($conexion, $consulta);

      echo '<br><h3>Película "' . $titulo . '" alquilada correctamente</h3> <br>';
      echo '<h3><a href="cliente_alquilar.php">Volver a menu</a></h3>
      </div>';
    }



    echo '</body></html>';

    ?>