<?php
$servidor="localhost";
$usuario="root";
$clave="";
$basededatos="formulario_web";
$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " .mysqli_connect_error());
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Insertar datos
$sql = "INSERT INTO registros (nombre, email, celular, edad, genero)
        VALUES ('$nombre', '$email', '$celular', $edad, '$genero')";

if (mysqli_query($enlace,$sql)) {
    echo "¡Registro exitoso!";
} else {
    echo "Error: " .mysqli_error($enlace);
}

mysqli_close($enlace);
?>

