<?php
//llamamos a la clase db
include('db.php');
//Variables para usuario y cotnraseñas creados en index
$usuario=$_POST['usuario'];
$contraseña=$_POST['password'];
//iniciamos sesion
session_start();
$_SESSION['usuario']=$usuario;


//creamos la consulta de mysql
$consulta="SELECT*FROM usuarios where nombreUsuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_num_rows($resultado);

if($filas){
    //datos correctos: mandar a la página principal
    header("location:home.php");
}
else{
    ?>

    <?php
    //Si no volver al index porque los datos son incorrectos
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN AUTENTIFICACIÓN</h1>
    <?php

}
mysqli_free_result($resultado);
mysqli_close($conexion);