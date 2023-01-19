<?php

include("conexion.php");
session_start();

if (!isset($_POST["submit"])) {
    echo 
    '
    <html>
    <body>
    <form method="POST" action="login.php">
    usuario: <input type="text" name="usuario">
    contraseña:<input type=text name="pw">
    <input type="submit" value="Login">
    </form>    
    </body>
    </html> 
    ';

}else{

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['pw'] = $_POST['pw'];


    $consulta = "select*from clientes";
    $paquete = mysqli_query($conexion, $consulta);

    $encontrado = 0;
    $cliente = 0;
    


    while (($fila = mysqli_fetch_array($paquete))) {


        if (($_SESSION['usuario'] == $fila['usuario']) and (($_SESSION['pw'] == $fila['pw']))) {
            $_SESSION['idcliente'] = $fila['idcliente'];
            $encontrado = 1;
            $quien = $fila['cod'];


            if (($quien == 1)) {
                $cliente = 1;
            }
        }
    }

    if ($encontrado == 1 and $cliente == 0) {
        header('Location: admin_pp.php');
    } elseif ($encontrado == 1 and $cliente == 1) {
        header('Location: cliente_pp.php');
    } else {
        echo "usuario o contraseña incorrectos";
    }
}

?>



