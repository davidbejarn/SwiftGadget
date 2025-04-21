<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar producto</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        label, select, button {
            display: block;
            margin: 15px 0;
            width: 100%;
        }
        button {
            background-color: magenta;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php


class Producto {
    protected string $nombre;
    protected int $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrarInformacion() {
        return "Estás comprando: <strong>{$this->nombre}</strong><br>Precio: <strong>$" . number_format($this->precio) . "</strong>";
    }
}

class Compra extends Producto {
    public function mostrarFormularioPago() {
        echo "<form method='POST'>";
        echo "<h2>Métodos de pago</h2>";
        echo "<label for='metodo'>Selecciona uno:</label>";
        echo "<select name='metodo' id='metodo'>
                <option value='nequi'>Nequi</option>
                <option value='tarjeta'>Tarjeta de crédito</option>
                <option value='pse'>PSE</option>
              </select>";
        echo "<button type='submit'>Pagar</button>";
        echo "</form>";
    }
}


$productoSeleccionado = $_GET['producto'] ?? '';

$productos = [
    "sillagamer" => new Compra("Silla Gamer", 600000),
    "escritorio" => new Compra("Escritorio", 350000),
    "gabinete" => new Compra("Gabinete", 300000)
];


if (array_key_exists($productoSeleccionado, $productos)) {
    $producto = $productos[$productoSeleccionado];
    echo $producto->mostrarInformacion();
    $producto->mostrarFormularioPago();
    echo "
        <div style='display: flex; margin-top: 20px;'>
            <a href='index.php'>
                <button type='button' style='background-color: fuchsia; color: white; padding: 10px 20px; border: none; border-radius: 10px;'>Cancelar y regresar</button>
            </a>
        </div>";
} else {
    echo "<p>Producto no encontrado.</p>";
}


?>

</body>
</html>
