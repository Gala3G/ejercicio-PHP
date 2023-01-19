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
            <li><a href="http://localhost:80/videoclub/doc/pp_registro.php">REGISTRO</a></li>

        </ul>
    </div>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("conexion.php");
    session_start();

     /*PASO 1 - preparo los inputs donde el usuario introduce los datos (nombre y pwd)*/
    if (!isset($_POST["submit"])) {

        echo ' <form method="POST" action="pp_login.php">


        <div class="mx-auto w-25 pt-4">
            <h2>LOGIN</h2> 
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


    </form>
';


    } else {

        /*PASO 2 - guardo los datos introducidos (nombre y pwd): capturo en POST y guardo en SESSION*/

        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['pswd'] = $_POST['pswd'];

        $consulta = "select*from clientes";
        $paquete = mysqli_query($conexion, $consulta);

        $encontrado = 0; /*si nombre y pwd se encuentran en la BD, pasará a 1 */

        $cliente = 0; /*si el codigo/usuario es 0, accede como administrador 
                    si el codigo/usuario es 1, accede como cliente*/



        while (($fila = mysqli_fetch_array($paquete))) {


            if (($_SESSION['nombre'] == $fila['nombre']) and (($_SESSION['pswd'] == $fila['pswd']))) {
                $_SESSION['idcliente'] = $fila['idcliente'];
                $encontrado = 1;
                $quien = $fila['cod']; /* busco si está queriendo acceder un administrador o un cliente */


                if (($quien == 1)) {
                    $cliente = 1; /*si quien es 1, la variable cliente toma valor de 1 */
                }
            }
        }
    
        /*si los datos estan en la BD y el codigo/usuario de cliente es 0, accede como administrador*/
        if ($encontrado == 1 and $cliente == 0) { 
     
            header('Location: pp_admin.php');

        /*si los datos estan en la BD y el codigo/usuario de cliente es 1, accede como cliente*/
        } elseif ($encontrado == 1 and $cliente == 1) {
            header('Location: pp_cliente.php');

        /*en caso contrario, error*/    
        } else {
            echo "<br><h3>Usuario o contraseña incorrectos</h3>";
            echo '<br><br><h3><a href="http://localhost:80/videoclub/doc/pp_login.php">Volver a Login</a><h3>
            </body>
</html>';
        }
    }

    ?>