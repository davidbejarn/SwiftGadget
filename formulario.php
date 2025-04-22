<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "formulariopruebas";

$enlace = mysqli_connect($servidor, $usuario, $clave, $basededatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $email = $_POST["email"] ?? '';
    $celular = $_POST["celular"] ?? '';
    $hora = $_POST["hora"] ?? '';
    $fecha = $_POST["fecha"] ?? '';
    $edad = $_POST["edad"] ?? '';
    $genero = $_POST["genero"] ?? '';
    $promociones = isset($_POST["promociones"]) ? 1 : 0;
    $preferencias = $_POST["preferencias"] ?? [];
    $preferencias_str = implode(", ", $preferencias);

    $sql = "INSERT INTO registros (nombre, email, celular, hora, fecha, edad, genero, promociones, preferencias)
            VALUES ('$nombre', '$email', '$celular', '$hora', '$fecha', '$edad', '$genero', '$promociones', '$preferencias_str')";

    if (mysqli_query($enlace, $sql)) {
        
        header("Location: index.php");
        exit;
    } else {
        echo "Error al registrar: " . mysqli_error($enlace);
    }

    mysqli_close($enlace);
}
?>