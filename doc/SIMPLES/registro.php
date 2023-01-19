<?php

include("conexion.php");
session_start();

if(!isset($_POST["submit"])){

    echo '<html><body>
<form method="post" action="registro.php">
Nombre:<input type="text" name="nombre">
Apellido:<input type="text" name="pswd">
<input type="submit" name="submit" value="guardar">
</body></html>';

}else{

    $N = $_POST["nombre"];
    $P = $_POST["pswd"];
    $consulta = "INSERT INTO clientes (cod, nombre, pswd) VALUES ('1','$N','$P')";

$paquete=mysqli_query($conexion,$consulta); 

echo '<html><body>Datos agregados</body></html>'; 
}
?>