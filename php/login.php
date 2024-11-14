<?php
session_start();

//Inicialiazar conexion a base de datos

function obtenerConexion(){
$hostname = "localhost";
$user = "root";
$pass = "josuecmm14";
$dbname = "Altima";

$conexion = mysqli_connect($hostname,$user,$pass, $dbname);
return $conexion;
}
function validarUsuario($username, $password) {
    $conexion = obtenerConexion();

    // Escapa los datos del usuario para evitar SQL Injection
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);

    // Realiza la consulta
    $query = "SELECT * FROM usuario WHERE username = '$username' AND pass = '$password'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        header("Location: /altima/php/main.php");
    } else {
        echo '<script>
                alert("Usuario o contraseña incorrectos");
                window.location.href = "/altima/index.html";
              </script>';
    }

    mysqli_close($conexion);
}

// Llama a la función validarUsuario() solo cuando se envían datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validarUsuario($_POST['username'], $_POST['password']);
}
?>


